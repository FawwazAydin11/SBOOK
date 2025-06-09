<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'username' => 'admin8', // pastikan unik
            'email' => 'admin@example.com',
            'password' => Hash::make('adminpassword123'), // ganti password yang kuat
            'role' => 'pemilik',
        ]);
    }
}
