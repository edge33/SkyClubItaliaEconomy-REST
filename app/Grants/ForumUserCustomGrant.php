<?php


namespace App\Grants;

use App\ForumUser;
use App\Rank;
use App\Role;
use App\User;
use Illuminate\Support\Facades\DB;
use League\OAuth2\Server\Entities\ClientEntityInterface;
use League\OAuth2\Server\Entities\UserEntityInterface;
use League\OAuth2\Server\Exception\OAuthServerException;
use League\OAuth2\Server\Grant\PasswordGrant;
use League\OAuth2\Server\Repositories\RefreshTokenRepositoryInterface;
use League\OAuth2\Server\Repositories\UserRepositoryInterface;
use League\OAuth2\Server\RequestEvent;
use Psr\Http\Message\ServerRequestInterface;

class ForumUserCustomGrant extends PasswordGrant
{
    /**
     * @param RefreshTokenRepositoryInterface $refreshTokenRepository
     */
    public function __construct(
        RefreshTokenRepositoryInterface $refreshTokenRepository,
        UserRepositoryInterface $userRepositoryInterface
    ) {
        $this->setRefreshTokenRepository($refreshTokenRepository);
        $this->setUserRepository($userRepositoryInterface);

        $this->refreshTokenTTL = new \DateInterval('P1M');
    }

    protected function validateUser(ServerRequestInterface $request, ClientEntityInterface $client)
    {
        $username = $this->getRequestParameter('username', $request);
        if (is_null($username)) {
            throw OAuthServerException::invalidRequest('username');
        }

        $password = $this->getRequestParameter('password', $request);
        if (is_null($password)) {
            throw OAuthServerException::invalidRequest('password');
        }

        $user = $this->userRepository->getUserEntityByUserCredentials(
            $username,
            $password,
            $this->getIdentifier(),
            $client
        );
        if ($user instanceof UserEntityInterface === false) {
            $this->getEmitter()->emit(new RequestEvent(RequestEvent::USER_AUTHENTICATION_FAILED, $request));

            throw OAuthServerException::invalidCredentials();
        }

        $forumUser = ForumUser::find($user->getIdentifier());
        $userId = $forumUser->id;
        $username = $forumUser->username;
        $skyUser = User::find($userId);
        if (!$skyUser == null) {
            return $user;
        }

        if ($this->buildNewSkyClubUser($forumUser))
            return $user;

        $this->getEmitter()->emit(new RequestEvent(RequestEvent::USER_AUTHENTICATION_FAILED, $request));
        throw OAuthServerException::invalidCredentials();
    }

    private function buildNewSkyClubUser(ForumUser $forumUser) {
        $rank = Rank::find(1);
        $role = Role::find(1);
        $userId = $forumUser->id;
        $username = $forumUser->username;

        $userData = DB::connection('mysql2')->table('phpbb_profile_fields_data')->where('user_id', $userId)->first();
        if ($userData == null) {
            return false;
        }
        
        $callSign = $userData->pf_callsign;
        if ($callSign == null)
            return false;

        $skyUser = new User();
        $skyUser->id = $userId;
        $skyUser->callSign = $callSign;
        $skyUser->username = $username;
        $skyUser->rank()->associate($rank);
        $skyUser->role()->associate($role);
        $skyUser->save();
        return true;
    }
}
