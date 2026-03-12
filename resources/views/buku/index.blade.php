<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    body {
        font-family: 'Inter', sans-serif;
        background: radial-gradient(at top right, #f5f3ff, #ffffff, #faf5ff);
        background-attachment: fixed;
    }

    .glass-nav {
        background: rgba(255, 255, 255, 0.7);
        backdrop-filter: blur(12px);
        border-bottom: 1px solid rgba(233, 213, 255, 0.3);
    }
</style>

<body class="min-h-screen pb-20">
    <nav class="glass-nav sticky top-0 z-50 py-4 px-6 mb-12">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="flex items-center gap-3">
                <div
                    class="w-10 h-10 bg-purple-600 rounded-xl flex items-center justify-center shadow-lg shadow-purple-200">
                    <i class="fas fa-book-open text-white text-sm"></i>
                </div>
                <span class="font-black tracking-tighter text-slate-800 text-xl italic">Perpus<span
                        class="text-purple-600">Digital.</span></span>
            </div>
            <a href="{{ route('dashboard') }}"
                class="h-10 px-6 flex items-center bg-white border border-slate-100 rounded-full text-[11px] font-bold text-slate-500 hover:text-purple-600 hover:border-purple-200 transition-all shadow-sm">
                <i class="fas fa-th-large mr-2"></i> PANEL UTAMA
            </a>
        </div>
    </nav>

    <div class="max-w-6xl mx-auto px-6">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-6">
            <div class="space-y-1">
                <h2 class="text-4xl font-black tracking-tighter text-slate-800 uppercase italic">Eksplorasi <span
                        class="text-purple-600">Pustaka.</span></h2>
                <p class="text-slate-400 font-medium italic text-sm">Temukan cakrawala baru melalui koleksi pilihan
                    kami.</p>
            </div>
            @if(auth()->user()->role != 'peminjam')
                <a href="{{ route('buku.create') }}"
                    class="h-12 px-8 flex items-center bg-purple-600 hover:bg-purple-700 text-white text-[11px] font-black rounded-xl shadow-xl shadow-purple-100 transition-all active:scale-95 uppercase tracking-widest">
                    <i class="fas fa-plus mr-2"></i> Tambah Literatur
                </a>
            @endif
        </div>

        @if(session('success'))
            <div class="mb-8 p-4 bg-emerald-50 border border-emerald-100 rounded-2xl flex items-center gap-4 animate-pulse">
                <div class="w-8 h-8 bg-emerald-500 rounded-full flex items-center justify-center text-white text-xs">
                    <i class="fas fa-check"></i>
                </div>
                <span class="text-emerald-700 text-sm font-bold">{{ session('success') }}</span>
            </div>
        @endif

        <div class="space-y-4">
            @foreach($buku as $b)
                <div
                    class="group flex flex-col md:flex-row items-center justify-between p-6 bg-white/50 hover:bg-white rounded-[2rem] border border-slate-50 hover:border-purple-100 hover:shadow-2xl hover:shadow-purple-100/50 transition-all duration-500 gap-6">
                    <div class="flex items-center gap-6 flex-1 w-full">
                        <div
                            class="w-16 h-20 bg-gradient-to-br from-purple-50 to-slate-100 rounded-2xl flex items-center justify-center text-purple-300 group-hover:from-purple-600 group-hover:to-indigo-600 group-hover:text-white transition-all duration-500 shadow-inner">
                            <i class="fas fa-book text-2xl"></i>
                        </div>
                        <div>
                            <h4
                                class="text-lg font-black text-slate-800 tracking-tight group-hover:text-purple-600 transition-colors uppercase">
                                {{ $b->Judul }}</h4>
                            <div class="flex flex-wrap items-center gap-x-4 gap-y-1 text-xs font-bold text-slate-400">
                                <span class="flex items-center"><i class="fas fa-feather-alt mr-2 text-purple-300"></i>
                                    {{ $b->Penulis }}</span>
                                <span class="flex items-center"><i class="fas fa-building mr-2 text-purple-300"></i>
                                    {{ $b->Penerbit }}</span>
                                <span
                                    class="px-2 py-0.5 bg-slate-100 rounded text-[9px] text-slate-500 tracking-tighter">{{ $b->TahunTerbit }}</span>
                            </div>
                        </div>
                    </div>

                    <div
                        class="flex items-center gap-6 w-full md:w-auto justify-between md:justify-end border-t md:border-t-0 pt-4 md:pt-0 border-slate-50">
                        <div class="flex flex-col items-center px-6 border-r border-slate-100">
                            <span class="text-[9px] font-black text-slate-300 uppercase tracking-widest mb-1">Rating</span>
                            <div class="flex items-center gap-2">
                                <i class="fas fa-star text-amber-400 text-xs"></i>
                                <span
                                    class="font-black text-slate-700">{{ number_format($b->ulasan()->avg('Rating'), 1) ?? '0.0' }}</span>
                            </div>
                        </div>

                        <div class="flex items-center gap-2">
                            <a href="{{ route('buku.show', $b->BukuID) }}"
                                class="w-11 h-11 flex items-center justify-center rounded-xl bg-slate-50 text-slate-400 hover:bg-purple-100 hover:text-purple-600 transition-all"
                                title="Detail">
                                <i class="fas fa-eye text-sm"></i>
                            </a>

                            @if(auth()->user()->role != 'peminjam')
                                <a href="{{ route('buku.edit', $b->BukuID) }}"
                                    class="w-11 h-11 flex items-center justify-center rounded-xl bg-amber-50 text-amber-500 hover:bg-amber-500 hover:text-white transition-all"
                                    title="Edit">
                                    <i class="fas fa-edit text-sm"></i>
                                </a>

                                <form action="{{ route('buku.destroy', $b->BukuID) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus buku ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="w-11 h-11 flex items-center justify-center rounded-xl bg-rose-50 text-rose-500 hover:bg-rose-500 hover:text-white transition-all"
                                        title="Hapus">
                                        <i class="fas fa-trash text-sm"></i>
                                    </button>
                                </form>
                            @else
                                <form action="{{ route('peminjam.store', $b->BukuID) }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="w-11 h-11 flex items-center justify-center rounded-xl bg-purple-50 text-purple-600 hover:bg-purple-600 hover:text-white transition-all shadow-sm">
                                        <i class="fas fa-plus text-sm"></i>
                                    </button>
                                </form>

                                <form action="{{ route('koleksi.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="BukuID" value="{{ $b->BukuID }}">
                                    <button type="submit"
                                        class="w-11 h-11 flex items-center justify-center rounded-xl bg-rose-50 text-rose-500 hover:bg-rose-500 hover:text-white transition-all">
                                        <i class="fas fa-heart text-sm"></i>
                                    </button>
                                </form>

                                <a href="{{ route('ulasan.create', $b->BukuID) }}"
                                    class="w-11 h-11 flex items-center justify-center rounded-xl bg-indigo-50 text-indigo-600 hover:bg-indigo-600 hover:text-white transition-all">
                                    <i class="fas fa-comment-dots text-sm"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <footer class="mt-20 text-center">
            <p class="text-[10px] font-bold text-slate-300 uppercase tracking-[0.5em] italic">&copy; 2026 PERPUS DIGITAL
                • SMKN 11 MALANG</p>
        </footer>
    </div>
</body>