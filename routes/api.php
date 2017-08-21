<?php

use Illuminate\Http\Request;

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
/*
 * Author: Le Cong Thang
 */

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// A wallet details & 3 the most recent transactions
Route::get('wallet', 'WalletController@getWallet');

// Add a transaction
Route::post('wallet/transaction', 'TransactionController@createTransaction');

/******************* ADMIN *******************/
Route::middleware('admin')->group(function() {
	// Create a new wallet
	Route::post('admin/wallet', 'WalletController@createWallet');

	// Delete a wallet
	Route::delete('admin/wallet/{email}', 'WalletController@deleteWallet');

	// A wallet details & 3 the most recent transactions 
	Route::get('admin/wallet/{email}', 'WalletController@getAdminWallet');
});
