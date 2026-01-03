<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('laporans', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Penghubung ke User

        // Kolom Data Laporan
        $table->string('judul');
        $table->text('isi');        // Kita sepakat pakai nama 'isi'
        $table->string('foto')->nullable(); // Boleh kosong jika tidak ada foto
        $table->string('status')->default('pending'); // Status awal selalu 'pending'

        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporans');
    }
};
