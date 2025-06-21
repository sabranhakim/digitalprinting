<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('table_order_items')->insert([
            [
                'id_order' => 1,
                'id_product' => 1, // Laptop
                'quantity' => 1,
                'subtotal' => 7500000,
            ],
            [
                'id_order' => 1,
                'id_product' => 2, // Mouse
                'quantity' => 1,
                'subtotal' => 150000,
            ],
        ]);

    }
}
