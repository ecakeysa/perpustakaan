<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    body { font-family: 'Inter', sans-serif; background: radial-gradient(at top left, #f5f3ff, #ffffff, #faf5ff); background-attachment: fixed; }
    .glass-card { background: rgba(255, 255, 255, 0.8); backdrop-filter: blur(12px); border: 1px solid rgba(255, 255, 255, 0.5); }
    .h-input { height: 3.5rem; }
</style>

<body class="min-h-screen py-16 px-4">
    <div class="max-w-xl mx-auto">
        <div class="text-center mb-10">
            <div class="inline-flex items-center justify-center w-14 h-14 bg-purple-600 rounded-2xl shadow-xl shadow-purple-200 mb-4 rotate-3 hover:rotate-0 transition-all duration-500">
                <i class="fas fa-user-plus text-white text-xl"></i>
            </div>
            <h1 class="text-2xl font-extrabold tracking-tight text-slate-800 uppercase italic">Akses <span class="text-purple-600">Otoritas</span></h1>
            <p class="text-slate-400 text-sm mt-1">Registrasi petugas baru ke dalam sistem perpus.</p>
        </div>

        <div class="glass-card rounded-[2.5rem] shadow-2xl shadow-purple-100 p-8 md:p-12 relative overflow-hidden">
            <form action="{{ route('petugas.store') }}" method="POST" class="space-y-6">
                @csrf
                
                <div class="space-y-2">
                    <label class="text-[11px] font-bold text-slate-400 uppercase tracking-widest ml-1">Username Unik</label>
                    <div class="relative group">
                        <i class="fas fa-at absolute left-5 top-1/2 -translate-y-1/2 text-slate-300 group-focus-within:text-purple-500 transition-colors"></i>
                        <input type="text" name="Username" class="w-full h-input pl-12 pr-6 rounded-2xl border-2 border-slate-50 bg-white/50 focus:bg-white focus:border-purple-400 focus:ring-4 focus:ring-purple-500/5 transition-all outline-none text-slate-700 font-medium" placeholder="Contoh: revan_admin" required>
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="text-[11px] font-bold text-slate-400 uppercase tracking-widest ml-1">Alamat Email Resmi</label>
                    <div class="relative group">
                        <i class="fas fa-envelope absolute left-5 top-1/2 -translate-y-1/2 text-slate-300 group-focus-within:text-purple-500 transition-colors"></i>
                        <input type="email" name="Email" class="w-full h-input pl-12 pr-6 rounded-2xl border-2 border-slate-50 bg-white/50 focus:bg-white focus:border-purple-400 focus:ring-4 focus:ring-purple-500/5 transition-all outline-none text-slate-700 font-medium" placeholder="revan@sekolah.sch.id" required>
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="text-[11px] font-bold text-slate-400 uppercase tracking-widest ml-1">Identitas Lengkap</label>
                    <div class="relative group">
                        <i class="fas fa-id-card absolute left-5 top-1/2 -translate-y-1/2 text-slate-300 group-focus-within:text-purple-500 transition-colors"></i>
                        <input type="text" name="NamaLengkap" class="w-full h-input pl-12 pr-6 rounded-2xl border-2 border-slate-50 bg-white/50 focus:bg-white focus:border-purple-400 focus:ring-4 focus:ring-purple-500/5 transition-all outline-none text-slate-700 font-medium" placeholder="Masukkan nama asli petugas..." required>
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="text-[11px] font-bold text-slate-400 uppercase tracking-widest ml-1">Kredensial Password</label>
                    <div class="relative group">
                        <i class="fas fa-key absolute left-5 top-1/2 -translate-y-1/2 text-slate-300 group-focus-within:text-purple-500 transition-colors"></i>
                        <input type="password" name="Password" class="w-full h-input pl-12 pr-6 rounded-2xl border-2 border-slate-50 bg-white/50 focus:bg-white focus:border-purple-400 focus:ring-4 focus:ring-purple-500/5 transition-all outline-none text-slate-700 font-medium" placeholder="Gunakan min. 4 karakter aman" required>
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="text-[11px] font-bold text-slate-400 uppercase tracking-widest ml-1">Level Otoritas</label>
                    <div class="relative">
                        <select name="role" class="w-full h-input pl-6 pr-6 rounded-2xl border-2 border-slate-50 bg-white/50 focus:border-purple-400 transition-all outline-none text-slate-600 font-medium appearance-none cursor-pointer" required>
                            <option value="petugas">Petugas Lapangan</option>
                            <option value="administrator">Administrator Utama</option>
                        </select>
                        <i class="fas fa-chevron-down absolute right-5 top-1/2 -translate-y-1/2 text-slate-300 text-[10px] pointer-events-none"></i>
                    </div>
                </div>

                <div class="pt-6 space-y-4">
                    <button type="submit" class="w-full h-input bg-purple-600 hover:bg-purple-700 text-white font-bold rounded-2xl shadow-lg shadow-purple-200 transition-all active:scale-[0.98]">
                        Daftarkan Akun Baru
                    </button>
                    <a href="{{ route('petugas.index') }}" class="flex items-center justify-center text-[10px] font-bold text-slate-400 hover:text-purple-600 uppercase tracking-tighter">
                        <i class="fas fa-arrow-left mr-2"></i> Kembali ke List
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>