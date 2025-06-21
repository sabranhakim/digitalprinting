<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('table_orders')->insert([
            [
                'id_customer' => 1,
                'order_date' => now(),
                'status_pengiriman' => 'sedang_diproses',
                'status_pembayaran' => 'sudah_bayar',
                'payment_date' => now(),
                'total_amount' => 7650000,
            ],
        ]);

    }
}
