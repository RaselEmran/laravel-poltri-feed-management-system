<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalanEndsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calan_ends', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('buyer_id');
            $table->integer('calan_id');
            $table->string('khoroc');
            $table->string('porishod');
            $table->string('jer');
            $table->string('status');

            $table->string('date');
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
        Schema::dropIfExists('calan_ends');
    }
}
