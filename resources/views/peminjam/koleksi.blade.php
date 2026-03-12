<script src="https://cdn.tailwindcss.com"></script>
<body class="bg-[#fafafa] min-h-screen">
    <div class="max-w-6xl mx-auto px-6 py-16">
        <div class="flex flex-col md:flex-row justify-between items-center mb-16 gap-8">
            <div class="text-center md:text-left">
                <span class="text-purple-600 font-black text-[10px] tracking-[0.3em] uppercase block mb-2">My Gallery</span>
                <h2 class="text-5xl font-black text-slate-900 tracking-tighter uppercase italic">Koleksi <span class="text-slate-300">Favorit.</span></h2>
            </div>
            <a href="{{ route('buku.index') }}" class="h-14 px-10 flex items-center bg-purple-600 hover:bg-slate-900 text-white text-[11px] font-black rounded-2xl shadow-xl shadow-purple-100 transition-all uppercase tracking-widest">
                <i class="fas fa-plus mr-3"></i> Tambah Baru
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @forelse($koleksi as $k)
            <div class="bg-white p-8 rounded-[2.5rem] border border-slate-50 shadow-sm hover:shadow-2xl transition-all group flex flex-col items-center text-center">
                <div class="w-20 h-20 bg-purple-50 rounded-3xl flex items-center justify-center text-purple-600 mb-6 group-hover:scale-110 transition-transform">
                    <i class="fas fa-bookmark text-2xl"></i>
                </div>
                <h6 class="font-black text-slate-800 text-sm uppercase tracking-tight line-clamp-1">{{ $k->buku->Judul }}</h6>
                <p class="text-[10px] font-bold text-slate-400 italic mb-8">{{ $k->buku->Penulis }}</p>

                <div class="w-full space-y-2 mt-auto">
                    <form action="{{ route('peminjam.store', $k->BukuID) }}" method="POST">
                        @csrf
                        <button class="w-full h-11 bg-slate-900 text-white text-[10px] font-black rounded-xl uppercase tracking-widest hover:bg-purple-600 transition-all shadow-md">Pinjam</button>
                    </form>
                    <form action="{{ route('koleksi.destroy', $k->KoleksiID) }}" method="POST">
                        @csrf @method('DELETE')
                        <button class="w-full h-11 bg-rose-50 text-rose-500 text-[10px] font-black rounded-xl uppercase tracking-widest hover:bg-rose-500 hover:text-white transition-all border border-rose-100">Hapus</button>
                    </form>
                </div>
            </div>
            @empty
            <div class="col-span-full py-32 text-center bg-slate-50 border-2 border-dashed border-slate-200 rounded-[3rem]">
                <i class="fas fa-heart-broken text-slate-200 text-5xl mb-4 block"></i>
                <p class="text-slate-400 font-black uppercase tracking-widest italic text-sm">Belum ada buku di hatimu.</p>
            </div>
            @endforelse
        </div>
    </div>
</body>