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

<body class="purple-gradient min-h-screen flex items-center justify-center p-6">
    <div class="w-full max-w-md">
        
        <div class="flex flex-col items-center mb-10 group">
            <div class="w-16 h-16 bg-purple-600 rounded-2xl flex items-center justify-center shadow-xl shadow-purple-200 mb-4 transition-transform group-hover:scale-110">
                <i class="fas fa-book-open text-white text-2xl"></i>
            </div>
            <h1 class="text-2xl font-bold tracking-tight text-gray-800">Libris<span class="text-purple-600">Core</span></h1>
            <p class="text-sm text-gray-500 font-medium">Sistem Manajemen Perpustakaan Digital</p>
        </div>

        <div class="glass-effect rounded-[2.5rem] p-8 md:p-10 shadow-2xl shadow-purple-100">
            
            <div class="mb-8">
                <h2 class="text-xl font-bold text-gray-800">Otentikasi</h2>
                <p class="text-sm text-gray-500">Silahkan masuk untuk mengelola data pustaka.</p>
            </div>

            @if(session('success'))
                <div class="bg-emerald-50 text-emerald-600 p-4 rounded-xl text-sm mb-6 border border-emerald-100 animate-pulse">
                    <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
                </div>
            @endif

            @if($errors->has('loginError'))
                <div class="bg-rose-50 text-rose-600 p-4 rounded-xl text-sm mb-6 border border-rose-100">
                    <i class="fas fa-exclamation-circle mr-2"></i> {{ $errors->first('loginError') }}
                </div>
            @endif

            <form action="/login" method="POST" class="space-y-5">
                @csrf
                <div>
                    <label class="text-[11px] font-bold text-gray-400 uppercase tracking-widest ml-1 mb-2 block">Identitas Pengguna</label>
                    <input type="text" name="Username" 
                        class="w-full h-14 px-5 rounded-2xl bg-white border border-gray-100 focus:border-purple-500 focus:ring-4 focus:ring-purple-500/10 outline-none transition-all placeholder:text-gray-300 text-gray-700" 
                        placeholder="Username" required autofocus>
                </div>

                <div class="relative">
                    <label class="text-[11px] font-bold text-gray-400 uppercase tracking-widest ml-1 mb-2 block">Kata Sandi</label>
                    <input type="password" name="Password" 
                        class="w-full h-14 px-5 rounded-2xl bg-white border border-gray-100 focus:border-purple-500 focus:ring-4 focus:ring-purple-500/10 outline-none transition-all placeholder:text-gray-300 text-gray-700" 
                        placeholder="••••••••" required>
                </div>

                <button type="submit" 
                    class="w-full h-14 bg-purple-600 hover:bg-purple-700 text-white font-bold rounded-2xl shadow-lg shadow-purple-200 transition-all active:scale-[0.98] flex items-center justify-center space-x-2">
                    <span>Akses Dashboard</span>
                    <i class="fas fa-chevron-right text-[10px] opacity-70"></i>
                </button>
            </form>

            <div class="mt-8 pt-6 border-t border-gray-100 text-center">
                <p class="text-sm text-gray-500">
                    <a href="/register" class="text-purple-600 font-bold hover:underline ml-1">Daftarkan Akun</a>
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