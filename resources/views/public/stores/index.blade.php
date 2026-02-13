@extends('layouts.app')

@section('title', 'Semua Toko')

@php
// Dummy stores data (expanded)
$stores = [
    ['id' => '01JKH81', 'name' => 'Warung Makan Bu Siti', 'slug' => 'warung-makan-bu-siti', 'description' => 'Menyediakan makanan khas Jawa dengan cita rasa autentik', 'logo' => 'https://ui-avatars.com/api/?name=Warung+Makan+Bu+Siti&background=D61F2C&color=fff&size=128', 'banner' => 'https://picsum.photos/seed/store1/800/400', 'category' => 'Kuliner', 'rating' => 4.8, 'total_reviews' => 156, 'location' => 'Purwokerto Barat', 'is_verified' => true],
    ['id' => '01JKH82', 'name' => 'Craft Corner', 'slug' => 'craft-corner', 'description' => 'Kerajinan tangan unik dan custom', 'logo' => 'https://ui-avatars.com/api/?name=Craft+Corner&background=64748B&color=fff&size=128', 'banner' => 'https://picsum.photos/seed/store2/800/400', 'category' => 'Kerajinan', 'rating' => 4.9, 'total_reviews' => 89, 'location' => 'Purwokerto Timur', 'is_verified' => true],
    ['id' => '01JKH83', 'name' => 'FreshBox Catering', 'slug' => 'freshbox-catering', 'description' => 'Layanan katering untuk acara kampus', 'logo' => 'https://ui-avatars.com/api/?name=FreshBox&background=22C55E&color=fff&size=128', 'banner' => 'https://picsum.photos/seed/store3/800/400', 'category' => 'Catering', 'rating' => 4.7, 'total_reviews' => 124, 'location' => 'Purwokerto Selatan', 'is_verified' => false],
    ['id' => '01JKH84', 'name' => 'Tech Accessories', 'slug' => 'tech-accessories-shop', 'description' => 'Aksesoris gadget terlengkap', 'logo' => 'https://ui-avatars.com/api/?name=Tech+Shop&background=F59E0B&color=fff&size=128', 'banner' => 'https://picsum.photos/seed/store4/800/400', 'category' => 'Teknologi', 'rating' => 4.6, 'total_reviews' => 78, 'location' => 'Purwokerto Utara', 'is_verified' => true],
    ['id' => '01JKH85', 'name' => 'Hijab Collection', 'slug' => 'hijab-collection', 'description' => 'Hijab dan busana muslim trendy', 'logo' => 'https://ui-avatars.com/api/?name=Hijab+Collection&background=EC4899&color=fff&size=128', 'banner' => 'https://picsum.photos/seed/store5/800/400', 'category' => 'Fashion', 'rating' => 4.8, 'total_reviews' => 145, 'location' => 'Purwokerto Barat', 'is_verified' => true],
    ['id' => '01JKH86', 'name' => 'Laptop Second', 'slug' => 'laptop-second', 'description' => 'Laptop bekas berkualitas dengan garansi', 'logo' => 'https://ui-avatars.com/api/?name=Laptop+Second&background=3B82F6&color=fff&size=128', 'banner' => 'https://picsum.photos/seed/store6/800/400', 'category' => 'Elektronik', 'rating' => 4.5, 'total_reviews' => 92, 'location' => 'Purwokerto Timur', 'is_verified' => false],
    ['id' => '01JKH87', 'name' => 'Kopi Kenangan Kampus', 'slug' => 'kopi-kenangan-kampus', 'description' => 'Kopi susu kekinian dengan berbagai varian', 'logo' => 'https://ui-avatars.com/api/?name=Kopi+Kenangan&background=92400E&color=fff&size=128', 'banner' => 'https://picsum.photos/seed/store7/800/400', 'category' => 'Minuman', 'rating' => 4.9, 'total_reviews' => 203, 'location' => 'Purwokerto Selatan', 'is_verified' => true],
    ['id' => '01JKH88', 'name' => 'Buku & Alat Tulis', 'slug' => 'buku-alat-tulis', 'description' => 'Perlengkapan kuliah dan alat tulis', 'logo' => 'https://ui-avatars.com/api/?name=Buku&background=8B5CF6&color=fff&size=128', 'banner' => 'https://picsum.photos/seed/store8/800/400', 'category' => 'Stationery', 'rating' => 4.6, 'total_reviews' => 67, 'location' => 'Purwokerto Utara', 'is_verified' => false],
];

$categories = ['Semua', 'Kuliner', 'Fashion', 'Teknologi', 'Kerajinan', 'Catering', 'Elektronik', 'Minuman', 'Stationery'];
@endphp

@section('content')
<!-- Page Header -->
<section class="bg-gradient-to-r from-primary-50 to-warning-50 dark:from-surface-950 dark:to-surface-900 py-12">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
        <h1 class="text-4xl font-bold text-text-900 dark:text-text-100 mb-2">Jelajahi Toko UMKM</h1>
        <p class="text-lg text-text-600 dark:text-text-400">Temukan berbagai toko dari mahasiswa Telkom Purwokerto</p>
    </div>
</section>

<!-- Filters & Content -->
<section class="py-8">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
        <!-- Search & Filters -->
        <div class="mb-8 space-y-4">
            <!-- Search Bar -->
            <div class="flex flex-col sm:flex-row gap-4">
                <div class="flex-1">
                    <div class="relative">
                        <input
                            type="text"
                            placeholder="Cari nama toko..."
                            class="w-full px-4 py-3 pl-11 bg-surface2 dark:bg-surface-950 border border-border-300 dark:border-border-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary transition-colors"
                        >
                        <svg class="w-5 h-5 absolute left-3 top-1/2 transform -translate-y-1/2 text-text-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </div>

                <!-- View Toggle -->
                <div class="flex gap-2 bg-surface2 dark:bg-surface-950 p-1 rounded-lg border border-border-300 dark:border-border-700">
                    <button class="px-4 py-2 rounded-md bg-primary text-white">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                        </svg>
                    </button>
                    <button class="px-4 py-2 rounded-md text-text-600 dark:text-text-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Category Filter -->
            <div class="flex gap-2 overflow-x-auto pb-2 scrollbar-hide">
                @foreach($categories as $category)
                    <button class="px-4 py-2 rounded-lg border whitespace-nowrap transition-colors {{ $category === 'Semua' ? 'bg-primary text-white border-primary' : 'bg-surface2 dark:bg-surface-950 text-text-700 dark:text-text-300 border-border-300 dark:border-border-700 hover:border-primary hover:text-primary' }}">
                        {{ $category }}
                    </button>
                @endforeach
            </div>

            <!-- Results Count -->
            <div class="flex items-center justify-between">
                <p class="text-sm text-text-600 dark:text-text-400">
                    Menampilkan <span class="font-semibold text-text-900 dark:text-text-100">{{ count($stores) }}</span> toko
                </p>
                <select class="px-4 py-2 bg-surface2 dark:bg-surface-950 border border-border-300 dark:border-border-700 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary">
                    <option>Paling Relevan</option>
                    <option>Rating Tertinggi</option>
                    <option>Terbaru</option>
                    <option>A-Z</option>
                </select>
            </div>
        </div>

        <!-- Stores Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach($stores as $store)
                <x-cards.store :store="$store" />
            @endforeach
        </div>

        <!-- Pagination (dummy) -->
        <div class="mt-12 flex justify-center">
            <nav class="flex items-center gap-2">
                <button class="px-4 py-2 rounded-lg border border-border-300 dark:border-border-700 text-text-600 dark:text-text-400 hover:bg-surface2 dark:hover:bg-surface-950 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <button class="px-4 py-2 rounded-lg bg-primary text-white">1</button>
                <button class="px-4 py-2 rounded-lg border border-border-300 dark:border-border-700 text-text-600 dark:text-text-400 hover:bg-surface2 dark:hover:bg-surface-950 transition-colors">2</button>
                <button class="px-4 py-2 rounded-lg border border-border-300 dark:border-border-700 text-text-600 dark:text-text-400 hover:bg-surface2 dark:hover:bg-surface-950 transition-colors">3</button>
                <button class="px-4 py-2 rounded-lg border border-border-300 dark:border-border-700 text-text-600 dark:text-text-400 hover:bg-surface2 dark:hover:bg-surface-950 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </nav>
        </div>
    </div>
</section>
@endsection
