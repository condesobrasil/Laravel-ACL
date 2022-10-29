<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Role;
use Illuminate\Database\Seeder;
use App\Models\User;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name'=>'student']);
        Role::create(['name'=>'teacher']);
        Role::create(['name'=>'admin']);

        User::create([
            'name' => 'admin',
            'email' => 'condesobrasil@outlook.com',
            'password' => bcrypt('123456'),
            'role_id' => 3
        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
