<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoardSlotFieldTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('board_slot_field', function (Blueprint $table) {
            $table->unsignedBigInteger('board_id');
            $table->unsignedBigInteger('board_slot_id');
            $table->unsignedBigInteger('field_id')->default(1);

            $table->foreign('board_id')->references('id')->on('boards');
            $table->foreign('board_slot_id')->references('id')->on('board_slots');
            $table->foreign('field_id')->references('id')->on('fields');

            $table->index(['board_id','board_slot_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('board_slot_field');
    }
}
