<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'rank'
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

    public function getRankAttribute() {
        return $this->rank()->first();
    }

    public function getLicensesAttribute() {
        return $this->licenses()->get();
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


    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

}
