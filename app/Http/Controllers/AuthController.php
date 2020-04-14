<?php

namespace App\Http\Controllers;

use App\Rank;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $userId = $user->getAttribute('user_id');
            $username = $user->getAttribute('username');
            $userData = DB::connection('mysql2')->table('phpbb_profile_fields_data')->where('user_id', $userId)->first();
            $callSign = '';
            if ($userData != null) {
                $callSign = $userData->pf_callsign;
            }
            $rank = Rank::find(1);

            $skyUser = User::find($userId);
            if ($skyUser == null) {
                $skyUser = new User();
                $skyUser->id = $userId;
                $skyUser->callSign = $callSign;
                $skyUser->username = $username;
                $skyUser->rank()->associate($rank);
                $skyUser->save();
            }
            $currentToken = $user->getAuthIdentifier();

            $tokenResult = $user->createToken('Personal Access Token');
            $token = $tokenResult->token;
            return response()->json([
                'access_token' => $tokenResult->accessToken,
                'token_type' => 'Bearer',
                'expires_at' => Carbon::parse(
                    $token->expires_at
                )->toDateTimeString()
            ]);
        }

        return response()->json(['error' => 'Unauthorised'], 401);
    }


    /**
     * details api
     *
     * @return \Illuminate\Http\Response
     */
    public function details()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this->successStatus);
    }
}
