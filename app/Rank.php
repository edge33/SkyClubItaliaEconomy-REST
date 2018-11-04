<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    public $timestamps = false;

    public function user () {
        return $this->belongsTo('App\User');
    }

    public function job () {
        return $this->belongsTo('App\Job');
    }
}
