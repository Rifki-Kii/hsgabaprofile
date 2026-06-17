<div>
    @section('header_title', 'Dashboard Utama')

    <!-- Welcome Card -->
    <div class="bg-gradient-to-r from-blue-900 to-blue-700 rounded-xl p-5 text-white mb-6 shadow-sm relative overflow-hidden">
        <div class="relative z-10">
            <h1 class="text-lg font-bold tracking-tight">Selamat Datang di Panel Konten</h1>
            <p class="text-blue-100 text-xs mt-1.5 max-w-xl">
                Melalui panel ini, Anda dapat mengelola semua konten website Homeschooling ABA secara instan, dinamis, dan langsung terlihat di website utama.
            </p>
        </div>
        <div class="absolute -right-6 -bottom-6 opacity-10">
            <i class="fa-solid fa-graduation-cap text-[120px]"></i>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4 mb-6">
        <!-- Hero Slides -->
        <a href="{{ route('admin.heroes') }}" class="bg-white p-4 rounded-xl border border-slate-200 hover:border-blue-500 shadow-xs transition-all duration-300 hover:shadow-sm hover:-translate-y-0.5 block group">
            <div class="flex items-center justify-between mb-3">
                <span class="text-xs font-semibold text-slate-500">Hero Slide</span>
                <div class="w-8 h-8 bg-blue-50 group-hover:bg-blue-600 group-hover:text-white rounded-lg flex items-center justify-center text-blue-600 transition-colors">
                    <i class="fa-solid fa-images text-sm"></i>
                </div>
            </div>
            <div class="text-xl font-bold text-slate-800">{{ $stats['heroes'] }}</div>
            <span class="text-[10px] text-slate-400 mt-1 block">Edit banner utama →</span>
        </a>

        <!-- Programs -->
        <a href="{{ route('admin.programs') }}" class="bg-white p-4 rounded-xl border border-slate-200 hover:border-blue-500 shadow-xs transition-all duration-300 hover:shadow-sm hover:-translate-y-0.5 block group">
            <div class="flex items-center justify-between mb-3">
                <span class="text-xs font-semibold text-slate-500">Program</span>
                <div class="w-8 h-8 bg-cyan-50 group-hover:bg-cyan-600 group-hover:text-white rounded-lg flex items-center justify-center text-cyan-600 transition-colors">
                    <i class="fa-solid fa-graduation-cap text-sm"></i>
                </div>
            </div>
            <div class="text-xl font-bold text-slate-800">{{ $stats['programs'] }}</div>
            <span class="text-[10px] text-slate-400 mt-1 block">Program akademik →</span>
        </a>

        <!-- Facilities -->
        <a href="{{ route('admin.facilities') }}" class="bg-white p-4 rounded-xl border border-slate-200 hover:border-blue-500 shadow-xs transition-all duration-300 hover:shadow-sm hover:-translate-y-0.5 block group">
            <div class="flex items-center justify-between mb-3">
                <span class="text-xs font-semibold text-slate-500">Fasilitas</span>
                <div class="w-8 h-8 bg-orange-50 group-hover:bg-orange-600 group-hover:text-white rounded-lg flex items-center justify-center text-orange-600 transition-colors">
                    <i class="fa-solid fa-building text-sm"></i>
                </div>
            </div>
            <div class="text-xl font-bold text-slate-800">{{ $stats['facilities'] }}</div>
            <span class="text-[10px] text-slate-400 mt-1 block">Fasilitas sekolah →</span>
        </a>

        <!-- Gallery -->
        <a href="{{ route('admin.gallery') }}" class="bg-white p-4 rounded-xl border border-slate-200 hover:border-blue-500 shadow-xs transition-all duration-300 hover:shadow-sm hover:-translate-y-0.5 block group">
            <div class="flex items-center justify-between mb-3">
                <span class="text-xs font-semibold text-slate-500">Galeri Momen</span>
                <div class="w-8 h-8 bg-purple-50 group-hover:bg-purple-600 group-hover:text-white rounded-lg flex items-center justify-center text-purple-600 transition-colors">
                    <i class="fa-solid fa-photo-film text-sm"></i>
                </div>
            </div>
            <div class="text-xl font-bold text-slate-800">{{ $stats['gallery'] }}</div>
            <span class="text-[10px] text-slate-400 mt-1 block">Dokumentasi foto →</span>
        </a>

        <!-- FAQs -->
        <a href="{{ route('admin.faqs') }}" class="bg-white p-4 rounded-xl border border-slate-200 hover:border-blue-500 shadow-xs transition-all duration-300 hover:shadow-sm hover:-translate-y-0.5 block group">
            <div class="flex items-center justify-between mb-3">
                <span class="text-xs font-semibold text-slate-500">FAQ</span>
                <div class="w-8 h-8 bg-emerald-50 group-hover:bg-emerald-600 group-hover:text-white rounded-lg flex items-center justify-center text-emerald-600 transition-colors">
                    <i class="fa-solid fa-circle-question text-sm"></i>
                </div>
            </div>
            <div class="text-xl font-bold text-slate-800">{{ $stats['faqs'] }}</div>
            <span class="text-[10px] text-slate-400 mt-1 block">Tanya-jawab umum →</span>
        </a>
    </div>

    <!-- Quick Guide for Beginner Admin -->
    <div class="bg-white p-5 rounded-xl border border-slate-200 shadow-xs">
        <h3 class="text-xs font-bold text-slate-800 uppercase tracking-wider mb-4 flex items-center gap-2">
            <i class="fa-solid fa-circle-info text-blue-600"></i>
            <span>Panduan Cepat Admin Pemula</span>
        </h3>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-[11px] text-slate-600">
            <div class="p-4 bg-slate-50 rounded-lg border border-slate-100">
                <div class="flex items-center gap-2 mb-2">
                    <span class="w-5 h-5 bg-blue-100 text-blue-700 font-bold rounded-full flex items-center justify-center text-[10px]">1</span>
                    <h4 class="font-bold text-slate-700">Gunakan Foto Sesuai Ukuran</h4>
                </div>
                <p class="leading-relaxed">
                    Untuk hasil terbaik di slide banner dan galeri, gunakan foto mendatar (landscape). Batas ukuran foto adalah <strong>2 Megabyte (MB)</strong>. Jika foto terlalu besar, kompres terlebih dahulu agar loading web tetap cepat.
                </p>
            </div>

            <div class="p-4 bg-slate-50 rounded-lg border border-slate-100">
                <div class="flex items-center gap-2 mb-2">
                    <span class="w-5 h-5 bg-cyan-100 text-cyan-700 font-bold rounded-full flex items-center justify-center text-[10px]">2</span>
                    <h4 class="font-bold text-slate-700">Pengurutan Tampilan (Sort Order)</h4>
                </div>
                <p class="leading-relaxed">
                    Setiap menu memiliki kolom <strong>Urutan Tampilan</strong>. Masukkan angka bulat (0, 1, 2, dst.). Konten dengan angka lebih kecil akan tampil paling awal di halaman utama.
                </p>
            </div>

            <div class="p-4 bg-slate-50 rounded-lg border border-slate-100">
                <div class="flex items-center gap-2 mb-2">
                    <span class="w-5 h-5 bg-emerald-100 text-emerald-700 font-bold rounded-full flex items-center justify-center text-[10px]">3</span>
                    <h4 class="font-bold text-slate-700">Hubungkan WhatsApp & Sosial Media</h4>
                </div>
                <p class="leading-relaxed">
                    Ubah nomor kontak sekolah di menu <strong>Informasi Website</strong>. Pastikan nomor WA diawali dengan <strong>62</strong> (contoh: <code>628121496464</code>) tanpa tanda tambah (+), spasi, atau tanda hubung.
                </p>
            </div>
        </div>
    </div>
</div>
