<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSendedsmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sendedsms', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('Body');
            $table->string('To');
            $table->foreignId('phone_id')->references('id')->on('ournumbers');
            $table->foreignId('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sendedsms');
    }
}
