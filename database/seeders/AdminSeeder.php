<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'liwerisegin@gmail.com',
            'password' => Hash::make('abc12345'),
            'role' => 'admin', // Pastikan ada kolom "role" di tabel users
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
