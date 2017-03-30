<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    public function user(){
    	return $this->belongsTo('App\user');
    }
    public function prescriptions()
    {
        return $this->hasMany('App\Prescription', 'doctor_id');
    }
}
