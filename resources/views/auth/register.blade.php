<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    body { font-family: 'Inter', sans-serif; }
    .glass-effect {
        background: rgba(255, 255, 255, 0.85);
        backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.3);
    }
    .purple-gradient {
        background: radial-gradient(circle at top right, #f3e8ff, #ffffff, #e0e7ff);
    }
</style>

<body class="purple-gradient min-h-screen flex items-center justify-center p-6 py-12">
    <div class="w-full max-w-2xl">
        
        <div class="flex flex-col items-center mb-10 group">
            <div class="w-16 h-16 bg-purple-600 rounded-2xl flex items-center justify-center shadow-xl shadow-purple-200 mb-4 transition-transform group-hover:scale-110">
                <i class="fas fa-user-plus text-white text-2xl"></i>
            </div>
            <h1 class="text-2xl font-bold tracking-tight text-gray-800">Libris<span class="text-purple-600">Core</span></h1>
            <p class="text-sm text-gray-500 font-medium">Buat identitas akses pustaka Anda</p>
        </div>

        <div class="glass-effect rounded-[2.5rem] p-8 md:p-12 shadow-2xl shadow-purple-100">
            
            <div class="mb-10 text-center md:text-left">
                <h2 class="text-2xl font-bold text-gray-800">Registrasi Anggota</h2>
                <p class="text-sm text-gray-500">Lengkapi formulir di bawah untuk bergabung.</p>
            </div>

            <form action="/register" method="POST" class="space-y-6">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="text-[11px] font-bold text-gray-400 uppercase tracking-widest ml-1 mb-2 block">Username</label>
                        <input type="text" name="Username" 
                            class="w-full h-14 px-5 rounded-2xl bg-white border border-gray-100 focus:border-purple-500 focus:ring-4 focus:ring-purple-500/10 outline-none transition-all placeholder:text-gray-300 text-gray-700" 
                            placeholder="@username" required>
                    </div>

                    <div>
                        <label class="text-[11px] font-bold text-gray-400 uppercase tracking-widest ml-1 mb-2 block">Surel Aktif</label>
                        <input type="email" name="Email" 
                            class="w-full h-14 px-5 rounded-2xl bg-white border border-gray-100 focus:border-purple-500 focus:ring-4 focus:ring-purple-500/10 outline-none transition-all placeholder:text-gray-300 text-gray-700" 
                            placeholder="nama@provider.com" required>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="text-[11px] font-bold text-gray-400 uppercase tracking-widest ml-1 mb-2 block">Kata Sandi</label>
                        <input type="password" name="Password" 
                            class="w-full h-14 px-5 rounded-2xl bg-white border border-gray-100 focus:border-purple-500 focus:ring-4 focus:ring-purple-500/10 outline-none transition-all placeholder:text-gray-300 text-gray-700" 
                            placeholder="••••••••" required>
                    </div>

                    <div>
                        <label class="text-[11px] font-bold text-gray-400 uppercase tracking-widest ml-1 mb-2 block">Nama Lengkap</label>
                        <input type="text" name="NamaLengkap" 
                            class="w-full h-14 px-5 rounded-2xl bg-white border border-gray-100 focus:border-purple-500 focus:ring-4 focus:ring-purple-500/10 outline-none transition-all placeholder:text-gray-300 text-gray-700" 
                            placeholder="Sesuai KTP/Kartu Pelajar" required>
                    </div>
                </div>

                <div>
                    <label class="text-[11px] font-bold text-gray-400 uppercase tracking-widest ml-1 mb-2 block">Domisili</label>
                    <textarea name="Alamat" rows="2"
                        class="w-full p-5 rounded-2xl bg-white border border-gray-100 focus:border-purple-500 focus:ring-4 focus:ring-purple-500/10 outline-none transition-all placeholder:text-gray-300 text-gray-700 resize-none" 
                        placeholder="Tuliskan alamat lengkap tempat tinggal..." required></textarea>
                </div>

                <div class="pt-4">
                    <button type="submit" 
                        class="w-full h-14 bg-purple-600 hover:bg-purple-700 text-white font-bold rounded-2xl shadow-lg shadow-purple-200 transition-all active:scale-[0.98] flex items-center justify-center space-x-2">
                        <span>Konfirmasi & Daftar</span>
                        <i class="fas fa-check-circle text-[10px] opacity-70"></i>
                    </button>
                </div>
            </form>

            <div class="mt-10 pt-6 border-t border-gray-100 text-center">
                <p class="text-sm text-gray-500">
                    Sudah terdaftar sebelumnya? 
                    <a href="/login" class="text-purple-600 font-bold hover:underline ml-1">Masuk Sekarang</a>
                </p>
            </div>
        </div>

        <footer class="mt-12 text-center">
            <p class="text-[11px] text-gray-400 font-medium uppercase tracking-[0.2em]">
                &copy; 2026 Core Engine &bull; SMKN 11 Malang
            </p>
        </footer>
    </div>
</body>