<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileWithdrawsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_withdraws', function (Blueprint $table) {
            $table->increments('id');
            $table->string('buyer_id');
            $table->string('w_amount');
            $table->string('date');
            $table->string('month');
            $table->string('year');


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
        Schema::dropIfExists('profile_withdraws');
    }
}
