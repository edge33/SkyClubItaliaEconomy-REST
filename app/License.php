<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class License extends Model
{
    public $timestamps = false;

    public function users (){
        return $this->belongsToMany('App\User');
    }

    public function jobs() {
        return $this->belongsToMany('App\Job');
    }
}
