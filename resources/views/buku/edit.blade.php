<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    body { font-family: 'Inter', sans-serif; background: radial-gradient(at bottom left, #fdfaff, #ffffff, #f5f3ff); background-attachment: fixed; }
    .h-input { height: 3.5rem; }
</style>

<body class="min-h-screen py-16 px-6">
    <div class="max-w-4xl mx-auto">
        <div class="mb-16">
            <div class="flex items-center justify-between mb-4">
                <span class="px-4 py-1.5 bg-white border border-purple-100 rounded-full text-[10px] font-black text-purple-600 uppercase tracking-widest shadow-sm">
                    ID Referensi: #{{ $buku->BukuID }}
                </span>
                <a href="{{ route('buku.index') }}" class="text-[10px] font-black text-slate-400 hover:text-purple-600 uppercase tracking-widest transition-colors">Batalkan</a>
            </div>
            <h1 class="text-4xl font-black tracking-tighter text-slate-800 italic">Update <span class="text-purple-600">Literatur.</span></h1>
            <p class="text-slate-400 font-medium">Modifikasi informasi koleksi agar data tetap sinkron dan akurat.</p>
        </div>

        <form action="{{ route('buku.update', $buku->BukuID) }}" method="POST" class="space-y-10">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-8">
                <div class="md:col-span-2 space-y-2">
                    <label class="text-[11px] font-bold text-slate-400 uppercase tracking-widest ml-1">Judul Buku</label>
                    <input type="text" name="Judul" value="{{ $buku->Judul }}" class="w-full h-input px-8 rounded-[1.5rem] border-2 border-slate-100 bg-white/80 focus:bg-white focus:border-purple-400 focus:ring-4 focus:ring-purple-500/5 transition-all outline-none text-slate-700 font-bold text-lg" required>
                </div>

                <div class="space-y-2">
                    <label class="text-[11px] font-bold text-slate-400 uppercase tracking-widest ml-1">Penulis</label>
                    <input type="text" name="Penulis" value="{{ $buku->Penulis }}" class="w-full h-input px-6 rounded-[1.5rem] border-2 border-slate-100 bg-white/80 focus:bg-white focus:border-purple-400 transition-all outline-none text-slate-700 font-semibold" required>
                </div>

                <div class="space-y-2">
                    <label class="text-[11px] font-bold text-slate-400 uppercase tracking-widest ml-1">Penerbit</label>
                    <input type="text" name="Penerbit" value="{{ $buku->Penerbit }}" class="w-full h-input px-6 rounded-[1.5rem] border-2 border-slate-100 bg-white/80 focus:bg-white focus:border-purple-400 transition-all outline-none text-slate-700 font-semibold" required>
                </div>

                <div class="space-y-2">
                    <label class="text-[11px] font-bold text-slate-400 uppercase tracking-widest ml-1">Tahun Terbit</label>
                    <input type="number" name="TahunTerbit" value="{{ $buku->TahunTerbit }}" class="w-full h-input px-6 rounded-[1.5rem] border-2 border-slate-100 bg-white/80 focus:bg-white focus:border-purple-400 transition-all outline-none text-slate-700 font-semibold" required>
                </div>

                <div class="space-y-2">
                    <label class="text-[11px] font-bold text-slate-400 uppercase tracking-widest ml-1">Kategori</label>
                    <select name="KategoriID" class="w-full h-input px-6 rounded-[1.5rem] border-2 border-slate-100 bg-white/80 focus:border-purple-400 transition-all outline-none text-slate-700 font-bold appearance-none cursor-pointer" required>
                        @foreach($kategori as $k)
                            <option value="{{ $k->KategoriID }}" {{ $buku->KategoriID == $k->KategoriID ? 'selected' : '' }}>
                                {{ $k->NamaKategori }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="pt-8 flex justify-end">
                <button type="submit" class="h-16 px-16 bg-slate-800 hover:bg-purple-600 text-white font-black rounded-full shadow-2xl transition-all active:scale-95 uppercase tracking-widest text-xs group">
                    Sinkronkan Perubahan <i class="fas fa-sync-alt ml-3 group-hover:rotate-180 transition-transform duration-500"></i>
                </button>
            </div>
        </form>

        <p class="mt-20 text-center text-[10px] font-bold text-slate-300 uppercase tracking-widest italic">
            "Satu perubahan kecil pada data, berdampak besar pada akurasi informasi."
        </p>
    </div>
</body>