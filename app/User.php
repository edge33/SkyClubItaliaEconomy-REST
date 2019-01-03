<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'rank', 'callsign'
    ];

    public function setCallsignAttribute($value) {
        $this->attributes['pilot_callsign'] = $value;
    }

    public function getCallsignAttribute() {
        return $this->attributes['pilot_callsign'];
    }

    public function setRankAttribute($value) {
        $this->rank()->associate($value);
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'rank_id', 'pilot_callsign'
    ];

    protected $appends = array('callsign');

    public function rank() {
        return $this->belongsTo('App\Rank');
    }

    public function jobs(){
        return $this->hasMany('App\Job');
    }

    public function licenses() {
        return $this->belongsToMany('App\License');
    }
}
