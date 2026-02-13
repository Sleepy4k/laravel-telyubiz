<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') - {{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/theme.js'])
    @stack('styles')
</head>
<body class="bg-surface-100 dark:bg-surface-900 text-text-900 dark:text-text-200 antialiased">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <x-sidebar />

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Navbar -->
            <header class="bg-surface2 dark:bg-surface-950 border-b border-border-300 dark:border-border-700 px-6 py-4">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-2xl font-bold text-text-900 dark:text-text-100">@yield('page-title', 'Dashboard')</h1>
                    </div>

                    <div class="flex items-center gap-4">
                        <!-- Dark Mode Toggle -->
                        <button
                            onclick="toggleTheme()"
                            class="p-2 rounded-lg bg-surface-100 dark:bg-surface-900 hover:bg-surface-200 dark:hover:bg-surface-800 transition-colors"
                        >
                            <svg class="w-5 h-5 hidden dark:block text-warning-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                            <svg class="w-5 h-5 block dark:hidden text-text-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                            </svg>
                        </button>

                        <!-- Notifications -->
                        <button class="relative p-2 rounded-lg bg-surface-100 dark:bg-surface-900 hover:bg-surface-200 dark:hover:bg-surface-800 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                            <span class="absolute top-1 right-1 w-2 h-2 bg-danger rounded-full"></span>
                        </button>

                        <!-- User Dropdown -->
                        <div class="relative">
                            <button
                                data-user-dropdown-button
                                class="flex items-center gap-3 p-2 rounded-lg hover:bg-surface-100 dark:hover:bg-surface-900 transition-colors"
                            >
                                <img
                                    src="https://ui-avatars.com/api/?name=Budi+Santoso&background=D61F2C&color=fff"
                                    alt="User"
                                    class="w-8 h-8 rounded-full"
                                >
                                <div class="hidden md:block text-left">
                                    <p class="text-sm font-medium text-text-900 dark:text-text-100">Budi Santoso</p>
                                    <p class="text-xs text-text-600 dark:text-text-400">Owner</p>
                                </div>
                                <svg class="w-4 h-4 text-text-600 dark:text-text-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>

                            <!-- Dropdown -->
                            <div
                                data-user-dropdown-menu
                                class="hidden absolute right-0 mt-2 w-56 rounded-lg shadow-xl bg-surface2 dark:bg-surface-950 border border-border-300 dark:border-border-700 py-2 opacity-0 scale-95 transition-all duration-100 ease-out"
                            >
                                <a href="{{ route('home') }}" class="block px-4 py-2 text-sm hover:bg-surface-100 dark:hover:bg-surface-900">
                                    Lihat Marketplace
                                </a>
                                <a href="{{ route('account.profile') }}" class="block px-4 py-2 text-sm hover:bg-surface-100 dark:hover:bg-surface-900">
                                    Profil Saya
                                </a>
                                <div class="border-t border-border-300 dark:border-border-700 my-2"></div>
                                <button class="w-full text-left px-4 py-2 text-sm text-danger-600 dark:text-danger-400 hover:bg-surface-100 dark:hover:bg-surface-900">
                                    Keluar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Content -->
            <main class="flex-1 overflow-y-auto p-6">
                @yield('content')
            </main>
        </div>
    </div>

    @stack('scripts')
</body>
</html>
