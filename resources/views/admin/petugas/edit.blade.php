<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    body { font-family: 'Inter', sans-serif; background: radial-gradient(at top left, #fdfaff, #ffffff, #f5f3ff); background-attachment: fixed; }
    .glass-card { background: rgba(255, 255, 255, 0.85); backdrop-filter: blur(15px); border: 1px solid rgba(255, 255, 255, 0.6); }
    .h-input { height: 3.5rem; }
</style>

<body class="min-h-screen py-16 px-4">
    <div class="max-w-xl mx-auto">
        <div class="text-center mb-10">
            <div class="inline-flex items-center justify-center w-14 h-14 bg-indigo-600 rounded-2xl shadow-xl shadow-indigo-200 mb-4 scale-110">
                <i class="fas fa-user-gear text-white text-xl"></i>
            </div>
            <h1 class="text-2xl font-extrabold tracking-tight text-slate-800 uppercase">Update <span class="text-indigo-600">Kredensial</span></h1>
            <p class="text-slate-400 text-sm mt-1">ID Pengguna: #{{ $petugas->UserID }}</p>
        </div>

        <div class="glass-card rounded-[2.5rem] shadow-2xl shadow-indigo-100 p-8 md:p-12 relative overflow-hidden border-t-4 border-t-indigo-500">
            <form action="{{ route('petugas.update', $petugas->UserID) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="space-y-2">
                    <label class="text-[11px] font-bold text-slate-400 uppercase tracking-widest ml-1">Username</label>
                    <input type="text" name="Username" value="{{ $petugas->Username }}" class="w-full h-input px-6 rounded-2xl border-2 border-slate-50 bg-white/50 focus:border-indigo-400 transition-all outline-none text-slate-700 font-semibold" required>
                </div>

                <div class="space-y-2">
                    <label class="text-[11px] font-bold text-slate-400 uppercase tracking-widest ml-1">Email Aktif</label>
                    <input type="email" name="Email" value="{{ $petugas->Email }}" class="w-full h-input px-6 rounded-2xl border-2 border-slate-50 bg-white/50 focus:border-indigo-400 transition-all outline-none text-slate-700 font-semibold" required>
                </div>

                <div class="space-y-2">
                    <label class="text-[11px] font-bold text-slate-400 uppercase tracking-widest ml-1">Nama Lengkap</label>
                    <input type="text" name="NamaLengkap" value="{{ $petugas->NamaLengkap }}" class="w-full h-input px-6 rounded-2xl border-2 border-slate-50 bg-white/50 focus:border-indigo-400 transition-all outline-none text-slate-700 font-semibold" required>
                </div>

                <div class="p-6 bg-amber-50 rounded-3xl border border-amber-100 space-y-3">
                    <label class="text-[11px] font-bold text-amber-600 uppercase tracking-widest block">Ganti Password (Opsional)</label>
                    <input type="password" name="Password" class="w-full h-input px-6 rounded-2xl border-2 border-white bg-white/80 focus:border-amber-400 transition-all outline-none text-slate-700 font-medium" placeholder="Biarkan kosong jika tetap">
                    <p class="text-[10px] text-amber-500 font-medium italic"><i class="fas fa-info-circle mr-1"></i> Isi hanya jika ingin memperbarui kunci akses.</p>
                </div>

                <div class="space-y-2">
                    <label class="text-[11px] font-bold text-slate-400 uppercase tracking-widest ml-1">Level Akses</label>
                    <select name="role" class="w-full h-input px-6 rounded-2xl border-2 border-slate-50 bg-white focus:border-indigo-400 outline-none text-slate-600 font-bold appearance-none cursor-pointer" required>
                        <option value="petugas" {{ $petugas->role == 'petugas' ? 'selected' : '' }}>Petugas Perpustakaan</option>
                        <option value="administrator" {{ $petugas->role == 'administrator' ? 'selected' : '' }}>Administrator Utama</option>
                    </select>
                </div>

                <div class="pt-6 flex flex-col gap-4">
                    <button type="submit" class="w-full h-input bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-2xl shadow-lg shadow-indigo-100 transition-all">
                        Simpan Perubahan
                    </button>
                    <a href="{{ route('petugas.index') }}" class="text-center text-[10px] font-bold text-slate-400 hover:text-indigo-600 uppercase">Batal dan Kembali</a>
                </div>
            </form>
        </div>
    </div>
</body>