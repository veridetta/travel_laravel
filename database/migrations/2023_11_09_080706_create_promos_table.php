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
        Schema::create('promos', function (Blueprint $table) {
            $table->id();
            //travel_id, isAll, code, isPercent, discount, start, end
            $table->bigInteger('travel_id')->unsigned()->nullable();
            $table->foreign('travel_id')->references('id')->on('travel');
            $table->boolean('isAll');
            $table->string('code');
            $table->boolean('isPercent');
            $table->integer('discount');
            $table->date('start');
            $table->date('end');
            $table->integer('max');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promos');
    }
};
