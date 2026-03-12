<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    body { font-family: 'Inter', sans-serif; background: radial-gradient(at top right, #f5f3ff, #ffffff, #faf5ff); background-attachment: fixed; }
    .glass-card { background: rgba(255, 255, 255, 0.8); backdrop-filter: blur(12px); border: 1px solid rgba(233, 213, 255, 0.4); }
</style>

<body class="min-h-screen flex items-center justify-center p-6">
    <div class="max-w-xl w-full">
        <div class="glass-card rounded-[2.5rem] p-10 shadow-2xl shadow-purple-100">
            <div class="mb-8 text-center">
                <div class="w-16 h-16 bg-purple-600 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg shadow-purple-200">
                    <i class="fas fa-star text-white text-2xl"></i>
                </div>
                <h2 class="text-3xl font-black tracking-tighter text-slate-800 uppercase italic">Berikan <span class="text-purple-600">Ulasan.</span></h2>
                <p class="text-slate-400 font-medium text-sm mt-2">Buku: <span class="text-slate-600 font-bold italic">{{ $buku->Judul }}</span></p>
            </div>

            <form action="{{ route('ulasan.store') }}" method="POST" class="space-y-6">
                @csrf
                <input type="hidden" name="BukuID" value="{{ $buku->BukuID }}">

                <div class="space-y-2">
                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-4">Apa pendapatmu?</label>
                    <textarea name="Ulasan" rows="4" required
                        class="w-full px-6 py-4 bg-white/50 border border-slate-100 rounded-2xl focus:ring-2 focus:ring-purple-500 focus:border-transparent outline-none transition-all placeholder:text-slate-300 font-medium text-slate-600"
                        placeholder="Tulis ulasan menarikmu di sini..."></textarea>
                </div>

                <div class="space-y-2">
                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-4">Rating (1-5)</label>
                    <select name="Rating" required
                        class="w-full px-6 h-14 bg-white/50 border border-slate-100 rounded-2xl focus:ring-2 focus:ring-purple-500 outline-none transition-all font-bold text-slate-600">
                        <option value="5">⭐⭐⭐⭐⭐ (Sangat Bagus)</option>
                        <option value="4">⭐⭐⭐⭐ (Bagus)</option>
                        <option value="3">⭐⭐⭐ (Cukup)</option>
                        <option value="2">⭐⭐ (Kurang)</option>
                        <option value="1">⭐ (Buruk)</option>
                    </select>
                </div>

                <div class="flex gap-4 pt-4">
                    <a href="{{ route('buku.index') }}" class="flex-1 h-14 flex items-center justify-center bg-slate-100 hover:bg-slate-200 text-slate-500 text-[11px] font-black rounded-2xl transition-all uppercase tracking-widest">
                        Batal
                    </a>
                    <button type="submit" class="flex-[2] h-14 bg-purple-600 hover:bg-purple-700 text-white text-[11px] font-black rounded-2xl shadow-xl shadow-purple-100 transition-all active:scale-95 uppercase tracking-widest">
                        Kirim Ulasan
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>