<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ForumUser extends Model
{

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



}
