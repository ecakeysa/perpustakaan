<script src="https://cdn.tailwindcss.com"></script>
<body class="bg-white">
    <div class="max-w-6xl mx-auto px-6 py-20">
        <div class="flex items-center gap-6 mb-16">
            <div class="w-16 h-16 bg-slate-900 rounded-2xl flex items-center justify-center text-white rotate-3">
                <i class="fas fa-history text-xl"></i>
            </div>
            <div>
                <h3 class="text-3xl font-black text-slate-800 tracking-tighter uppercase italic">Log <span class="text-purple-600 font-light">Aktivitas.</span></h3>
                <p class="text-slate-400 font-bold text-xs uppercase tracking-widest italic">Jejak literasi Anda</p>
            </div>
        </div>

        <div class="bg-white border border-slate-100 rounded-[3rem] overflow-hidden shadow-2xl shadow-slate-100">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-slate-50/80">
                        <tr class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] italic">
                            <th class="py-8 px-10 text-left">Informasi Pustaka</th>
                            <th class="py-8 text-left">Timeline</th>
                            <th class="py-8 px-10 text-center">Status Transaksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @forelse($pinjaman as $p)
                        <tr class="group hover:bg-purple-50/30 transition-all">
                            <td class="py-8 px-10">
                                <div class="flex items-center gap-4">
                                    <div class="w-10 h-10 bg-slate-100 rounded-xl flex items-center justify-center text-slate-400 group-hover:bg-purple-600 group-hover:text-white transition-all">
                                        <i class="fas fa-book-bookmark text-xs"></i>
                                    </div>
                                    <div>
                                        <span class="block font-black text-slate-800 text-sm uppercase tracking-tight">{{ $p->buku->Judul ?? 'Buku Terhapus' }}</span>
                                        <span class="text-[10px] font-bold text-slate-400 italic">Oleh: {{ $p->buku->Penulis ?? 'Anonim' }}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="py-8">
                                <div class="text-[10px] font-black text-slate-500 uppercase">
                                    <span class="text-purple-600">IN:</span> {{ \Carbon\Carbon::parse($p->TanggalPeminjaman)->format('d.m.Y') }}<br>
                                    <span class="text-emerald-500">OUT:</span> {{ $p->TanggalPengembalian ? \Carbon\Carbon::parse($p->TanggalPengembalian)->format('d.m.Y') : '--' }}
                                </div>
                            </td>
                            <td class="py-8 px-10 text-center">
                                @if($p->StatusPeminjaman == 'Sudah Dikembalikan')
                                    <span class="inline-block px-5 py-2 bg-emerald-50 text-emerald-600 text-[9px] font-black rounded-xl border border-emerald-100 uppercase italic">Terselesaikan</span>
                                @else
                                    <span class="inline-block px-5 py-2 bg-purple-50 text-purple-600 text-[9px] font-black rounded-xl border border-purple-100 uppercase italic animate-pulse">Sedang Aktif</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="3" class="py-24 text-center italic text-slate-300 font-bold uppercase tracking-widest text-sm">Tidak ada riwayat untuk ditampilkan.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>