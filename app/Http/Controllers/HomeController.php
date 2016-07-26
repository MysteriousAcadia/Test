<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;
use App\CurrentPrice;
use App\ClosingStock;
use App\Stock;
use App\Store;
use App\User;
use App\InputTransaction;
use App\OutputTransaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['web', 'auth']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $yesterday = date('Y-m-d',strtotime("-1 days")) .'%';
        $title = 'Healthy Eggs - Home';
        $user = Auth::user();
        $display_date = Carbon::now()->format('d-m-Y');
        $store = Store::find($user->store_id);
        $prices = CurrentPrice::orderBy('created_at', 'desc')->first();
        $date = Carbon::now()->format('Y-m-d').'%';
        $opening = ClosingStock::where('created_at', 'like', $yesterday)
                                ->where('store_id', $store->id)
                                ->orderBy('created_at', 'desc')
                                ->first();
        $closing = ClosingStock::where('created_at', 'like', $date)
                                ->where('store_id', $store->id)
                                ->orderBy('created_at', 'desc')
                                ->first();
        $input_transactions = $store->getTodaysInputTransactions();
        $output_transactions_regular = $store->getTodaysRegularOutputTransactions();
        $output_transactions_damaged = $store->getTodaysDamagedOutputTransactions();
        $expenses = $store->getTodaysExpenses();
        $days_input = $store->getInputStockByDate($date);
        $days_sale = $store->getSaleByDate($date);
        $live_stock = Stock::getLiveStock($user->store->id);
        return view('home', compact('user', 'prices', 'date', 'closing', 'live_stock', 'input_transactions', 'output_transactions_regular', 'output_transactions_damaged', 'days_sale', 'title', 'display_date', 'expenses', 'opening', 'days_input'));
    }

    public function adminIndex() {
        $today = Carbon::now()->format('Y-m-d').'%';
        $yesterday = date('Y-m-d',strtotime("-1 days")) .'%';
        $stores = Store::all();
        $days_input = InputTransaction::getAllInput($today);
        $days_output = OutputTransaction::getAllOutput($today);
        $prices = CurrentPrice::orderBy('created_at', 'desc')->first();
        $prices_today = CurrentPrice::where('created_at', 'like', $today)->first();
        $closing = ClosingStock::where('created_at', 'like', $today)
                                ->orderBy('created_at', 'desc')->get();
        $closing_yesterday = ClosingStock::where('created_at', 'like', $yesterday)
                                ->orderBy('created_at', 'desc')->get();
        return view('admin', compact('prices', 'stores', 'sale', 'yesterday', 'today', 'prices_today', 'closing', 'closing_yesterday', 'days_input', 'days_output'));
    }

    public function setRate() {
        $input = Input::except('_token');
        $input['damaged'] = $input['regular'];
        CurrentPrice::create($input);
        return back();
    }

    public function statistics() {
        return view('statistics');
    }

    public function shops() {
        $shops = Store::all();
        return view('shops', compact('shops'));
    }

    public function searchUsers()
    {
        $name = Input::get('q');
        $users = User::where('name', 'LIKE', '%' . $name .'%')->get();
        $data = array();
        foreach ($users as $user) {
            $data[] = array('id' => $user->id, 'text' => $user->name);
        }
        return json_encode($data);    }

    public function users() {
        $users = User::all();
       return view('user', compact('users'));
    }

    public function newStore() {
        $user = User::where('id', Input::get('user_id'))->first();
        if($user->store_id != 0) {
            Session::flash('message', 'Shopkeeper already operating in another shop. Failed to create shop.');
            return back();
        }
        $store = Store::create(Input::except('_token'));
        $user->store_id = $store->id;
        $user->update();
        Session::flash('message', 'Shop created successfully! ' .$user->name . ' is the Shopkeeper');
        return back();
    }
    public function newUser() {
        $input = Input::except('_token');
        $hashed = Hash::make($input['password']);
        $input['password'] = $hashed;
        $input['store_id'] = 0;
        User::create($input);
        return back();
    }

}
