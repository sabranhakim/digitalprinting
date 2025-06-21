<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('table_reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_customer')->constrained('table_customers')->onDelete('cascade');
            $table->foreignId('id_product')->constrained('table_products')->onDelete('cascade');
            $table->integer('rating')->unsigned()->default(5); // skala 1-5
            $table->text('comment')->nullable();
            $table->date('review_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_reviews');
    }
};
