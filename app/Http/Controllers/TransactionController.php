<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Carbon\Carbon;
use DB;

/*
 * Author: Le Cong Thang
 */
class TransactionController extends Controller
{
 	function createTransaction(Request $request) {
 		if(!$request->isMethod('post')) {
			$arr = array('message' => 'Invalid method');
			return $arr;
		}

		$wallet = DB::table('wallets')
 				->where('email', 'john@wallet.io')
 				->first();

		if($request->input('type') === 'credit') {			// Adding
			$remainder = $wallet->balance + $request->input('amount');
		} else if ($request->input('type') === 'debit') {	// Deducting
			$remainder = $wallet->balance - $request->input('amount');
		} else {
			$arr = array('message' => 'Invalid type of credits');
			return $arr;
		}

		DB::table('transactions')->insert([
 			'wallet_id' => $wallet->id,
 			'type' =>$request->input('type'),
 			'amount' => $request->input('amount'),
 			'remarks' =>  $request->input('remarks'),
 			'created_at' => Carbon::now()->toDateTimeString(),
			'updated_at' => Carbon::now()->toDateTimeString(),
 		]);

 		DB::table('wallets')
 			->where('email', 'john@wallet.io')
 			->update(['balance' => $remainder]);

 		$arr = array('balance' => $remainder,
 			'message' => 'Successfully created a transaction and updated the balance');

		return $arr;
 	}
}
