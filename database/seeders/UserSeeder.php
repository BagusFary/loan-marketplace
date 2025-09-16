<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
     {
        $users = [
            [
                'id' => 1,
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'password' => Hash::make('12345678'),
            ],
            [
                'id' => 5,
                'name' => 'Mark Cox',
                'email' => 'mark@gmail.com',
                'role' => 'lender',
                'password' => Hash::make('12345678'),
            ],
            [
                'id' => 6,
                'name' => 'Admin 2',
                'email' => 'admin2@gmail.com',
                'role' => 'admin',
                'password' => Hash::make('12345678'),
            ],
            [
                'id' => 7,
                'name' => 'Gillian Moreno',
                'email' => 'moreno@gmail.com',
                'role' => 'lender',
                'password' => Hash::make('12345678'),
            ],
            [
                'id' => 8,
                'name' => 'Nelle Thomas',
                'email' => 'thomas@gmail.com',
                'role' => 'borrower',
                'password' => Hash::make('12345678'),
            ],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(['id' => $user['id']], $user);
        }
    }
}
