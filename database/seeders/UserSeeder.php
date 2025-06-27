<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\UserModel;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        UserModel::insert([
            [
                'name' => 'Admin Satu',
                'email' => 'admin@example.com',
                'password' => Hash::make('admin123'),
                'role_id' => 1,
            ],
            [
                'name' => 'User Satu',
                'email' => 'user@example.com',
                'password' => Hash::make('user1234'),
                'role_id' => 2,
            ],
        ]);
    }
}
