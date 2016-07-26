<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\Store;

class OutputTransaction extends Model
{
	protected $fillable =  ['user_id','regular','destroyed','rate','vehicle_no', 'store_id', 'amount', 'damaged', 'transport_damage', 'buyer', 'type'];
	
    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function store()
    {
    	return $this->belongsTo('App\Store');
    }

    public static function getAllOutput($date) {
        $stores = Store::all();
        foreach ($stores as $key => $store) {
            $query = DB::table('output_transactions')
                            ->where('created_at','like',$date)
                            ->where('store_id', $store->id);
            $eggs[$store->id][0] = $query->sum('regular');
            $eggs[$store->id][1] = $query->sum('damaged');
            $eggs[$store->id][2] = $query->sum('destroyed');
            $eggs[$store->id][3] = $query->sum('amount');
        }
        return $eggs;
    }
}
