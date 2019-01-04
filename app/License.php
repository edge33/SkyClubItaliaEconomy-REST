<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class License extends Model
{
    public $timestamps = false;

    protected $hidden = array('license_name', 'pivot');
    protected $appends = array('LicenseName');
    protected $fillable = array('licenseName');

    public function setLicenseNameAttribute($value) {
        $this->attributes['license_name'] = $value;
    }

    public function getLicenseNameAttribute() {
        return $this->attributes['license_name'];
    }

    public function users (){
        return $this->belongsToMany('App\User');
    }

    public function jobs() {
        return $this->belongsToMany('App\Job');
    }
}
