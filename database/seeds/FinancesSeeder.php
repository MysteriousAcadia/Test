<?php

use Illuminate\Database\Seeder;

class FinancesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       	DB::table('finances')->insert([
        	'user_id' => 1,
            'store_id' => 1,
            'type' => 0,
            'amount' => 1600,
            'reference' => 'Ankush',
            'additional_comments' => 'There is nothing I want to say'
        ]);
        DB::table('finances')->insert([
        	'user_id' => 1,
            'store_id' => 1,
            'type' => 0,
            'amount' => 16020,
            'reference' => 'dadadada',
            'additional_comments' => 'There is nothing I sfafadsfsadfdsf to say'
        ]);
    }
}
