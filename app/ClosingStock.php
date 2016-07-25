<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClosingStock extends Model
{

    protected $fillable =  [ 'store_id',
  'stock_regular',
  'stock_damaged',
  'regular_input',
  'damaged_input',
  'regular_output',
  'damaged_output',
  'destroyed',
  'amount',
  'expenses',
  'user_id',
  'created_at',
  'updated_at',
  'stock_transport_damage',
  'stock_matched'];

    public function store()
    {
    	return $this->belongsTo('App\store');
    }

    public static function getOpeningStock($date, $store)
    {
    	return ClosingStock::where('store_id', $store)
    						->where('created_at', $date)
    						->first();
    }

}
