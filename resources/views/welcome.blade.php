<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Warga - Kab. Bandung</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;700&family=VT323&display=swap" rel="stylesheet">

    <style>
        /* Custom Animations & Utilities */
        .font-retro { family: 'VT323', monospace; }
        .font-modern { font-family: 'Space Grotesk', sans-serif; }
        
        .bg-grid-pattern {
            background-image: radial-gradient(#4ADE80 1px, transparent 1px);
            background-size: 30px 30px;
        }

        .glass-panel {
            background: rgba(255, 255, 255, 0.75);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.5);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.15);
        }

        /* Running Text Animation */
        @keyframes marquee {
            0% { transform: translateX(100%); }
            100% { transform: translateX(-100%); }
        }
        .animate-marquee {
            display: inline-block;
            white-space: nowrap;
            animation: marquee 20s linear infinite;
        }
    </style>
</head>
<body class="font-modern antialiased bg-green-50 text-gray-900 min-h-screen flex flex-col relative overflow-x-hidden">

    <div class="fixed inset-0 bg-grid-pattern opacity-30 z-0 pointer-events-none"></div>
    
    <div class="fixed top-0 left-0 w-96 h-96 bg-green-400 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob z-0 pointer-events-none"></div>
    <div class="fixed bottom-0 right-0 w-96 h-96 bg-yellow-400 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-2000 z-0 pointer-events-none"></div>

    <div class="bg-green-700 text-white py-1 overflow-hidden border-b-4 border-yellow-400 z-20 relative shadow-md shrink-0">
        <div class="animate-marquee font-retro text-xl tracking-widest">
            +++ SELAMAT DATANG DI SISTEM PELAYANAN DIGITAL WARGA DESA SAYATI +++ LAPORKAN ADUAN & PINJAM BARANG JADI LEBIH MUDAH +++ BEDAS MANUNGGAL +++ 
        </div>
    </div>

    <div class="flex-grow flex items-center justify-center p-4 py-12 z-10 relative">
        
        <div class="glass-panel w-full max-w-lg rounded-2xl p-8 relative overflow-hidden border-2 border-green-200">
            
            <div class="absolute -top-10 -right-10 w-24 h-24 bg-yellow-300 transform rotate-45 border-4 border-white shadow-sm"></div>

            <div class="text-center mb-8">
                <div class="inline-block p-4 rounded-full bg-white/50 border-2 border-green-100 shadow-inner mb-4">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/0f/Lambang_Kabupaten_Bandung%2C_Jawa_Barat%2C_Indonesia.svg/960px-Lambang_Kabupaten_Bandung%2C_Jawa_Barat%2C_Indonesia.svg.png" 
                         alt="Logo Kabupaten Bandung" 
                         class="h-24 w-auto drop-shadow-lg mx-auto hover:scale-110 transition duration-500">
                </div>
                
                <h1 class="text-3xl font-bold text-green-800 tracking-tight">SIBEDAS <span class="text-yellow-500">DIGITAL</span></h1>
                <p class="text-sm font-retro text-green-600 text-xl mt-1 bg-green-100 inline-block px-2 transform -rotate-1">
                    Sistem Aduan & Peminjaman Warga
                </p>
            </div>

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <div>
                    <label class="block font-bold text-xs uppercase tracking-wider text-green-800 mb-1">Email Warga</label>
                    <input type="email" name="email" required autofocus 
                        class="w-full bg-white/60 border-2 border-green-200 rounded-lg px-4 py-3 focus:outline-none focus:border-green-500 focus:ring-4 focus:ring-green-500/20 transition-all font-bold text-green-900 placeholder-green-300"
                        placeholder="contoh@warga.bandung.go.id">
                </div>

                <div>
                    <label class="block font-bold text-xs uppercase tracking-wider text-green-800 mb-1">Kode Rahasia (Password)</label>
                    <input type="password" name="password" required 
                        class="w-full bg-white/60 border-2 border-green-200 rounded-lg px-4 py-3 focus:outline-none focus:border-green-500 focus:ring-4 focus:ring-green-500/20 transition-all font-bold text-green-900 placeholder-green-300"
                        placeholder="••••••••">
                </div>

                <div class="flex items-center justify-between">
                    <label class="flex items-center space-x-2 cursor-pointer">
                        <input type="checkbox" name="remember" class="form-checkbox text-green-600 rounded focus:ring-green-500 border-green-300 h-4 w-4">
                        <span class="text-sm text-green-700 font-medium">Ingat Saya</span>
                    </label>
                    
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm text-green-600 hover:text-green-800 underline decoration-wavy">
                            Lupa?
                        </a>
                    @endif
                </div>

                <button type="submit" 
                    class="w-full bg-green-600 hover:bg-green-500 text-white font-bold py-4 rounded-xl shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] hover:shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] hover:translate-x-[2px] hover:translate-y-[2px] transition-all border-2 border-black text-lg tracking-widest uppercase">
                    MASUK SEKARANG 🚀
                </button>
            </form>

            <div class="mt-8 text-center border-t border-green-200 pt-4">
                <p class="text-green-700 text-sm">Belum terdaftar di kelurahan?</p>
                <a href="{{ route('register') }}" class="inline-block mt-2 font-retro text-xl text-yellow-600 hover:text-yellow-700 bg-yellow-100 px-3 py-1 hover:rotate-2 transition transform">
                    >> DAFTAR DISINI <<
                </a>
            </div>
            
        </div>
        
    </div>

    <div class="w-full text-center py-4 mt-auto z-10 opacity-60">
        <p class="font-retro text-green-800 text-lg">© 2025 Pemerintah Kabupaten Bandung. Desa Sayati</p>
    </div>

</body>
</html>