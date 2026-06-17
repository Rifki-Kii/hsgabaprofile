<section id="hero" class="relative overflow-hidden bg-gradient-to-br from-blue-900 via-blue-700 to-blue-800">

    <div id="slider" class="relative h-[500px] md:h-[650px]">
        @forelse($heroSlides as $index => $slide)
        <!-- SLIDE {{ $index + 1 }} -->
        <div class="slide absolute inset-0 transition-opacity duration-700 {{ $index === 0 ? 'opacity-100' : 'opacity-0' }}">
            <div class="absolute inset-0 bg-gradient-to-r from-blue-900/70 to-blue-800/50 z-10"></div>
            <img src="{{ asset($slide->image_path) }}" alt="{{ $slide->title }}"
                @if($index === 0) fetchpriority="high" @else loading="lazy" @endif
                class="w-full h-full object-cover">
            
            @if($slide->welcome_tag && empty($slide->button_text))
            <!-- Style 1 (Opening slide layout) -->
            <div class="absolute inset-0 flex items-center justify-center z-20">
                <div class="text-center px-4 text-white">
                    <div class="mb-4">
                        <span class="text-sm md:text-base font-light tracking-[0.3em] uppercase text-yellow-400/80"
                            style="font-family: 'Montserrat', 'Segoe UI', sans-serif; letter-spacing: 5px;">
                            {{ $slide->welcome_tag }}
                        </span>
                    </div>

                    <div class="flex justify-center mb-6">
                        <div class="w-12 h-px bg-white/30"></div>
                    </div>

                    <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-6xl font-bold mb-3 tracking-tight"
                        style="font-family: 'Playfair Display', 'Georgia', serif; text-shadow: 2px 2px 4px rgba(0,0,0,0.3);">
                        {{ $slide->title }}
                    </h1>

                    @if($slide->subtitle)
                    <h2 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-light mb-6 tracking-wide"
                        style="font-family: 'Inter', 'Segoe UI', sans-serif; letter-spacing: 2px; font-weight: 300;">
                        {{ $slide->subtitle }}
                    </h2>
                    @endif

                    <div class="flex justify-center mb-6">
                        <div class="w-16 h-0.5 bg-yellow-400 rounded-full"></div>
                    </div>

                    <p class="text-sm sm:text-base md:text-lg lg:text-xl font-light tracking-wider"
                        style="font-family: 'Montserrat', 'Segoe UI', sans-serif; letter-spacing: 3px;">
                        ✦ {{ $settings->site_name ?? 'Abdurrahman Bin Auf' }} ✦
                    </p>

                    <div class="flex justify-center gap-3 mt-6">
                        <span class="text-yellow-400 text-xs">✦</span>
                        <span class="text-white/40 text-xs">✦</span>
                        <span class="text-yellow-400 text-xs">✦</span>
                    </div>
                </div>
            </div>
            @else
            <!-- Style 2 (Standard slide layout) -->
            <div class="absolute inset-0 flex items-center justify-center z-20">
                <div class="text-center px-4 text-white max-w-4xl">
                    <h1 class="text-4xl md:text-6xl font-bold mb-4">{{ $slide->title }}</h1>
                    @if($slide->subtitle)
                    <p class="text-xl md:text-2xl mb-6">{{ $slide->subtitle }}</p>
                    @endif
                    @if($slide->button_text && $slide->button_url)
                    <a href="{{ $slide->button_url }}"
                        class="inline-block bg-yellow-400 hover:bg-yellow-300 text-blue-900 font-bold px-8 py-3 rounded-full transition-all duration-300 shadow-lg hover:scale-105">
                        {{ $slide->button_text }}
                    </a>
                    @endif
                </div>
            </div>
            @endif
        </div>
        @empty
        <!-- Fallback if no slides are in DB -->
        <div class="slide absolute inset-0 transition-opacity duration-700 opacity-100">
            <div class="absolute inset-0 bg-gradient-to-r from-blue-900/70 to-blue-800/50 z-10"></div>
            <img src="{{ asset('assets/hero/panahan.png') }}" alt="Homeschooling Group Abdurrahman Bin Auf" class="w-full h-full object-cover">
            <div class="absolute inset-0 flex items-center justify-center z-20">
                <div class="text-center px-4 text-white">
                    <h1 class="text-4xl sm:text-5xl md:text-6xl font-bold mb-3">Homeschooling Group</h1>
                    <h2 class="text-xl sm:text-2xl md:text-3xl font-light mb-6">Abdurrahman Bin Auf</h2>
                </div>
            </div>
        </div>
        @endforelse
    </div>

    <!-- Tombol navigasi -->
    <button onclick="prevSlide()"
        class="absolute left-2 md:left-4 top-1/2 -translate-y-1/2 bg-blue-600/70 hover:bg-blue-600 text-white text-2xl md:text-3xl w-10 h-10 md:w-12 md:h-12 rounded-full flex items-center justify-center transition-all duration-300 z-30 backdrop-blur-sm"
        aria-label="Previous slide">
        ❮
    </button>
    <button onclick="nextSlide()"
        class="absolute right-2 md:right-4 top-1/2 -translate-y-1/2 bg-blue-600/70 hover:bg-blue-600 text-white text-2xl md:text-3xl w-10 h-10 md:w-12 md:h-12 rounded-full flex items-center justify-center transition-all duration-300 z-30 backdrop-blur-sm"
        aria-label="Next slide">
        ❯
    </button>

    <!-- Indikator dots -->
    <div class="absolute bottom-6 left-1/2 -translate-x-1/2 flex space-x-3 z-30">
        @foreach($heroSlides as $index => $slide)
        <div
            class="dot w-3 h-3 rounded-full bg-white/50 cursor-pointer transition-all duration-300 hover:bg-yellow-400">
        </div>
        @endforeach
    </div>

    <!-- Decorative waves -->
    <div class="absolute bottom-0 left-0 w-full overflow-hidden z-20">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none"
            class="relative block w-full h-[50px] md:h-[70px]">
            <path
                d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"
                fill="#ffffff" opacity="0.8"></path>
        </svg>
    </div>
</section>

<script>
    let current = 0;
    const slides = document.querySelectorAll('.slide');
    const dots = document.querySelectorAll('.dot');
    let autoSlideInterval;

    function showSlide(i) {
        slides.forEach((slide, index) => {
            slide.style.opacity = '0';
            setTimeout(() => {
                if (index === i) slide.style.opacity = '1';
            }, 50);
        });
        dots.forEach((dot, index) => {
            if (index === i) {
                dot.classList.add('bg-yellow-400');
                dot.classList.remove('bg-white/50');
                dot.style.transform = 'scale(1.2)';
            } else {
                dot.classList.remove('bg-yellow-400');
                dot.classList.add('bg-white/50');
                dot.style.transform = 'scale(1)';
            }
        });
        current = i;
    }

    function nextSlide() {
        let next = (current + 1) % slides.length;
        showSlide(next);
    }

    function prevSlide() {
        let prev = (current - 1 + slides.length) % slides.length;
        showSlide(prev);
    }

    // Reset auto slide timer
    function resetAutoSlide() {
        clearInterval(autoSlideInterval);
        autoSlideInterval = setInterval(nextSlide, 5000);
    }

    // Event listener untuk dots
    dots.forEach((dot, i) => {
        dot.addEventListener('click', () => {
            showSlide(i);
            resetAutoSlide();
        });
    });

    // Event listener untuk tombol
    const nextBtn = document.querySelector('button[aria-label="Next slide"]');
    const prevBtn = document.querySelector('button[aria-label="Previous slide"]');
    if (nextBtn) nextBtn.addEventListener('click', resetAutoSlide);
    if (prevBtn) prevBtn.addEventListener('click', resetAutoSlide);

    // Auto slide start
    autoSlideInterval = setInterval(nextSlide, 5000);

    // Inisialisasi
    showSlide(0);
</script>

<style>
    /* Animasi fade yang lebih halus */
    .slide {
        transition: opacity 0.8s ease-in-out;
    }

    /* Hover effect untuk tombol */
    button[aria-label="Previous slide"]:hover,
    button[aria-label="Next slide"]:hover {
        transform: scale(1.1);
    }

    /* Animasi untuk dot indicator */
    .dot {
        transition: all 0.3s ease;
    }

    .dot:hover {
        background-color: #facc15 !important;
        transform: scale(1.3);
    }
</style>