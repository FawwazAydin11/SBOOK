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
    public function run()
    {
        User::create([
            'name' => 'Admin Lapangan',
            'email' => 'admin@sbook.com',
            'password' => Hash::make('admin123'), // password bisa diganti
            'role' => 'pemilik',
        ]);
    }
}
