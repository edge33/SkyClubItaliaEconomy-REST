<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class User extends Model
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

    public function getRoleAttribute() {
        return $this->role()->first();
    }
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'rank_id', 'pilot_callsign','role_id'
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

    public function role() {
        return $this->belongsTo('App\Role');
    }
}
