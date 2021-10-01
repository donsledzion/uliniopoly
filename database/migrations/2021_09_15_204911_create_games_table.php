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

            $table->string('name')->default(__('uliniopoly.games.default_name'));

            $table->unsignedBigInteger('board_id');
            $table->foreign('board_id')->references('id')->on('boards');

            $table->unsignedSmallInteger('start_balance')->default(1500);

            $table->unsignedSmallInteger('start_bonus')->default(200);

            $table->unsignedSmallInteger('current_player')->default(1);

            $table->unsignedSmallInteger('doubles_in_row')->default(0);

            $table->longText('round_log')->nullable();

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
