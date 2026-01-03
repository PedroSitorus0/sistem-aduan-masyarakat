<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Admin (Pengelola)') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            {{-- Pesan Sukses --}}
            @if(session('success'))
                <div style="background-color: #d1fae5; color: #065f46; padding: 15px; margin-bottom: 20px; border-radius: 5px; border: 1px solid #34d399;">
                    ✅ {{ session('success') }}
                </div>
            @endif

            {{-- TABEL 1: SEMUA LAPORAN WARGA --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 mb-6">
                <h3 class="text-lg font-bold mb-4 border-b pb-2" style="color: #1e40af;">📢 Daftar Laporan Masuk</h3>
                
                <table style="width: 100%; text-align: left; border-collapse: collapse;">
                    <thead>
                        <tr style="background-color: #f3f4f6;">
                            <th style="padding: 10px; border-bottom: 2px solid #ddd;">Pelapor</th>
                            <th style="padding: 10px; border-bottom: 2px solid #ddd;">Masalah</th>
                            <th style="padding: 10px; border-bottom: 2px solid #ddd;">Foto</th>
                            <th style="padding: 10px; border-bottom: 2px solid #ddd;">Ubah Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($laporans as $laporan)
                        <tr style="border-bottom: 1px solid #eee;">
                            <td style="padding: 10px;">
                                <strong>{{ $laporan->user->name }}</strong><br>
                                <small style="color:gray">{{ $laporan->created_at->format('d M Y') }}</small>
                            </td>
                            <td style="padding: 10px;">
                                <strong>{{ $laporan->judul }}</strong><br>
                                {{ $laporan->isi }}
                            </td>
                            <td style="padding: 10px;">
                                @if($laporan->foto)
                                    <a href="{{ asset('storage/' . $laporan->foto) }}" target="_blank">
                                        <img src="{{ asset('storage/' . $laporan->foto) }}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 5px; border: 1px solid #ccc;">
                                    </a>
                                @else - @endif
                            </td>
                            <td style="padding: 10px;">
                                <form action="{{ route('admin.laporan.update', $laporan->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <select name="status" style="padding: 5px; border-radius: 5px; border: 1px solid #ccc;">
                                        <option value="pending" {{ $laporan->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="proses" {{ $laporan->status == 'proses' ? 'selected' : '' }}>Di Proses</option>
                                        <option value="selesai" {{ $laporan->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                    </select>
                                    <button type="submit" style="background-color: #2563eb; color: white; padding: 5px 10px; border: none; border-radius: 5px; cursor: pointer; margin-left: 5px;">
                                        Simpan
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="4" style="padding: 20px; text-align: center;">Belum ada laporan.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- TABEL 2: SEMUA PEMINJAMAN --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-bold mb-4 border-b pb-2" style="color: #166534;">📦 Daftar Peminjaman Masuk</h3>
                
                <table style="width: 100%; text-align: left; border-collapse: collapse;">
                    <thead>
                        <tr style="background-color: #f3f4f6;">
                            <th style="padding: 10px; border-bottom: 2px solid #ddd;">Peminjam</th>
                            <th style="padding: 10px; border-bottom: 2px solid #ddd;">Barang</th>
                            <th style="padding: 10px; border-bottom: 2px solid #ddd;">Tanggal</th>
                            <th style="padding: 10px; border-bottom: 2px solid #ddd;">Ubah Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($peminjamans as $pinjam)
                        <tr style="border-bottom: 1px solid #eee;">
                            <td style="padding: 10px;">
                                <strong>{{ $pinjam->user->name }}</strong>
                            </td>
                            <td style="padding: 10px;">
                                {{ $pinjam->nama_barang }} ({{ $pinjam->jumlah_barang }})
                            </td>
                            <td style="padding: 10px;">
                                {{ $pinjam->tgl_pinjam }} s/d {{ $pinjam->tgl_kembali }}
                            </td>
                            <td style="padding: 10px;">
                                <form action="{{ route('admin.peminjaman.update', $pinjam->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <select name="status" style="padding: 5px; border-radius: 5px; border: 1px solid #ccc;">
                                        <option value="pending" {{ $pinjam->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="disetujui" {{ $pinjam->status == 'disetujui' ? 'selected' : '' }}>Setujui</option>
                                        <option value="ditolak" {{ $pinjam->status == 'ditolak' ? 'selected' : '' }}>Tolak</option>
                                        <option value="kembali" {{ $pinjam->status == 'kembali' ? 'selected' : '' }}>Sudah Kembali</option>
                                    </select>
                                    <button type="submit" style="background-color: #16a34a; color: white; padding: 5px 10px; border: none; border-radius: 5px; cursor: pointer; margin-left: 5px;">
                                        Update
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="4" style="padding: 20px; text-align: center;">Belum ada peminjaman.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>