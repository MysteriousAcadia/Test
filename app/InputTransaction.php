<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;


class InputTransaction extends Model
{

	protected $fillable =  ['user_id','regular_eggs','damaged_eggs','transport_damage','vehicle_no', 'store_id'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function store()
    {
    	return $this->belongsTo('App\Store');
    }

}
