<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        return User::with('rank', 'licenses')->get();
    }

    public function get(User $user) {
        $user->load('rank', 'licenses');
        return $user;
    }

    public function update(Request $request, User $user) {
        $user->update($request->all());
        $user->load('rank', 'licenses');
        return response()->json($user, 200);
    }

    public function delete(User $user)
    {
        $user->delete();
        return response()->json(null, 204);
    }
}
