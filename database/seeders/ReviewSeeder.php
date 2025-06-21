<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('table_reviews')->insert([
            [
                'id_customer' => 1,
                'id_product' => 1,
                'rating' => 5,
                'comment' => 'Laptop bagus dan cepat!',
                'review_date' => now(),
            ],
            [
                'id_customer' => 2,
                'id_product' => 2,
                'rating' => 4,
                'comment' => 'Mouse enak dipakai tapi agak ringan',
                'review_date' => now(),
            ],
        ]);

    }
}
