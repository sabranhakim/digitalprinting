<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('table_products')->insert([
            [
                'name' => 'Laptop Acer',
                'image' => 'laptop.jpg',
                'description' => 'Laptop untuk kebutuhan kantor',
                'price' => 7500000,
                'stock' => 10,
            ],
            [
                'name' => 'Mouse Wireless',
                'image' => 'mouse.jpg',
                'description' => 'Mouse tanpa kabel',
                'price' => 150000,
                'stock' => 50,
            ],
        ]);

    }
}
