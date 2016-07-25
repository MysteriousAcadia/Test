<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClosingStockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('closing_stocks', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('store_id');
            $table->integer('stock_regular');
            $table->integer('stock_damaged');
            $table->integer('stock_transport_damage');
            $table->integer('regular_input');
            $table->integer('damaged_input');
            $table->integer('regular_output');
            $table->integer('damaged_output');
            $table->integer('destroyed');
            $table->integer('amount');
            $table->integer('expenses');
            $table->integer('user_id');
            $table->boolean('stock_matched')
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ClosingStocks');
    }
}
