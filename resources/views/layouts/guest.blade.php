<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Auth') - {{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/theme.js'])
    @stack('styles')
</head>
<body class="bg-surface-100 dark:bg-surface-900 text-text-900 dark:text-text-200 antialiased">
    <div class="min-h-screen flex">
        <!-- Left Side - Form -->
        <div class="flex-1 flex items-center justify-center p-6 sm:p-12">
            <div class="w-full max-w-md">
                <!-- Logo -->
                <div class="text-center mb-8">
                    <a href="{{ route('home') }}" class="inline-flex items-center gap-3 mb-6">
                        <div class="w-12 h-12 bg-primary rounded-lg flex items-center justify-center">
                            <span class="text-white font-bold text-xl">T</span>
                        </div>
                        <span class="text-2xl font-bold text-text-900 dark:text-text-100">Telyubiz</span>
                    </a>
                </div>

                @yield('content')
            </div>
        </div>

        <!-- Right Side - Image/Branding -->
        <div class="hidden lg:flex lg:flex-1 bg-gradient-to-br from-primary to-primary-700 dark:from-primary-800 dark:to-primary-900 p-12 items-center justify-center relative overflow-hidden">
            <!-- Decorative Elements -->
            <div class="absolute inset-0 opacity-10">
                <div class="absolute top-0 right-0 w-96 h-96 bg-white rounded-full blur-3xl"></div>
                <div class="absolute bottom-0 left-0 w-96 h-96 bg-white rounded-full blur-3xl"></div>
            </div>

            <div class="relative z-10 text-white max-w-md text-center">
                <h2 class="text-3xl font-bold mb-4">Wujudkan Mimpi Bisnis UMKM Anda</h2>
                <p class="text-lg text-white/90 mb-8">
                    Bergabunglah dengan komunitas mahasiswa Telkom Purwokerto yang sudah sukses berbisnis
                </p>

                <!-- Stats -->
                <div class="grid grid-cols-3 gap-4 mt-12">
                    <div class="text-center">
                        <div class="text-3xl font-bold mb-1">120+</div>
                        <div class="text-sm text-white/80">Toko Aktif</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold mb-1">1.5K+</div>
                        <div class="text-sm text-white/80">Produk</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold mb-1">800+</div>
                        <div class="text-sm text-white/80">Mahasiswa</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @stack('scripts')
</body>
</html>
