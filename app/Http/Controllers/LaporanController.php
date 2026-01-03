<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;

class LaporanController extends Controller
{
    // 1. Tampilkan Formulir
    public function create()
    {
        return view('laporan.create');
    }

    // 2. Simpan Data
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi'   => 'required|string',
            'foto'  => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $path = null;
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('bukti_laporan', 'public');
        }

        Laporan::create([
            'user_id' => auth()->id(),
            'judul'   => $request->judul,
            'isi'     => $request->isi,     // Sesuai Database
            'foto'    => $path,
            'status'  => 'pending',
        ]);

        return redirect()->route('dashboard')->with('success', 'Laporan berhasil dikirim!');
    }
}