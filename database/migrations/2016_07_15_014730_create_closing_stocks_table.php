<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClosingStocksTable extends Migration
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
            $table->date('date');
            $table->integer('store_id');
            $table->integer('stage');
            $table->integer('quantity');
            $table->integer('value');
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
