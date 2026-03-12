<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    body { 
        font-family: 'Inter', sans-serif; 
        background: radial-gradient(circle at top right, #f5f3ff 0%, #ffffff 100%);
        min-height: 100vh;
    }
    .glass-effect {
        background: rgba(255, 255, 255, 0.7);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(231, 229, 253, 0.5);
    }
</style>

<nav class="glass-effect sticky top-0 z-50 border-b border-purple-100 py-4 px-8">
    <div class="max-w-7xl mx-auto flex justify-between items-center">
        <a class="flex items-center gap-3 group" href="#">
            <div class="p-2.5 bg-purple-600 rounded-xl group-hover:rotate-6 transition-transform shadow-lg shadow-purple-200">
                <i class="fas fa-shapes text-white text-sm"></i>
            </div>
            <span class="font-black text-slate-800 text-xl tracking-tighter uppercase italic">Hub<span class="text-purple-600 font-light">Pustaka</span></span>
        </a>
        
        <form action="/logout" method="POST">
            @csrf
            <button type="submit" class="h-11 px-6 bg-rose-50 text-rose-600 text-[10px] font-black rounded-xl border border-rose-100 hover:bg-rose-600 hover:text-white transition-all uppercase tracking-widest" onclick="return confirm('Keluar dari sistem?')">
                Sign Out <i class="fas fa-arrow-right-from-bracket ml-2"></i>
            </button>
        </form>
    </div>
</nav>

<div class="max-w-7xl mx-auto px-8 py-12">
    <header class="mb-16 relative">
        <div class="relative z-10">
            <span class="inline-block px-4 py-1.5 bg-purple-100 text-purple-600 text-[10px] font-black rounded-full uppercase tracking-[0.2em] mb-4">
                {{ auth()->user()->role }} Access
            </span>
            <h1 class="text-5xl font-black text-slate-900 tracking-tighter leading-none mb-3">
                HALO, <span class="text-purple-600 italic">{{ strtoupper(auth()->user()->NamaLengkap) }}!</span>
            </h1>
            <p class="text-slate-400 font-medium text-sm max-w-lg">
                Pantau statistik, kelola buku, dan akses seluruh fitur perpustakaan dalam satu kendali penuh.
            </p>
        </div>
        <div class="absolute -top-10 -right-10 w-64 h-64 bg-purple-100 rounded-full blur-3xl opacity-50 -z-10"></div>
    </header>

    <div class="grid grid-cols-2 lg:grid-cols-3 gap-8">
        
        <div class="group relative p-8 bg-white rounded-[2.5rem] border border-slate-100 hover:border-purple-200 hover:shadow-2xl hover:shadow-purple-100 transition-all hover:-translate-y-2">
            <div class="w-16 h-16 bg-purple-50 rounded-2xl flex items-center justify-center text-purple-600 mb-8 group-hover:scale-110 transition-transform">
                <i class="fas fa-book-open text-xl"></i>
            </div>
            <h3 class="font-black text-slate-800 text-lg uppercase tracking-tight mb-2">Katalog Utama</h3>
            <p class="text-xs text-slate-400 font-medium mb-8 leading-relaxed">Eksplorasi koleksi buku digital dan ulasan terbaik.</p>
            <a href="{{ route('buku.index') }}" class="inline-flex items-center h-12 px-6 bg-slate-900 text-white text-[10px] font-black rounded-xl uppercase tracking-widest hover:bg-purple-600 transition-colors">
                Jelajahi <i class="fas fa-chevron-right ml-2 text-[8px]"></i>
            </a>
        </div>

        @if(auth()->user()->role == 'peminjam')
        <div class="group p-8 bg-white rounded-[2.5rem] border border-slate-100 hover:border-blue-200 hover:shadow-2xl hover:shadow-blue-50 transition-all hover:-translate-y-2">
            <div class="w-16 h-16 bg-blue-50 rounded-2xl flex items-center justify-center text-blue-600 mb-8 group-hover:rotate-6 transition-transform">
                <i class="fas fa-clock-rotate-left text-xl"></i>
            </div>
            <h3 class="font-black text-slate-800 text-lg uppercase tracking-tight mb-2">Pinjaman Saya</h3>
            <p class="text-xs text-slate-400 font-medium mb-8 leading-relaxed">Cek status buku yang sedang aktif Anda baca.</p>
            <a href="{{ route('peminjam.pinjaman') }}" class="inline-flex items-center h-12 px-6 bg-blue-600 text-white text-[10px] font-black rounded-xl uppercase tracking-widest hover:bg-slate-900 transition-colors shadow-lg shadow-blue-100">
                Cek Riwayat
            </a>
        </div>

        <div class="group p-8 bg-white rounded-[2.5rem] border border-slate-100 hover:border-rose-200 hover:shadow-2xl hover:shadow-rose-50 transition-all hover:-translate-y-2">
            <div class="w-16 h-16 bg-rose-50 rounded-2xl flex items-center justify-center text-rose-600 mb-8 group-hover:scale-90 transition-transform">
                <i class="fas fa-heart text-xl"></i>
            </div>
            <h3 class="font-black text-slate-800 text-lg uppercase tracking-tight mb-2">Wishlist</h3>
            <p class="text-xs text-slate-400 font-medium mb-8 leading-relaxed">Simpan buku impian yang ingin Anda baca nanti.</p>
            <a href="{{ route('koleksi.index') }}" class="inline-flex items-center h-12 px-6 bg-rose-500 text-white text-[10px] font-black rounded-xl uppercase tracking-widest hover:bg-slate-900 transition-colors shadow-lg shadow-rose-100">
                Buka Koleksi
            </a>
        </div>
        @endif

        @if(auth()->user()->role == 'administrator' || auth()->user()->role == 'petugas')
        <div class="group p-8 bg-white rounded-[2.5rem] border border-slate-100 hover:border-emerald-200 hover:shadow-2xl hover:shadow-emerald-50 transition-all hover:-translate-y-2">
            <div class="w-16 h-16 bg-emerald-50 rounded-2xl flex items-center justify-center text-emerald-600 mb-8">
                <i class="fas fa-tags text-xl"></i>
            </div>
            <h3 class="font-black text-slate-800 text-lg uppercase tracking-tight mb-2">Klasifikasi</h3>
            <p class="text-xs text-slate-400 font-medium mb-8 leading-relaxed">Atur kategori dan pengelompokan buku sistem.</p>
            <a href="{{ route('kategori.index') }}" class="inline-flex items-center h-12 px-6 bg-emerald-600 text-white text-[10px] font-black rounded-xl uppercase tracking-widest hover:bg-slate-900 transition-colors shadow-lg shadow-emerald-100">
                Kelola Data
            </a>
        </div>

        <div class="group p-8 bg-white rounded-[2.5rem] border border-slate-100 hover:border-slate-300 hover:shadow-2xl transition-all hover:-translate-y-2">
            <div class="w-16 h-16 bg-slate-100 rounded-2xl flex items-center justify-center text-slate-600 mb-8">
                <i class="fas fa-file-invoice text-xl"></i>
            </div>
            <h3 class="font-black text-slate-800 text-lg uppercase tracking-tight mb-2">Export Data</h3>
            <p class="text-xs text-slate-400 font-medium mb-8 leading-relaxed">Generate laporan transaksi dalam format PDF.</p>
            <a href="{{ route('laporan.generate') }}" class="inline-flex items-center h-12 px-6 bg-slate-800 text-white text-[10px] font-black rounded-xl uppercase tracking-widest hover:bg-purple-600 transition-colors">
                Cetak Laporan
            </a>
        </div>
        @endif

        @if(auth()->user()->role == 'administrator')
        <div class="group p-8 bg-white rounded-[2.5rem] border border-slate-100 hover:border-amber-200 hover:shadow-2xl hover:shadow-amber-50 transition-all hover:-translate-y-2">
            <div class="w-16 h-16 bg-amber-50 rounded-2xl flex items-center justify-center text-amber-600 mb-8">
                <i class="fas fa-user-gear text-xl"></i>
            </div>
            <h3 class="font-black text-slate-800 text-lg uppercase tracking-tight mb-2">Akses Akun</h3>
            <p class="text-xs text-slate-400 font-medium mb-8 leading-relaxed">Registrasi petugas baru dan kendali hak akses.</p>
            <a href="{{ route('petugas.index') }}" class="inline-flex items-center h-12 px-6 bg-amber-500 text-white text-[10px] font-black rounded-xl uppercase tracking-widest hover:bg-slate-900 transition-colors shadow-lg shadow-amber-100">
                Konfigurasi
            </a>
        </div>
        @endif

    </div>

    <footer class="mt-24 pt-12 border-t border-slate-50 flex flex-col md:flex-row justify-between items-center gap-4">
        <p class="text-[10px] font-black text-slate-300 uppercase tracking-widest italic">
            &copy; 2026 Perpus Digital &bull; SMKN 11 Malang
        </p>
        <div class="flex gap-4 opacity-30 group">
            <i class="fab fa-laravel hover:text-rose-600 transition-colors"></i>
            <i class="fab fa-php"></i>
            <i class="fas fa-code text-[10px]"></i>
        </div>
    </footer>
</div>