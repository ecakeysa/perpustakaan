<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    body { font-family: 'Inter', sans-serif; background: #fafafa; }
    .review-card { border-radius: 2rem; transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); }
    .review-card:hover { transform: translateY(-5px); }
</style>

<div class="max-w-5xl mx-auto py-16 px-6">
    <div class="flex flex-col md:flex-row justify-between items-center mb-16 gap-6">
        <div class="text-center md:text-left">
            <h2 class="text-4xl font-black text-slate-800 tracking-tighter uppercase italic">Suara <span class="text-purple-600 font-normal">Pembaca.</span></h2>
            <div class="h-1 w-20 bg-purple-600 mt-2 mx-auto md:mx-0 rounded-full"></div>
        </div>
        <a href="{{ route('buku.index') }}" class="h-12 px-8 flex items-center bg-white border border-slate-200 rounded-2xl text-[11px] font-black text-slate-500 hover:text-purple-600 hover:border-purple-200 transition-all shadow-sm uppercase tracking-widest">
            <i class="fas fa-arrow-left mr-3"></i> Katalog
        </a>
    </div>

    <div class="grid grid-cols-1 gap-6">
        @forelse($ulasan as $u)
            <div class="review-card bg-white p-8 border border-slate-100 shadow-sm hover:shadow-xl hover:shadow-purple-100/50 flex flex-col md:flex-row gap-8 items-start relative overflow-hidden">
                <div class="absolute top-0 right-0 p-6">
                    <div class="bg-amber-50 px-4 py-2 rounded-2xl border border-amber-100 flex items-center gap-2">
                        <i class="fas fa-star text-amber-400 text-sm"></i>
                        <span class="font-black text-amber-700 text-sm">{{ $u->Rating }}</span>
                    </div>
                </div>

                <div class="w-16 h-16 bg-gradient-to-tr from-purple-600 to-indigo-600 rounded-2xl flex-shrink-0 flex items-center justify-center text-white shadow-lg shadow-purple-200">
                    <span class="text-xl font-black uppercase">{{ substr($u->user->NamaLengkap, 0, 1) }}</span>
                </div>

                <div class="flex-1 pt-1">
                    <div class="flex flex-wrap items-center gap-3 mb-3">
                        <h4 class="font-black text-slate-800 text-lg uppercase tracking-tight">{{ $u->user->NamaLengkap }}</h4>
                        <span class="px-3 py-0.5 bg-slate-100 rounded-full text-[9px] font-bold text-slate-400 uppercase tracking-widest">Verified Reader</span>
                    </div>
                    
                    <div class="mb-4">
                        <span class="text-[10px] font-black text-purple-600 uppercase tracking-[0.2em] block mb-2">Mengulas Buku:</span>
                        <div class="inline-block px-4 py-2 bg-purple-50 rounded-xl border border-purple-100 font-bold text-slate-700 text-sm italic">
                            "{{ $u->buku->Judul }}"
                        </div>
                    </div>

                    <p class="text-slate-500 leading-relaxed font-medium italic text-lg pr-12">
                        <i class="fas fa-quote-left text-slate-100 text-4xl absolute -z-10 mt-[-10px] ml-[-15px]"></i>
                        {{ $u->Ulasan }}
                    </p>
                </div>
            </div>
        @empty
            <div class="text-center py-20 bg-slate-50 rounded-[3rem] border-2 border-dashed border-slate-200">
                <i class="fas fa-comment-slash text-slate-200 text-6xl mb-6"></i>
                <p class="text-slate-400 font-black uppercase tracking-widest italic">Belum ada jejak ulasan ditemukan.</p>
            </div>
        @endforelse
    </div>
</div>