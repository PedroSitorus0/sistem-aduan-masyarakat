<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Dashboard Warga') }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            {{-- Pesan Sukses --}}
            @if(session('success'))
                <div style="background-color: #d1fae5; color: #065f46; padding: 15px; margin-bottom: 20px; border-radius: 5px; border: 1px solid #34d399;">
                    ✅ {{ session('success') }}
                </div>
            @endif

            {{-- MENU TOMBOL BESAR (DENGAN WARNA PAKSA) --}}
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 30px;">
                
                <a href="{{ route('laporan.create') }}" 
                   style="background-color: #eff6ff; border: 2px solid #3b82f6; padding: 20px; border-radius: 10px; text-align: center; text-decoration: none; display: block;">
                    <h3 style="color: #1e40af; font-size: 20px; font-weight: bold; margin-bottom: 5px;">📢 Buat Laporan</h3>
                    <p style="color: #4b5563;">Klik di sini untuk lapor</p>
                </a>

                <a href="{{ route('peminjaman.create') }}" 
                   style="background-color: #f0fdf4; border: 2px solid #22c55e; padding: 20px; border-radius: 10px; text-align: center; text-decoration: none; display: block;">
                    <h3 style="color: #166534; font-size: 20px; font-weight: bold; margin-bottom: 5px;">📦 Pinjam Barang</h3>
                    <p style="color: #4b5563;">Klik di sini untuk pinjam</p>
                </a>

            </div>

            {{-- TABEL RIWAYAT LAPORAN --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 mb-6">
                <h3 class="text-lg font-bold mb-4 border-b pb-2">Riwayat Laporan</h3>
                <table style="width: 100%; text-align: left; border-collapse: collapse;">
                    <thead>
                        <tr style="background-color: #f3f4f6;">
                            <th style="padding: 10px; border-bottom: 1px solid #ddd;">Judul</th>
                            <th style="padding: 10px; border-bottom: 1px solid #ddd;">Isi</th>
                            <th style="padding: 10px; border-bottom: 1px solid #ddd;">Foto</th>
                            <th style="padding: 10px; border-bottom: 1px solid #ddd;">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($laporans as $laporan)
                        <tr style="border-bottom: 1px solid #eee;">
                            <td style="padding: 10px; font-weight: bold;">{{ $laporan->judul }}</td>
                            <td style="padding: 10px;">{{ $laporan->isi }}</td>
                            <td style="padding: 10px;">
                                @if($laporan->foto)
                                    <img src="{{ asset('storage/' . $laporan->foto) }}" style="width: 60px; height: 60px; object-fit: cover; border-radius: 5px;">
                                @else - @endif
                            </td>
                            <td style="padding: 10px;">
                                <span style="background-color: #e5e7eb; padding: 5px 10px; border-radius: 15px; font-size: 12px;">
                                    {{ $laporan->status }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="4" style="padding: 20px; text-align: center; color: gray;">Belum ada laporan.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- TABEL RIWAYAT PEMINJAMAN --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-bold mb-4 border-b pb-2">Riwayat Peminjaman</h3>
                <table style="width: 100%; text-align: left; border-collapse: collapse;">
                    <thead>
                        <tr style="background-color: #f3f4f6;">
                            <th style="padding: 10px; border-bottom: 1px solid #ddd;">Barang</th>
                            <th style="padding: 10px; border-bottom: 1px solid #ddd;">Jml</th>
                            <th style="padding: 10px; border-bottom: 1px solid #ddd;">Tgl Pinjam</th>
                            <th style="padding: 10px; border-bottom: 1px solid #ddd;">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($peminjamans as $pinjam)
                        <tr style="border-bottom: 1px solid #eee;">
                            <td style="padding: 10px; font-weight: bold;">{{ $pinjam->nama_barang }}</td>
                            <td style="padding: 10px;">{{ $pinjam->jumlah_barang }}</td>
                            <td style="padding: 10px;">{{ $pinjam->tgl_pinjam }}</td>
                            <td style="padding: 10px;">
                                <span style="background-color: #e5e7eb; padding: 5px 10px; border-radius: 15px; font-size: 12px;">
                                    {{ $pinjam->status }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="4" style="padding: 20px; text-align: center; color: gray;">Belum ada peminjaman.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>