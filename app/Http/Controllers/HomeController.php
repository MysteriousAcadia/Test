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
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;


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
        $title = 'Healthy Eggs - Home';
        $user = Auth::user();
        $display_date = Carbon::now()->format('d-m-Y');
        $store = Store::find($user->store_id);
        $prices = CurrentPrice::orderBy('created_at', 'desc')->first();
        $date = Carbon::now()->format('Y-m-d').'%';
        $closing = ClosingStock::getOpeningStock(Carbon::now()->format('Y-m-d'), $user->store->id);
        $input_transactions = $store->getTodaysInputTransactions();
        $output_transactions_regular = $store->getTodaysRegularOutputTransactions();
        $output_transactions_damaged = $store->getTodaysDamagedOutputTransactions();
        $expenses = $store->getTodaysExpenses();
        $days_sale = $store->getSaleByDate($date);
        $live_stock = Stock::getLiveStock($user->store->id);
        return view('home', compact('user', 'prices', 'date', 'closing', 'live_stock', 'input_transactions', 'output_transactions_regular', 'output_transactions_damaged', 'days_sale', 'title', 'display_date', 'expenses'));
    }

    public function adminIndex() {
        $today = Carbon::now()->format('Y-m-d');
        $yesterday = date('Y-m-d',strtotime("-1 days")) .'%';
        $store = new Store;
        $sale = $store->getSaleByDate($yesterday);
        $stores = Store::all();
        $prices = CurrentPrice::orderBy('created_at', 'desc')->first();
        return view('admin', compact('prices', 'stores', 'sale', 'yesterday', 'today'));
    }

    public function setRate() {
        $input = Input::except('_token');
        $input['damaged_eggs'] = $input['regular_eggs'];
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
        Store::create(Input::except('_token'));
        return back();
    }
    public function newUser() {
        $input = Input::except('_token');
        $hashed = Hash::make($input['password']);
        $input['password'] = $hashed;
        $input['store_id'] = 1;
        User::create($input);
        return back();
    }

}
