<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $timestamps = false;

    protected $appends = array('roleName');
    protected $hidden = array('role_name');

    protected $fillable = Array('roleName');

    public function getRoleNameAttribute(){
        return $this->attributes['role_name'];
    }

    public function setRoleNameAttribute($value) {
        $this->attributes['role_name'] = $value;
    }

    public function user () {
        return $this->hasMany('App\User');
    }
}
