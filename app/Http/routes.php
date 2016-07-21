<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web', 'auth']], function () {
    Route::get('/', 'HomeController@index');
    Route::post('/stock/create', 'HomeController@createStockInput');
    Route::post('/sell/regular', 'HomeController@sellRegularEggs');
    Route::post('/sell/damaged', 'HomeController@sellDamagedEggs');
    Route::get('/admin', 'HomeController@adminIndex');
    Route::post('/rate/update', 'HomeController@setRate');
    Route::get('/statistics', 'HomeController@statistics');
    Route::get('/shops', 'HomeController@shops');
    Route::get('search/users', 'HomeController@searchUsers');
    Route::get('users', 'HomeController@users');
    Route::post('store/new', 'HomeController@newStore');
    Route::post('user/new', 'HomeController@newUser');
});

Route::auth();

