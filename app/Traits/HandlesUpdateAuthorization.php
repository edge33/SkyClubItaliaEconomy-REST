<?php

namespace App\Traits; 
use App\ForumUser;
use App\User;
use Illuminate\Database\Eloquent\Model;

trait HandlesUpdateAuthorization
{
    /**
     * Checks if user is updating his details.
     *
     * @param  Forum User  $user
     * @return boolean
     */
    public static function isUpdatingHimself(ForumUser $user, Model $model) {
        return $user->id == $model->id;
    }

}