<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    public $timestamps = false;
    protected $appends = array('username', 'requiredRank');
    protected $hidden = array('user_username', 'required_rank');

    protected $fillable = ['username', 'title', 'description', 'departure', 'arrival', 'category', 'limitations', 'requiredRank'];

    public function getUsernameAttribute(){
        return $this->attributes['user_username'];
    }

    public function setUsernameAttribute($value) {
        $this->attributes['user_username'] = $value;
    }

    public function getRequiredRankAttribute(){
        return $this->requiredRank()->get();
    }

    public function setRequiredRankAttribute($value) {
        $this->requiredRank()->associate($value);
    }

    public function users () {
        return $this->belongsTo('App\User');
    }

    public function requiredRank () {
        return $this->belongsTo('App\Rank');
    }

    public function requiredLicenses () {
        return $this->belongsToMany('App\License');
    }
}
