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
        Schema::table('plans', function (Blueprint $table) {
          $table->bigInteger('travel_id')->unsigned()->nullable();
          $table->foreign('travel_id')->references('id')->on('travel');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('plans', function (Blueprint $table) {
          $table->dropForeign(['travel_id']);
          $table->dropColumn('travel_id');
        });
    }
};
