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
        Schema::create('pesertas', function (Blueprint $table) {
            $table->id();
            //order_id, title, name, phone, email, birth, type enum(Bayi, Anak, Dewasa)
            $table->bigInteger('order_id')->unsigned()->nullable();
            $table->foreign('order_id')->references('id')->on('orders');
            $table->string('title');
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->date('birth');
            $table->enum('type', ['Bayi', 'Anak', 'Dewasa']);
            $table->string('passport');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesertas');
    }
};
