<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('Sistem Informasi Perpustakaan Azzhahiriyah', 'Laravel') }}</title>
    <link rel="icon" href="{{ asset('azzhahiriyah.png') }}" type="image/png">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="shortcut icon" href="{{ asset(Storage::url($setting->favicon ?? 'favicons/favicon.ico')) }}"
        type="image/x-icon">
    <!-- Styles -->
    <link rel="stylesheet" href="/assets/app.css">
    <link rel="stylesheet" href="/assets/watermark.css">
    <!-- Scripts -->
    <script src="/assets/app.js" defer></script>
    <style>
        .watermark {
            background-image: url('{{ asset('storage/' . App\Models\Setting::first()->logo) }}');
        }

        .triangle-text {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            text-align: left;
            font-size: 0.5rem;
            font-weight: bold;
            line-height: 1;
            color: #6b7280;
            margin-top: 0;
            margin-left: 5px;
        }

        .top-text {
            font-size: 0.5rem;
            letter-spacing: 0.1em;
            margin-bottom: 2px;
            margin-left: 17px;
        }

        .bottom-text {
            font-size: 0.5rem;
            letter-spacing: 0.2em;
            position: relative;
        }

        /* Sidebar Styles */
        .sidebar {
            transition: all 0.3s ease-in-out;
            width: 16rem;
        }

        /* Mobile: Hidden by default, show when open */
        @media (max-width: 767px) {
            .sidebar {
                transform: translateX(-100%);
            }
            
            .sidebar.mobile-open {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
            }
        }

        /* Desktop: Show by default, hide when collapsed */
        @media (min-width: 768px) {
            .sidebar {
                transform: translateX(0);
            }
            
            .sidebar.desktop-collapsed {
                transform: translateX(-100%);
            }
            
            .main-content {
                margin-left: 16rem;
                transition: margin-left 0.3s ease-in-out;
            }
            
            .main-content.sidebar-collapsed {
                margin-left: 0;
            }
            
            .top-nav {
                left: 16rem;
                transition: left 0.3s ease-in-out;
            }
            
            .top-nav.sidebar-collapsed {
                left: 0;
            }
        }
    </style>
</head>

<body class="watermark font-sans antialiased" x-data="{ sidebarOpen: false }">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        
        <!-- Mobile Sidebar Overlay -->
        <div x-show="sidebarOpen" 
             x-transition:enter="transition-opacity ease-linear duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition-opacity ease-linear duration-300"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             @click="sidebarOpen = false"
             class="fixed inset-0 bg-gray-600 bg-opacity-75 z-20 md:hidden"
             style="display: none;"></div>

        <!-- Sidebar -->
        <aside class="fixed top-0 left-0 bottom-0 z-30 bg-white dark:bg-gray-800 border-r border-gray-200 dark:border-gray-700 sidebar h-full"
               :class="{ 'mobile-open': sidebarOpen, 'desktop-collapsed': !sidebarOpen }">
            
            @php
                $role = auth()->user()->role;
            @endphp
            
            <div class="flex flex-col h-full min-h-screen">
                <!-- Logo Section -->
                <div class="flex items-center h-20 px-6 border-b border-gray-200 dark:border-gray-700 flex-shrink-0">
                    <a href="{{ route('dashboard') }}" class="flex items-center">
                        <x-application-logo class="block h-9 w-auto fill-current text-black dark:text-white" />
                        <div class="ml-3">
                            <div class="font-bold text-sm text-gray-900 dark:text-white">Selamat datang di</div>
                            <div class="text-sm text-gray-600 dark:text-gray-300">AZHARA</div>
                        </div>
                    </a>
                </div>

                <!-- Navigation Links -->
                <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
                    <a href="{{ route('dashboard') }}" 
                       class="flex items-center px-3 py-2 text-sm font-medium rounded-md {{ request()->routeIs('dashboard') ? 'bg-blue-100 text-blue-700 dark:bg-blue-900 dark:text-blue-200' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' }}">
                        <svg class="mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v6H8V5z"></path>
                        </svg>
                        {{ __('Dashboard') }}
                    </a>

                    @if ($role === 'admin')
                    <a href="{{ route('buku.index') }}" 
                       class="flex items-center px-3 py-2 text-sm font-medium rounded-md {{ request()->routeIs('buku.index') ? 'bg-blue-100 text-blue-700 dark:bg-blue-900 dark:text-blue-200' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' }}">
                        <svg class="mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                        {{ __('Data Buku') }}
                    </a>
                    @endif

                    <a href="{{ route('peminjaman-buku.index') }}" 
                       class="flex items-center px-3 py-2 text-sm font-medium rounded-md {{ request()->routeIs('peminjaman-buku.index') ? 'bg-blue-100 text-blue-700 dark:bg-blue-900 dark:text-blue-200' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' }}">
                        <svg class="mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        {{ __('Pinjam Buku') }}
                    </a>

                    <a href="{{ route('pengembalian-buku.index') }}" 
                       class="flex items-center px-3 py-2 text-sm font-medium rounded-md {{ request()->routeIs('pengembalian-buku.index') ? 'bg-blue-100 text-blue-700 dark:bg-blue-900 dark:text-blue-200' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' }}">
                        <svg class="mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                        </svg>
                        {{ __('Pengembalian Buku') }}
                    </a>

                    @if ($role === 'admin')
                    <a href="{{ route('laporan.index') }}" 
                       class="flex items-center px-3 py-2 text-sm font-medium rounded-md {{ request()->routeIs('laporan.index') ? 'bg-blue-100 text-blue-700 dark:bg-blue-900 dark:text-blue-200' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' }}">
                        <svg class="mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        {{ __('Laporan') }}
                    </a>
                    @endif
                </nav>

                <!-- User Profile Section -->
                <div class="px-4 py-4 border-t border-gray-200 dark:border-gray-700 flex-shrink-0 mt-auto">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="h-10 w-10 rounded-full bg-gray-400 flex items-center justify-center">
                                <span class="text-sm font-medium text-white">{{ substr(Auth::user()->nama, 0, 1) }}</span>
                            </div>
                        </div>
                        <div class="ml-3 flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 dark:text-white truncate">
                                {{ Auth::user()->nama }}
                            </p>
                            <p class="text-xs text-gray-500 dark:text-gray-400 truncate">
                                ({{ Auth::user()->kelas }} {{ Auth::user()->identitas }})
                            </p>
                        </div>
                    </div>
                    
                    <div class="mt-3 space-y-1">
                        <a href="{{ route('profile.edit') }}" 
                           class="block px-3 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-md">
                            {{ __('Profile') }}
                        </a>
                        @if ($role === 'admin')
                        <a href="{{ route('settings.index') }}" 
                           class="block px-3 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-md">
                            {{ __('Pengaturan') }}
                        </a>
                        @endif
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" 
                                    class="block w-full text-left px-3 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-md">
                                {{ __('Keluar') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Top Navigation Bar -->
        <nav class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 fixed top-0 right-0 z-10 top-nav"
             :class="{ 'sidebar-collapsed': !sidebarOpen }">
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <!-- Sidebar toggle button -->
                        <button @click="sidebarOpen = !sidebarOpen"
                                class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path x-show="!sidebarOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                <path x-show="sidebarOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                        
                        <h1 class="ml-4 text-lg font-semibold text-gray-900 dark:text-white">
                            AZHARA
                        </h1>
                    </div>

                    <!-- Right side of nav -->
                    <div class="flex items-center space-x-4">
                        <span class="text-sm text-gray-700 dark:text-gray-300">
                            {{ Auth::user()->nama }}
                        </span>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <div class="main-content pt-16" :class="{ 'sidebar-collapsed': !sidebarOpen }">
            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main class="flex-1">
                {{ $slot }}
            </main>

            @include('layouts.footer')
        </div>
    </div>
</body>

</html>