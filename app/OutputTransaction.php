<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OutputTransaction extends Model
{
	protected $fillable =  ['user_id','regular_eggs','destroyed','rate','vehicle_no', 'store_id', 'amount', 'damaged_eggs', 'buyer', 'type'];
	
    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function store()
    {
    	return $this->belongsTo('App\Store');
    }
}
