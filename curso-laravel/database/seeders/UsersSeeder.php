<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'firstName' => 'Edson',
            'lastName' => 'Junior',
            'email' => 'edson.junior@mobs2.com',
            'password' => bcrypt('12345678'),
        ]);
    }
}
