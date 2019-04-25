<?php

namespace App\Http\Controllers;

use App\Rank;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class LoginController extends Controller
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
            $success['token'] =  $user->createToken('economyRest')->accessToken;
            return response()->json(['success' => $success], 200);
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
        return response()->json(['success' => $user], $this-> successStatus);
    }

}