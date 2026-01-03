<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;

class PeminjamanController extends Controller
{
    public function create()
    {
        return view('peminjaman.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'jumlah'      => 'required|integer|min:1',
            'tgl_pinjam'  => 'required|date',
            'tgl_kembali' => 'required|date|after_or_equal:tgl_pinjam',
        ]);

        Peminjaman::create([
            'user_id'       => auth()->id(),
            'nama_barang'   => $request->nama_barang,
            'jumlah_barang' => $request->jumlah, // Kiri: Database, Kanan: Input Form
            'tgl_pinjam'    => $request->tgl_pinjam,
            'tgl_kembali'   => $request->tgl_kembali,
            'status'        => 'pending',
        ]);

        return redirect()->route('dashboard')->with('success', 'Peminjaman berhasil diajukan!');
    }
}