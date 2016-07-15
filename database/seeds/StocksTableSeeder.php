<?php

use Illuminate\Database\Seeder;

class StocksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stocks')->insert([
            'store_id' => 1,
            'item' => 1,
            'stage' => 1, 
            'quantity' => 30,
        ]);
        DB::table('stocks')->insert([
            'store_id' => 1,
            'item' => 1,
            'stage' => 2, 
            'quantity' => 10,
        ]);  
        DB::table('stocks')->insert([
            'store_id' => 1,
            'item' => 1,
            'stage' => 3, 
            'quantity' => 4,
        ]);  
        DB::table('stocks')->insert([
            'store_id' => 1,
            'item' => 1,
            'stage' => 4, 
            'quantity' => 2,
        ]);       
    }
}
