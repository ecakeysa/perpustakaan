<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    body {
        font-family: 'Inter', sans-serif;
    }

    .glass {
        background: rgba(255, 255, 255, 0.7);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.3);
    }

    .bg-gradient {
        background: radial-gradient(circle at top right, #f3e8ff, #ffffff, #e0e7ff);
        background-attachment: fixed;
    }
</style>

<body class="bg-gradient min-h-screen pb-12">
    <nav class="sticky top-0 z-50 glass border-b border-purple-100 mb-10">
        <div class="max-w-5xl mx-auto px-6 h-20 flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <div
                    class="w-10 h-10 bg-purple-600 rounded-xl flex items-center justify-center shadow-lg shadow-purple-200">
                    <i class="fas fa-layer-group text-white text-sm"></i>
                </div>
                <span class="text-xl font-bold tracking-tight text-gray-800">Libris<span
                        class="text-purple-600">Core</span></span>
            </div>
            <a href="/dashboard"
                class="text-sm font-bold text-gray-500 hover:text-purple-600 transition-all flex items-center">
                <i class="fas fa-arrow-left mr-2 text-[10px]"></i> Dashboard
            </a>
        </div>
    </nav>

    <div class="max-w-5xl mx-auto px-6">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-10">
            <div>
                <h2 class="text-3xl font-bold text-gray-800 tracking-tight">Katalog Kategori</h2>
                <p class="text-gray-500 mt-1">Organisir genre dan klasifikasi buku perpustakaan.</p>
            </div>
            <button data-bs-toggle="modal" data-bs-target="#modalTambah"
                class="h-14 px-8 bg-purple-600 hover:bg-purple-700 text-white font-bold rounded-2xl shadow-xl shadow-purple-200 transition-all active:scale-95 flex items-center justify-center space-x-2">
                <i class="fas fa-plus-circle"></i> <span>Entri Baru</span>
            </button>
        </div>

        @if(session('success'))
            <div
                class="bg-emerald-50 text-emerald-600 p-5 rounded-2xl text-sm mb-8 border border-emerald-100 flex items-center animate-bounce">
                <i class="fas fa-check-circle mr-3 text-lg"></i> {{ session('success') }}
            </div>
        @endif

        <div class="glass rounded-[2.5rem] overflow-hidden shadow-2xl shadow-purple-100/50">
            <table class="w-full">
                <thead>
                    <tr
                        class="text-[11px] font-bold text-gray-400 uppercase tracking-[0.2em] border-b border-purple-50">
                        <th class="px-8 py-6 text-center w-20">No</th>
                        <th class="px-4 py-6 text-left">Label Kategori</th>
                        <th class="px-8 py-6 text-right">Opsi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-purple-50">
                    @forelse($kategori as $index => $k)
                        <tr class="group hover:bg-white/50 transition-all">
                            <td class="px-8 py-6 text-center text-sm font-bold text-gray-400">{{ $index + 1 }}</td>
                            <td
                                class="px-4 py-6 text-lg font-semibold text-gray-700 group-hover:text-purple-600 transition-colors">
                                {{ $k->NamaKategori }}</td>
                            <td class="px-8 py-6">
                                <form action="{{ route('kategori.destroy', $k->KategoriID) }}" method="POST"
                                    class="flex justify-end">
                                    @csrf @method('DELETE')
                                    <button onclick="return confirm('Hapus klasifikasi ini?')"
                                        class="w-12 h-12 flex items-center justify-center bg-rose-50 text-rose-500 rounded-2xl hover:bg-rose-500 hover:text-white transition-all shadow-sm">
                                        <i class="fas fa-trash-alt text-sm"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-8 py-24 text-center">
                                <div class="text-gray-300 text-5xl mb-4"><i class="fas fa-inbox"></i></div>
                                <p class="text-gray-400 font-medium">Belum ada data yang tersimpan.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="modalTambah" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content !rounded-[2.5rem] border-0 glass p-4 shadow-2xl">
                <form action="{{ route('kategori.store') }}" method="POST">
                    @csrf
                    <div class="p-8">
                        <h5 class="text-2xl font-bold text-gray-800 mb-2">Tambah Klasifikasi</h5>
                        <p class="text-sm text-gray-500 mb-8">Gunakan nama yang unik untuk kategori buku.</p>

                        <div class="mb-8">
                            <label
                                class="text-[11px] font-bold text-gray-400 uppercase tracking-widest ml-1 mb-3 block">Nama
                                Kategori</label>
                            <input type="text" name="NamaKategori"
                                class="w-full h-14 px-6 rounded-2xl bg-white border border-gray-100 focus:border-purple-500 focus:ring-4 focus:ring-purple-500/10 outline-none transition-all placeholder:text-gray-300 text-gray-700"
                                placeholder="Misal: Sains & Teknologi" required>
                        </div>

                        <div class="flex gap-4">
                            <button type="button" data-bs-dismiss="modal"
                                class="flex-1 h-14 rounded-2xl font-bold text-gray-400 hover:bg-gray-50 transition-all">Batal</button>
                            <button type="submit"
                                class="flex-[2] h-14 bg-purple-600 text-white rounded-2xl font-bold shadow-lg shadow-purple-200 transition-all hover:bg-purple-700 active:scale-95">Simpan
                                Kategori</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>