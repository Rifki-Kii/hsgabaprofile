<nav class="modern-navbar sticky top-0 z-50 transition-all duration-500">
    <div class="max-w-7xl mx-auto px-3 sm:px-4 lg:px-8">
        <div class="flex justify-between items-center py-2 sm:py-3 md:py-4">

            <!-- Logo dengan gambar - Responsif untuk HP -->
            <a href="#hero" class="flex items-center gap-2 sm:gap-3 group cursor-pointer flex-shrink-0">
                <div class="relative">
                    <div class="absolute inset-0 bg-gradient-to-br from-yellow-400/30 to-yellow-500/20 rounded-xl blur-md opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    <div class="relative w-8 h-8 sm:w-10 sm:h-10 md:w-12 md:h-12 bg-white/10 backdrop-blur-sm rounded-xl flex items-center justify-center transition-all duration-300 group-hover:scale-105 overflow-hidden border border-white/20 group-hover:border-yellow-400/50">
                        <img src="{{ asset('assets/logo-aba.png') }}" alt="Logo ABA School" class="w-5 h-5 sm:w-7 sm:h-7 md:w-8 md:h-8 object-contain">
                    </div>
                </div>
                <div class="flex flex-col">
                    <span class="font-semibold text-xs sm:text-sm md:text-base lg:text-lg text-white tracking-wide leading-tight group-hover:text-yellow-400 transition-colors duration-300" 
                          style="font-family: 'Inter', 'Segoe UI', sans-serif; letter-spacing: -0.2px;">
                        Homeschooling Group
                    </span>
                    <span class="font-normal text-[10px] sm:text-xs md:text-sm text-white/75 leading-tight group-hover:text-yellow-400/80 transition-colors duration-300 mt-0.5" 
                          style="font-family: 'Poppins', 'Segoe UI', sans-serif; letter-spacing: 0.2px;">
                        Abdurrahman Bin Auf
                    </span>
                </div>
            </a>

            <!-- DESKTOP MENU + CTA -->
            <div class="hidden md:flex items-center gap-1">
                <ul class="flex items-center gap-1">
                    <li><a href="#hero" class="nav-link-elegant px-4 py-2 text-white/80 hover:text-white font-medium text-sm tracking-wide transition-all duration-300">Beranda</a></li>
                    <li><a href="#program" class="nav-link-elegant px-4 py-2 text-white/80 hover:text-white font-medium text-sm tracking-wide transition-all duration-300">Program</a></li>
                    <li><a href="#gallery" class="nav-link-elegant px-4 py-2 text-white/80 hover:text-white font-medium text-sm tracking-wide transition-all duration-300">Galeri</a></li>
                    <li><a href="#about" class="nav-link-elegant px-4 py-2 text-white/80 hover:text-white font-medium text-sm tracking-wide transition-all duration-300">Tentang</a></li>
                    <li><a href="#faq" class="nav-link-elegant px-4 py-2 text-white/80 hover:text-white font-medium text-sm tracking-wide transition-all duration-300">FAQ</a></li>
                    <li><a href="#contact" class="nav-link-elegant px-4 py-2 text-white/80 hover:text-white font-medium text-sm tracking-wide transition-all duration-300">Kontak</a></li>
                </ul>
                <!-- CTA Button - WhatsApp Warna KUNING -->
                <a href="https://wa.me/{{ $settings->whatsapp_number ?? '628121496464' }}?text=Hallo%20HSG%20ABA!%20Saya%20ingin%20mendaftar%20dan%20konsultasi%20tentang%20program%20homeschooling." 
                   target="_blank" 
                   class="ml-4 inline-flex items-center gap-2 bg-yellow-400 hover:bg-yellow-500 text-blue-900 font-semibold px-6 py-2 rounded-full transition-all duration-300 shadow-md hover:shadow-lg transform hover:scale-105 text-sm">
                    <i class="fab fa-whatsapp text-base"></i>
                    <span>Daftar  </span>
                </a>
            </div>

            <!-- Mobile Menu Button -->
            <button onclick="toggleMenu()" id="menuBtn" class="mobile-menu-btn md:hidden relative w-8 h-8 sm:w-10 sm:h-10 rounded-xl bg-white/5 backdrop-blur-sm hover:bg-white/10 flex items-center justify-center transition-all duration-300 border border-white/10 flex-shrink-0">
                <svg id="menuIcon" class="w-4 h-4 sm:w-5 sm:h-5 text-white transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
                <svg id="closeIcon" class="w-4 h-4 sm:w-5 sm:h-5 text-white hidden transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Garis kuning di ujung navbar -->
    <div class="navbar-yellow-line"></div>

    <!-- MOBILE MENU -->
    <div id="mobileMenu" class="hidden md:hidden mobile-menu-elegant">
        <div class="px-3 sm:px-4 py-3 sm:py-4 space-y-1">
            <a href="#hero" class="mobile-link-elegant flex items-center gap-3 px-4 py-3 text-white/80 hover:text-white hover:bg-white/5 rounded-xl transition-all duration-300" onclick="closeMenu()">
                <span class="text-xl sm:text-2xl w-8 text-center">🏠</span>
                <span class="text-base sm:text-lg">Beranda</span>
            </a>
            <a href="#program" class="mobile-link-elegant flex items-center gap-3 px-4 py-3 text-white/80 hover:text-white hover:bg-white/5 rounded-xl transition-all duration-300" onclick="closeMenu()">
                <span class="text-xl sm:text-2xl w-8 text-center">📚</span>
                <span class="text-base sm:text-lg">Program</span>
            </a>
            <a href="#gallery" class="mobile-link-elegant flex items-center gap-3 px-4 py-3 text-white/80 hover:text-white hover:bg-white/5 rounded-xl transition-all duration-300" onclick="closeMenu()">
                <span class="text-xl sm:text-2xl w-8 text-center">🖼️</span>
                <span class="text-base sm:text-lg">Galeri</span>
            </a>
            <a href="#about" class="mobile-link-elegant flex items-center gap-3 px-4 py-3 text-white/80 hover:text-white hover:bg-white/5 rounded-xl transition-all duration-300" onclick="closeMenu()">
                <span class="text-xl sm:text-2xl w-8 text-center">ℹ️</span>
                <span class="text-base sm:text-lg">Tentang</span>
            </a>
            <a href="#faq" class="mobile-link-elegant flex items-center gap-3 px-4 py-3 text-white/80 hover:text-white hover:bg-white/5 rounded-xl transition-all duration-300" onclick="closeMenu()">
                <span class="text-xl sm:text-2xl w-8 text-center">❓</span>
                <span class="text-base sm:text-lg">FAQ</span>
            </a>
            <a href="#contact" class="mobile-link-elegant flex items-center gap-3 px-4 py-3 text-white/80 hover:text-white hover:bg-white/5 rounded-xl transition-all duration-300" onclick="closeMenu()">
                <span class="text-xl sm:text-2xl w-8 text-center">📞</span>
                <span class="text-base sm:text-lg">Kontak</span>
            </a>
            <!-- CTA WhatsApp di Mobile Menu warna KUNING -->
            <a href="https://wa.me/{{ $settings->whatsapp_number ?? '628121496464' }}?text=Hallo%20HSG%20ABA!%20Saya%20ingin%20mendaftar%20dan%20konsultasi%20tentang%20program%20homeschooling." 
               target="_blank" 
               class="flex items-center justify-center gap-2 bg-yellow-400 hover:bg-yellow-500 text-blue-900 font-semibold px-4 py-3 rounded-xl transition-all duration-300 mt-4">
                <i class="fab fa-whatsapp text-lg"></i>
                <span>Daftar Sekarang</span>
            </a>
        </div>
    </div>
</nav>

<script>
    function toggleMenu() {
        const mobileMenu = document.getElementById('mobileMenu');
        const menuIcon = document.getElementById('menuIcon');
        const closeIcon = document.getElementById('closeIcon');

        mobileMenu.classList.toggle('hidden');
        menuIcon.classList.toggle('hidden');
        closeIcon.classList.toggle('hidden');

        if (!mobileMenu.classList.contains('hidden')) {
            mobileMenu.style.maxHeight = mobileMenu.scrollHeight + 'px';
            mobileMenu.style.opacity = '1';
        } else {
            mobileMenu.style.maxHeight = '0';
            mobileMenu.style.opacity = '0';
        }
    }

    function closeMenu() {
        const mobileMenu = document.getElementById('mobileMenu');
        const menuIcon = document.getElementById('menuIcon');
        const closeIcon = document.getElementById('closeIcon');

        mobileMenu.classList.add('hidden');
        menuIcon.classList.remove('hidden');
        closeIcon.classList.add('hidden');
        mobileMenu.style.maxHeight = '0';
        mobileMenu.style.opacity = '0';
    }

    // Active link highlight
    window.addEventListener('scroll', function () {
        const sections = document.querySelectorAll('section[id]');
        const navLinks = document.querySelectorAll('.nav-link-elegant');
        const mobileNavLinks = document.querySelectorAll('.mobile-link-elegant');

        let current = '';
        sections.forEach(section => {
            const sectionTop = section.offsetTop - 100;
            const sectionHeight = section.clientHeight;
            if (window.scrollY >= sectionTop && window.scrollY < sectionTop + sectionHeight) {
                current = section.getAttribute('id');
            }
        });

        navLinks.forEach(link => {
            link.classList.remove('active-link');
            if (link.getAttribute('href') === `#${current}`) {
                link.classList.add('active-link');
            }
        });

        mobileNavLinks.forEach(link => {
            link.classList.remove('active-mobile-link');
            if (link.getAttribute('href') === `#${current}`) {
                link.classList.add('active-mobile-link');
            }
        });
    });

    // Smooth scroll
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                closeMenu();
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Navbar hide/show on scroll
    let lastScroll = 0;
    window.addEventListener('scroll', () => {
        const navbar = document.querySelector('.modern-navbar');
        const currentScroll = window.pageYOffset;

        if (currentScroll > lastScroll && currentScroll > 100 && !document.getElementById('mobileMenu')?.classList.contains('hidden')) {
            // Jangan hide jika menu terbuka
        } else if (currentScroll > lastScroll && currentScroll > 100) {
            navbar.style.transform = 'translateY(-100%)';
        } else {
            navbar.style.transform = 'translateY(0)';
        }
        lastScroll = currentScroll;
    });

    setTimeout(() => {
        window.dispatchEvent(new Event('scroll'));
    }, 100);
</script>

<style>
    /* Navbar Minimalis Elegan */
    .modern-navbar {
        background: rgba(37, 99, 235, 0.92);
        backdrop-filter: blur(12px);
        border-bottom: none;
        transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1), background 0.3s ease;
        position: relative;
    }

    .modern-navbar.scrolled {
        background: rgba(37, 99, 235, 0.96);
        box-shadow: 0 4px 20px -8px rgba(0, 0, 0, 0.2);
    }

    /* Garis kuning di ujung navbar */
    .navbar-yellow-line {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 2px;
        background: linear-gradient(90deg, 
            transparent 0%, 
            #facc15 10%, 
            #facc15 90%, 
            transparent 100%);
        animation: lineGlow 2s ease-in-out infinite;
    }

    @keyframes lineGlow {
        0%, 100% {
            opacity: 0.8;
            box-shadow: 0 0 2px rgba(250, 204, 21, 0.3);
        }
        50% {
            opacity: 1;
            box-shadow: 0 0 8px rgba(250, 204, 21, 0.6);
        }
    }

    /* Desktop Menu Link - Minimalis */
    .nav-link-elegant {
        position: relative;
        font-weight: 500;
        letter-spacing: 0.01em;
        transition: all 0.3s ease;
    }

    .nav-link-elegant::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%) scaleX(0);
        width: 20px;
        height: 2px;
        background: #facc15;
        border-radius: 2px;
        transition: transform 0.3s ease;
    }

    .nav-link-elegant:hover::after {
        transform: translateX(-50%) scaleX(1);
    }

    .nav-link-elegant.active-link {
        color: #facc15;
    }

    .nav-link-elegant.active-link::after {
        transform: translateX(-50%) scaleX(1);
        background: #facc15;
    }

    /* Mobile Menu - Full width */
    .mobile-menu-elegant {
        background: rgba(37, 99, 235, 0.96);
        backdrop-filter: blur(12px);
        border-top: 1px solid rgba(255, 255, 255, 0.08);
        max-height: 0;
        overflow: hidden;
        opacity: 0;
        transition: max-height 0.4s cubic-bezier(0.4, 0, 0.2, 1), opacity 0.3s ease;
    }

    .mobile-menu-elegant:not(.hidden) {
        max-height: 500px;
        opacity: 1;
    }

    .mobile-link-elegant {
        font-weight: 500;
        letter-spacing: 0.01em;
        transition: all 0.3s ease;
    }

    .mobile-link-elegant.active-mobile-link {
        color: #facc15;
        background: rgba(255, 255, 255, 0.08);
    }

    /* Mobile Menu Button */
    .mobile-menu-btn {
        transition: all 0.3s ease;
    }

    .mobile-menu-btn:active {
        transform: scale(0.92);
    }

    /* Responsive adjustments - Mobile First */
    @media (max-width: 640px) {
        .modern-navbar {
            padding: 0;
        }
        
        .modern-navbar .flex {
            flex-wrap: nowrap;
        }
        
        .flex.flex-col .font-semibold {
            font-size: 11px;
        }
        
        .flex.flex-col .font-normal {
            font-size: 9px;
        }
    }
</style>