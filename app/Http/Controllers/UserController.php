<?php

namespace App\Http\Controllers;

use App\Job;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index() {
        return User::all();
    }

    public function get(User $user) {
        return $user->load('rank', 'licenses', 'jobs');
    }

    public function update(Request $request, User $user) {
        $this->checkAuthorizationForModel('update-data', $user);

        $validator = Validator::make($request->all(), [
            'rank' => 'exists:ranks,id',
            'licenses' => 'exists:licenses,id'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json($errors, 406);
        }

        $licenses = $request->input('licenses');
        $user->licenses()->detach();
        $user->licenses()->attach($licenses);
        $user->update($request->all());
        return response()->json($user, 200);
    }

    public function delete(User $user)
    {
        $this->checkAuthorization('create-data');
        $user->delete();
        return response()->json(null, 204);
    }
}
