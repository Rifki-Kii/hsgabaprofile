<!-- Facility Section with Slider - Dots Indicator Fixed -->
<section id="facility" class="py-20 bg-gradient-to-br from-blue-50 via-white to-yellow-50 overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Header Section -->
        <div class="text-center mb-12">
            <div class="inline-block">
                <div class="flex justify-center mb-4">
                    <div class="w-16 h-1 bg-yellow-400 rounded-full"></div>
                </div>
                <span class="text-yellow-600 font-semibold text-sm uppercase tracking-wider">Fasilitas</span>
            </div>
            <h2 class="text-4xl md:text-5xl font-bold mt-4 mb-4 bg-gradient-to-r from-blue-700 to-blue-500 bg-clip-text text-transparent">
                Fasilitas Kami
            </h2>
            <p class="text-gray-600 max-w-2xl mx-auto text-lg">
                Berbagai fasilitas pendukung untuk kenyamanan dan perkembangan optimal siswa
            </p>
        </div>

        <!-- Slider Container -->
        <div class="relative px-4 md:px-12">

            <!-- Slider Wrapper -->
            <div class="overflow-hidden rounded-2xl">
                <div id="facilitySlider" class="flex transition-transform duration-500 ease-out">
                    @forelse($facilities as $index => $facility)
                    @php
                        $imgPath = $facility->image_path;
                        if (empty($imgPath)) {
                            $imgPath = 'https://placehold.co/600x400/0891B2/FFFFFF?text=' . urlencode($facility->title);
                        } elseif (!str_starts_with($imgPath, 'http://') && !str_starts_with($imgPath, 'https://')) {
                            $imgPath = asset($imgPath);
                        }
                    @endphp
                    <!-- Slide {{ $index + 1 }} - {{ $facility->title }} -->
                    <div class="flex-shrink-0 w-full md:w-1/2 lg:w-1/3 px-3">
                        <div class="group bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 h-full">
                            <div class="relative overflow-hidden h-56">
                                <img src="{{ $imgPath }}" 
                                     alt="{{ $facility->title }}"
                                     loading="lazy"
                                     class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-500"></div>
                            </div>
                            <div class="p-6">
                                <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                                    <i class="{{ $facility->icon ?? 'fas fa-building' }} text-white text-xl"></i>
                                </div>
                                <h3 class="text-xl font-bold text-blue-700 mb-2">{{ $facility->title }}</h3>
                                <p class="text-gray-600 leading-relaxed">
                                    {{ $facility->description }}
                                </p>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="w-full text-center text-gray-500 py-8">
                        Belum ada fasilitas yang ditambahkan.
                    </div>
                    @endforelse
                </div>
            </div>

            <!-- Tombol Navigasi Slider -->
            <button onclick="slidePrev()"
                class="absolute left-0 top-1/2 -translate-y-1/2 bg-white/80 hover:bg-yellow-400 text-blue-900 w-10 h-10 rounded-full shadow-lg flex items-center justify-center transition-all duration-300 hover:scale-110 z-10">
                <i class="fas fa-chevron-left text-lg"></i>
            </button>
            <button onclick="slideNext()"
                class="absolute right-0 top-1/2 -translate-y-1/2 bg-white/80 hover:bg-yellow-400 text-blue-900 w-10 h-10 rounded-full shadow-lg flex items-center justify-center transition-all duration-300 hover:scale-110 z-10">
                <i class="fas fa-chevron-right text-lg"></i>
            </button>

        </div>

        <!-- Dots Indicator -->
        <div class="flex justify-center gap-3 mt-8" id="dotsContainer">
            @foreach($facilities as $index => $facility)
            <button onclick="goToSlide({{ $index }})" class="dot {{ $index === 0 ? 'w-8 h-2 bg-yellow-400' : 'w-2 h-2 bg-gray-300' }} rounded-full transition-all duration-300 hover:bg-yellow-300"></button>
            @endforeach
        </div>

    </div>
</section>

<script>
    // Slider Configuration - FIXED with proper dots
    (function () {
        let currentSlide = 0;
        const slider = document.getElementById('facilitySlider');

        if (!slider) {
            console.error('Slider element not found!');
            return;
        }

        const slides = Array.from(document.querySelectorAll('#facilitySlider > div'));
        const slideCount = slides.length;
        const dots = document.querySelectorAll('.dot');

        let autoSlideInterval;
        let isAutoSliding = true;
        const autoSlideDelay = 4000;

        // Hitung jumlah slide per view
        function getSlidesPerView() {
            if (window.innerWidth >= 1024) return 3;
            if (window.innerWidth >= 768) return 2;
            return 1;
        }

        // Dapatkan lebar slide
        function getSlideWidth() {
            const slidesPerView = getSlidesPerView();
            const container = document.querySelector('#facilitySlider')?.parentElement?.parentElement;
            const containerWidth = container?.offsetWidth || window.innerWidth - 64;
            return containerWidth / slidesPerView;
        }

        // Update slider position
        function updateSlider() {
            const slidesPerView = getSlidesPerView();
            const maxSlide = Math.max(0, slideCount - slidesPerView);

            // Clamp currentSlide
            if (currentSlide > maxSlide) currentSlide = maxSlide;
            if (currentSlide < 0) currentSlide = 0;

            const slideWidth = getSlideWidth();
            const translateX = -currentSlide * slideWidth;
            slider.style.transform = `translateX(${translateX}px)`;

            // Update dots
            updateDots();
        }

        // Update dots indicator
        function updateDots() {
            const slidesPerView = getSlidesPerView();
            const maxVisibleDot = slideCount - slidesPerView;

            dots.forEach((dot, index) => {
                // Tampilkan semua dot (7 dot untuk 7 slide)
                dot.style.display = 'inline-block';

                // Yang aktif adalah dot sesuai posisi slide saat ini
                if (index === currentSlide) {
                    dot.classList.add('bg-yellow-400', 'w-8');
                    dot.classList.remove('bg-gray-300', 'w-2');
                } else {
                    dot.classList.add('bg-gray-300', 'w-2');
                    dot.classList.remove('bg-yellow-400', 'w-8');
                }

                // Sembunyikan dot yang tidak diperlukan (jika ada)
                if (index > maxVisibleDot && index >= slidesPerView) {
                    // Untuk tampilan tablet/desktop, dot yang melebihi maxVisibleDot disembunyikan
                    if (window.innerWidth >= 768 && index > maxVisibleDot) {
                        dot.style.display = 'none';
                    } else {
                        dot.style.display = 'inline-block';
                    }
                }
            });
        }

        // Next slide
        window.slideNext = function () {
            const slidesPerView = getSlidesPerView();
            const maxSlide = slideCount - slidesPerView;
            if (currentSlide < maxSlide) {
                currentSlide++;
                updateSlider();
                resetAutoSlide();
            } else if (currentSlide === maxSlide && maxSlide > 0) {
                currentSlide = 0;
                updateSlider();
                resetAutoSlide();
            }
        };

        // Previous slide
        window.slidePrev = function () {
            if (currentSlide > 0) {
                currentSlide--;
                updateSlider();
                resetAutoSlide();
            } else {
                const slidesPerView = getSlidesPerView();
                currentSlide = slideCount - slidesPerView;
                updateSlider();
                resetAutoSlide();
            }
        };

        // Go to specific slide
        window.goToSlide = function (index) {
            const slidesPerView = getSlidesPerView();
            const maxSlide = slideCount - slidesPerView;
            if (index >= 0 && index <= maxSlide) {
                currentSlide = index;
                updateSlider();
                resetAutoSlide();
            } else if (index >= 0 && index < slideCount) {
                // Jika index melebihi maxSlide tapi masih dalam batas slide
                currentSlide = index;
                updateSlider();
                resetAutoSlide();
            }
        };

        // Reset auto slide timer
        function resetAutoSlide() {
            if (autoSlideInterval) {
                clearInterval(autoSlideInterval);
            }
            if (isAutoSliding) {
                autoSlideInterval = setInterval(() => {
                    window.slideNext();
                }, autoSlideDelay);
            }
        }

        // Stop auto slide
        function stopAutoSlide() {
            isAutoSliding = false;
            if (autoSlideInterval) {
                clearInterval(autoSlideInterval);
            }
        }

        // Start auto slide
        function startAutoSlide() {
            isAutoSliding = true;
            resetAutoSlide();
        }

        // Handle resize
        let resizeTimeout;
        window.addEventListener('resize', function () {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(() => {
                updateSlider();
            }, 200);
        });

        // Touch swipe support
        let touchStartX = 0;
        let touchEndX = 0;

        function handleTouchStart(e) {
            touchStartX = e.touches[0].clientX;
        }

        function handleTouchEnd(e) {
            touchEndX = e.changedTouches[0].clientX;
            const swipeThreshold = 50;

            if (touchStartX - touchEndX > swipeThreshold) {
                window.slideNext();
            } else if (touchEndX - touchStartX > swipeThreshold) {
                window.slidePrev();
            }
        }

        // Initialize
        function init() {
            updateSlider();

            // Add touch listeners
            if (slider) {
                slider.addEventListener('touchstart', handleTouchStart);
                slider.addEventListener('touchend', handleTouchEnd);
            }

            // Start auto slide
            startAutoSlide();

            // Stop auto slide on hover
            const facilitySection = document.getElementById('facility');
            if (facilitySection) {
                facilitySection.addEventListener('mouseenter', stopAutoSlide);
                facilitySection.addEventListener('mouseleave', startAutoSlide);
            }

            // Re-run on window load to ensure correct widths
            window.addEventListener('load', function () {
                setTimeout(updateSlider, 100);
            });
        }

        // Run when DOM is ready
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', init);
        } else {
            init();
        }
    })();
</script>

<style>
    /* Facility Slider Styles */
    #facilitySlider {
        transition: transform 0.5s ease-out;
        will-change: transform;
    }

    .overflow-hidden {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }

    .overflow-hidden::-webkit-scrollbar {
        display: none;
    }

    /* Tombol navigasi */
    .absolute.left-0,
    .absolute.right-0 {
        opacity: 0.7;
        transition: all 0.3s ease;
    }

    .absolute.left-0:hover,
    .absolute.right-0:hover {
        opacity: 1;
        transform: scale(1.1);
    }

    /* Dot indicator styling */
    .dot {
        transition: all 0.3s ease;
        cursor: pointer;
        height: 8px;
        border-radius: 9999px;
    }

    .dot:hover {
        transform: scale(1.3);
        background-color: #facc15 !important;
    }

    /* Responsive padding untuk slider */
    @media (max-width: 768px) {
        .relative.px-4 {
            padding-left: 0;
            padding-right: 0;
        }
    }
</style>