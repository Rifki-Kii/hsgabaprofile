<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - HSG ABA</title>
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/favicon.png') }}" type="image/png">
    
    <!-- FontAwesome & Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    
    @livewireStyles
    
    <style>
        [x-cloak] { display: none !important; }
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 3px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        /* Global compact sizing for inputs, selects and textareas */
        input[type="text"], 
        input[type="number"], 
        input[type="email"], 
        input[type="password"], 
        input[type="url"], 
        textarea, 
        select {
            font-size: 11px !important;
            padding: 6px 10px !important;
            border-radius: 6px !important;
        }
        
        /* Standardize label style */
        label {
            font-size: 10px !important;
            font-weight: 700 !important;
            color: #64748b !important;
            letter-spacing: 0.05em !important;
            margin-bottom: 3px !important;
        }

        /* Compact Table Sizing */
        table th {
            padding: 8px 12px !important;
            font-size: 10px !important;
        }
        table td {
            padding: 8px 12px !important;
            font-size: 11px !important;
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 antialiased font-sans h-screen overflow-hidden">

    <div class="h-full flex" x-data="{ sidebarOpen: false }">
        
        <!-- Mobile Sidebar Backdrop -->
        <div class="fixed inset-0 z-40 bg-slate-900/40 backdrop-blur-sm md:hidden"
             x-show="sidebarOpen"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             @click="sidebarOpen = false"
             x-cloak>
        </div>

        <!-- Sidebar -->
        <aside class="fixed inset-y-0 left-0 z-50 flex w-64 flex-col bg-slate-900 text-slate-400 border-r border-slate-800 transition-transform duration-300 md:static md:translate-x-0"
               :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
               x-cloak>
            
            <!-- Brand -->
            <div class="flex h-14 items-center px-5 border-b border-slate-800 bg-slate-950">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2.5">
                    <img src="{{ asset('assets/logo-aba.png') }}" alt="Logo" class="w-7 h-7 object-contain">
                    <div class="flex flex-col">
                        <span class="text-xs font-bold text-white leading-tight">HSG ABA</span>
                        <span class="text-[9px] text-slate-500">Panel Konten</span>
                    </div>
                </a>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 space-y-0.5 px-3 py-4 overflow-y-auto">
                <a href="{{ route('admin.dashboard') }}" 
                   class="flex items-center gap-2.5 px-3 py-2 rounded-lg text-xs font-medium transition-all duration-200 {{ request()->routeIs('admin.dashboard') ? 'bg-blue-600 text-white shadow-md shadow-blue-600/20' : 'hover:bg-slate-800 hover:text-slate-200' }}">
                    <i class="fa-solid fa-chart-pie text-sm"></i>
                    <span>Dashboard</span>
                </a>

                <div class="pt-3 pb-1.5 px-3 text-[9px] font-bold uppercase tracking-wider text-slate-600">Manajemen Konten</div>

                <a href="{{ route('admin.heroes') }}" 
                   class="flex items-center gap-2.5 px-3 py-2 rounded-lg text-xs font-medium transition-all duration-200 {{ request()->routeIs('admin.heroes') ? 'bg-blue-600 text-white shadow-md shadow-blue-600/20' : 'hover:bg-slate-800 hover:text-slate-200' }}">
                    <i class="fa-solid fa-images text-sm"></i>
                    <span>Hero Slider</span>
                </a>

                <a href="{{ route('admin.programs') }}" 
                   class="flex items-center gap-2.5 px-3 py-2 rounded-lg text-xs font-medium transition-all duration-200 {{ request()->routeIs('admin.programs') ? 'bg-blue-600 text-white shadow-md shadow-blue-600/20' : 'hover:bg-slate-800 hover:text-slate-200' }}">
                    <i class="fa-solid fa-graduation-cap text-sm"></i>
                    <span>Program Unggulan</span>
                </a>

                <a href="{{ route('admin.facilities') }}" 
                   class="flex items-center gap-2.5 px-3 py-2 rounded-lg text-xs font-medium transition-all duration-200 {{ request()->routeIs('admin.facilities') ? 'bg-blue-600 text-white shadow-md shadow-blue-600/20' : 'hover:bg-slate-800 hover:text-slate-200' }}">
                    <i class="fa-solid fa-building text-sm"></i>
                    <span>Fasilitas</span>
                </a>

                <a href="{{ route('admin.gallery') }}" 
                   class="flex items-center gap-2.5 px-3 py-2 rounded-lg text-xs font-medium transition-all duration-200 {{ request()->routeIs('admin.gallery') ? 'bg-blue-600 text-white shadow-md shadow-blue-600/20' : 'hover:bg-slate-800 hover:text-slate-200' }}">
                    <i class="fa-solid fa-photo-film text-sm"></i>
                    <span>Galeri Momen</span>
                </a>


                <a href="{{ route('admin.academic-subjects') }}" 
                   class="flex items-center gap-2.5 px-3 py-2 rounded-lg text-xs font-medium transition-all duration-200 {{ request()->routeIs('admin.academic-subjects') ? 'bg-blue-600 text-white shadow-md shadow-blue-600/20' : 'hover:bg-slate-800 hover:text-slate-200' }}">
                    <i class="fa-solid fa-book-open text-sm"></i>
                    <span>Pelajaran Akademik</span>
                </a>

                <a href="{{ route('admin.extracurriculars') }}" 
                   class="flex items-center gap-2.5 px-3 py-2 rounded-lg text-xs font-medium transition-all duration-200 {{ request()->routeIs('admin.extracurriculars') ? 'bg-blue-600 text-white shadow-md shadow-blue-600/20' : 'hover:bg-slate-800 hover:text-slate-200' }}">
                    <i class="fa-solid fa-star text-sm"></i>
                    <span>Ekstrakurikuler</span>
                </a>

                <a href="{{ route('admin.faqs') }}" 
                   class="flex items-center gap-2.5 px-3 py-2 rounded-lg text-xs font-medium transition-all duration-200 {{ request()->routeIs('admin.faqs') ? 'bg-blue-600 text-white shadow-md shadow-blue-600/20' : 'hover:bg-slate-800 hover:text-slate-200' }}">
                    <i class="fa-solid fa-circle-question text-sm"></i>
                    <span>FAQ Tanya Jawab</span>
                </a>
                <div class="pt-3 pb-1.5 px-3 text-[9px] font-bold uppercase tracking-wider text-slate-600">Pengaturan</div>

                <a href="{{ route('admin.settings') }}" 
                   class="flex items-center gap-2.5 px-3 py-2 rounded-lg text-xs font-medium transition-all duration-200 {{ request()->routeIs('admin.settings') ? 'bg-blue-600 text-white shadow-md shadow-blue-600/20' : 'hover:bg-slate-800 hover:text-slate-200' }}">
                    <i class="fa-solid fa-sliders text-sm"></i>
                    <span>Informasi Website</span>
                </a>
            </nav>

            <!-- User Profile & Logout -->
            <div class="p-3 border-t border-slate-800 bg-slate-950">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-2.5">
                        <div class="w-8 h-8 rounded-full bg-blue-600 text-white flex items-center justify-center text-xs font-bold">
                            {{ substr(auth()->user()->name ?? 'A', 0, 1) }}
                        </div>
                        <div class="flex flex-col">
                            <span class="text-xs font-semibold text-white leading-tight">{{ auth()->user()->name ?? 'Administrator' }}</span>
                            <span class="text-[10px] text-slate-500">Online</span>
                        </div>
                    </div>
                    
                    <form action="{{ route('admin.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="p-1.5 text-slate-500 hover:text-red-500 transition-colors" title="Keluar">
                            <i class="fa-solid fa-arrow-right-from-bracket text-sm"></i>
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <!-- Content Area -->
        <div class="flex-1 flex flex-col min-w-0 overflow-hidden">
            
            <!-- Header -->
            <header class="h-12 flex items-center justify-between px-4 bg-white border-b border-slate-200 shadow-sm shrink-0">
                <div class="flex items-center gap-3">
                    <button class="text-slate-500 hover:text-slate-800 md:hidden" @click="sidebarOpen = !sidebarOpen">
                        <i class="fa-solid fa-bars text-lg"></i>
                    </button>
                    <h2 class="text-xs font-bold text-slate-800 uppercase tracking-wider">
                        @yield('header_title', 'Dashboard Utama')
                    </h2>
                </div>
                
                <div class="flex items-center gap-3">
                    <a href="{{ url('/') }}" target="_blank" class="text-[10px] bg-slate-100 hover:bg-slate-200 text-slate-600 font-semibold px-3 py-1.5 rounded-md transition-colors flex items-center gap-1.5">
                        <i class="fa-solid fa-globe"></i>
                        <span>Lihat Website</span>
                    </a>
                </div>
            </header>

            <!-- Main Content Grid -->
            <main class="flex-1 overflow-y-auto p-4 bg-slate-50">
                @if (session()->has('message'))
                    <div class="mb-4 bg-green-50 border border-green-200 text-green-700 px-3 py-2 rounded-lg flex items-center gap-2 shadow-xs">
                        <i class="fa-solid fa-circle-check text-xs"></i>
                        <span class="text-[11px] font-semibold">{{ session('message') }}</span>
                    </div>
                @endif

                {{ $slot ?? '' }}
                @yield('content')
            </main>
        </div>

    </div>

    @livewireScripts
</body>
</html>
