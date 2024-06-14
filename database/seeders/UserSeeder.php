<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'username' => 'Admin',
            'fullname' => 'Admin',
            'role' => 'ADMIN',
            'gender' => 'MALE',
            'email' => 'admin@booklap.com',
        ]);
        User::factory()->create([
            'username' => 'user',
            'fullname' => 'user',
            'role' => 'USER',
            'gender' => 'MALE',
            'email' => 'user@booklap.com',
        ]);
    }
}
