<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class WalletsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('wallets')->insert([
            'id' => 1,
            'email' => 'john@wallet.io',
            'balance' => 98765.45,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
    }
}
