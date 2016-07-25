<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
	protected $fillable =  ['reference','amount','type','store_id','user_id','created_at', 'updated_at'];

    public function user()
    {
    	$this->belongsTo('App\User');
    }

    public function store()
    {
    	$this->belongsTo('App\Store');
    }

}
