<!-- Gallery Section with Auto Rotating Grid (7 detik) -->
<section id="gallery" class="py-20 bg-gradient-to-br from-blue-50 via-white to-yellow-50 overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Header Section -->
        <div class="text-center mb-12">
            <div class="inline-block">
                <div class="flex justify-center mb-4">
                    <div class="w-16 h-1 bg-yellow-400 rounded-full"></div>
                </div>
                <span class="text-yellow-600 font-semibold text-sm uppercase tracking-wider">Momen Kebersamaan</span>
            </div>
            <h2
                class="text-4xl md:text-5xl font-bold mt-4 mb-4 bg-gradient-to-r from-blue-700 to-blue-500 bg-clip-text text-transparent">
                Galeri Kegiatan
            </h2>
            <p class="text-gray-600 max-w-2xl mx-auto text-lg">
                Dokumentasi momen berharga dalam proses belajar mengajar di ABA School
            </p>
        </div>

        <!-- Gallery Grid - Auto Rotating (5 gambar yang berganti otomatis setiap 7 detik) -->
        @php
            $galleryFallbacks = [
                [
                    'image_path' => 'assets/gallery/izasah.jpeg',
                    'title' => '🎓 Penyerahan Ijazah',
                    'description' => 'Momen harap penyerahan ijazah kepada siswa-siswi HSG ABA yang telah menyelesaikan pendidikannya'
                ],
                [
                    'image_path' => 'assets/gallery/panah.jpeg',
                    'title' => '🏹 Ekskul Panahan',
                    'description' => 'Latihan memanah rutin yang melatih fokus, ketepatan, and kesabaran sesuai sunnah Rasulullah ﷺ'
                ],
                [
                    'image_path' => 'assets/gallery/fieldtrip1.Jpeg',
                    'title' => '🚌 Field Trip Dairyland',
                    'description' => 'Kegiatan belajar mengasyikkan di Dairyland, pengalaman langsung bersama alam and hewan ternak'
                ],
                [
                    'image_path' => 'assets/gallery/festivalbudaya.JPG',
                    'title' => '🎭 Festival Budaya',
                    'description' => 'Penampilan seni and budaya dalam rangka memperingati hari besar nasional, kreativitas and bakat siswa ditampilkan'
                ],
                [
                    'image_path' => 'assets/gallery/olahraga.jpeg',
                    'title' => '⚽ Kegiatan Olahraga',
                    'description' => 'Membangun fisik yang kuat melalui kegiatan olahraga rutin seperti futsal, basket, and senam bersama'
                ],
            ];
        @endphp
        <div class="gallery-grid" id="galleryGrid">
            @for($i = 0; $i < 5; $i++)
                @php
                    $gItem = $galleryItems[$i] ?? (object) $galleryFallbacks[$i];
                    $imgPath = $gItem->image_path;
                    if (!str_starts_with($imgPath, 'http://') && !str_starts_with($imgPath, 'https://')) {
                        $imgPath = asset($imgPath);
                    }
                @endphp
                <div class="gallery-item group relative overflow-hidden rounded-2xl shadow-lg cursor-pointer transition-all duration-500"
                    onclick="openModalFromCurrentSet({{ $i }})">
                    <div class="relative overflow-hidden {{ $i === 0 ? 'h-72 lg:h-96' : 'h-72' }}">
                        <img id="galleryImg{{ $i + 1 }}" src="{{ $imgPath }}" alt="{{ $gItem->title }}"
                            loading="lazy"
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-blue-900/80 via-blue-800/40 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-500">
                            <div
                                class="absolute bottom-0 left-0 right-0 p-6 text-white transform translate-y-full group-hover:translate-y-0 transition-transform duration-500">
                                <h3 id="galleryTitle{{ $i + 1 }}" class="text-xl font-bold">{{ $gItem->title }}</h3>
                                <p id="galleryDesc{{ $i + 1 }}" class="text-sm opacity-90">{{ $gItem->description }}</p>
                            </div>
                        </div>
                        <div
                            class="absolute top-4 right-4 w-10 h-10 bg-yellow-400 rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-300 transform scale-0 group-hover:scale-100">
                            <svg class="w-5 h-5 text-blue-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            @endfor
        </div>

        <!-- Tombol Lihat Semua Galeri -->
        <div class="text-center mt-12">
            <button onclick="openFullGallery()"
                class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-600 to-blue-700 text-white px-8 py-3 rounded-full font-semibold hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                <i class="fas fa-images"></i>
                <span>Lihat Semua Galeri</span>
                <i class="fas fa-arrow-right"></i>
            </button>
        </div>

    </div>
</section>

<!-- Modal untuk Klik Gambar dari Grid (DENGAN TOMBOL CANCEL) -->
<div id="gridModal" class="fixed inset-0 bg-black/95 z-50 hidden items-center justify-center p-4"
    onclick="closeGridModal()">
    <!-- Tombol Close (X) di pojok kanan atas layar -->
    <button onclick="closeGridModal()"
        class="absolute top-4 right-4 md:top-8 md:right-8 bg-red-600 hover:bg-red-700 text-white w-10 h-10 md:w-12 md:h-12 rounded-full flex items-center justify-center transition-all duration-300 shadow-lg z-50 hover:scale-110">
        <i class="fas fa-times text-lg md:text-xl"></i>
    </button>
    <div class="relative max-w-5xl w-full" onclick="event.stopPropagation()">

        <!-- Tombol Prev/Next -->
        <button onclick="prevGridImage()"
            class="absolute left-4 top-1/2 -translate-y-1/2 bg-white/20 hover:bg-yellow-400 text-white hover:text-blue-900 w-12 h-12 rounded-full flex items-center justify-center transition-all duration-300 backdrop-blur-sm z-20">
            <i class="fas fa-chevron-left text-xl"></i>
        </button>
        <button onclick="nextGridImage()"
            class="absolute right-4 top-1/2 -translate-y-1/2 bg-white/20 hover:bg-yellow-400 text-white hover:text-blue-900 w-12 h-12 rounded-full flex items-center justify-center transition-all duration-300 backdrop-blur-sm z-20">
            <i class="fas fa-chevron-right text-xl"></i>
        </button>

        <!-- Gambar -->
        <img id="gridModalImage" src="" alt="Gallery" class="w-full h-auto max-h-[80vh] object-contain rounded-2xl">

        <!-- Info Gambar -->
        <div class="mt-4 text-center text-white">
            <h3 id="gridModalTitle" class="text-xl font-bold"></h3>
            <p id="gridModalDesc" class="text-gray-300"></p>
        </div>
    </div>
</div>

<!-- Modal Full Gallery Slider (Lihat Semua Gambar) DENGAN TOMBOL CANCEL -->
<div id="fullGalleryModal" class="fixed inset-0 bg-black/95 z-50 hidden items-center justify-center p-4"
    onclick="closeFullGallery()">
    <!-- Tombol Close (X) di pojok kanan atas layar -->
    <button onclick="closeFullGallery()"
        class="absolute top-4 right-4 md:top-8 md:right-8 bg-red-600 hover:bg-red-700 text-white w-10 h-10 md:w-12 md:h-12 rounded-full flex items-center justify-center transition-all duration-300 shadow-lg z-50 hover:scale-110">
        <i class="fas fa-times text-lg md:text-xl"></i>
    </button>
    <div class="relative max-w-6xl w-full" onclick="event.stopPropagation()">

        <!-- Tombol Prev/Next -->
        <button onclick="prevFullGallery()"
            class="absolute left-4 top-1/2 -translate-y-1/2 bg-white/20 hover:bg-yellow-400 text-white hover:text-blue-900 w-12 h-12 rounded-full flex items-center justify-center transition-all duration-300 backdrop-blur-sm z-20">
            <i class="fas fa-chevron-left text-xl"></i>
        </button>
        <button onclick="nextFullGallery()"
            class="absolute right-4 top-1/2 -translate-y-1/2 bg-white/20 hover:bg-yellow-400 text-white hover:text-blue-900 w-12 h-12 rounded-full flex items-center justify-center transition-all duration-300 backdrop-blur-sm z-20">
            <i class="fas fa-chevron-right text-xl"></i>
        </button>

        <!-- Gambar -->
        <img id="fullGalleryImage" src="" alt="Gallery"
            class="w-full h-auto max-h-[80vh] object-contain rounded-2xl transition-opacity duration-300">

        <!-- Info Gambar & Dots -->
        <div class="mt-4 text-center text-white">
            <h3 id="fullGalleryTitle" class="text-xl font-bold"></h3>
            <p id="fullGalleryDesc" class="text-gray-300 text-sm mt-1"></p>
            <div id="fullGalleryDots" class="flex justify-center gap-2 mt-4"></div>
            <p id="fullGalleryCounter" class="text-yellow-400 text-sm mt-2"></p>
        </div>
    </div>
</div>

<style>
    /* Gallery Grid Layout */
    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 1.5rem;
    }

    @media (min-width: 1024px) {
        .gallery-grid {
            grid-template-areas:
                "item1 item1 item2"
                "item3 item4 item5";
        }

        .gallery-grid .gallery-item:nth-child(1) {
            grid-area: item1;
        }

        .gallery-grid .gallery-item:nth-child(2) {
            grid-area: item2;
        }

        .gallery-grid .gallery-item:nth-child(3) {
            grid-area: item3;
        }

        .gallery-grid .gallery-item:nth-child(4) {
            grid-area: item4;
        }

        .gallery-grid .gallery-item:nth-child(5) {
            grid-area: item5;
        }

        .gallery-grid .gallery-item:nth-child(1) .relative {
            height: 450px;
        }
    }

    .gallery-item {
        animation: fadeInUp 0.6s ease forwards;
        opacity: 0;
    }

    .gallery-item:nth-child(1) {
        animation-delay: 0.1s;
    }

    .gallery-item:nth-child(2) {
        animation-delay: 0.2s;
    }

    .gallery-item:nth-child(3) {
        animation-delay: 0.3s;
    }

    .gallery-item:nth-child(4) {
        animation-delay: 0.4s;
    }

    .gallery-item:nth-child(5) {
        animation-delay: 0.5s;
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

    /* Transition efek untuk gambar berganti */
    .gallery-item img {
        transition: opacity 0.5s ease-in-out;
    }

    /* Modal Animation */
    #fullGalleryModal,
    #gridModal {
        transition: all 0.3s ease;
    }

    .gallery-dot {
        transition: all 0.3s ease;
        cursor: pointer;
        height: 8px;
        border-radius: 9999px;
    }

    .gallery-dot:hover {
        transform: scale(1.3);
        background-color: #facc15 !important;
    }

    /* Tombol close styling */
    #fullGalleryModal button.bg-red-600,
    #gridModal button.bg-red-600 {
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
    }

    #fullGalleryModal button.bg-red-600:hover,
    #gridModal button.bg-red-600:hover {
        transform: scale(1.1);
    }
</style>

@php
    $formattedGallery = $galleryItems->map(function($item) {
        $imgPath = $item->image_path;
        if (!str_starts_with($imgPath, 'http://') && !str_starts_with($imgPath, 'https://')) {
            $imgPath = asset($imgPath);
        }
        return [
            'img' => $imgPath,
            'title' => $item->title,
            'desc' => $item->description
        ];
    })->toArray();
@endphp

<script>
    // ==================== DATA GALLERY (20+ Gambar) ====================
    const dbGalleryData = @json($formattedGallery);

   const allGalleryData = dbGalleryData.length > 0 ? dbGalleryData : [
        { img: "{{ asset('assets/gallery/izasah.jpeg') }}", title: "🎓 Penyerahan Ijazah", desc: "Momen harap penyerahan ijazah kepada siswa-siswi HSG ABA yang telah menyelesaikan pendidikannya" },
        { img: "{{ asset('assets/gallery/panah.jpeg') }}", title: "🏹 Ekskul Panahan", desc: "Latihan memanah rutin yang melatih fokus, ketepatan, and kesabaran sesuai sunnah Rasulullah ﷺ" },
        { img: "{{ asset('assets/gallery/fieldtrip1.Jpeg') }}", title: "🚌 Field Trip Dairyland", desc: "Kegiatan belajar mengasyikkan di Dairyland, pengalaman langsung bersama alam and hewan ternak" },
        { img: "{{ asset('assets/gallery/festivalbudaya.JPG') }}", title: "🎭 Festival Budaya", desc: "Penampilan seni and budaya dalam rangka memperingati hari besar nasional, kreativitas and bakat siswa ditampilkan" },
        { img: "{{ asset('assets/gallery/olahraga.jpeg') }}", title: "⚽ Kegiatan Olahraga", desc: "Membangun fisik yang kuat melalui kegiatan olahraga rutin seperti futsal, basket, and senam bersama" }
   ];
    // ==================== AUTO ROTATE GRID (7 DETIK) ====================
    let currentSetIndex = 0;
    let autoRotateInterval;
    const ITEMS_PER_SET = 5;
    const totalSets = Math.ceil(allGalleryData.length / ITEMS_PER_SET);

    // Fungsi untuk mendapatkan 5 gambar berdasarkan index set
    function getCurrentSet() {
        const startIndex = currentSetIndex * ITEMS_PER_SET;
        return allGalleryData.slice(startIndex, startIndex + ITEMS_PER_SET);
    }

    // Fungsi untuk mengupdate grid dengan set gambar baru
    function updateGalleryGrid() {
        const currentSet = getCurrentSet();

        for (let i = 0; i < 5; i++) {
            const imgElement = document.getElementById(`galleryImg${i + 1}`);
            const titleElement = document.getElementById(`galleryTitle${i + 1}`);
            const descElement = document.getElementById(`galleryDesc${i + 1}`);

            if (currentSet[i]) {
                // Efek fade out
                imgElement.style.opacity = '0';

                // Preload gambar baru sebelum menampilkannya untuk menghindari flicker
                const tempImg = new Image();
                tempImg.src = currentSet[i].img;
                tempImg.onload = () => {
                    imgElement.src = currentSet[i].img;
                    titleElement.textContent = currentSet[i].title;
                    descElement.textContent = currentSet[i].desc;
                    imgElement.style.opacity = '1';
                };
            }
        }
    }

    // Fungsi untuk rotate ke set berikutnya
    function rotateToNextSet() {
        currentSetIndex = (currentSetIndex + 1) % totalSets;
        updateGalleryGrid();
    }

    // Start auto rotate (7 detik)
    function startAutoRotate() {
        if (autoRotateInterval) clearInterval(autoRotateInterval);
        autoRotateInterval = setInterval(() => {
            rotateToNextSet();
        }, 7000);
    }

    // ==================== MODAL UNTUK GRID ====================
    let currentGridImageIndex = 0;
    let currentGridSet = [];

    function openModalFromCurrentSet(position) {
        currentGridSet = getCurrentSet();
        currentGridImageIndex = position;

        const modal = document.getElementById('gridModal');
        const modalImg = document.getElementById('gridModalImage');
        const modalTitle = document.getElementById('gridModalTitle');
        const modalDesc = document.getElementById('gridModalDesc');

        if (currentGridSet[currentGridImageIndex]) {
            modalImg.src = currentGridSet[currentGridImageIndex].img;
            modalTitle.textContent = currentGridSet[currentGridImageIndex].title;
            modalDesc.textContent = currentGridSet[currentGridImageIndex].desc;
        }

        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.style.overflow = 'hidden';
    }

    function closeGridModal() {
        const modal = document.getElementById('gridModal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.body.style.overflow = 'auto';
    }

    function prevGridImage() {
        currentGridImageIndex = (currentGridImageIndex - 1 + currentGridSet.length) % currentGridSet.length;
        const modalImg = document.getElementById('gridModalImage');
        const modalTitle = document.getElementById('gridModalTitle');
        const modalDesc = document.getElementById('gridModalDesc');

        modalImg.style.opacity = '0';
        setTimeout(() => {
            modalImg.src = currentGridSet[currentGridImageIndex].img;
            modalTitle.textContent = currentGridSet[currentGridImageIndex].title;
            modalDesc.textContent = currentGridSet[currentGridImageIndex].desc;
            modalImg.style.opacity = '1';
        }, 200);
    }

    function nextGridImage() {
        currentGridImageIndex = (currentGridImageIndex + 1) % currentGridSet.length;
        const modalImg = document.getElementById('gridModalImage');
        const modalTitle = document.getElementById('gridModalTitle');
        const modalDesc = document.getElementById('gridModalDesc');

        modalImg.style.opacity = '0';
        setTimeout(() => {
            modalImg.src = currentGridSet[currentGridImageIndex].img;
            modalTitle.textContent = currentGridSet[currentGridImageIndex].title;
            modalDesc.textContent = currentGridSet[currentGridImageIndex].desc;
            modalImg.style.opacity = '1';
        }, 200);
    }

    // ==================== FULL GALLERY MODAL ====================
    let currentFullIndex = 0;
    let fullGalleryInterval;

    function openFullGallery() {
        currentFullIndex = 0;
        const modal = document.getElementById('fullGalleryModal');
        const img = document.getElementById('fullGalleryImage');
        const title = document.getElementById('fullGalleryTitle');
        const desc = document.getElementById('fullGalleryDesc');
        const counter = document.getElementById('fullGalleryCounter');

        img.src = allGalleryData[0].img;
        title.textContent = allGalleryData[0].title;
        desc.textContent = allGalleryData[0].desc;
        counter.textContent = `1 / ${allGalleryData.length}`;

        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.style.overflow = 'hidden';

        updateFullGalleryDots();
        startFullGalleryAutoSlide();
    }

    function closeFullGallery() {
        const modal = document.getElementById('fullGalleryModal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.body.style.overflow = 'auto';
        stopFullGalleryAutoSlide();
    }

    function updateFullGalleryContent() {
        const img = document.getElementById('fullGalleryImage');
        const title = document.getElementById('fullGalleryTitle');
        const desc = document.getElementById('fullGalleryDesc');
        const counter = document.getElementById('fullGalleryCounter');

        img.style.opacity = '0';
        setTimeout(() => {
            img.src = allGalleryData[currentFullIndex].img;
            title.textContent = allGalleryData[currentFullIndex].title;
            desc.textContent = allGalleryData[currentFullIndex].desc;
            counter.textContent = `${currentFullIndex + 1} / ${allGalleryData.length}`;
            img.style.opacity = '1';
        }, 200);

        updateFullGalleryDots();
    }

    function nextFullGallery() {
        currentFullIndex = (currentFullIndex + 1) % allGalleryData.length;
        updateFullGalleryContent();
        resetFullGalleryAutoSlide();
    }

    function prevFullGallery() {
        currentFullIndex = (currentFullIndex - 1 + allGalleryData.length) % allGalleryData.length;
        updateFullGalleryContent();
        resetFullGalleryAutoSlide();
    }

    function goToFullGallery(index) {
        currentFullIndex = index;
        updateFullGalleryContent();
        resetFullGalleryAutoSlide();
    }

    function updateFullGalleryDots() {
        const dotsContainer = document.getElementById('fullGalleryDots');
        dotsContainer.innerHTML = '';

        for (let i = 0; i < allGalleryData.length; i++) {
            const dot = document.createElement('button');
            dot.className = `gallery-dot w-2 h-2 rounded-full transition-all duration-300 mx-1 ${i === currentFullIndex ? 'bg-yellow-400 w-6' : 'bg-gray-500 hover:bg-yellow-300'}`;
            dot.onclick = (function (index) {
                return function () { goToFullGallery(index); };
            })(i);
            dotsContainer.appendChild(dot);
        }
    }

    function startFullGalleryAutoSlide() {
        fullGalleryInterval = setInterval(() => {
            nextFullGallery();
        }, 4000);
    }

    function stopFullGalleryAutoSlide() {
        if (fullGalleryInterval) {
            clearInterval(fullGalleryInterval);
        }
    }

    function resetFullGalleryAutoSlide() {
        stopFullGalleryAutoSlide();
        startFullGalleryAutoSlide();
    }

    // ==================== KEYBOARD NAVIGATION ====================
    document.addEventListener('keydown', function (e) {
        const gridModal = document.getElementById('gridModal');
        const fullModal = document.getElementById('fullGalleryModal');

        if (gridModal && !gridModal.classList.contains('hidden')) {
            if (e.key === 'Escape') closeGridModal();
            if (e.key === 'ArrowLeft') prevGridImage();
            if (e.key === 'ArrowRight') nextGridImage();
        } else if (fullModal && !fullModal.classList.contains('hidden')) {
            if (e.key === 'Escape') closeFullGallery();
            if (e.key === 'ArrowLeft') prevFullGallery();
            if (e.key === 'ArrowRight') nextFullGallery();
        }
    });

    // ==================== HOVER PAUSE UNTUK MODAL ====================
    const modalElement = document.getElementById('fullGalleryModal');
    if (modalElement) {
        modalElement.addEventListener('mouseenter', stopFullGalleryAutoSlide);
        modalElement.addEventListener('mouseleave', startFullGalleryAutoSlide);
    }

    // ==================== INITIALIZE ====================
    startAutoRotate();
</script>