<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Wallet;
use App\Transaction;

use Carbon\Carbon;
use DB;

/*
 * Author: Le Cong Thang
 */

class WalletController extends Controller
{
	function deleteWallet($email) {
		$wallet = Wallet::where('email', $email)->first();

    	if(!$wallet) {
            $arr = array('message' => 'Email not found. Unable to delete');
    	} else {
    		$wallet->delete();
            $arr = array('message' => 'Successfully deleted a wallet and its transaction');
    	}

        return $arr;
	}

	function createWallet(Request $request) {
		if(!$request->isMethod('post')) {
			$arr = array('message' => 'Invalid method');
            return $arr;
		}

        try {
            DB::table('wallets')->insert([
                'email' => $request->input('email'),
                'balance' => 0,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);

            $arr = array('message' => 'Successfully created a new wallet');
        } catch(\Illuminate\Database\QueryException $ex){ 
            $arr = array('error' => $ex->getMessage());
        }

		return $arr;
	}

    function getWallet() {
    	return $this->getWalletAndTransactions('john@wallet.io');
    }

    function getAdminWallet($email) {
    	return $this->getWalletAndTransactions($email);
    }

    function getWalletAndTransactions($email) {
    	$wallet = DB::table('wallets')
    		->where('email', $email)
    		->first();

    	if(!$wallet) {
	    	$arr = array('message' => 'Email not found');
    	} else {
    		$transactions = DB::table('transactions')
	    		->where('wallet_id', $wallet->id)
                ->orderBy('updated_at', 'desc')
                ->take(3)
	    		->get();

    		$arr = array('wallet' => $wallet, 
    			'transactions' => $transactions, 
    			'message' => 'Successfully retrieved a wallet and its transactions');
    	}

    	return $arr;
    }
}
