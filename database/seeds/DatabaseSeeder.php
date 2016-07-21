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
        // $this->call('UsersTableSeeder');
        // $this->call('StoresTableSeeder');
        // $this->call('StocksTableSeeder');
        // $this->call('ClosingStocksTable');
        // $this->call('InputTransactionsSeeder');
        // $this->call('OutputTransactionsSeeder');
        // $this->call('FinancesSeeder');
        $this->call('CurrentPricesTable');
    }
}
