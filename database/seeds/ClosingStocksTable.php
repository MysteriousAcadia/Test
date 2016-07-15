<?php

use Illuminate\Database\Seeder;

class ClosingStocksTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('closing_stocks')->insert([
            'store_id' => 1,
            'stage' => 1, 
            'quantity' => 30,
            'date' => '2016-07-07',
            'value' => 1500,
        ]);
        DB::table('closing_stocks')->insert([
            'store_id' => 1,
            'stage' => 3, 
            'quantity' => 10,
            'date' => '2016-07-07',
            'value' => 150,
        ]);
    }
}
