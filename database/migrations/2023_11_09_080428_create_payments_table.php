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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            //order_id, user_id, bank, total_price, status, type enum('dp', 'full'), direct true false, merchant_id
            $table->bigInteger('order_id')->unsigned()->nullable();
            $table->foreign('order_id')->references('id')->on('orders');
            $table->integer('user_id');
            $table->string('bank')->nullable();
            $table->integer('total_price');
            $table->string('status');
            $table->enum('type', ['dp', 'full']);
            $table->string('bukti')->nullable();
            $table->boolean('direct');
            $table->integer('merchant_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
