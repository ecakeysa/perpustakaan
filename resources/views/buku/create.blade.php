<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    body { font-family: 'Inter', sans-serif; background: radial-gradient(at top right, #f5f3ff, #ffffff, #faf5ff); background-attachment: fixed; }
    .h-input { height: 3.5rem; }
</style>

<body class="min-h-screen py-16 px-6">
    <div class="max-w-4xl mx-auto">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-6">
            <div class="space-y-2">
                <a href="{{ route('buku.index') }}" class="inline-flex items-center text-[10px] font-black uppercase tracking-[0.2em] text-purple-400 hover:text-purple-600 transition-colors">
                    <i class="fas fa-arrow-left mr-2"></i> Kembali Ke Koleksi
                </a>
                <h1 class="text-4xl font-black tracking-tighter text-slate-800 italic">Arsip <span class="text-purple-600">Baru.</span></h1>
                <p class="text-slate-400 font-medium">Daftarkan metadata buku ke dalam sistem perpustakaan digital.</p>
            </div>
            <div class="hidden md:block w-16 h-16 bg-white rounded-3xl shadow-xl shadow-purple-100 flex items-center justify-center rotate-6">
                <i class="fas fa-book-medical text-purple-600 text-2xl"></i>
            </div>
        </div>

        <form action="{{ route('buku.store') }}" method="POST" class="space-y-10">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-8">
                <div class="space-y-2">
                    <label class="text-[11px] font-bold text-slate-400 uppercase tracking-widest ml-1">Judul Literatur</label>
                    <input type="text" name="Judul" class="w-full h-input px-6 rounded-[1.5rem] border-2 border-slate-100 bg-white/50 focus:bg-white focus:border-purple-400 focus:ring-4 focus:ring-purple-500/5 transition-all outline-none text-slate-700 font-semibold placeholder:text-slate-300" placeholder="Masukkan judul lengkap..." required>
                </div>

                <div class="space-y-2">
                    <label class="text-[11px] font-bold text-slate-400 uppercase tracking-widest ml-1">Penulis / Kreator</label>
                    <input type="text" name="Penulis" class="w-full h-input px-6 rounded-[1.5rem] border-2 border-slate-100 bg-white/50 focus:bg-white focus:border-purple-400 focus:ring-4 focus:ring-purple-500/5 transition-all outline-none text-slate-700 font-semibold placeholder:text-slate-300" placeholder="Nama penulis asli..." required>
                </div>

                <div class="space-y-2">
                    <label class="text-[11px] font-bold text-slate-400 uppercase tracking-widest ml-1">Perusahaan Penerbit</label>
                    <input type="text" name="Penerbit" class="w-full h-input px-6 rounded-[1.5rem] border-2 border-slate-100 bg-white/50 focus:bg-white focus:border-purple-400 focus:ring-4 focus:ring-purple-500/5 transition-all outline-none text-slate-700 font-semibold placeholder:text-slate-300" placeholder="Nama penerbit..." required>
                </div>

                <div class="space-y-2">
                    <label class="text-[11px] font-bold text-slate-400 uppercase tracking-widest ml-1">Tahun Rilis</label>
                    <input type="number" name="TahunTerbit" class="w-full h-input px-6 rounded-[1.5rem] border-2 border-slate-100 bg-white/50 focus:bg-white focus:border-purple-400 focus:ring-4 focus:ring-purple-500/5 transition-all outline-none text-slate-700 font-semibold placeholder:text-slate-300" placeholder="2026" required>
                </div>

                <div class="md:col-span-2 space-y-2">
                    <label class="text-[11px] font-bold text-slate-400 uppercase tracking-widest ml-1">Klasifikasi Kategori</label>
                    <select name="KategoriID" class="w-full h-input px-6 rounded-[1.5rem] border-2 border-slate-100 bg-white/50 focus:border-purple-400 transition-all outline-none text-slate-600 font-bold appearance-none cursor-pointer" required>
                        <option value="" selected disabled>Tentukan kategori buku...</option>
                        @foreach($kategori as $k)
                            <option value="{{ $k->KategoriID }}">{{ $k->NamaKategori }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="pt-8 border-t border-purple-50 flex items-center justify-between">
                <button type="reset" class="text-sm font-bold text-slate-400 hover:text-rose-500 transition-colors uppercase tracking-widest">Reset Form</button>
                <button type="submit" class="h-14 px-12 bg-purple-600 hover:bg-purple-700 text-white font-black rounded-full shadow-2xl shadow-purple-200 transition-all active:scale-95 uppercase tracking-widest text-xs">
                    Simpan Koleksi <i class="fas fa-check ml-2"></i>
                </button>
            </div>
        </form>

        <footer class="mt-24 text-center">
            <p class="text-[10px] font-bold text-slate-300 uppercase tracking-[0.4em]">&copy; 2026 SMKN 11 Malang • UKK RPL</p>
        </footer>
    </div>
</body>