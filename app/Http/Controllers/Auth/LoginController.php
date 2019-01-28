<?php

namespace App\Http\Controllers\Auth;

use App\ForumUser;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');
        $username = $credentials['username'];
        $password = $credentials['password'];
        $users = User::where("username", $username)->get();
        if ($users->count() == 0) {
            return response()->json([
                'data' => 'wrong username or password'
            ], 400);
        }
        $user = $users[0];

        $forumUser = ForumUser::where('username', $username)->get();
        if ($forumUser->count() == 0)
            return response()->json([
                'data' => 'wrong username or password'
            ], 400);

        $passwordHash = $forumUser[0]->user_password;
        if (password_verify($password, $passwordHash)) {
            // Authentication passed...
            Auth::login($user);
            $token = $user->generateToken();

            return response()->json("Welcome ".$username. " Token: ".$token);
        }
        return response()->json([
            'data' => 'wrong username or password'
        ], 400);
    }


    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
