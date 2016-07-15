<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class store extends Model
{
    public function user()
    {
    	return $this->hasMany('App\User');
    }

    public function stock()
    {
    	return $this->hasMany('App\stock');
    }

    public function closingStock()
    {
    	return $this->hasMany('App\ClosingStock');
    }
}
