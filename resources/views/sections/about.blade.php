<section id="about" class="py-20 bg-gradient-to-br from-blue-50 via-white to-yellow-50 overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Header Section -->
        <div class="text-center mb-12">
            <div class="inline-block">
                <div class="flex justify-center mb-4">
                    <div class="w-16 h-1 bg-yellow-400 rounded-full"></div>
                </div>
                <span class="text-yellow-600 font-semibold text-sm uppercase tracking-wider">Tentang Kami</span>
            </div>
            <h2
                class="text-4xl md:text-5xl font-bold mt-4 mb-4 bg-gradient-to-r from-blue-700 to-blue-500 bg-clip-text text-transparent">
                Homeschooling Group Abdurrahman Bin Auf
            </h2>
            <p class="text-gray-600 max-w-2xl mx-auto text-lg">
                Pendidikan berbasis nilai-nilai Islam dengan metode homeschooling yang fleksibel dan berkualitas
            </p>
        </div>

        <!-- Visi & Misi (DI ATAS) -->
        <div class="grid md:grid-cols-2 gap-8 max-w-4xl mx-auto mb-16">

            <!-- Visi -->
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 group">
                <div class="text-center">
                    <div
                        class="w-20 h-20 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                        <span class="text-3xl text-white">🎯</span>
                    </div>
                    <h3 class="text-2xl font-bold text-blue-700 mb-3">Visi Kami</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Menuju Generasi Mujahid, Mujadid dan Mujtahid.
                    </p>
                </div>
            </div>

            <!-- Misi -->
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 group">
                <div class="text-center">
                    <div
                        class="w-20 h-20 bg-gradient-to-br from-yellow-400 to-yellow-500 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                        <span class="text-3xl text-blue-900">📖</span>
                    </div>
                    <h3 class="text-2xl font-bold text-blue-700 mb-3">Misi Kami</h3>
                    <ul class="text-gray-600 space-y-2 text-left">
                        <li class="flex items-start gap-2">
                            <span class="text-yellow-500 mt-1">✓</span>
                            <span>Membentuk generasi yang bersyaksiah Islamiyah</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-yellow-500 mt-1">✓</span>
                            <span>Menghadirkan Idrak Silahbillah dalam setiap aktivitas</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-yellow-500 mt-1">✓</span>
                            <span>Menjadikan sirah Nabawiyah sebagai model pembelajaran</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Profile Section: Foto Sekolah + Penjelasan -->
        <div class="grid lg:grid-cols-2 gap-12 items-center mb-16">

            <!-- Left: Foto Sekolah -->
            <div class="relative group">
                <div
                    class="absolute -inset-2 bg-gradient-to-r from-yellow-400 to-blue-500 rounded-2xl blur opacity-30 group-hover:opacity-50 transition duration-300">
                </div>
                <div class="relative bg-white rounded-2xl overflow-hidden shadow-xl">
                    @php
                        $profileImg = $settings->profile_image_path ?? 'assets/facility/gedunghsgaba.jpeg';
                        if (!str_starts_with($profileImg, 'http://') && !str_starts_with($profileImg, 'https://')) {
                            $profileImg = asset($profileImg);
                        }
                    @endphp
                    <img src="{{ $profileImg }}"
                        alt="Gedung Sekolah HSG Abdurrahman Bin Auf"
                        loading="lazy"
                        class="w-full h-auto object-cover group-hover:scale-105 transition duration-500"
                        onerror="this.src='https://placehold.co/600x400/2563EB/FFFFFF?text=Foto+Sekolah'">
                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent p-4">
                        <p class="text-white text-sm">🏫 {{ $settings->profile_image_caption ?? 'Gedung HSG ABA - Lingkungan Belajar yang Nyaman & Islami' }}</p>
                    </div>
                </div>
            </div>

            <!-- Right: Penjelasan Sekolah -->
            <div class="space-y-4">
                <div class="flex items-center gap-2 mb-2">
                    <div class="w-10 h-0.5 bg-yellow-400"></div>
                    <span class="text-yellow-600 font-semibold text-sm">Profil Sekolah</span>
                </div>
                <h3 class="text-2xl font-bold text-blue-800">{{ $settings->profile_title ?? 'HSG Abdurrahman Bin Auf' }}</h3>
                <p class="text-gray-600 leading-relaxed">
                    @if($settings->profile_description_1)
                        {{ $settings->profile_description_1 }}
                    @else
                        Homeschooling Group Abdurrahman bin Auf, dikenal dengan HSG-ABA, berdiri pada tanggal <strong
                            class="text-blue-700">11 Januari 2011</strong>.
                        HSG-ABA didirikan oleh <strong class="text-blue-700">Ibu Nur Arabia Said</strong> dan <strong
                            class="text-blue-700">Bapak Asta Sidhy Mashoeri</strong>,
                        pasangan suami-istri yang sebelumnya telah menjalankan homeschooling terhadap putra pertama mereka
                        yang bernama Azka Haqqani.
                    @endif
                </p>
                <p class="text-gray-600 leading-relaxed">
                    @if($settings->profile_description_2)
                        {{ $settings->profile_description_2 }}
                    @else
                        Pada awal berdirinya, HSG-ABA membuka tingkat pendidikan <strong class="text-blue-700">kindergarten
                            (taman kanak-kanak)</strong>.
                        Pada tahun 2014, membuka tingkat <strong class="text-blue-700">elementary school (sekolah
                            dasar)</strong>.
                        Kemudian pada tahun 2016, membuka tingkat <strong class="text-blue-700">junior high school (sekolah
                            menengah pertama)</strong>
                        yang semuanya berjalan hingga saat ini.
                    @endif
                </p>
                @php
                    $feature1 = $settings->profile_feature_1;
                    $feature2 = $settings->profile_feature_2;
                    $feature3 = $settings->profile_feature_3;
                    $feature4 = $settings->profile_feature_4;
                    
                    // If all features are null, use default values
                    if (is_null($feature1) && is_null($feature2) && is_null($feature3) && is_null($feature4)) {
                        $feature1 = 'Maksimal 10 Siswa/Kelas';
                        $feature2 = 'Fokus Akidah, Akhlak & Sirah';
                        $feature3 = 'Ijazah Negeri (SD)';
                        $feature4 = 'Fasilitas Kolam Renang & Lapangan';
                    }
                @endphp
                <div class="grid grid-cols-2 gap-4 pt-4">
                    @if($feature1)
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                            <span class="text-blue-600 text-sm">✓</span>
                        </div>
                        <span class="text-gray-700 text-sm">{{ $feature1 }}</span>
                    </div>
                    @endif
                    @if($feature2)
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                            <span class="text-blue-600 text-sm">✓</span>
                        </div>
                        <span class="text-gray-700 text-sm">{{ $feature2 }}</span>
                    </div>
                    @endif
                    @if($feature3)
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                            <span class="text-blue-600 text-sm">✓</span>
                        </div>
                        <span class="text-gray-700 text-sm">{{ $feature3 }}</span>
                    </div>
                    @endif
                    @if($feature4)
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                            <span class="text-blue-600 text-sm">✓</span>
                        </div>
                        <span class="text-gray-700 text-sm">{{ $feature4 }}</span>
                    </div>
                    @endif
                </div>
            </div>
        </div>



        <!-- Founder / Pemilik Section -->
        <div class="grid lg:grid-cols-2 gap-12 items-center mb-16 flex-row-reverse">

            <!-- Right: Foto Pemilik -->
            <div class="relative group">
                <div
                    class="absolute -inset-2 bg-gradient-to-r from-yellow-400 to-blue-500 rounded-2xl blur opacity-30 group-hover:opacity-50 transition duration-300">
                </div>
                <div class="relative bg-white rounded-2xl overflow-hidden shadow-xl">
                    @php
                        $founderImg = $settings->founder_image_path ?? 'assets/about/bundanur.png';
                        if (!str_starts_with($founderImg, 'http://') && !str_starts_with($founderImg, 'https://')) {
                            $founderImg = asset($founderImg);
                        }
                    @endphp
                    <img src="{{ $founderImg }}" alt="Pemilik & Pendiri HSG Abdurrahman Bin Auf"
                        loading="lazy"
                        class="w-full h-auto object-cover group-hover:scale-105 transition duration-500"
                        onerror="this.src='https://placehold.co/600x500/2563EB/FFFFFF?text=Foto+Pendiri'">
                </div>
            </div>

            <!-- Left: Biodata & Sambutan Pemilik -->
            <div class="space-y-4">
                <div class="flex items-center gap-2 mb-2">
                    <div class="w-10 h-0.5 bg-yellow-400"></div>
                    <span class="text-yellow-600 font-semibold text-sm">Pendiri</span>
                </div>
                <h3 class="text-2xl font-bold text-blue-800">{{ $settings->founder_name ?? 'Ibu Nur Arabia Said & Bapak Asta Sidhy Mashoeri' }}</h3>
                <div class="flex flex-wrap gap-3 mt-1">
                    <span class="bg-blue-100 text-blue-700 text-xs px-3 py-1 rounded-full">👨‍👩‍👦 Homeschooling
                        Expert</span>
                    <span class="bg-yellow-100 text-yellow-700 text-xs px-3 py-1 rounded-full">📖 Ahli Sirah
                        Nabawiyah</span>
                    <span class="bg-green-100 text-green-700 text-xs px-3 py-1 rounded-full">🏫 Pendiri HSG-ABA
                        2011</span>
                </div>
                @if($settings->founder_quote)
                <div class="border-l-4 border-yellow-400 pl-4 italic text-gray-600 leading-relaxed">
                    "{{ $settings->founder_quote }}"
                </div>
                @endif
                <p class="text-gray-600 leading-relaxed">
                    {{ $settings->founder_bio }}
                </p>
                <div class="flex gap-3 pt-2">
                    @if($settings->founder_facebook_url)
                    <a href="{{ $settings->founder_facebook_url }}" target="_blank"
                        class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center hover:bg-blue-600 transition">
                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.879v-6.99h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.99C18.343 21.128 22 16.991 22 12z" />
                        </svg>
                    </a>
                    @endif
                    @if($settings->founder_instagram_url)
                    <a href="{{ $settings->founder_instagram_url }}" target="_blank"
                        class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center hover:bg-blue-600 transition">
                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069z" />
                        </svg>
                    </a>
                    @endif
                    @if($settings->founder_youtube_url)
                    <a href="{{ $settings->founder_youtube_url }}" target="_blank"
                        class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center hover:bg-blue-600 transition">
                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M23.498 6.163a3.003 3.003 0 0 0-2.11-2.11C19.517 3.545 12 3.545 12 3.545s-7.517 0-9.388.508a3.003 3.003 0 0 0-2.11 2.11C0 8.033 0 12 0 12s0 3.967.502 5.837a3.003 3.003 0 0 0 2.11 2.11c1.871.508 9.388.508 9.388.508s7.517 0 9.388-.508a3.003 3.003 0 0 0 2.11-2.11C24 15.967 24 12 24 12s0-3.967-.502-5.837zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
                        </svg>
                    </a>
                    @endif
                </div>
            </div>
        </div>

        <!-- Nilai-Nilai Kami -->
        <div class="mb-16">
            <div class="text-center mb-8">
                <h3 class="text-2xl font-bold text-blue-700 mb-2">Nilai-Nilai Kami</h3>
                <div class="w-20 h-0.5 bg-yellow-400 mx-auto"></div>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 max-w-4xl mx-auto">
                <div class="text-center p-4 group cursor-pointer">
                    <div
                        class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-3 group-hover:bg-blue-200 transition-all duration-300 group-hover:scale-110">
                        <span class="text-2xl">📖</span>
                    </div>
                    <h4 class="font-semibold text-blue-700">Berbasis Islam</h4>
                </div>
                <div class="text-center p-4 group cursor-pointer">
                    <div
                        class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-3 group-hover:bg-blue-200 transition-all duration-300 group-hover:scale-110">
                        <span class="text-2xl">🎯</span>
                    </div>
                    <h4 class="font-semibold text-blue-700">Berorientasi Prestasi</h4>
                </div>
                <div class="text-center p-4 group cursor-pointer">
                    <div
                        class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-3 group-hover:bg-blue-200 transition-all duration-300 group-hover:scale-110">
                        <span class="text-2xl">🤝</span>
                    </div>
                    <h4 class="font-semibold text-blue-700">Mandiri dan Kreatif</h4>
                </div>
                <div class="text-center p-4 group cursor-pointer">
                    <div
                        class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-3 group-hover:bg-blue-200 transition-all duration-300 group-hover:scale-110">
                        <span class="text-2xl">🌍</span>
                    </div>
                    <h4 class="font-semibold text-blue-700">Berwawasan Global</h4>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    /* Animations */
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

    @keyframes fadeInLeft {
        from {
            opacity: 0;
            transform: translateX(-30px);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes fadeInRight {
        from {
            opacity: 0;
            transform: translateX(30px);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    /* Apply animations */
    #about .grid.md\:grid-cols-2:first-of-type>div {
        animation: fadeInUp 0.6s ease forwards;
        opacity: 0;
    }

    #about .grid.md\:grid-cols-2:first-of-type>div:nth-child(1) {
        animation-delay: 0.1s;
    }

    #about .grid.md\:grid-cols-2:first-of-type>div:nth-child(2) {
        animation-delay: 0.2s;
    }

    #about .grid.lg\:grid-cols-2:first-of-type:not(.flex-row-reverse)>div:first-child {
        animation: fadeInLeft 0.6s ease forwards;
        opacity: 0;
        animation-delay: 0.3s;
    }

    #about .grid.lg\:grid-cols-2:first-of-type:not(.flex-row-reverse)>div:last-child {
        animation: fadeInRight 0.6s ease forwards;
        opacity: 0;
        animation-delay: 0.4s;
    }

    #about .grid.lg\:grid-cols-2.flex-row-reverse>div:first-child {
        animation: fadeInLeft 0.6s ease forwards;
        opacity: 0;
        animation-delay: 0.5s;
    }

    #about .grid.lg\:grid-cols-2.flex-row-reverse>div:last-child {
        animation: fadeInRight 0.6s ease forwards;
        opacity: 0;
        animation-delay: 0.6s;
    }

    #about .grid.grid-cols-2.md\:grid-cols-4>div {
        animation: fadeInUp 0.6s ease forwards;
        opacity: 0;
    }

    #about .grid.grid-cols-2.md\:grid-cols-4>div:nth-child(1) {
        animation-delay: 0.7s;
    }

    #about .grid.grid-cols-2.md\:grid-cols-4>div:nth-child(2) {
        animation-delay: 0.75s;
    }

    #about .grid.grid-cols-2.md\:grid-cols-4>div:nth-child(3) {
        animation-delay: 0.8s;
    }

    #about .grid.grid-cols-2.md\:grid-cols-4>div:nth-child(4) {
        animation-delay: 0.85s;
    }

    #about .text-center.bg-gradient-to-r {
        animation: fadeInUp 0.6s ease forwards;
        opacity: 0;
        animation-delay: 0.9s;
    }

    /* Responsive */
    @media (max-width: 768px) {
        #about .grid.lg\:grid-cols-2 {
            gap: 2rem;
        }

        #about .grid.md\:grid-cols-2 {
            gap: 1rem;
        }
    }
</style>