<?php

namespace App\Traits; 
use App\ForumUser;
use App\User;
use App\Role;
trait HandlesAdminAuthorization
{
    /**
     * Checks if user is admin.
     *
     * @param  Forum User  $user
     * @return boolean
     */
    public static function isAdmin(ForumUser $user)
    {
        $skyClubUser = User::find($user->id);
        $adminRole = Role::where('role_name', 'Administrator')->first();
        return $skyClubUser->role->id == $adminRole->id;
    }

}