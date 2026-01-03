<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajukan Peminjaman Barang') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if ($errors->any())
                        <div class="mb-4 bg-red-100 text-red-700 p-4 rounded">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>- {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('peminjaman.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-4">
                            <label class="block font-bold mb-2">Nama Barang</label>
                            <input type="text" name="nama_barang" class="w-full border-gray-300 rounded-md shadow-sm" required placeholder="Contoh: Kursi Lipat">
                        </div>

                        <div class="mb-4">
                            <label class="block font-bold mb-2">Jumlah</label>
                            {{-- PENTING: name="jumlah" sesuai Controller Bab 3 --}}
                            <input type="number" name="jumlah" class="w-full border-gray-300 rounded-md shadow-sm" required min="1">
                        </div>

                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block font-bold mb-2">Tanggal Pinjam</label>
                                <input type="date" name="tgl_pinjam" class="w-full border-gray-300 rounded-md shadow-sm" required>
                            </div>
                            <div>
                                <label class="block font-bold mb-2">Tanggal Kembali</label>
                                <input type="date" name="tgl_kembali" class="w-full border-gray-300 rounded-md shadow-sm" required>
                            </div>
                        </div>

                        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                            Ajukan Pinjaman
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>