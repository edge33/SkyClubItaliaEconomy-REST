<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    public $timestamps = false;

    protected $appends = array('rankName');
    protected $hidden = array('rank_name');

    protected $fillable = Array('rankName');

    public function getRankNameAttribute(){
        return $this->attributes['rank_name'];
    }

    public function setRankNameAttribute($value) {
        $this->attributes['rank_name'] = $value;
    }

    public function user () {
        return $this->belongsTo('App\User');
    }

    public function job () {
        return $this->hasMany('App\Job');
    }
}
