<?php

namespace Database\Seeders;

use App\Models\MetodePembayaran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class metode_pembayarans_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MetodePembayaran::insert([
            [
                'name' => 'Direct Transfer',
                'slug' => '1'
            ],
            [
                'name' => 'Virtual Account',
                'slug' => '0'
            ],
        ]);
    }
}
