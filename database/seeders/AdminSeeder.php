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
        DB::table('table_admins')->insert([
            'name' => 'Admin Utama',
            'username' => 'admin',
            'password' => Hash::make('admin123'),
        ]);
    }
}
