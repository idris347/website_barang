<?php

namespace Database\Seeders;
use App\Models\User as ModelsUser;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class userSeeder extends Seeder
{ public function run()
    {
        $users = [
            [
                'name' => 'SuperAdmin',
                'username' => 'Muhammad Idris',
                'email' => 'superadmin@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 1
            ],
            [
                'name' => 'AdminGudang',
                'username' => 'Fifi syafira',
                'email' => 'adnan@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 2
            ],
            [
                'name' => 'KepalaGudang',
                'username' => 'nuh ansori',
                'email' => 'noah@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 3
            ]
        ];

        foreach ($users as $userData) {
            $user = new ModelsUser();
            $user->name = $userData['name'];
            $user->username = $userData['username'];
            $user->email = $userData['email'];
            $user->password = $userData['password'];
            $user->role = $userData['role'];
            $user->save();
        }
    }
}
