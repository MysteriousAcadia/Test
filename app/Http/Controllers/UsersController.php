<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InputTransaction;
use App\OutputTransaction;
use App\Http\Requests;
use App\Store;
use App\Stock;
use App\Finance;
use App\ClosingStock;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\RegularEggsRequest;
use App\Http\Requests\RegularEggsSaleRequest;
use App\Http\Requests\DamagedEggsSsaleRequest;
use App\Http\Requests\ExprenseFromRequest;


class UsersController extends Controller
{
    public function createStockInput(RegularEggsRequest $request)
    {
        $input_transaction = New InputTransaction;
        $stock = New Stock;
        $input = Input::except('_token');
		$create = $input_transaction->create($input);
		if($create) {
			$stock->addToLiveStock($input);
		}
		Session::flash('message', 'Input Order Added Successfully!');

	    return back();
    }

     public function sellRegularEggs(RegularEggsSaleRequest $request)
    {
        $input['type'] = 'regular';
        $stock = New Stock;
        $output_transaction = New OutputTransaction;
        $input['vehicle_no'] = Input::get('vehicle_no_in_regular');
        $input['regular'] = Input::get('regular_in_regular');
        $input['damaged'] = Input::get('damaged_in_regular');
        $input['destroyed'] = Input::get('destroyed_in_regular');
        $input['buyer'] = Input::get('buyer_in_regular');
        $input['user_id'] = Input::get('user_id');
        $input['store_id'] = Input::get('store_id');
        $input['rate'] = Input::get('rate');
        $input['amount'] = Input::get('amount');
       	$create = $output_transaction->create($input);
        if($create) {
            $stock->deductFromLiveStock($input);
        }
        Session::flash('message', 'Order Added Successfully!');
        return back();
    }

        public function sellDamagedEggs(DamagedEggsSsaleRequest $request)
        {
        $input['type'] = 'damaged';
        $stock = New Stock;
        $output_transaction = New OutputTransaction;
        $input['vehicle_no'] = Input::get('vehicle_no_in_damaged');
        $input['regular'] = 0;
        $input['damaged'] = Input::get('damaged_in_damaged');
        $input['destroyed'] = 0;
        $input['buyer'] = Input::get('buyer_in_damaged');
        $input['user_id'] = Input::get('user_id');
        $input['store_id'] = Input::get('store_id');
        $input['rate'] = Input::get('rate_in_dmaged');
        $input['amount'] = Input::get('amount');
        $create = $output_transaction->create($input);
        if($create) {
            $stock->deductFromLiveStock($input);
        }
        Session::flash('message', 'Order Added Successfully!');
        return back();
        }

        public function createExpense(ExprenseFromRequest $request) {
            $input['user_id'] = $request['user_id'];
            $input['store_id'] = $request['store_id'];
            $input['amount'] = $request['expense_amount'];
            $input['reference'] = $request['details'];
            $finanaces = new Finance;
            $create = $finanaces->create($input);
            if($create) {
                Session::flash('message', 'Expense Added Successfully!');
            }
            return back();
        }

        public function closeShop() {
            $store = Store::where('id', Input::get('store_id'))->first();
            $todays_closing_stock = $store->getTodaysClosingStock(); 
            $todays_closing_stock['store_id'] = $store->id;
            $todays_closing_stock['user_id'] = Auth::user()->id;
            $todays_closing_stock['stock_matched'] = Input::get('stock_matched');
            $closing_stock = new ClosingStock;
            $create = $closing_stock->create($todays_closing_stock);
            if($create) {
                Session::flash('message', 'Shop Closed Successfully!');
            }
            return back();        
        }
}
