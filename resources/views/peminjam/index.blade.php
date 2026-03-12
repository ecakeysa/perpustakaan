<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    body { font-family: 'Inter', sans-serif; background: radial-gradient(circle at top left, #f5f3ff 0%, #ffffff 100%); }
    .glass-nav { background: rgba(255, 255, 255, 0.8); backdrop-filter: blur(12px); }
</style>

<nav class="glass-nav sticky top-0 z-50 border-b border-purple-100 py-4 px-6">
    <div class="max-w-7xl mx-auto flex justify-between items-center">
        <a class="flex items-center gap-2 group" href="/dashboard">
            <div class="p-2 bg-purple-600 rounded-lg group-hover:rotate-12 transition-transform">
                <i class="fas fa-book-open text-white text-sm"></i>
            </div>
            <span class="font-extrabold text-slate-800 text-xl tracking-tighter italic">Pustaka<span class="text-purple-600 font-normal">Digital</span></span>
        </a>
        <div class="flex items-center gap-6">
            <a href="/dashboard" class="text-xs font-bold text-slate-400 hover:text-purple-600 transition-colors uppercase tracking-widest">Beranda</a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="h-10 px-6 bg-rose-50 text-rose-600 text-[11px] font-black rounded-xl border border-rose-100 hover:bg-rose-600 hover:text-white transition-all uppercase" onclick="return confirm('Keluar?')">Logout</button>
            </form>
        </div>
    </div>
</nav>

<div class="max-w-7xl mx-auto px-6 py-12">
    <header class="mb-12 flex items-end justify-between">
        <div>
            <h2 class="text-4xl font-black text-slate-800 tracking-tighter uppercase italic leading-none">Eksplorasi <span class="text-purple-600 font-light">Ilmu.</span></h2>
            <p class="mt-2 text-slate-400 font-medium text-sm">Temukan ribuan jendela dunia dalam genggamanmu.</p>
        </div>
        <div class="hidden md:block h-[2px] flex-1 bg-gradient-to-r from-transparent via-purple-100 to-transparent mx-10 mb-4"></div>
    </header>

    @if(session('success'))
        <div class="mb-8 p-4 bg-emerald-50 border-l-4 border-emerald-500 text-emerald-700 text-xs font-bold rounded-r-xl animate-bounce">
            <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-8">
        @foreach($buku as $b)
        <div class="group relative bg-white/40 border border-slate-100 rounded-[2rem] p-4 transition-all hover:bg-white hover:shadow-2xl hover:shadow-purple-100 hover:-translate-y-2 overflow-hidden">
            <div class="aspect-[3/4] bg-slate-50 rounded-2xl mb-4 flex items-center justify-center text-slate-200 group-hover:text-purple-200 transition-colors">
                <i class="fas fa-book fa-4xl"></i>
            </div>
            <div class="px-2">
                <h6 class="font-black text-slate-800 text-sm truncate uppercase tracking-tight">{{ $b->Judul }}</h6>
                <p class="text-[10px] font-bold text-slate-400 italic mb-4">{{ $b->Penulis }}</p>
                
                <form action="{{ route('peminjam.store', $b->BukuID) }}" method="POST">
                    @csrf
                    <input type="hidden" name="BukuID" value="{{ $b->BukuID }}">
                    <button type="submit" class="w-full h-11 bg-slate-900 group-hover:bg-purple-600 text-white text-[10px] font-black rounded-xl transition-all uppercase tracking-widest leading-none shadow-lg">
                        Pinjam Sekarang
                    </button>
                </form>
            </div>
        </div>
        @endforeach
    </div>

    <div class="mt-24">
        <div class="flex items-center gap-4 mb-8">
            <div class="w-2 h-8 bg-amber-400 rounded-full"></div>
            <h4 class="font-black text-slate-800 text-xl tracking-tight uppercase">Sedang Dibaca</h4>
        </div>

        <div class="bg-white/50 border border-slate-100 rounded-[2.5rem] overflow-hidden shadow-sm">
            <table class="w-full text-left">
                <thead class="bg-slate-50/50 text-[10px] font-black text-slate-400 uppercase tracking-widest">
                    <tr>
                        <th class="py-6 px-8 italic">Judul Koleksi</th>
                        <th class="py-6 italic">Waktu Pinjam</th>
                        <th class="py-6 px-8 text-center italic">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse($pinjaman as $p)
                        @if($p->StatusPeminjaman != 'Sudah Dikembalikan')
                        <tr class="hover:bg-white transition-colors">
                            <td class="py-6 px-8 font-black text-slate-700 text-sm tracking-tight">{{ $p->buku->Judul ?? 'Untitled' }}</td>
                            <td class="py-6 text-xs font-bold text-slate-400">{{ \Carbon\Carbon::parse($p->TanggalPeminjaman)->format('d M Y') }}</td>
                            <td class="py-6 px-8 text-center">
                                <span class="px-4 py-1.5 bg-amber-50 text-amber-600 text-[9px] font-black rounded-full border border-amber-100 uppercase italic">On Progress</span>
                            </td>
                        </tr>
                        @endif
                    @empty
                        <tr><td colspan="3" class="py-12 text-center text-slate-300 font-bold italic text-sm">Belum ada buku yang menemani harimu.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>