<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    public function patient(){
    	return $this->belongsTo('App\User');
    }
    public function doctor(){
	    return $this->belongsTo('App\Doctor');
	}
}
