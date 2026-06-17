@php $settings = \App\Models\Setting::first() ?? new \App\Models\Setting(); @endphp
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Homeschooling Group Abdurrahman Bin Auf (HSG ABA) adalah sekolah alternatif berbasis nilai-nilai Islam dengan kurikulum fleksibel, fokus akhlak, sirah nabawiyah, dan program unggulan berkuda, memanah, berenang di Cibinong, Bogor.">
    <meta name="keywords" content="homeschooling, hsg aba, abdurrahman bin auf, homeschooling bogor, homeschooling cibinong, sekolah islam, tahfidz, berkuda, memanah">
    <title>{{ $settings->site_name ?? 'Homeschooling Abdurrahman Bin Auf' }}</title>

    <!-- Favicon / Icon Website dari public/assets/ -->
    <link rel="shortcut icon" href="{{ asset('assets/favicon.png') }}" type="image/png">
    <link rel="icon" href="{{ asset('assets/favicon.png') }}" type="image/png">
    
    <!-- Optional: Untuk tampilan lebih baik di berbagai perangkat -->
    <link rel="apple-touch-icon" href="{{ asset('assets/logo-aba.png') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<style>
    html {
        scroll-behavior: smooth;
    }
</style>
<body class="bg-gray-50">

    <!-- Navbar -->
    @include('components.navbar')
    
    <!-- Content -->
    <main>
        {{ $slot ?? '' }}
        @yield('content')
    </main>

    @include('components.footer')

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if(entry.isIntersecting){
                        entry.target.classList.remove('opacity-0','translate-y-10');
                        entry.target.classList.add('opacity-100','translate-y-0');
                    }
                });
            });

            document.querySelectorAll('.animate-fade').forEach(el => {
                observer.observe(el);
            });
        });
    </script>
</body>
</html>