<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoardFieldTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('board_field', function (Blueprint $table) {
            $table->unsignedBigInteger('board_id');
            $table->unsignedBigInteger('field_id');
            $table->unsignedBigInteger('board_slot');

            $table->foreign('board_id')->references('id')->on('boards');
            $table->foreign('field_id')->references('id')->on('fields');

            $table->index(['board_id','field_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('board_field');
    }
}
