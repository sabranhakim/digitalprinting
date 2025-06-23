<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ],
        [
            'name' => 'customer1',
            'email' => 'customer1@example.com',
            'password' => bcrypt('password'),
            'role' => 'user',
        ],
    );

        // $this->call([
        //     ProductSeeder::class,
        //     OrderSeeder::class,
        //     OrderItemSeeder::class,
        //     PaymentSeeder::class,
        //     ReviewSeeder::class,
        // ]);
    }
}
