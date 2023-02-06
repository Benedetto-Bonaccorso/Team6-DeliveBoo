<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dish_order', function (Blueprint $table) {
            $table->unsignedBigInteger('id_dish');
            $table->foreign('id_dish')->references('id')->on('dishes')->cascadeOnDelete();

            $table->unsignedBigInteger('id_order');
            $table->foreign('id_order')->references('id')->on('orders')->cascadeOnDelete();

            $table->integer("quantity");

            $table->primary(['id_dish','id_order']);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dish_order');
    }
};