<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Setting;
use App\Models\HeroSlide;
use App\Models\Program;
use App\Models\Facility;
use App\Models\GalleryItem;
use App\Models\Faq;
use App\Models\AcademicSubject;
use App\Models\Extracurricular;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Seed Admin User
        User::updateOrCreate(
            ['email' => 'admin@hsgaba.com'],
            [
                'name' => 'Admin HSG ABA',
                'password' => Hash::make('password123'),
            ]
        );

        // 2. Seed Settings (Single Row)
        Setting::updateOrCreate(
            ['id' => 1],
            [
                'site_name' => 'Homeschooling Group Abdurrahman Bin Auf',
                'whatsapp_number' => '628121496464',
                'address' => 'Perumahan Jalan Bumi Sentosa Raya, Nomer A1, RT.9/RW.10, Nanggewer Mekar, Cibinong, Bogor Regency, West Java 16912',
                'operational_mon_fri' => '08:00 - 16:00',
                'operational_sat' => '08:00 - 12:00',
                'operational_sun' => 'Tutup',
                'instagram_url' => 'https://www.instagram.com/hsg.aba2011/',
                'facebook_url' => 'https://www.facebook.com/hsg.aba2011/',
                'youtube_url' => 'https://www.youtube.com/@ABAHomeschoolingGroup',
                'google_maps_embed_url' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2892.7721463105054!2d106.8424643152278!3d-6.5073633545036405!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c10b84d76c91%3A0x2762a023df5ba211!2sHomeschooling%20ABA!5e0!3m2!1sid!2sid!4v1776259209595!5m2!1sid!2sid',
                'google_maps_large_url' => 'https://www.google.com/maps?q=Homeschooling+ABA+Cibinong&ll=-6.5073633545036405,106.8424643152278&z=16',
                
                'founder_name' => 'Ibu Nur Arabia Said & Bapak Asta Sidhy Mashoeri',
                'founder_quote' => 'Setiap anak adalah bintang dengan cahayanya masing-masing. Tugas kita adalah membantu mereka menemukan dan memancarkan cahaya itu dengan adab dan ilmu.',
                'founder_bio' => 'Ibu Nur Arabia Said adalah sosok yang menguasai sirah, terutama kitab Siroh Nabawiyah Ibnu Hisyam. Bersama suami, beliau mendirikan HSG-ABA pada tahun 2011 setelah berhasil menjalankan homeschooling mandiri untuk putra pertama mereka, Azka Haqqani, yang kemudian melanjutkan studi di Al-Azhar Asy-Syarif, Kairo, Mesir.',
                'founder_facebook_url' => 'https://www.facebook.com/hsg.aba2011/',
                'founder_instagram_url' => 'https://www.instagram.com/hsg.aba2011/',
                'founder_youtube_url' => 'https://www.youtube.com/@ABAHomeschoolingGroup',
                'founder_image_path' => 'assets/about/bundanur.png',

                // Profile Fields
                'profile_title' => 'HSG Abdurrahman Bin Auf',
                'profile_description_1' => 'Homeschooling Group Abdurrahman bin Auf, dikenal dengan HSG-ABA, berdiri pada tanggal 11 Januari 2011. HSG-ABA didirikan oleh Ibu Nur Arabia Said dan Bapak Asta Sidhy Mashoeri, pasangan suami-istri yang sebelumnya telah menjalankan homeschooling terhadap putra pertama mereka yang bernama Azka Haqqani.',
                'profile_description_2' => 'Pada awal berdirinya, HSG-ABA membuka tingkat pendidikan kindergarten (taman kanak-kanak). Pada tahun 2014, membuka tingkat elementary school (sekolah dasar). Kemudian pada tahun 2016, membuka tingkat junior high school (sekolah menengah pertama) yang semuanya berjalan hingga saat ini.',
                'profile_feature_1' => 'Maksimal 10 Siswa/Kelas',
                'profile_feature_2' => 'Fokus Akidah, Akhlak & Sirah',
                'profile_feature_3' => 'Ijazah Negeri (SD)',
                'profile_feature_4' => 'Fasilitas Kolam Renang & Lapangan',
                'profile_image_path' => 'assets/facility/gedunghsgaba.jpeg',
                'profile_image_caption' => 'Gedung HSG ABA - Lingkungan Belajar yang Nyaman & Islami',
            ]
        );

        // 3. Seed Hero Slides
        HeroSlide::truncate();
        $heroSlides = [
            [
                'image_path' => 'assets/hero/panahan.png',
                'title' => 'Homeschooling Group',
                'subtitle' => 'Abdurrahman Bin Auf',
                'welcome_tag' => 'Welcome To',
                'sort_order' => 1,
            ],
            [
                'image_path' => 'assets/hero/belajar.jpg',
                'title' => 'Belajar Fleksibel dan Menyenangkan',
                'subtitle' => 'Sesuai kebutuhan & gaya belajar anak',
                'button_text' => '🎯 Lihat Program',
                'button_url' => '#program',
                'sort_order' => 2,
            ],
            [
                'image_path' => 'assets/hero/creative.jpg',
                'title' => 'Kreatif & Mandiri',
                'subtitle' => 'Mengembangkan potensi terbaik anak',
                'button_text' => '🖼️ Lihat Galeri',
                'button_url' => '#gallery',
                'sort_order' => 3,
            ],
            [
                'image_path' => 'assets/hero/ahklakilmu.jpeg',
                'title' => 'Akhlak & Ilmu',
                'subtitle' => 'Membangun generasi berkarakter & berprestasi',
                'button_text' => '📖 Tentang Kami',
                'button_url' => '#about',
                'sort_order' => 4,
            ]
        ];
        foreach ($heroSlides as $slide) {
            HeroSlide::create($slide);
        }

        // 4. Seed Programs
        Program::truncate();
        $programs = [
            [
                'title' => 'Siroh',
                'description' => "Siroh Rasulullah, Sahabat, Tabi'in, Tabi'ut Tabi'in, Ulama Mazhab, Ulama Hadist, Para Pemikir Islam",
                'icon' => '📜',
                'badge_color' => 'blue',
                'image_path' => 'https://placehold.co/600x400/1E3A8A/FFFFFF?text=Siroh',
                'sort_order' => 1,
            ],
            [
                'title' => "Ma'arifatullah",
                'description' => 'Asmaul Husna',
                'icon' => '🕋',
                'badge_color' => 'yellow',
                'image_path' => 'https://placehold.co/600x400/FBBF24/1E3A8A?text=Ma%27arifatullah',
                'sort_order' => 2,
            ],
            [
                'title' => 'Tahfidz & Tahsin',
                'description' => 'Metode Ummi',
                'icon' => '📖',
                'badge_color' => 'green',
                'image_path' => 'https://placehold.co/600x400/22C55E/FFFFFF?text=Tahfidz',
                'sort_order' => 3,
            ],
            [
                'title' => 'Geografi',
                'description' => 'Pemahaman tentang bumi dan alam semesta',
                'icon' => '🗺️',
                'badge_color' => 'purple',
                'image_path' => 'https://placehold.co/600x400/A855F7/FFFFFF?text=Geografi',
                'sort_order' => 4,
            ],
            [
                'title' => 'Adab',
                'description' => 'Pembentukan karakter dan akhlak mulia',
                'icon' => '🌸',
                'badge_color' => 'pink',
                'image_path' => 'https://placehold.co/600x400/EC4899/FFFFFF?text=Adab',
                'sort_order' => 5,
            ],
            [
                'title' => 'Interactive Mapping',
                'description' => 'Pembelajaran interaktif berbasis teknologi',
                'icon' => '🖱️',
                'badge_color' => 'orange',
                'image_path' => 'https://placehold.co/600x400/F97316/FFFFFF?text=Interactive+Mapping',
                'sort_order' => 6,
            ],
            [
                'title' => 'Kreativitas & Cooking Class',
                'description' => 'Mengembangkan kreativitas dan kemandirian anak',
                'icon' => '👨‍🍳',
                'badge_color' => 'yellow-accent',
                'image_path' => 'https://placehold.co/600x400/FBBF24/1E3A8A?text=Cooking+Class',
                'sort_order' => 7,
            ],
            [
                'title' => 'FieldTrip',
                'description' => 'Belajar di luar kelas untuk pengalaman berkesan',
                'icon' => '🚌',
                'badge_color' => 'green-accent',
                'image_path' => 'assets/program/fieldtrip.jpeg',
                'sort_order' => 8,
            ]
        ];
        foreach ($programs as $prog) {
            Program::create($prog);
        }

        // 5. Seed Facilities
        Facility::truncate();
        $facilities = [
            [
                'title' => 'Gedung HSG ABA',
                'description' => 'Gedung sekolah yang representatif, nyaman, dan dilengkapi dengan fasilitas lengkap untuk mendukung proses belajar mengajar yang optimal.',
                'image_path' => 'assets/facility/gedunghsgaba.jpeg',
                'icon' => 'fas fa-building',
                'sort_order' => 1,
            ],
            [
                'title' => 'Kolam Renang',
                'description' => 'Kolam renang yang bersih dan aman untuk pembelajaran renang serta kegiatan olahraga air bagi siswa.',
                'image_path' => 'https://placehold.co/600x400/0891B2/FFFFFF?text=Kolam+Renang',
                'icon' => 'fas fa-swimmer',
                'sort_order' => 2,
            ],
            [
                'title' => 'Lapangan Olahraga',
                'description' => 'Lapangan multifungsi untuk berbagai kegiatan olahraga seperti futsal, basket, sepak bola, dan atletik.',
                'image_path' => 'https://placehold.co/600x400/EA580C/FFFFFF?text=Lapangan+Olahraga',
                'icon' => 'fas fa-futbol',
                'sort_order' => 3,
            ],
            [
                'title' => 'Ruang Kelas',
                'description' => 'Ruang kelas yang nyaman dengan AC, multimedia interaktif, dan kapasitas terbatas untuk pembelajaran efektif.',
                'image_path' => 'https://placehold.co/600x400/4F46E5/FFFFFF?text=Ruang+Kelas',
                'icon' => 'fas fa-chalkboard-teacher',
                'sort_order' => 4,
            ],
            [
                'title' => 'Mushola',
                'description' => 'Mushola yang nyaman dan bersih untuk melaksanakan ibadah sholat berjamaah dan kegiatan keagamaan.',
                'image_path' => 'https://placehold.co/600x400/059669/FFFFFF?text=Mushola',
                'icon' => 'fas fa-mosque',
                'sort_order' => 5,
            ],
            [
                'title' => 'Perpustakaan',
                'description' => 'Perpustakaan dengan koleksi buku lengkap, area baca nyaman, dan akses digital untuk menambah wawasan.',
                'image_path' => 'https://placehold.co/600x400/CA8A04/FFFFFF?text=Perpustakaan',
                'icon' => 'fas fa-book-open',
                'sort_order' => 6,
            ],
            [
                'title' => 'Dapur Sehat',
                'description' => 'Dapur bersih dan higienis untuk menyiapkan makanan sehat bagi siswa, serta area cooking class.',
                'image_path' => 'https://placehold.co/600x400/E11D48/FFFFFF?text=Dapur+Sehat',
                'icon' => 'fas fa-kitchen-set',
                'sort_order' => 7,
            ]
        ];
        foreach ($facilities as $fac) {
            Facility::create($fac);
        }

        // 6. Seed Gallery Items
        GalleryItem::truncate();
        $galleryItems = [
            [
                'title' => '🎭 Festival Budaya',
                'description' => 'Penampilan seni dan budaya siswa dalam memperingati hari besar nasional, menampilkan kreativitas dan bakat terbaik',
                'image_path' => 'assets/gallery/festivalbudaya.JPG',
                'sort_order' => 1,
            ],
            [
                'title' => '🎨 Pentas Seni Budaya',
                'description' => 'Suasana meriah festival budaya dengan berbagai atraksi seni tradisional yang ditampilkan oleh siswa',
                'image_path' => 'assets/gallery/festivalbudaya2.JPG',
                'sort_order' => 2,
            ],
            [
                'title' => '🕌 Peringatan Maulid Nabi',
                'description' => 'Kegiatan peringatan Maulid Nabi Muhammad ﷺ dengan pembacaan sholawat dan kajian sirah nabawiyah',
                'image_path' => 'assets/gallery/maulid.jpeg',
                'sort_order' => 3,
            ],
            [
                'title' => '❄️ Wahana Bermain Salju',
                'description' => 'Kegiatan rekreasi edukatif di wahana bermain salju, pengalaman seru bersama teman-teman',
                'image_path' => 'assets/gallery/salju.jpeg',
                'sort_order' => 4,
            ],
            [
                'title' => '🐮 Field Trip Starfarm',
                'description' => 'Belajar langsung tentang peternakan dan pertanian di Starfarm, pengalaman menyenangkan bersama alam',
                'image_path' => 'assets/gallery/starfarm.jpeg',
                'sort_order' => 5,
            ],
            [
                'title' => '✈️ Study Tour Luar Negeri',
                'description' => 'Program study tour ke luar negeri untuk memperluas wawasan global dan pengalaman internasional siswa',
                'image_path' => 'assets/gallery/tour.jpeg',
                'sort_order' => 6,
            ],
            [
                'title' => '🥋 Ekstrakurikuler Taekwondo',
                'description' => 'Latihan beladiri taekwondo untuk membentuk karakter disiplin, percaya diri, dan fisik yang kuat',
                'image_path' => 'assets/gallery/taekwondo.jpeg',
                'sort_order' => 7,
            ],
            [
                'title' => '🎵 Aktivitas Ibadah',
                'description' => 'Pembiasaan adzan dan ibadah harian sebagai bentuk penanaman nilai-nilai keislaman sejak dini',
                'image_path' => 'assets/gallery/adzan.jpeg',
                'sort_order' => 8,
            ],
            [
                'title' => '🖌️ Karya Kreatif Mandiri',
                'description' => 'Hasil karya kreatif siswa yang mandiri dan inovatif, mengasah kemampuan seni dan keterampilan',
                'image_path' => 'assets/gallery/karya.jpeg',
                'sort_order' => 9,
            ],
            [
                'title' => '🐰 Bermain Dengan Hewan',
                'description' => 'Kegiatan interaksi dengan hewan yang mengajarkan rasa sayang, empati, dan tanggung jawab kepada makhluk hidup',
                'image_path' => 'assets/gallery/kelinci.jpeg',
                'sort_order' => 10,
            ]
        ];
        foreach ($galleryItems as $gal) {
            GalleryItem::create($gal);
        }

        // 7. Seed FAQs
        Faq::truncate();
        $faqs = [
            [
                'question' => 'Apa itu homeschooling?',
                'answer' => 'Homeschooling adalah sistem pendidikan formal yang dilakukan di rumah dengan kurikulum yang terstandarisasi, dimana orang tua berperan aktif dalam proses pembelajaran bersama tutor profesional. Di ABA School, kami menyediakan bimbingan dan materi pembelajaran yang lengkap sesuai dengan jenjang pendidikan.',
                'sort_order' => 1,
            ],
            [
                'question' => 'Bagaimana cara mendaftar di ABA School?',
                'answer' => "Pendaftaran sangat mudah! Ikuti langkah-langkah berikut:\n1. Klik tombol \"Daftar Sekarang\" di halaman ini\n2. Isi formulir pendaftaran online\n3. Tim kami akan menghubungi untuk jadwal konsultasi\n4. Lakukan pembayaran biaya pendaftaran\n5. Mulai belajar bersama ABA School!",
                'sort_order' => 2,
            ],
            [
                'question' => 'Apakah ijazah homeschooling diakui?',
                'answer' => 'Ya, ijazah homeschooling dari ABA School diakui secara resmi dan setara dengan ijazah sekolah formal. Kami terakreditasi oleh lembaga yang berwenang dan menggunakan kurikulum nasional yang telah disetujui. Lulusan kami dapat melanjutkan ke jenjang pendidikan yang lebih tinggi atau memasuki dunia kerja.',
                'sort_order' => 3,
            ],
            [
                'question' => 'Berapa biaya homeschooling di ABA School?',
                'answer' => 'Biaya homeschooling di ABA School sangat terjangkau dan dapat disesuaikan dengan program yang dipilih. Kami menawarkan beberapa paket pembelajaran dengan sistem pembayaran yang fleksibel (bulanan atau per semester).',
                'sort_order' => 4,
            ],
            [
                'question' => 'Siapa yang akan mengajar anak saya?',
                'answer' => 'Anak Anda akan dibimbing oleh tutor-tutor profesional yang berpengalaman di bidangnya. Setiap tutor telah melalui proses seleksi ketat dan pelatihan khusus untuk homeschooling. Kami juga menyediakan pendampingan orang tua agar dapat terlibat aktif dalam proses pembelajaran.',
                'sort_order' => 5,
            ]
        ];
        foreach ($faqs as $faq) {
            Faq::create($faq);
        }

        // 8. Seed Academic Subjects
        AcademicSubject::truncate();
        $academicSubjects = [
            [
                'name' => 'Matematika',
                'icon' => 'fas fa-calculator',
                'focus' => 'Logika & Analisis',
                'description' => 'Melatih penalaran logis dan pemecahan masalah secara aplikatif.',
                'sort_order' => 1,
            ],
            [
                'name' => 'Bahasa Indonesia',
                'icon' => 'fas fa-pen-fancy',
                'focus' => 'Karakter & Literasi',
                'description' => 'Mengembangkan kemampuan berkomunikasi dan apresiasi sastra.',
                'sort_order' => 2,
            ],
            [
                'name' => 'Bahasa Inggris',
                'icon' => 'fas fa-language',
                'focus' => 'Komunikasi Global',
                'description' => 'Fokus pada percakapan aktif untuk membangun rasa percaya diri.',
                'sort_order' => 3,
            ],
            [
                'name' => 'IPA / Sains',
                'icon' => 'fas fa-flask',
                'focus' => 'Tadabbur Alam',
                'description' => 'Mengamati kebesaran Allah melalui sains dan alam sekitar.',
                'sort_order' => 4,
            ],
            [
                'name' => 'Persiapan Ujian',
                'icon' => 'fas fa-graduation-cap',
                'focus' => 'Sukses Akademik',
                'description' => 'Bimbingan terarah mempersiapkan siswa menghadapi kelulusan.',
                'sort_order' => 5,
            ]
        ];
        foreach ($academicSubjects as $subject) {
            AcademicSubject::create($subject);
        }

        // 9. Seed Extracurriculars
        Extracurricular::truncate();
        $extracurriculars = [
            [
                'name' => 'Berkuda',
                'category' => 'Sunnah Rasul',
                'description' => 'Melatih keberanian, keseimbangan, dan ketangkasan fisik.',
                'icon' => '🐎',
                'image_path' => 'https://images.unsplash.com/photo-1553284965-83fd3e82fa52?auto=format&fit=crop&w=400&q=80',
                'sort_order' => 1,
            ],
            [
                'name' => 'Al-Quran',
                'category' => 'Tahfidz & Tahsin',
                'description' => 'Tahsin makhraj dan hafalan Juz 30 dengan menyenangkan.',
                'icon' => '📖',
                'image_path' => 'https://images.unsplash.com/photo-1609599006353-e629f1dca0a1?auto=format&fit=crop&w=400&q=80',
                'sort_order' => 2,
            ],
            [
                'name' => 'Berenang',
                'category' => 'Sunnah Rasul',
                'description' => 'Melatih motorik, pernafasan, dan keselamatan di air.',
                'icon' => '🏊',
                'image_path' => 'https://images.unsplash.com/photo-1519766304817-4f37bda74a27?auto=format&fit=crop&w=400&q=80',
                'sort_order' => 3,
            ],
            [
                'name' => 'Panahan',
                'category' => 'Sunnah Rasul',
                'description' => 'Melatih fokus, konsentrasi, ketenangan, dan akurasi.',
                'icon' => '🏹',
                'image_path' => 'assets/gallery/panah.jpeg',
                'sort_order' => 4,
            ],
            [
                'name' => 'Taekwondo',
                'category' => 'Fisik & Disiplin',
                'description' => 'Membentuk fisik yang kuat, bela diri, dan disiplin diri.',
                'icon' => '🥋',
                'image_path' => 'assets/gallery/taekwondo.jpeg',
                'sort_order' => 5,
            ]
        ];
        foreach ($extracurriculars as $ekskul) {
            Extracurricular::create($ekskul);
        }
    }
}
