<?php

use Illuminate\Database\Seeder;

class OutputTransactionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('output_transactions')->insert([
        	'user_id' => 1,
            'store_id' => 1,
            'vehicle_no' => 'Ka 01 123',
            'regular_eggs' => 32, 
            'damaged_eggs' => 23,
            'transport_damage' => 4,
        ]);
        DB::table('input_transactions')->insert([
        	'user_id' => 1,
            'store_id' => 1,
            'vehicle_no' => 'Ka 01 123',
            'regular_eggs' => 22, 
            'damaged_eggs' => 22,
            'transport_damage' => 22,
        ]);
    }
}
