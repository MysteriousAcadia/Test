<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClosingStock extends Model
{
    public function store()
    {
    	return $this->belongsTo('App\store');
    }

    public static function getOpeningStock($date, $store)
    {
    	return ClosingStock::where('store_id', $store)
    						->where('date', $date)
    						->firstOrFail();
    }
}
