<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePricingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pricings', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('buy')->nullable();
            $table->unsignedInteger('mortgage')->nullable();
            $table->unsignedInteger('stop_single')->nullable();
            $table->unsignedInteger('stop_1_cottage')->nullable();
            $table->unsignedInteger('stop_2_cottage')->nullable();
            $table->unsignedInteger('stop_3_cottage')->nullable();
            $table->unsignedInteger('stop_4_cottage')->nullable();
            $table->unsignedInteger('stop_hotel')->nullable();
            $table->unsignedInteger('stop_1_of_kind')->nullable();
            $table->unsignedInteger('stop_2_of_kind')->nullable();
            $table->unsignedInteger('stop_3_of_kind')->nullable();
            $table->unsignedInteger('stop_4_of_kind')->nullable();
            $table->unsignedInteger('buy_cottage')->default(0)->nullable();
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
        Schema::dropIfExists('pricings');
    }
}
