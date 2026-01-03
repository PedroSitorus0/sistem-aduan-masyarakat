<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;
use App\Models\Peminjaman;

class AdminController extends Controller
{
    // 1. Halaman Dashboard Admin
    public function index()
    {
        // Ambil SEMUA data, urutkan dari yang terbaru
        // with('user') gunanya biar kita tahu SIAPA yang lapor
        $laporans = Laporan::with('user')->latest()->get();
        $peminjamans = Peminjaman::with('user')->latest()->get();

        return view('admin.dashboard', compact('laporans', 'peminjamans'));
    }

    // 2. Update Status Laporan
    public function updateLaporan(Request $request, $id)
    {
        $laporan = Laporan::findOrFail($id);
        $laporan->update(['status' => $request->status]);
        
        return redirect()->back()->with('success', 'Status laporan diperbarui!');
    }

    // 3. Update Status Peminjaman
    public function updatePeminjaman(Request $request, $id)
    {
        $pinjam = Peminjaman::findOrFail($id);
        $pinjam->update(['status' => $request->status]);
        
        return redirect()->back()->with('success', 'Status peminjaman diperbarui!');
    }
}