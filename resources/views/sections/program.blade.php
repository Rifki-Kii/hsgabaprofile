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
        </div>        <!-- Pelajaran Akademik -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 mb-16">
            <div class="text-center mb-8">
                <span class="text-xs font-semibold uppercase tracking-wider text-blue-600 bg-blue-50 px-3 py-1 rounded-full">Kurikulum</span>
                <h3 class="text-2xl font-bold text-gray-800 mt-2">📚 Pelajaran Akademik</h3>
                <p class="text-sm text-gray-500 mt-1">Mata pelajaran utama dengan pendekatan belajar aktif dan menyenangkan</p>
                <div class="w-12 h-1 bg-yellow-400 mx-auto mt-3 rounded-full"></div>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6">
                @forelse($academicSubjects as $subject)
                <div class="bg-gray-50 rounded-2xl p-5 border border-gray-100 hover:border-blue-100 hover:bg-white hover:shadow-md transition-all duration-300 flex flex-col justify-between">
                    <div>
                        <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center text-xl">
                            <i class="{{ $subject->icon }}"></i>
                        </div>
                        <h4 class="text-lg font-bold text-gray-800 mt-4">{{ $subject->name }}</h4>
                        <span class="text-[10px] font-semibold tracking-wider uppercase px-2 py-0.5 rounded bg-blue-100 text-blue-800 inline-block my-2">{{ $subject->focus }}</span>
                        <p class="text-xs text-gray-600 leading-relaxed">{{ $subject->description }}</p>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center text-gray-500 py-8">
                    Belum ada data pelajaran akademik.
                </div>
                @endforelse
            </div>
        </div>

        <!-- Ekstrakurikuler -->
        <div>
            <div class="text-center mb-8">
                <span class="text-xs font-semibold uppercase tracking-wider text-blue-600 bg-blue-50 px-3 py-1 rounded-full">Pengembangan Minat & Bakat</span>
                <h3 class="text-2xl font-bold text-gray-800 mt-2">⭐ Kegiatan Ekstrakurikuler</h3>
                <p class="text-sm text-gray-500 mt-1">Kegiatan penunjang untuk melatih fisik, mental, spiritual, dan kemandirian siswa</p>
                <div class="w-12 h-1 bg-yellow-400 mx-auto mt-3 rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6">
                @forelse($extracurriculars as $ekskul)
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden flex flex-col justify-between hover:shadow-md transition-all duration-300">
                    <div>
                        <div class="relative h-32 w-full bg-slate-900 overflow-hidden">
                            @if ($ekskul->image_path)
                                @if(str_starts_with($ekskul->image_path, 'http'))
                                    <img src="{{ $ekskul->image_path }}" class="w-full h-full object-cover" alt="{{ $ekskul->name }}">
                                @else
                                    <img src="{{ asset($ekskul->image_path) }}" class="w-full h-full object-cover" alt="{{ $ekskul->name }}">
                                @endif
                            @else
                                <div class="w-full h-full bg-slate-800 flex items-center justify-center text-slate-400">
                                    <i class="fa-solid fa-image text-xl"></i>
                                </div>
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                            <span class="absolute bottom-2 left-2 text-xl">{{ $ekskul->icon }}</span>
                        </div>
                        <div class="p-4">
                            <h4 class="text-base font-bold text-gray-800">{{ $ekskul->name }}</h4>
                            <span class="text-[9px] font-semibold tracking-wider uppercase px-1.5 py-0.5 rounded bg-blue-50 text-blue-800 border border-blue-100 inline-block my-1.5">{{ $ekskul->category }}</span>
                            <p class="text-xs text-gray-500 leading-relaxed mt-1">{{ $ekskul->description }}</p>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center text-gray-500 py-8">
                    Belum ada data ekstrakurikuler.
                </div>
                @endforelse
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