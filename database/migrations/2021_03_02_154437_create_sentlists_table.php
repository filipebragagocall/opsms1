<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSentlistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sentlists', function (Blueprint $table) {
            $table->id();
            $table->string('Body');
            $table->string('To');
            $table->integer("Port");
            $table->enum("State", ["Sending", "Success", "Error"]);
            $table->foreignId("request_id")->references("id")->on("requests");
            $table->foreignId('list_id')->references('id')->on('listas');
            $table->foreignId('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('sentlists');
    }
}
