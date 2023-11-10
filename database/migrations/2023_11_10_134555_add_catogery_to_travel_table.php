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
        Schema::table('travel', function (Blueprint $table) {
            //category after title enum (Reguler, Plus Wisata, Haji Furoda, Badal Haji, Ramadhan, Haji Plus, Haji Mandiri, Haji Expatriat)
            $table->enum('category', ['Reguler', 'Plus Wisata', 'Haji Furoda', 'Badal Haji', 'Ramadhan', 'Haji Plus', 'Haji Mandiri', 'Haji Expatriat'])->after('title');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('travel', function (Blueprint $table) {
            $table->dropColumn('category');
        });
    }
};
