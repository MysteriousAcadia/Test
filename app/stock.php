<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class stock extends Model
{
    public function store() 
    {
    	return belongsTo('App\store');
    }
}
