<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOutputTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('output_transactions', function(Blueprint $table){
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('store_id');
            $table->string('vehicle_no');
            $table->string('buyer');
            $table->string('type');
            $table->integer('regular');
            $table->integer('damaged');
            $table->integer('transport_damage');
            $table->integer('destroyed');
            $table->integer('rate');
            $table->integer('amount');
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
        Schema::drop('output_transactions');
    }
}
