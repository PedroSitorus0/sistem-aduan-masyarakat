<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    // PENTING: Memberi tahu Laravel nama tabel yang benar
    protected $table = 'peminjamans';

    protected $fillable = [
        'user_id',
        'nama_barang',
        'jumlah_barang', // Sesuai migration
        'tgl_pinjam',
        'tgl_kembali',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}