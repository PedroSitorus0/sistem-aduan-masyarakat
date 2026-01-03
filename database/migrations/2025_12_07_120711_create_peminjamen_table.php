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
    // Kita paksa nama tabelnya 'peminjamans' biar konsisten
    Schema::create('peminjamans', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');

        // Kolom Data Peminjaman
        $table->string('nama_barang');
        $table->integer('jumlah_barang'); // Kita sepakat pakai 'jumlah_barang'
        $table->date('tgl_pinjam');
        $table->date('tgl_kembali');
        $table->string('status')->default('pending');

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjamen');
    }
};
