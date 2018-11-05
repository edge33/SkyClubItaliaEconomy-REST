<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    public $timestamps = false;

    public function users () {
        return $this->belongsTo('App\User');
    }

    public function requiredRank () {
        return $this->hasOne('App\Rank');
    }

    public function requiredLicenses () {
        return $this->belongsToMany('App\License');
    }
}
