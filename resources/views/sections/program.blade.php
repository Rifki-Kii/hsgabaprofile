<section id="program" class="py-20 bg-gradient-to-br from-blue-50 via-white to-yellow-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Header Section -->
        <div class="text-center mb-12">
            <div class="inline-block">
                <div class="flex justify-center mb-4">
                    <div class="w-16 h-1 bg-yellow-400 rounded-full"></div>
                </div>
                <span class="text-yellow-600 font-semibold text-sm uppercase tracking-wider">Program Unggulan</span>
            </div>
            <h2
                class="text-4xl md:text-5xl font-bold mt-4 mb-4 bg-gradient-to-r from-blue-700 to-blue-500 bg-clip-text text-transparent">
                Program Homeschooling
            </h2>
            <p class="text-gray-600 max-w-2xl mx-auto text-lg">
                Tersedia Untuk Jenjang Pendidikan SD, SMP & SMA
            </p>
        </div>

        <!-- Grid: Program Unggulan (6) + Kegiatan Pendukung (2) = 8 item dengan BACKGROUND GAMBAR -->
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 mb-16">
            @php
                $colorMap = [
                    'blue' => 'from-blue-500 to-blue-600',
                    'yellow' => 'from-yellow-400 to-yellow-500',
                    'green' => 'from-green-500 to-green-600',
                    'purple' => 'from-purple-500 to-purple-600',
                    'pink' => 'from-pink-500 to-pink-600',
                    'orange' => 'from-orange-500 to-orange-600',
                    'yellow-accent' => 'from-orange-400 to-orange-500',
                    'green-accent' => 'from-green-400 to-green-500',
                ];
            @endphp

            @forelse($programs as $index => $program)
            @php
                $gradientClass = $colorMap[$program->badge_color] ?? 'from-blue-500 to-blue-600';
                $imagePath = $program->image_path;
                if (empty($imagePath)) {
                    $imagePath = 'https://placehold.co/600x400/1E3A8A/FFFFFF?text=' . urlencode($program->title);
                } elseif (!str_starts_with($imagePath, 'http://') && !str_starts_with($imagePath, 'https://')) {
                    $imagePath = asset($imagePath);
                }
            @endphp
            <div class="program-card group bg-cover bg-center rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden relative"
                style="background-image: url('{{ $imagePath }}');">
                <div
                    class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/50 to-black/30 group-hover:from-black/70 group-hover:via-black/40 transition duration-300">
                </div>
                <div
                    class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r {{ $gradientClass }} transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left">
                </div>
                <div class="relative z-10 p-5 text-center min-h-[220px] flex flex-col justify-between">
                    <div
                        class="w-14 h-14 mx-auto mb-3 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center group-hover:scale-110 transition-transform duration-300 border border-white/30">
                        <span class="text-2xl">{{ $program->icon ?? '📜' }}</span>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-white mb-1">{{ $program->title }}</h3>
                        <p class="text-white/80 text-xs">{{ $program->description }}</p>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center text-gray-500 py-8">
                Belum ada program unggulan.
            </div>
            @endforelse
        </div>

        <!-- Pelajaran Akademik -->
        <div class="bg-white rounded-2xl shadow-lg p-8 mb-16">
            <div class="text-center mb-6">
                <h3 class="text-2xl font-bold text-blue-700 mb-2">📚 Pelajaran Akademik</h3>
                <div class="w-20 h-0.5 bg-yellow-400 mx-auto"></div>
            </div>
            <div class="flex flex-wrap justify-center gap-3">
                <span
                    class="px-4 py-2 bg-blue-50 text-blue-700 rounded-full text-sm font-medium hover:bg-blue-100 transition-colors duration-300">Matematika</span>
                <span
                    class="px-4 py-2 bg-blue-50 text-blue-700 rounded-full text-sm font-medium hover:bg-blue-100 transition-colors duration-300">Bahasa
                    Indonesia</span>
                <span
                    class="px-4 py-2 bg-blue-50 text-blue-700 rounded-full text-sm font-medium hover:bg-blue-100 transition-colors duration-300">Bahasa
                    Inggris</span>
                <span
                    class="px-4 py-2 bg-blue-50 text-blue-700 rounded-full text-sm font-medium hover:bg-blue-100 transition-colors duration-300">IPA</span>
                <span
                    class="px-4 py-2 bg-blue-50 text-blue-700 rounded-full text-sm font-medium hover:bg-blue-100 transition-colors duration-300">Persiapan
                    UN</span>
            </div>
        </div>

        <!-- Ekstrakurikuler -->
        <div>
            <div class="text-center mb-8">
                <h3 class="text-2xl font-bold text-blue-700 mb-2">⭐ Ekstrakurikuler</h3>
                <div class="w-20 h-0.5 bg-yellow-400 mx-auto"></div>
            </div>

            <div class="flex flex-wrap justify-center gap-8">
                <div class="text-center group cursor-pointer">
                    <div
                        class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-full flex items-center justify-center shadow-md group-hover:scale-110 transition-all duration-300 mx-auto">
                        <span class="text-2xl">🐎</span>
                    </div>
                    <p class="text-sm font-semibold text-gray-700 mt-2 group-hover:text-blue-600 transition-colors">
                        Berkuda</p>
                    <p class="text-xs text-gray-400">Sunnah Rasul</p>
                </div>

                <div class="text-center group cursor-pointer">
                    <div
                        class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-full flex items-center justify-center shadow-md group-hover:scale-110 transition-all duration-300 mx-auto">
                        <span class="text-2xl">📖</span>
                    </div>
                    <p class="text-sm font-semibold text-gray-700 mt-2 group-hover:text-blue-600 transition-colors">
                        Al-Quran</p>
                    <p class="text-xs text-gray-400">Tahsin Juz 30</p>
                </div>

                <div class="text-center group cursor-pointer">
                    <div
                        class="w-16 h-16 bg-gradient-to-br from-cyan-500 to-blue-500 rounded-full flex items-center justify-center shadow-md group-hover:scale-110 transition-all duration-300 mx-auto">
                        <span class="text-2xl">🏊</span>
                    </div>
                    <p class="text-sm font-semibold text-gray-700 mt-2 group-hover:text-blue-600 transition-colors">
                        Berenang</p>
                    <p class="text-xs text-gray-400">Sunnah Rasul</p>
                </div>

                <div class="text-center group cursor-pointer">
                    <div
                        class="w-16 h-16 bg-gradient-to-br from-orange-500 to-red-500 rounded-full flex items-center justify-center shadow-md group-hover:scale-110 transition-all duration-300 mx-auto">
                        <span class="text-2xl">🏹</span>
                    </div>
                    <p class="text-sm font-semibold text-gray-700 mt-2 group-hover:text-blue-600 transition-colors">
                        Panahan</p>
                    <p class="text-xs text-gray-400">Sunnah Rasul</p>
                </div>

                <div class="text-center group cursor-pointer">
                    <div
                        class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-500 rounded-full flex items-center justify-center shadow-md group-hover:scale-110 transition-all duration-300 mx-auto">
                        <span class="text-2xl">🥋</span>
                    </div>
                    <p class="text-sm font-semibold text-gray-700 mt-2 group-hover:text-blue-600 transition-colors">
                        Taekwondo</p>
                    <p class="text-xs text-gray-400">Strong Muslim</p>
                </div>
            </div>
        </div>

    </div>
</section>

<style>
    /* Animasi untuk program cards */
    .program-card {
        animation: fadeInUp 0.6s ease forwards;
        opacity: 0;
        position: relative;
        min-height: 240px;
    }

    .program-card:nth-child(1) {
        animation-delay: 0.05s;
    }

    .program-card:nth-child(2) {
        animation-delay: 0.1s;
    }

    .program-card:nth-child(3) {
        animation-delay: 0.15s;
    }

    .program-card:nth-child(4) {
        animation-delay: 0.2s;
    }

    .program-card:nth-child(5) {
        animation-delay: 0.25s;
    }

    .program-card:nth-child(6) {
        animation-delay: 0.3s;
    }

    .program-card:nth-child(7) {
        animation-delay: 0.35s;
    }

    .program-card:nth-child(8) {
        animation-delay: 0.4s;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Hover efek untuk cards */
    .program-card:hover {
        transform: translateY(-5px);
    }

    /* Background image zoom effect */
    .program-card {
        background-size: cover;
        background-position: center;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .program-card:hover {
        background-size: cover;
    }

    /* Icon background blur */
    .program-card .bg-white\/20 {
        backdrop-filter: blur(4px);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .flex-wrap.gap-8 {
            gap: 1rem;
        }

        .program-card {
            min-height: 220px;
        }
    }
</style>