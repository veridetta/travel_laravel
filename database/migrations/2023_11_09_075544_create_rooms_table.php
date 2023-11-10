<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            //travel_id, dewasa, anak, bayi
            $table->bigInteger('travel_id')->unsigned()->nullable();
            $table->foreign('travel_id')->references('id')->on('travel');
            $table->bigInteger('price_id')->unsigned()->nullable();
            $table->foreign('price_id')->references('id')->on('prices');
            $table->integer('dewasa')->nullable();
            $table->integer('anak')->nullable();
            $table->integer('bayi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
