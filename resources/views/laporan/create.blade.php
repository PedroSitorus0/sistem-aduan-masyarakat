<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Buat Laporan Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    {{-- Tampilkan Error jika ada --}}
                    @if ($errors->any())
                        <div class="mb-4 bg-red-100 text-red-700 p-4 rounded">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>- {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('laporan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mb-4">
                            <label class="block font-bold mb-2">Judul Laporan</label>
                            <input type="text" name="judul" class="w-full border-gray-300 rounded-md shadow-sm" required>
                        </div>

                        <div class="mb-4">
                            <label class="block font-bold mb-2">Isi Laporan</label>
                            {{-- PENTING: name="isi" sesuai Controller Bab 3 --}}
                            <textarea name="isi" rows="4" class="w-full border-gray-300 rounded-md shadow-sm" required></textarea>
                        </div>

                        <div class="mb-4">
                            <label class="block font-bold mb-2">Foto Bukti</label>
                            {{-- PENTING: name="foto" sesuai Controller Bab 3 --}}
                            <input type="file" name="foto" class="w-full text-sm text-gray-500">
                        </div>

                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                            Kirim Laporan
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>