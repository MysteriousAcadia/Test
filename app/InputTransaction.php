<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use DB;
use App\Store;

class InputTransaction extends Model
{

	protected $fillable =  ['user_id','regular','damaged','transport_damage','vehicle_no', 'store_id'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function store()
    {
    	return $this->belongsTo('App\Store');
    }

    public static function getAllInput($date)
    {
    	$stores = Store::all();
    	foreach ($stores as $key => $store) {
	    	$query = DB::table('input_transactions')
	                        ->where('created_at','like',$date)
	                        ->where('store_id', $store->id);
	        $eggs[$store->id]['regular'] = $query->sum('regular');
	        $eggs[$store->id]['damaged'] = $query->sum('damaged');
	        $eggs[$store->id]['tranport_damage'] = $query->sum('transport_damage');
	    }  
	    return $eggs;
    }

}
