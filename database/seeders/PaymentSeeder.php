<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('table_payments')->insert([
            'id_order' => 1,
            'jenis_pembayaran' => 'transfer_bank',
            'status_pembayaran' => 'diterima',
            'bukti_pembayaran' => 'bukti_transfer.jpg',
            'tanggal_pembayaran' => now(),
            'amount' => 7650000,
        ]);

    }
}
