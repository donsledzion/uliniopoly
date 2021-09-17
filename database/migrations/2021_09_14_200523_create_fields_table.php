<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fields', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('description')->nullable();
            $table->unsignedBigInteger('field_type_id');
            $table->foreign('field_type_id')->references('id')->on('field_types');
            $table->unsignedBigInteger('pricing_id')->nullable();
            $table->foreign('pricing_id')->references('id')->on('pricings');
            $table->unsignedBigInteger('group')->nullable();
            $table->boolean('sold')->default(false);
            $table->boolean('mortgage')->default(false);
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
        Schema::dropIfExists('fields');
    }
}
