<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(WalletsTableSeeder::class);
        $this->call(TransactionsTableSeeder::class);
    }
}
