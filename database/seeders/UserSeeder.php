<?php

namespace Database\Seeders;

use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@example.com',
            'role' => 'admin',
            'password' => bcrypt('admin'),
        ]);

        User::create([
            'name' => 'user1',
            'username' => 'user1',
            'email' => 'user@example.com',
            'role' => 'user',
            'password' => bcrypt('user'),
        ]);
    }
}
