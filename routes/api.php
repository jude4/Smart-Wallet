<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('account', 'AccountController@index');

Route::post('wallet', 'WalletController@index');

Route::post('verify', 'AccountController@verifyAccountNumber');

Route::post('check_balance', 'WalletController@checkAccountBalance');

Route::post('transaction', 'TransactionController@index');

Route::post('proceed', 'WalletController@proceed');

Route::post('user', 'UsersController@index');

Route::post('user/update', 'UsersController@update');

Route::post('update/pic', 'UsersController@updateProfile');
