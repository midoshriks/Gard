<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // use account fixed data
        $admin = User::create([
            "name" => 'mido shriks',
            "email" => 'midoshriks36@gmail.com',
            "password" => bcrypt('12345678'),
        ]);
    }
}
