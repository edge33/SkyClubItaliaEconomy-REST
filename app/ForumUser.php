<?php

namespace App;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class ForumUser extends Authenticatable
{
    use HasApiTokens;
    protected $primaryKey = 'user_id';
    /**
     * The Connection used to retrieve the model
     *
     * @var string
     */
    protected $connection = 'mysql2';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'phpbb_users';

    public function getAuthPassword() {
        return $this->user_password;
    }

    public function findForPassport($username) {
        return $this->where('username', $username)->first();
    }

    public function getIdAttribute() {
        return $this->user_id;
    }
}
