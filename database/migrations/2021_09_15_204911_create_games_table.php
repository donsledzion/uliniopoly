<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('board_id')->nullable();
            $table->foreign('board_id')->references('id')->on('boards');

            $table->unsignedBigInteger('player_1')->nullable();
            $table->foreign('player_1')->references('id')->on('players');

            $table->unsignedBigInteger('player_2')->nullable();
            $table->foreign('player_2')->references('id')->on('players');

            $table->unsignedBigInteger('player_3')->nullable();
            $table->foreign('player_3')->references('id')->on('players');

            $table->unsignedBigInteger('player_4')->nullable();
            $table->foreign('player_4')->references('id')->on('players');
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
        Schema::dropIfExists('games');
    }
}
