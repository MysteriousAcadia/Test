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
    	$stock = Stock::where('store_id', $store_id)->first();
    	return $stock;    
    }

    public function addToLiveStock($input) {
    	$liveStock = Stock::where('store_id', $input['store_id'])->first();
    	if($liveStock) {
	    	$liveStock->regular += $input['regular'];
	    	$liveStock->damaged += $input['damaged'];
	    	$liveStock->transport_damage += $input['transport_damage'];
	    	$liveStock->update();
	    }
	    else {
	    	$liveStock = new Stock;
	    	$liveStock->store_id = $input['store_id'];
	    	$liveStock->regular = $input['regular'];
	    	$liveStock->damaged = $input['damaged'];
	    	$liveStock->transport_damage = $input['transport_damage'];
	    	$liveStock->save();
	    }
    }

    public function deductFromLiveStock($input) {
    	$liveStock = Stock::where('store_id', $input['store_id'])->first();
    	if($liveStock) {
	    	$liveStock->regular -= $input['regular'];
	    	$liveStock->damaged -= $input['damaged'];
	    	$liveStock->destroyed += $input['destroyed'];
	    	$liveStock->update();
	    }
	    else {
	    	$liveStock = new Stock;
	    	$liveStock->store_id = $input['store_id'];
	    	$liveStock->regular -= $input['regular'];
	    	$liveStock->damaged -= $input['damaged'];
	    	$liveStock->destroyed += $input['destroyed'];
	    	$liveStock->save();
	    }
    }

}
