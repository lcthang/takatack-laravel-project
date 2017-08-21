<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transactions')->insert([
        	[
                'id' => 1,
				'amount' => 30,
                'type' =>'credit',
                'remarks' => null,
            	'wallet_id' => 1,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'id' => 2,
            	'amount' => 31.12,
                'type' =>'credit',
                'remarks' => 'test remarks',
            	'wallet_id' => 1,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'id' => 3,
            	'amount' => 32.1,
                'type' =>'credit',
                'remarks' => null,
            	'wallet_id' => 1,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'id' => 4,
                'amount' => 125.10,
                'type' =>'debit',
                'remarks' => 'This is debit',
                'wallet_id' => 1,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]
        ]);
    }
}
