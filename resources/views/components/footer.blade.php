<footer class="bg-gradient-to-br from-blue-900 via-blue-800 to-blue-900 text-white relative overflow-hidden">
    
    <!-- Decorative elements -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute top-0 left-0 w-96 h-96 bg-yellow-400 rounded-full filter blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-yellow-400 rounded-full filter blur-3xl"></div>
    </div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 pt-12 pb-6">
        
        <!-- Main Footer Content -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
            
            <!-- Column 1 - Brand & Description -->
            <div class="space-y-4">
                <div class="flex items-center space-x-2 group">
                    <div class="w-10 h-10 bg-gradient-to-br from-yellow-400 to-yellow-500 rounded-lg flex items-center justify-center shadow-md group-hover:scale-105 transition-transform">
                        <span class="text-blue-700 font-bold text-lg">H</span>
                    </div>
                    <h2 class="font-bold text-xl text-white">
                        HSG ABA
                    </h2>
                </div>
                <p class="text-blue-200 text-sm leading-relaxed">
                    Homeschooling Group Abdurrahman Bin Auf - Pendidikan berbasis nilai Islam, adab, dan akhlak mulia untuk mencetak generasi berprestasi.
                </p>
                <!-- Social Media -->
                <div class="flex gap-3 pt-2">
                    @if($settings->instagram_url)
                    <a href="{{ $settings->instagram_url }}" target="_blank" class="w-8 h-8 bg-white/10 hover:bg-gradient-to-br hover:from-pink-500 hover:via-red-500 hover:to-purple-600 rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110 group">
                        <i class="fab fa-instagram text-white text-sm"></i>
                    </a>
                    @endif
                    @if($settings->facebook_url)
                    <a href="{{ $settings->facebook_url }}" target="_blank" class="w-8 h-8 bg-white/10 hover:bg-gradient-to-br hover:from-blue-600 hover:to-blue-800 rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110 group">
                        <i class="fab fa-facebook-f text-white text-sm"></i>
                    </a>
                    @endif
                    @if($settings->youtube_url)
                    <a href="{{ $settings->youtube_url }}" target="_blank" class="w-8 h-8 bg-white/10 hover:bg-gradient-to-br hover:from-red-600 hover:to-red-700 rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110 group">
                        <i class="fab fa-youtube text-white text-sm"></i>
                    </a>
                    @endif
                </div>
            </div>
            
            <!-- Column 2 - Quick Links -->
            <div>
                <h3 class="text-white font-semibold text-lg mb-4 relative inline-block">
                    Link Cepat
                    <div class="absolute bottom-0 left-0 w-full h-0.5 bg-yellow-400 rounded-full"></div>
                </h3>
                <ul class="space-y-2">
                    <li><a href="#hero" class="text-blue-200 hover:text-yellow-400 transition-colors duration-300 flex items-center gap-2 group">→ <span class="group-hover:translate-x-1 transition-transform duration-300">Beranda</span></a></li>
                    <li><a href="#program" class="text-blue-200 hover:text-yellow-400 transition-colors duration-300 flex items-center gap-2 group">→ <span class="group-hover:translate-x-1 transition-transform duration-300">Program</span></a></li>
                    <li><a href="#gallery" class="text-blue-200 hover:text-yellow-400 transition-colors duration-300 flex items-center gap-2 group">→ <span class="group-hover:translate-x-1 transition-transform duration-300">Galeri</span></a></li>
                    <li><a href="#about" class="text-blue-200 hover:text-yellow-400 transition-colors duration-300 flex items-center gap-2 group">→ <span class="group-hover:translate-x-1 transition-transform duration-300">Tentang</span></a></li>
                    <li><a href="#faq" class="text-blue-200 hover:text-yellow-400 transition-colors duration-300 flex items-center gap-2 group">→ <span class="group-hover:translate-x-1 transition-transform duration-300">FAQ</span></a></li>
                    <li><a href="#contact" class="text-blue-200 hover:text-yellow-400 transition-colors duration-300 flex items-center gap-2 group">→ <span class="group-hover:translate-x-1 transition-transform duration-300">Kontak</span></a></li>
                </ul>
            </div>
            
            <!-- Column 3 - Programs -->
            <div>
                <h3 class="text-white font-semibold text-lg mb-4 relative inline-block">
                    Program
                    <div class="absolute bottom-0 left-0 w-full h-0.5 bg-yellow-400 rounded-full"></div>
                </h3>
                <ul class="space-y-2">
                    <li><a href="#program" class="text-blue-200 hover:text-yellow-400 transition-colors duration-300">📚 Pendidikan SD</a></li>
                    <li><a href="#program" class="text-blue-200 hover:text-yellow-400 transition-colors duration-300">🎓 Pendidikan SMP</a></li>
                    <li><a href="#program" class="text-blue-200 hover:text-yellow-400 transition-colors duration-300">⭐ Tahfidz & Tahsin</a></li>
                    <li><a href="#program" class="text-blue-200 hover:text-yellow-400 transition-colors duration-300">🏹 Ekstrakurikuler</a></li>
                </ul>
            </div>
            
            <!-- Column 4 - Contact Info -->
            <div>
                <h3 class="text-white font-semibold text-lg mb-4 relative inline-block">
                    Kontak
                    <div class="absolute bottom-0 left-0 w-full h-0.5 bg-yellow-400 rounded-full"></div>
                </h3>
                <ul class="space-y-3">
                    <li class="flex items-start gap-3 text-blue-200">
                        <i class="fab fa-whatsapp text-green-400 mt-0.5"></i>
                        <span>+{{ $settings->whatsapp_number ?? '628121496464' }}</span>
                    </li>
                    <li class="flex items-start gap-3 text-blue-200">
                        <i class="far fa-clock text-yellow-400 mt-0.5"></i>
                        <span>
                            Senin - Jumat: {{ $settings->operational_mon_fri ?? '08:00 - 16:00' }}<br>
                            Sabtu: {{ $settings->operational_sat ?? '08:00 - 12:00' }}
                        </span>
                    </li>
                    <li class="flex items-start gap-3 text-blue-200">
                        <i class="fas fa-map-marker-alt text-yellow-400 mt-0.5"></i>
                        <span>{!! nl2br(e($settings->address)) !!}</span>
                    </li>
                </ul>
            </div>
            
        </div>
        
        <!-- Bottom Footer -->
        <div class="border-t border-blue-700 pt-6">
            <div class="flex flex-col md:flex-row justify-center items-center gap-4">
                <div class="text-blue-200 text-sm text-center">
                    © 2026 Homeschooling Group Abdurrahman Bin Auf (HSG ABA). All rights reserved.
                </div>
            </div>
        </div>
        
    </div>
</footer>