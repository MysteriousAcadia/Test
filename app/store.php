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

    public function inputTransactions()
    {
        return $this->hasMany('App\InputTransaction');
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
        $transactions = InputTransaction::where('created_at', 'like', $today)
                                        ->where('store_id', $this->id)->get();
        return $transactions;
    }

    public function getTodaysRegularOutputTransactions()
    {
        $today = Carbon::now()->format('Y-m-d').'%';
        $transactions = OutputTransaction::where('created_at', 'like', $today)
                                        ->where('type', 'regular')
                                        ->where('store_id', $this->id)->get();
        return $transactions;
    }


    public function getTodaysDamagedOutputTransactions()
    {
        $today = Carbon::now()->format('Y-m-d').'%';
        $transactions = OutputTransaction::where('created_at', 'like', $today)
                                        ->where('type', 'damaged')
                                        ->where('store_id', $this->id)->get();
        return $transactions;
    }

    public function getSaleByDate($date) 
    {
        $query = DB::table('output_transactions')
                        ->where('created_at','like',$date)
                        ->where('store_id', $this->id);
        $eggs[0] = $query->sum('regular');
        $eggs[1] = $query->sum('damaged');
        $eggs[2] = $query->sum('destroyed');
        $eggs[3] = $query->sum('amount');
        return $eggs;        
    }

    public function getTodaysExpenses() {
        $today = Carbon::now()->format('Y-m-d').'%';
        $expenses = Finance::where('created_at', 'like', $today)
                            ->where('store_id', $this->id)->get();
        return $expenses;
    }

    public function getTodaysTotalExpenses() {
        $today = Carbon::now()->format('Y-m-d').'%';
        $expenses = Finance::where('created_at', 'like', $today)
                            ->where('store_id', $this->id);
        $total = $expenses->sum('amount');
        return $total;    
    }

    public function getTodaysClosingStock() {
        $stock = Stock::where('store_id', $this->id)->first();
        $input['stock_regular'] = $stock->regular;
        $input['stock_damaged'] = $stock->damaged;
        $input['stock_transport_damage'] = $stock->transport_damage;
        $today = Carbon::now()->format('Y-m-d').'%';
        $todays_input = $this->getInputByDate($today);
        $input['regular_input'] = $todays_input['regular'];
        $input['damaged_input'] = $todays_input['damaged'];
        $output = $this->getSaleByDate($today);
        $input['regular_output'] = $output[0];
        $input['damaged_output'] = $output[1];
        $input['destroyed'] = $output[2];
        $input['amount'] = $output[3];
        $input['expenses'] = $this->getTodaysTotalExpenses();
        return $input;
    }

    public function getInputByDate($date) {
        $query = DB::table('input_transactions')
                        ->where('created_at','like',$date)
                        ->where('store_id', $this->id);
        $eggs['regular'] = $query->sum('regular');
        $eggs['damaged'] = $query->sum('damaged') + $query->sum('transport_damage');
        return $eggs;  
    }

    public function getInputStockByDate($date) {
        $query = DB::table('input_transactions')
                        ->where('created_at','like',$date)
                        ->where('store_id', $this->id);
        $eggs['regular'] = $query->sum('regular');
        $eggs['damaged'] = $query->sum('damaged');
        $eggs['transport_damage'] = $query->sum('transport_damage');
        return $eggs;  
    }

}
