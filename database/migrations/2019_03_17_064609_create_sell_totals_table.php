<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSellTotalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sell_totals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cust_name')->nullable();  
            $table->string('customer')->nullable();  

            $table->string('type');
            $table->string('calan_name')->nullable();
            $table->string('calan_id')->nullable();

            $table->string('sub_total');
            $table->string('input_dis')->nullable();
            $table->string('output_dis')->nullable();
            $table->string('less')->nullable();
            $table->string('grand_total')->nullable();
            $table->string('paid')->nullable();
            $table->string('due')->nullable();
            $table->string('status')->nullable();

            $table->string('date');
            $table->string('month');
            $table->string('year');
            $table->string('sell_time');
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
        Schema::dropIfExists('sell_totals');
    }
}
