<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@hipmi.com',
            'password' => \Hash::make('superadmin123'),
            'role' => 'super_admin',
        ]);

        \App\Models\User::create([
            'name' => 'Regular Admin',
            'email' => 'admin@hipmi.com', 
            'password' => \Hash::make('admin123'),
            'role' => 'admin',
        ]);
    }
}
