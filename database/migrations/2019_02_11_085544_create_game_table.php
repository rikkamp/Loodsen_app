<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game', function (Blueprint $table) {
            $table->increments('id');
            $table->string('gameTitle')->nullable();
            $table->text('gameReq')->nullable();
            $table->text('gameRules')->nullable();
            $table->text('gameDesc')->nullable();
            $table->tinyInteger('gamePlayers')->nullable();
            $table->text('gameNotes')->nullable();
            $table->text('gameTut')->nullable();
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
        Schema::dropIfExists('game');
    }
}
