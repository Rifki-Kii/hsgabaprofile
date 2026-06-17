<section id="contact" class="py-20 bg-gradient-to-br from-blue-900 via-blue-800 to-blue-900 relative overflow-hidden">
    <!-- Decorative background elements -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 left-0 w-96 h-96 bg-yellow-400 rounded-full filter blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-yellow-400 rounded-full filter blur-3xl"></div>
        <div
            class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-80 h-80 bg-yellow-300 rounded-full filter blur-3xl opacity-50">
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Header Section -->
        <div class="text-center mb-12">
            <div class="inline-block">
                <div class="flex justify-center mb-4">
                    <div class="w-16 h-1 bg-yellow-400 rounded-full"></div>
                </div>
                <span class="text-yellow-400 font-semibold text-sm uppercase tracking-wider">Hubungi Kami</span>
            </div>
            <h2 class="text-4xl md:text-5xl font-bold mt-4 mb-4 text-white">
                Siap Memulai Pendidikan Terbaik?
            </h2>
            <p class="text-blue-200 max-w-2xl mx-auto text-lg">
                Konsultasikan kebutuhan pendidikan anak Anda dengan tim kami yang ramah dan profesional
            </p>
        </div>

        <!-- 2 Columns: Contact Info (Left) + Google Maps (Right) -->
        <div class="grid lg:grid-cols-2 gap-8">
            <!-- LEFT SIDE - Contact Cards (WA, Jam Operasional, Sosmed) -->
            <div class="space-y-6">
                <!-- Contact Card 1 - WhatsApp -->
                <div
                    class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20 hover:bg-white/15 transition-all duration-300 group hover:transform hover:-translate-y-1">
                    <div class="flex items-center gap-4">
                        <div
                            class="w-14 h-14 bg-gradient-to-br from-green-400 to-green-500 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12.032 2.002c-5.517 0-10 4.483-10 10 0 1.79.474 3.543 1.366 5.062l-1.377 4.453 4.622-1.323a9.96 9.96 0 0 0 5.39 1.572c5.517 0 10-4.483 10-10s-4.483-10-10-10zm0 18.4c-1.628 0-3.23-.426-4.632-1.23l-.332-.197-2.745.786.764-2.612-.216-.345a8.364 8.364 0 0 1-1.272-4.5c0-4.617 3.756-8.374 8.374-8.374s8.374 3.757 8.374 8.374-3.756 8.374-8.374 8.374zm4.583-6.26c-.25-.125-1.493-.737-1.724-.822-.23-.084-.399-.125-.567.125s-.652.822-.8.99c-.147.168-.295.19-.545.065-.25-.125-1.057-.39-2.013-1.242-.745-.664-1.247-1.484-1.393-1.734-.147-.25-.016-.385.11-.51.112-.112.25-.292.375-.438.125-.146.167-.25.25-.416.084-.167.042-.313-.02-.438-.063-.125-.566-1.365-.775-1.868-.203-.487-.41-.421-.566-.43-.146-.008-.313-.01-.48-.01-.166 0-.436.062-.664.313-.228.25-.87.85-.87 2.074s.89 2.406 1.014 2.573c.125.167 1.75 2.672 4.24 3.746.592.256 1.055.408 1.416.522.595.19 1.136.163 1.564.099.477-.07 1.493-.61 1.704-1.2.21-.59.21-1.095.147-1.2-.062-.104-.229-.167-.478-.292z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-white font-semibold text-lg">WhatsApp</h3>
                            <p class="text-blue-200 text-lg font-semibold">+{{ $settings->whatsapp_number ?? '628121496464' }}</p>
                            <p class="text-blue-300 text-sm">Fast Response • Chat Sekarang</p>
                        </div>
                    </div>
                    <div class="mt-4 pt-4 border-t border-white/10">
                        <a href="https://wa.me/{{ $settings->whatsapp_number ?? '628121496464' }}?text=Hallo%20HSG%20ABA!%20Saya%20ingin%20mendaftar%20dan%20konsultasi%20tentang%20program%20homeschooling." target="_blank"
                            class="text-yellow-400 text-sm hover:text-yellow-300 transition-colors duration-300 flex items-center gap-1">
                            Chat via WhatsApp →
                        </a>
                    </div>
                </div>

                <!-- Contact Card 2 - Jam Operasional -->
                <div
                    class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20 hover:bg-white/15 transition-all duration-300 group hover:transform hover:-translate-y-1">
                    <div class="flex items-center gap-4">
                        <div
                            class="w-14 h-14 bg-gradient-to-br from-yellow-400 to-yellow-500 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-7 h-7 text-blue-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-white font-semibold text-lg">Jam Operasional</h3>
                            <p class="text-blue-200 text-sm">Senin - Sabtu</p>
                        </div>
                    </div>
                    <div class="mt-4 pt-4 border-t border-white/10">
                        <div class="space-y-2">
                            <div class="flex justify-between items-center text-sm">
                                <span class="text-blue-300">Senin - Jumat</span>
                                <span class="text-white font-medium">{{ $settings->operational_mon_fri ?? '08:00 - 16:00' }}</span>
                            </div>
                            <div class="flex justify-between items-center text-sm">
                                <span class="text-blue-300">Sabtu</span>
                                <span class="text-white font-medium">{{ $settings->operational_sat ?? '08:00 - 12:00' }}</span>
                            </div>
                            <div class="flex justify-between items-center text-sm">
                                <span class="text-blue-300">Minggu & Libur Nasional</span>
                                <span class="text-yellow-400 font-medium">{{ $settings->operational_sun ?? 'Tutup' }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Card 3 - Social Media (IG, FB, YT) -->
                <div
                    class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20 hover:bg-white/15 transition-all duration-300 group hover:transform hover:-translate-y-1">
                    <div class="flex items-center gap-4">
                        <div
                            class="w-14 h-14 bg-gradient-to-br from-purple-500 to-pink-500 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                            <i class="fab fa-instagram text-white text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="text-white font-semibold text-lg">Media Sosial</h3>
                            <p class="text-blue-200">Ikuti kami di sosial media</p>
                        </div>
                    </div>
                    <div class="mt-4 pt-4 border-t border-white/10">
                        <div class="flex gap-5 justify-center">
                            <!-- Instagram -->
                            @if($settings->instagram_url)
                            <a href="{{ $settings->instagram_url }}" target="_blank"
                                class="w-12 h-12 bg-gradient-to-br from-pink-500 via-red-500 to-purple-600 rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110 hover:shadow-lg">
                                <i class="fab fa-instagram text-white text-xl"></i>
                            </a>
                            @endif
                            <!-- Facebook -->
                            @if($settings->facebook_url)
                            <a href="{{ $settings->facebook_url }}" target="_blank"
                                class="w-12 h-12 bg-gradient-to-br from-blue-600 to-blue-800 rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110 hover:shadow-lg">
                                <i class="fab fa-facebook-f text-white text-xl"></i>
                            </a>
                            @endif
                            <!-- YouTube -->
                            @if($settings->youtube_url)
                            <a href="{{ $settings->youtube_url }}" target="_blank"
                                class="w-12 h-12 bg-gradient-to-br from-red-600 to-red-700 rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110 hover:shadow-lg">
                                <i class="fab fa-youtube text-white text-xl"></i>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- RIGHT SIDE - Google Maps -->
            <div class="lg:sticky lg:top-24">
                <div
                    class="bg-white/10 backdrop-blur-sm rounded-2xl p-4 border border-white/20 hover:shadow-2xl transition-all duration-300 h-full">
                    <div class="aspect-square md:aspect-video lg:aspect-square rounded-xl overflow-hidden shadow-lg">
                        <iframe
                            src="{{ $settings->google_maps_embed_url ?? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2892.7721463105054!2d106.8424643152278!3d-6.5073633545036405!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c10b84d76c91%3A0x2762a023df5ba211!2sHomeschooling%20ABA!5e0!3m2!1sid!2sid!4v1776259209595!5m2!1sid!2sid' }}"
                            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade" class="w-full h-full"
                            title="Peta Lokasi Homeschooling ABA - Cibinong, Bogor">
                        </iframe>
                    </div>
                    <div class="mt-4 text-center text-blue-200 text-sm">
                        <p class="flex items-center justify-center gap-2 flex-wrap">
                            <span>📍</span>
                            <span class="font-semibold text-white">Homeschooling ABA</span>
                        </p>
                        <p class="text-blue-200 text-xs mt-1 leading-relaxed">
                            {!! nl2br(e($settings->address)) !!}
                        </p>
                        @if($settings->google_maps_large_url)
                        <a href="{{ $settings->google_maps_large_url }}"
                            target="_blank"
                            class="inline-block mt-3 text-yellow-400 text-sm hover:text-yellow-300 transition-colors duration-300">
                            Buka Peta Lebih Besar →
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- CTA Banner -->
        <div class="mt-12 text-center bg-gradient-to-r from-yellow-400 to-yellow-500 rounded-2xl p-8">
            <h3 class="text-2xl font-bold text-blue-900 mb-2">Siap bergabung dengan keluarga besar HSG ABA?</h3>
            <p class="text-blue-800 mb-4">Daftar sekarang dan Kunjungi Kami!</p>
            <a href="https://wa.me/{{ $settings->whatsapp_number ?? '628121496464' }}?text=Hallo%20HSG%20ABA!%20Saya%20ingin%20mendaftar%20dan%20konsultasi%20tentang%20program%20homeschooling." target="_blank"
                class="inline-flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white font-semibold px-8 py-3 rounded-full transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105">
                <i class="fab fa-whatsapp text-xl"></i>
                Daftar Sekarang via WhatsApp
            </a>
        </div>

    </div>
</section>

<style>
    /* Animation for contact cards */
    .space-y-6>div {
        animation: fadeInLeft 0.6s ease forwards;
        opacity: 0;
    }

    .space-y-6>div:nth-child(1) {
        animation-delay: 0.1s;
    }

    .space-y-6>div:nth-child(2) {
        animation-delay: 0.15s;
    }

    .space-y-6>div:nth-child(3) {
        animation-delay: 0.2s;
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

    /* Maps animation */
    .lg\:sticky>div {
        animation: fadeInRight 0.6s ease forwards;
        opacity: 0;
        animation-delay: 0.1s;
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

    /* CTA animation */
    .mt-12 {
        animation: fadeInUp 0.6s ease forwards;
        opacity: 0;
        animation-delay: 0.3s;
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

    /* Hover effects */
    .space-y-6>div:hover {
        transform: translateY(-5px);
    }

    /* Sticky map on desktop */
    @media (min-width: 1024px) {
        .lg\:sticky {
            position: sticky;
            top: 100px;
            align-self: start;
        }
    }

    /* Responsive */
    @media (max-width: 768px) {
        .space-y-6>div {
            padding: 1rem;
        }

        .w-14.h-14 {
            width: 3rem;
            height: 3rem;
        }

        .flex.gap-5 {
            gap: 0.75rem;
        }

        .w-12.h-12 {
            width: 2.5rem;
            height: 2.5rem;
        }
    }
</style>