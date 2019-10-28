<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSellProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sell_products', function (Blueprint $table) {
             $table->increments('id');
             $table->string('sell_id');
             $table->string('cust_name');
             $table->string('calan_name')->nullable();
             $table->string('calan_id')->nullable();

             $table->string('category_name');
             $table->string('pid');
             $table->string('qty');
             $table->string('price');
             $table->string('total')->nullable();



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
        Schema::dropIfExists('sell_products');
    }
}
