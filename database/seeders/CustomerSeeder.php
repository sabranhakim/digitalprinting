<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('table_customers')->insert([
            [
                'username' => 'user1',
                'password' => Hash::make('password1'),
                'name' => 'Andi',
                'email' => 'andi@example.com',
                'phone' => '08123456789',
            ],
            [
                'username' => 'user2',
                'password' => Hash::make('password2'),
                'name' => 'Budi',
                'email' => 'budi@example.com',
                'phone' => '08234567890',
            ],
        ]);

    }
}
