<section id="faq" class="py-20 bg-gradient-to-br from-blue-50 via-white to-yellow-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header Section -->
        <div class="text-center mb-12">
            <div class="inline-block">
                <div class="flex justify-center mb-4">
                    <div class="w-16 h-1 bg-yellow-400 rounded-full"></div>
                </div>
                <span class="text-yellow-600 font-semibold text-sm uppercase tracking-wider">Pertanyaan Umum</span>
            </div>
            <h2 class="text-4xl md:text-5xl font-bold mt-4 mb-4 bg-gradient-to-r from-blue-700 to-blue-500 bg-clip-text text-transparent">
                Frequently Asked Questions
            </h2>
            <p class="text-gray-600 max-w-2xl mx-auto text-lg">
                Temukan jawaban atas pertanyaan yang sering diajukan tentang homeschooling di ABA School
            </p>
        </div>

        <!-- FAQ Items -->
        <div class="space-y-4">
            @forelse($faqs as $index => $faq)
            <!-- FAQ {{ $index + 1 }} -->
            <div class="faq-item bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden">
                <button onclick="toggleFAQ({{ $index }})" class="faq-question w-full text-left p-5 md:p-6 font-semibold flex justify-between items-center group">
                    <span class="text-lg md:text-xl text-gray-800 group-hover:text-blue-700 transition-colors duration-300">
                        ❓ {{ $faq->question }}
                    </span>
                    <div class="faq-icon w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center group-hover:bg-blue-200 transition-all duration-300">
                        <svg class="w-5 h-5 text-blue-600 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </button>
                <div class="faq-content hidden px-5 pb-5 md:px-6 md:pb-6">
                    <div class="border-t-2 border-yellow-400 pt-4">
                        <p class="text-gray-600 leading-relaxed whitespace-pre-line">{{ $faq->answer }}</p>
                    </div>
                </div>
            </div>
            @empty
            <div class="text-center text-gray-500 py-8 bg-white rounded-2xl shadow-lg">
                Belum ada pertanyaan umum (FAQ).
            </div>
            @endforelse
        </div>

        <!-- Still Have Questions -->
        <div class="mt-12 text-center bg-gradient-to-r from-blue-600 to-blue-700 rounded-2xl p-8 text-white">
            <h3 class="text-2xl font-bold mb-2">Masih punya pertanyaan?</h3>
            <p class="mb-4 opacity-90">Hubungi tim kami untuk konsultasi lebih lanjut</p>
            <div class="flex flex-wrap gap-4 justify-center">
                <a href="#contact" class="inline-block bg-yellow-400 hover:bg-yellow-300 text-blue-900 font-semibold px-6 py-2 rounded-full transition-all duration-300 shadow-md hover:shadow-lg">
                    📞 Hubungi Kami
                </a>
                <a href="https://wa.me/{{ $settings->whatsapp_number ?? '628121496464' }}?text=Hallo%20HSG%20ABA!%20Saya%20ingin%20bertanya%20tentang%20homeschooling." 
                   target="_blank" 
                   class="inline-block bg-white/20 hover:bg-white/30 text-white font-semibold px-6 py-2 rounded-full transition-all duration-300 backdrop-blur-sm">
                    💬 Chat WhatsApp
                </a>
            </div>
        </div>
    </div>
</section>

<script>
function toggleFAQ(index) {
    const faqContents = document.querySelectorAll('.faq-content');
    const faqIcons = document.querySelectorAll('.faq-icon svg');
    const faqItems = document.querySelectorAll('.faq-item');
    
    // Toggle current FAQ
    if (faqContents[index].classList.contains('hidden')) {
        // Close all other FAQs first
        faqContents.forEach((content, i) => {
            if (i !== index && !content.classList.contains('hidden')) {
                content.classList.add('hidden');
                faqIcons[i].style.transform = 'rotate(0deg)';
                faqItems[i].classList.remove('ring-2', 'ring-yellow-400');
            }
        });
        
        // Open current FAQ
        faqContents[index].classList.remove('hidden');
        faqIcons[index].style.transform = 'rotate(180deg)';
        faqItems[index].classList.add('ring-2', 'ring-yellow-400');
    } else {
        // Close current FAQ
        faqContents[index].classList.add('hidden');
        faqIcons[index].style.transform = 'rotate(0deg)';
        faqItems[index].classList.remove('ring-2', 'ring-yellow-400');
    }
}

// Optional: Open first FAQ by default (uncomment if desired)
// setTimeout(() => {
//     toggleFAQ(0);
// }, 500);
</script>

<style>
/* FAQ Item Animations */
.faq-item {
    transition: all 0.3s ease;
}

.faq-question svg {
    transition: transform 0.3s ease;
}

.faq-content {
    animation: slideDown 0.3s ease forwards;
}

@keyframes slideDown {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Hover effects */
.faq-item:hover {
    transform: translateY(-2px);
}

/* Responsive */
@media (max-width: 640px) {
    .faq-question span {
        font-size: 1rem;
    }
}
</style>