<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    body { font-family: 'Inter', sans-serif; background: radial-gradient(at top right, #f5f3ff, #ffffff); }
    @media print {
        .d-print-none { display: none !important; }
        body { background: white !important; }
        .print-area { border: 1px solid #e2e8f0; border-radius: 0; padding: 0; }
    }
</style>

<body class="min-h-screen pb-10">
    <nav class="d-print-none sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-purple-100 py-4 px-6 mb-10">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-purple-600 rounded-xl flex items-center justify-center shadow-lg shadow-purple-200">
                    <i class="fas fa-file-invoice text-white"></i>
                </div>
                <span class="font-black text-slate-800 text-xl tracking-tighter">REPORT<span class="text-purple-600">CENTER.</span></span>
            </div>
            <a href="{{ route('dashboard') }}" class="h-10 px-5 flex items-center bg-slate-50 border border-slate-200 rounded-xl text-[11px] font-bold text-slate-500 hover:bg-purple-600 hover:text-white transition-all">
                <i class="fas fa-arrow-left mr-2"></i> KEMBALI
            </a>
        </div>
    </nav>

    <div class="max-w-6xl mx-auto px-6">
        <div class="hidden d-print-block text-center mb-10 border-b-4 border-slate-800 pb-4">
            <h1 class="text-2xl font-black uppercase">Arsip Laporan Transaksi Peminjaman</h1>
            <p class="font-bold">Perpustakaan Digital SMKN 11 Malang</p>
            <p class="text-xs text-slate-500 italic">Generate Date: {{ date('d M Y H:i') }}</p>
        </div>

        <div class="flex flex-col md:flex-row md:items-end justify-between mb-8 gap-4 d-print-none">
            <div>
                <h2 class="text-3xl font-black text-slate-800 tracking-tighter uppercase italic">Log <span class="text-purple-600">Aktivitas.</span></h2>
                <p class="text-slate-400 font-medium text-sm italic">Pantau dan dokumentasikan seluruh sirkulasi pustaka.</p>
            </div>
            <button onclick="window.print()" class="h-12 px-8 flex items-center bg-rose-500 hover:bg-rose-600 text-white text-[11px] font-black rounded-2xl shadow-xl shadow-rose-100 transition-all uppercase tracking-widest leading-none">
                <i class="fas fa-print mr-2"></i> Export PDF / Cetak
            </button>
        </div>

        @if(session('success'))
            <div class="mb-6 p-4 bg-emerald-50 border-l-4 border-emerald-500 text-emerald-700 text-sm font-bold rounded-r-xl d-print-none">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white/50 border border-slate-100 rounded-[2.5rem] overflow-hidden shadow-sm print-area">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50/50 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">
                            <th class="py-6 px-8">Identitas Peminjam</th>
                            <th>Detail Koleksi</th>
                            <th class="text-center">Tgl Pinjam</th>
                            <th class="text-center">Status</th>
                            <th class="text-right px-8 d-print-none">Opsi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @foreach($laporan as $lp)
                        <tr class="group hover:bg-white transition-all">
                            <td class="py-6 px-8">
                                <span class="block font-black text-slate-800 text-sm uppercase tracking-tight">{{ $lp->user->NamaLengkap ?? 'Anonim' }}</span>
                                <span class="text-[10px] font-bold text-slate-400 italic">Member Aktif</span>
                            </td>
                            <td>
                                <span class="px-3 py-1 bg-purple-50 text-purple-600 text-[10px] font-black rounded-lg uppercase inline-block mb-1">{{ $lp->buku->Judul ?? 'Buku Dihapus' }}</span>
                            </td>
                            <td class="text-center">
                                <span class="text-xs font-bold text-slate-500">{{ \Carbon\Carbon::parse($lp->TanggalPeminjaman)->format('d M Y') }}</span>
                            </td>
                            <td class="text-center">
                                @if($lp->StatusPeminjaman == 'Sudah Dikembalikan')
                                    <span class="inline-flex items-center px-4 py-1.5 rounded-full bg-emerald-50 text-emerald-600 text-[9px] font-black uppercase tracking-tighter border border-emerald-100">
                                        <i class="fas fa-check-circle mr-1.5"></i> Arsip
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-4 py-1.5 rounded-full bg-amber-50 text-amber-600 text-[9px] font-black uppercase tracking-tighter border border-amber-100 shadow-sm animate-pulse">
                                        <i class="fas fa-clock mr-1.5"></i> Aktif
                                    </span>
                                @endif
                            </td>
                            <td class="text-right px-8 d-print-none">
                                @if($lp->StatusPeminjaman == 'Dipinjam')
                                    <form action="{{ route('peminjaman.kembali', $lp->PeminjamanID) }}" method="POST">
                                        @csrf @method('PUT')
                                        <button type="submit" onclick="return confirm('Selesaikan transaksi?')" class="h-9 px-4 bg-slate-800 hover:bg-purple-600 text-white text-[9px] font-black rounded-xl transition-all uppercase tracking-widest leading-none shadow-lg shadow-slate-200">
                                            Verify
                                        </button>
                                    </form>
                                @else
                                    <i class="fas fa-check-double text-slate-200 text-sm"></i>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="hidden d-print-grid grid-cols-2 mt-16 text-sm font-bold italic">
            <div></div>
            <div class="text-center">
                <p>Malang, {{ date('d M Y') }}</p>
                <p class="mb-20 uppercase tracking-widest">Otoritas Perpustakaan</p>
                <p class="underline decoration-2">{{ auth()->user()->NamaLengkap }}</p>
            </div>
        </div>
    </div>
</body>