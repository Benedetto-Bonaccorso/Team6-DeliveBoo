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
        Schema::create('restaurant_tipology', function (Blueprint $table) {
            $table->unsignedBigInteger('id_restaurant');
            $table->foreign('id_restaurant')->references('id')->on('restaurants')->cascadeOnDelete();

            $table->unsignedBigInteger('id_tipology');
            $table->foreign('id_tipology')->references('id')->on('tipologies')->cascadeOnDelete();

            $table->primary(['id_restaurant','id_tipology']);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restaurant_tipology');
    }
};