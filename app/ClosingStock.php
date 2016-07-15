<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClosingStock extends Model
{
    public function store()
    {
    	return $this->belongsTo('App\store');
    }
}
