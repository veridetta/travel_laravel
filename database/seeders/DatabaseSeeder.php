<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

         $user = User::factory()->create([
             'name' => 'SuperAdmin',
             'email' => 'superadmin@gmail.com',
             'kode' => substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(6/strlen($x)) )),1,6),

         ]);
        $role = Role::create(['name' => 'SuperAdmin', 'team_id',1]);
        $user->assignRole($role);
    }
}
