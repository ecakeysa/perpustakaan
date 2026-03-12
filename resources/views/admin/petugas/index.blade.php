<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    body { font-family: 'Inter', sans-serif; }
    .bg-gradient-soft { background: radial-gradient(circle at top right, #f5f3ff, #ffffff, #faf5ff); background-attachment: fixed; }
    .glass-panel { background: rgba(255, 255, 255, 0.7); backdrop-filter: blur(12px); border: 1px solid rgba(255, 255, 255, 0.4); }
</style>

<body class="bg-gradient-soft min-h-screen pb-20">
    <nav class="sticky top-0 z-50 glass-panel border-b border-purple-100 mb-12">
        <div class="max-w-6xl mx-auto px-6 h-20 flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <div class="w-11 h-11 bg-gradient-to-tr from-purple-600 to-indigo-600 rounded-2xl flex items-center justify-center shadow-lg shadow-purple-200">
                    <i class="fas fa-users-cog text-white text-lg"></i>
                </div>
                <div>
                    <span class="text-xl font-black tracking-tighter text-slate-800 uppercase">Libris<span class="text-purple-600">Auth</span></span>
                </div>
            </div>
            <a href="/dashboard" class="group flex items-center text-sm font-bold text-slate-400 hover:text-purple-600 transition-all">
                <i class="fas fa-arrow-left mr-2 text-[10px] group-hover:-translate-x-1 transition-transform"></i> Panel Utama
            </a>
        </div>
    </nav>

    <div class="max-w-6xl mx-auto px-6">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-10">
            <div class="space-y-1">
                <h2 class="text-3xl font-bold text-slate-800 tracking-tight italic">Direktori Otoritas</h2>
                <p class="text-slate-500 font-medium">Manajemen verifikasi dan level akses staf perpustakaan.</p>
            </div>
            <a href="{{ route('petugas.create') }}" 
                class="h-14 px-8 bg-purple-600 hover:bg-purple-700 text-white font-bold rounded-[1.25rem] shadow-xl shadow-purple-200 transition-all active:scale-95 flex items-center justify-center space-x-3">
                <i class="fas fa-plus-circle text-lg"></i>
                <span>Registrasi Petugas</span>
            </a>
        </div>

        @if(session('success'))
            <div class="bg-white border-l-4 border-emerald-500 p-5 rounded-2xl shadow-sm mb-8 flex items-center animate-in fade-in slide-in-from-top-4 duration-500">
                <div class="w-8 h-8 bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center mr-4">
                    <i class="fas fa-check text-xs"></i>
                </div>
                <span class="text-sm font-bold text-slate-600">{{ session('success') }}</span>
            </div>
        @endif

        <div class="glass-panel rounded-[2.5rem] shadow-2xl shadow-purple-100/50 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-purple-50">
                            <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] text-center w-20">No</th>
                            <th class="px-4 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Kredensial Akun</th>
                            <th class="px-4 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Identitas Pegawai</th>
                            <th class="px-4 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] text-center">Otoritas</th>
                            <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] text-right">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-purple-50/50">
                        @foreach($petugas as $index => $p)
                        <tr class="group hover:bg-white/60 transition-colors">
                            <td class="px-8 py-6 text-center">
                                <span class="text-sm font-bold text-slate-300 group-hover:text-purple-400 transition-colors">{{ $index + 1 }}</span>
                            </td>
                            <td class="px-4 py-6">
                                <div class="flex flex-col">
                                    <span class="text-base font-bold text-slate-700">@ {{ $p->Username }}</span>
                                    <span class="text-xs font-medium text-slate-400">{{ $p->Email }}</span>
                                </div>
                            </td>
                            <td class="px-4 py-6">
                                <span class="text-sm font-semibold text-slate-600 tracking-tight">{{ $p->NamaLengkap }}</span>
                            </td>
                            <td class="px-4 py-6 text-center">
                                @if($p->role == 'administrator')
                                    <span class="inline-flex items-center px-4 py-1.5 rounded-full bg-purple-50 text-purple-600 text-[10px] font-black uppercase tracking-widest border border-purple-100">
                                        <i class="fas fa-crown mr-1.5 text-[8px]"></i> Admin
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-4 py-1.5 rounded-full bg-slate-50 text-slate-500 text-[10px] font-black uppercase tracking-widest border border-slate-100">
                                        <i class="fas fa-user-tag mr-1.5 text-[8px]"></i> Staf
                                    </span>
                                @endif
                            </td>
                            <td class="px-8 py-6">
                                <div class="flex justify-end items-center space-x-3">
                                    <a href="{{ route('petugas.edit', $p->UserID) }}" 
                                        class="w-10 h-10 flex items-center justify-center rounded-xl bg-white border border-slate-100 text-amber-500 hover:bg-amber-500 hover:text-white transition-all shadow-sm">
                                        <i class="fas fa-pencil-alt text-xs"></i>
                                    </a>

                                    @if($p->UserID != auth()->user()->UserID)
                                    <form action="{{ route('petugas.destroy', $p->UserID) }}" method="POST" class="m-0">
                                        @csrf @method('DELETE')
                                        <button onclick="return confirm('Hapus otoritas petugas ini?')" 
                                            class="w-10 h-10 flex items-center justify-center rounded-xl bg-white border border-slate-100 text-rose-500 hover:bg-rose-500 hover:text-white transition-all shadow-sm">
                                            <i class="fas fa-trash-alt text-xs"></i>
                                        </button>
                                    </form>
                                    @else
                                    <div class="w-10 h-10 flex items-center justify-center rounded-xl bg-slate-50 text-slate-300 border border-dashed border-slate-200" title="Sesi Aktif">
                                        <i class="fas fa-lock text-xs"></i>
                                    </div>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            @if($petugas->isEmpty())
            <div class="py-24 text-center">
                <div class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-4 border border-dashed border-slate-200">
                    <i class="fas fa-folder-open text-slate-200 text-2xl"></i>
                </div>
                <p class="text-slate-400 font-bold tracking-tight uppercase text-xs">Basis data kosong</p>
            </div>
            @endif
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>