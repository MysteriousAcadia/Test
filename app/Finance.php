<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
	
    public function user()
    {
    	$this->belongsTo('App\User');
    }

    public function store()
    {
    	$this->belongsTo('App\Store');
    }

}
