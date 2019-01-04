<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    public $timestamps = false;
    protected $hidden = array('user_id', 'required_rank_id');
    protected $fillable = ['user', 'title', 'description', 'departure', 'arrival', 'category', 'limitations','requiredRank'];
    protected $appends = ['requiredRank' , 'requiredLicenses','user'];

    public function getUserAttribute(){
        return $this->user()->first();
    }

    public function setUserAttribute($value) {
        $this->user()->associate($value);
    }

    public function getRequiredRankAttribute() {
        return $this->requiredRank()->get();
    }

    public function setRequiredRankAttribute($value) {
        $this->requiredRank()->associate($value);
    }

    public function getRequiredLicensesAttribute() {
        return $this->requiredLicenses()->get();
    }

    public function user () {
        return $this->belongsTo('App\User');
    }

    public function requiredRank () {
        return $this->belongsTo('App\Rank');
    }

    public function requiredLicenses () {
        return $this->belongsToMany('App\License');
    }

}
