<?php

use App\Enums\GameSeat;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedBigInteger('game_id');
            $table->foreign('game_id')->references('id')->on('games');

            $table->enum('seat',GameSeat::SEATS)->nullable();

            $table->unsignedInteger('balance')->default(0);
            $table->unsignedInteger('field_no')->default(0);
            $table->unsignedSmallInteger('penalty')->default(0);
            $table->unsignedSmallInteger('moves_left')->default(0);

            $table->timestamps();

            $table->index(['game_id','seat']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('players');
    }
}
