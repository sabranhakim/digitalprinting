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
        Schema::create('table_payments', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('id_order')->constrained('table_orders')->onDelete('cascade');
            $table->enum('jenis_pembayaran', ['transfer_bank', 'qris']);
            $table->enum('status_pembayaran', ['proses', 'diterima', 'ditolak'])->default('proses');
            $table->string('bukti_pembayaran')->nullable();
            $table->date('tanggal_pembayaran');
            $table->decimal('amount', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_payments');
    }
};
