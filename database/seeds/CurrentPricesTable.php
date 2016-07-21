<?php

use Illuminate\Database\Seeder;

class CurrentPricesTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('current_prices')->insert([
            'regular_eggs' => 5,
            'damaged_eggs' => 4, 
            'created_at' => '2015-07-07',
        ]);
    }
}
