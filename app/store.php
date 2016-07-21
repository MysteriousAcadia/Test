<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\InputTransaction;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use DB;

class store extends Model
{
    protected $fillable =  ['name','id','address','user_id','created_at', 'updated_at'];

    public function user()
    {
    	return $this->hasOne('App\User');
    }

    public function stock()
    {
    	return $this->hasOne('App\stock');
    }

    public function closingStock()
    {
    	return $this->hasMany('App\ClosingStock');
    }

    public function finances()
    {
        return $this->hasMany('App\Finance');
    }

    public function createStockInput() 
    {
        $input = InputTransaction::create(Input::except('_token'));
        if($input) {
            return 'success';
        }
        return 'failed';
    }

    public function createStockOutput($input) 
    {
        $output = OutputTransaction::create($input);
        if($output) {
            return 'success';
        }
        return 'failed';
    }


    public function addToLiveStock($regular_eggs, $damaged_eggs, $transport_damage)
    {
        $this->stock->regular += $regular_eggs;
        $this->stock->damaged += $damaged_eggs;
        $this->stock->transport_damage += $transport_damage;
        $this->stock->update();
    }

    public function getTodaysInputTransactions()
    {
        $today = Carbon::now()->format('Y-m-d').'%';
        $transactions = InputTransaction::where('created_at', 'like', $today)->get();
        return $transactions;
    }

    public function getTodaysRegularOutputTransactions()
    {
        $today = Carbon::now()->format('Y-m-d').'%';
        $transactions = OutputTransaction::where('created_at', 'like', $today)
                                        ->where('type', 'regular')->get();
        return $transactions;
    }


    public function getTodaysDamagedOutputTransactions()
    {
        $today = Carbon::now()->format('Y-m-d').'%';
        $transactions = OutputTransaction::where('created_at', 'like', $today)
                                        ->where('type', 'damaged')->get();
        return $transactions;
    }

    public function getSaleByDate($date) 
    {
        $query = DB::table('output_transactions')
                        ->where('created_at','like',$date);
        $eggs[0] = $query->sum('regular_eggs');
        $eggs[1] = $query->sum('damaged_eggs');
        $eggs[2] = $query->sum('destroyed');
        $eggs[3] = $query->sum('amount');
        return $eggs;        
    }

}
