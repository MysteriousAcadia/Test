<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class stock extends Model
{
    public function store() 
    {
    	return belongsTo('App\store');
    }

    public static function getLiveStock($store_id)
    {
    	$stock = Stock::where('store_id', $store_id)->firstOrFail();
    	return $stock;    
    }

}
