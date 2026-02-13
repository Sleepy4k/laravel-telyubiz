@php
    // Simulate authenticated user (dummy data)
    $isAuthenticated = request()->is('dashboard*') || request()->is('account*') || request()->is('cart*') || request()->is('checkout');
    $user = $isAuthenticated ? [
        'name' => 'Budi Santoso',
        'avatar' => 'https://ui-avatars.com/api/?name=Budi+Santoso&background=D61F2C&color=fff',
    ] : null;
@endphp

<nav class="bg-surface2 dark:bg-surface-950 border-b border-border-300 dark:border-border-700 sticky top-0 z-50 backdrop-blur-lg bg-opacity-95 dark:bg-opacity-95">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
        <div class="flex items-center justify-between h-16">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="{{ route('home') }}" class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-primary rounded-lg flex items-center justify-center">
                        <span class="text-white font-bold">T</span>
                    </div>
                    <span class="text-xl font-semibold text-text-900 dark:text-text-100 hidden sm:block">Telyubiz</span>
                </a>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden lg:flex items-center gap-8">
                <a href="{{ route('home') }}" class="text-text-700 dark:text-text-300 hover:text-primary dark:hover:text-primary transition-colors {{ request()->is('/') ? 'text-primary' : '' }}">
                    Beranda
                </a>
                <a href="{{ route('stores.index') }}" class="text-text-700 dark:text-text-300 hover:text-primary dark:hover:text-primary transition-colors {{ request()->is('stores*') ? 'text-primary' : '' }}">
                    Toko
                </a>
                <a href="{{ route('events.index') }}" class="text-text-700 dark:text-text-300 hover:text-primary dark:hover:text-primary transition-colors {{ request()->is('events*') ? 'text-primary' : '' }}">
                    Event
                </a>
            </div>

            <!-- Right Actions -->
            <div class="flex items-center gap-3">
                <!-- Search (Desktop) -->
                <div class="hidden md:block">
                    <div class="relative">
                        <input
                            type="text"
                            placeholder="Cari toko atau produk..."
                            class="w-64 px-4 py-2 pl-10 bg-surface-100 dark:bg-surface-900 border border-border-300 dark:border-border-700 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-colors"
                        >
                        <svg class="w-5 h-5 absolute left-3 top-1/2 transform -translate-y-1/2 text-text-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </div>

                <!-- Dark Mode Toggle -->
                <button
                    onclick="toggleTheme()"
                    class="p-2 rounded-lg bg-surface-100 dark:bg-surface-900 hover:bg-surface-200 dark:hover:bg-surface-800 transition-colors"
                    aria-label="Toggle dark mode"
                >
                    <!-- Sun icon (visible in dark mode) -->
                    <svg class="w-5 h-5 hidden dark:block text-warning-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    <!-- Moon icon (visible in light mode) -->
                    <svg class="w-5 h-5 block dark:hidden text-text-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                    </svg>
                </button>

                @if($user)
                    <!-- Cart Icon (Authenticated) -->
                    <a href="{{ route('cart.index') }}" class="relative p-2 rounded-lg bg-surface-100 dark:bg-surface-900 hover:bg-surface-200 dark:hover:bg-surface-800 transition-colors">
                        <svg class="w-5 h-5 text-text-700 dark:text-text-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <!-- Cart count badge -->
                        <span data-cart-count class="absolute -top-1 -right-1 bg-primary text-white text-xs font-bold rounded-full w-5 h-5 flex items-center justify-center">0</span>
                    </a>

                    <!-- User Dropdown -->
                    <div class="relative">
                        <button
                            data-user-dropdown-button
                            class="flex items-center gap-2 p-1 rounded-lg hover:bg-surface-100 dark:hover:bg-surface-900 transition-colors"
                        >
                            <img
                                src="{{ $user['avatar'] }}"
                                alt="{{ $user['name'] }}"
                                class="w-8 h-8 rounded-full"
                            >
                            <svg class="w-4 h-4 text-text-600 dark:text-text-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <!-- Dropdown Menu -->
                        <div
                            data-user-dropdown-menu
                            class="hidden absolute right-0 mt-2 w-56 rounded-lg shadow-xl bg-surface2 dark:bg-surface-950 border border-border-300 dark:border-border-700 py-2 opacity-0 scale-95 transition-all duration-100 ease-out"
                        >
                            <div class="px-4 py-3 border-b border-border-300 dark:border-border-700">
                                <p class="text-sm font-medium text-text-900 dark:text-text-100">{{ $user['name'] }}</p>
                                <p class="text-xs text-text-600 dark:text-text-400">budi@example.com</p>
                            </div>

                            <a href="{{ route('dashboard.index') }}" class="block px-4 py-2 text-sm text-text-700 dark:text-text-300 hover:bg-surface-100 dark:hover:bg-surface-900 transition-colors">
                                <div class="flex items-center gap-3">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                                    </svg>
                                    Dashboard Toko
                                </div>
                            </a>

                            <a href="{{ route('account.orders') }}" class="block px-4 py-2 text-sm text-text-700 dark:text-text-300 hover:bg-surface-100 dark:hover:bg-surface-900 transition-colors">
                                <div class="flex items-center gap-3">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                    </svg>
                                    Pesanan Saya
                                </div>
                            </a>

                            <a href="{{ route('account.profile') }}" class="block px-4 py-2 text-sm text-text-700 dark:text-text-300 hover:bg-surface-100 dark:hover:bg-surface-900 transition-colors">
                                <div class="flex items-center gap-3">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    Profil Saya
                                </div>
                            </a>

                            <div class="border-t border-border-300 dark:border-border-700 mt-2 pt-2">
                                <button class="w-full text-left px-4 py-2 text-sm text-danger-600 dark:text-danger-400 hover:bg-surface-100 dark:hover:bg-surface-900 transition-colors">
                                    <div class="flex items-center gap-3">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                        </svg>
                                        Keluar
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>
                @else
                    <!-- Login/Register (Guest) -->
                    <a href="{{ route('login') }}" class="px-4 py-2 text-sm text-text-700 dark:text-text-300 hover:text-primary dark:hover:text-primary transition-colors">
                        Masuk
                    </a>
                    <a href="{{ route('register') }}" class="px-4 py-2 bg-primary hover:bg-primary-700 text-white text-sm rounded-lg transition-colors">
                        Daftar
                    </a>
                @endif

                <!-- Mobile Menu Button -->
                <button
                    data-mobile-menu-button
                    class="lg:hidden p-2 rounded-lg bg-surface-100 dark:bg-surface-900 hover:bg-surface-200 dark:hover:bg-surface-800 transition-colors"
                >
                    <svg class="w-6 h-6 text-text-700 dark:text-text-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div
        data-mobile-menu-overlay
        class="hidden fixed inset-0 bg-black bg-opacity-50 z-40 lg:hidden opacity-0 transition-opacity duration-200"
    ></div>

    <div
        data-mobile-menu-panel
        class="hidden fixed right-0 top-0 h-full w-80 bg-surface2 dark:bg-surface-950 shadow-2xl z-50 overflow-y-auto lg:hidden translate-x-full transition-transform duration-200"
    >
        <div class="p-6">
            <!-- Close Button -->
            <button
                data-mobile-menu-close
                class="absolute top-4 right-4 p-2 rounded-lg bg-surface-100 dark:bg-surface-900 hover:bg-surface-200 dark:hover:bg-surface-800 transition-colors"
            >
                <svg class="w-6 h-6 text-text-700 dark:text-text-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <!-- Logo -->
            <div class="mb-8">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-primary rounded-lg flex items-center justify-center">
                        <span class="text-white font-bold">T</span>
                    </div>
                    <span class="text-xl font-semibold text-text-900 dark:text-text-100">Telyubiz</span>
                </div>
            </div>

            <!-- Search (Mobile) -->
            <div class="mb-6">
                <div class="relative">
                    <input
                        type="text"
                        placeholder="Cari toko atau produk..."
                        class="w-full px-4 py-2 pl-10 bg-surface-100 dark:bg-surface-900 border border-border-300 dark:border-border-700 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-colors"
                    >
                    <svg class="w-5 h-5 absolute left-3 top-1/2 transform -translate-y-1/2 text-text-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>

            <!-- Navigation Links -->
            <nav class="space-y-2">
                <a href="{{ route('home') }}" class="block px-4 py-3 rounded-lg text-text-700 dark:text-text-300 hover:bg-surface-100 dark:hover:bg-surface-900 transition-colors {{ request()->is('/') ? 'bg-surface-100 dark:bg-surface-900 text-primary' : '' }}">
                    Beranda
                </a>
                <a href="{{ route('stores.index') }}" class="block px-4 py-3 rounded-lg text-text-700 dark:text-text-300 hover:bg-surface-100 dark:hover:bg-surface-900 transition-colors {{ request()->is('stores*') ? 'bg-surface-100 dark:bg-surface-900 text-primary' : '' }}">
                    Toko
                </a>
                <a href="{{ route('events.index') }}" class="block px-4 py-3 rounded-lg text-text-700 dark:text-text-300 hover:bg-surface-100 dark:hover:bg-surface-900 transition-colors {{ request()->is('events*') ? 'bg-surface-100 dark:bg-surface-900 text-primary' : '' }}">
                    Event
                </a>
            </nav>
        </div>
    </div>
</nav>
