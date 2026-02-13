@extends('layouts.app')

@section('title', 'Beranda')

@php
// Dummy data for homepage
$featuredStores = [
    [
        'id' => '01JKH81',
        'name' => 'Warung Makan Bu Siti',
        'slug' => 'warung-makan-bu-siti',
        'description' => 'Menyediakan makanan khas Jawa dengan cita rasa autentik dan harga terjangkau untuk mahasiswa',
        'logo' => 'https://ui-avatars.com/api/?name=Warung+Makan+Bu+Siti&background=D61F2C&color=fff&size=128',
        'banner' => 'https://picsum.photos/seed/store1/800/400',
        'category' => 'Kuliner',
        'rating' => 4.8,
        'total_reviews' => 156,
        'total_products' => 23,
        'location' => 'Purwokerto Barat',
        'is_verified' => true,
    ],
    [
        'id' => '01JKH82',
        'name' => 'Craft Corner',
        'slug' => 'craft-corner',
        'description' => 'Kerajinan tangan unik dan custom untuk berbagai kebutuhan. Dari gantungan kunci hingga hampers',
        'logo' => 'https://ui-avatars.com/api/?name=Craft+Corner&background=64748B&color=fff&size=128',
        'banner' => 'https://picsum.photos/seed/store2/800/400',
        'category' => 'Kerajinan',
        'rating' => 4.9,
        'total_reviews' => 89,
        'total_products' => 45,
        'location' => 'Purwokerto Timur',
        'is_verified' => true,
    ],
    [
        'id' => '01JKH83',
        'name' => 'FreshBox Catering',
        'slug' => 'freshbox-catering',
        'description' => 'Layanan katering untuk acara kampus, rapat, dan gathering dengan menu variatif',
        'logo' => 'https://ui-avatars.com/api/?name=FreshBox+Catering&background=22C55E&color=fff&size=128',
        'banner' => 'https://picsum.photos/seed/store3/800/400',
        'category' => 'Catering',
        'rating' => 4.7,
        'total_reviews' => 124,
        'total_products' => 18,
        'location' => 'Purwokerto Selatan',
        'is_verified' => false,
    ],
    [
        'id' => '01JKH84',
        'name' => 'Tech Accessories Shop',
        'slug' => 'tech-accessories-shop',
        'description' => 'Case HP, charger, earphone, dan aksesoris gadget untuk mahasiswa dengan harga murah',
        'logo' => 'https://ui-avatars.com/api/?name=Tech+Shop&background=F59E0B&color=fff&size=128',
        'banner' => 'https://picsum.photos/seed/store4/800/400',
        'category' => 'Teknologi',
        'rating' => 4.6,
        'total_reviews' => 78,
        'total_products' => 67,
        'location' => 'Purwokerto Utara',
        'is_verified' => true,
    ],
];

$featuredProducts = [
    [
        'id' => '01JKHP01',
        'name' => 'Nasi Goreng Special',
        'slug' => 'nasi-goreng-special',
        'description' => 'Nasi goreng dengan bumbu rahasia, telur, ayam, dan kerupuk',
        'price' => 15000,
        'discount_price' => null,
        'images' => ['https://picsum.photos/seed/product1/600/600'],
        'category' => 'Makanan',
        'stock' => 50,
        'sold' => 234,
        'rating' => 4.7,
        'total_reviews' => 87,
        'store' => ['id' => '01JKH81', 'name' => 'Warung Makan Bu Siti', 'slug' => 'warung-makan-bu-siti'],
        'is_available' => true,
    ],
    [
        'id' => '01JKHP02',
        'name' => 'Gantungan Kunci Custom Nama',
        'slug' => 'gantungan-kunci-custom',
        'description' => 'Gantungan kunci akrilik dengan nama custom sesuai permintaan',
        'price' => 25000,
        'discount_price' => 20000,
        'images' => ['https://picsum.photos/seed/product2/600/600'],
        'category' => 'Aksesori',
        'stock' => 100,
        'sold' => 456,
        'rating' => 4.9,
        'total_reviews' => 123,
        'store' => ['id' => '01JKH82', 'name' => 'Craft Corner', 'slug' => 'craft-corner'],
        'is_available' => true,
    ],
    [
        'id' => '01JKHP03',
        'name' => 'Paket Snack Box 20 Orang',
        'slug' => 'paket-snack-box-20-orang',
        'description' => 'Snack box lengkap untuk 20 orang, cocok untuk acara rapat atau seminar',
        'price' => 300000,
        'discount_price' => 270000,
        'images' => ['https://picsum.photos/seed/product3/600/600'],
        'category' => 'Catering',
        'stock' => 15,
        'sold' => 64,
        'rating' => 4.8,
        'total_reviews' => 41,
        'store' => ['id' => '01JKH83', 'name' => 'FreshBox Catering', 'slug' => 'freshbox-catering'],
        'is_available' => true,
    ],
    [
        'id' => '01JKHP04',
        'name' => 'Case HP Transparant Shockproof',
        'slug' => 'case-hp-transparant-shockproof',
        'description' => 'Case anti bentur dengan material premium, tersedia untuk semua tipe HP',
        'price' => 35000,
        'discount_price' => null,
        'images' => ['https://picsum.photos/seed/product4/600/600'],
        'category' => 'Aksesori',
        'stock' => 150,
        'sold' => 892,
        'rating' => 4.6,
        'total_reviews' => 234,
        'store' => ['id' => '01JKH84', 'name' => 'Tech Accessories Shop', 'slug' => 'tech-accessories-shop'],
        'is_available' => true,
    ],
];

$upcomingEvents = [
    [
        'id' => '01JKHR01',
        'title' => 'Bazaar UMKM Purwokerto 2024',
        'slug' => 'bazaar-umkm-purwokerto-2024',
        'description' => 'Event tahunan untuk mempertemukan UMKM mahasiswa dengan konsumen. Kesempatan emas untuk networking dan promosi produk!',
        'image' => 'https://picsum.photos/seed/event1/800/500',
        'start_date' => '2024-03-15 08:00:00',
        'end_date' => '2024-03-17 18:00:00',
        'location' => 'GOR Satria Purwokerto',
        'max_participants' => 50,
        'registered_participants' => 34,
        'registration_fee' => 100000,
        'organizer' => ['name' => 'Telkom University Purwokerto', 'contact' => 'event@telkompurwokerto.ac.id'],
        'is_open' => true,
        'categories' => ['Bazaar', 'Networking'],
    ],
    [
        'id' => '01JKHR02',
        'title' => 'Workshop Digital Marketing untuk UMKM',
        'slug' => 'workshop-digital-marketing',
        'description' => 'Belajar strategi digital marketing untuk meningkatkan penjualan bisnis online Anda',
        'image' => 'https://picsum.photos/seed/event2/800/500',
        'start_date' => '2024-03-20 13:00:00',
        'end_date' => '2024-03-20 17:00:00',
        'location' => 'Ruang Seminar Telkom Purwokerto',
        'max_participants' => 30,
        'registered_participants' => 28,
        'registration_fee' => 0,
        'organizer' => ['name' => 'Himpunan Mahasiswa Telkom', 'contact' => 'hm@telkompurwokerto.ac.id'],
        'is_open' => true,
        'categories' => ['Workshop', 'Edukasi'],
    ],
];

$stats = [
    ['label' => 'Toko Aktif', 'value' => '120+', 'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6'],
    ['label' => 'Produk Tersedia', 'value' => '1.500+', 'icon' => 'M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4'],
    ['label' => 'Transaksi Sukses', 'value' => '5.000+', 'icon' => 'M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z'],
    ['label' => 'Mahasiswa Bergabung', 'value' => '800+', 'icon' => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z'],
];
@endphp

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-primary-50 via-white to-warning-50 dark:from-surface-950 dark:via-surface-900 dark:to-surface-950 py-20 overflow-hidden">
    <!-- Decorative Background -->
    <div class="absolute inset-0 opacity-30 dark:opacity-20">
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-primary-200 dark:bg-primary-900 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-warning-200 dark:bg-warning-900 rounded-full blur-3xl"></div>
    </div>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl relative">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <!-- Left Content -->
            <div>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-text-900 dark:text-text-100 mb-6 leading-tight">
                    Wujudkan Mimpi
                    <span class="text-primary">Bisnis UMKM</span>
                    Mahasiswa Telkom
                </h1>
                <p class="text-lg text-text-600 dark:text-text-400 mb-8 leading-relaxed">
                    Platform marketplace terpercaya untuk mahasiswa Telkom Purwokerto. Jual produk, beli kebutuhan, dan kembangkan bisnis Anda bersama komunitas.
                </p>

                <div class="flex flex-wrap gap-4">
                    <x-ui.button href="{{ route('stores.index') }}" variant="primary" size="lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        Jelajahi Toko
                    </x-ui.button>
                    <x-ui.button href="{{ route('dashboard.index') }}" variant="outline" size="lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Buka Toko
                    </x-ui.button>
                </div>

                <!-- Stats -->
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-6 mt-12">
                    @foreach($stats as $stat)
                        <div class="text-center">
                            <div class="inline-flex items-center justify-center w-12 h-12 rounded-lg bg-primary-100 dark:bg-primary-900 text-primary mb-2">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $stat['icon'] }}" />
                                </svg>
                            </div>
                            <p class="text-2xl font-bold text-text-900 dark:text-text-100">{{ $stat['value'] }}</p>
                            <p class="text-sm text-text-600 dark:text-text-400">{{ $stat['label'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Right Image -->
            <div class="hidden lg:block">
                <img
                    src="https://picsum.photos/seed/hero/800/600"
                    alt="Telyubiz Marketplace"
                    class="rounded-2xl shadow-2xl"
                >
            </div>
        </div>
    </div>
</section>

<!-- Featured Stores -->
<section class="py-16 bg-surface-100 dark:bg-surface-900">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
        <!-- Section Header -->
        <div class="flex items-center justify-between mb-8">
            <div>
                <h2 class="text-3xl font-bold text-text-900 dark:text-text-100 mb-2">Toko Pilihan</h2>
                <p class="text-text-600 dark:text-text-400">Toko terpercaya dari mahasiswa Telkom Purwokerto</p>
            </div>
            <a href="{{ route('stores.index') }}" class="text-primary hover:text-primary-700 font-medium flex items-center gap-2">
                Lihat Semua
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        </div>

        <!-- Stores Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($featuredStores as $store)
                <x-cards.store :store="$store" />
            @endforeach
        </div>
    </div>
</section>

<!-- Featured Products -->
<section class="py-16">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
        <!-- Section Header -->
        <div class="flex items-center justify-between mb-8">
            <div>
                <h2 class="text-3xl font-bold text-text-900 dark:text-text-100 mb-2">Produk Populer</h2>
                <p class="text-text-600 dark:text-text-400">Produk terlaris dan paling diminati</p>
            </div>
        </div>

        <!-- Products Grid -->
        <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6">
            @foreach($featuredProducts as $product)
                <x-cards.product :product="$product" />
            @endforeach
        </div>
    </div>
</section>

<!-- Upcoming Events -->
<section class="py-16 bg-surface-100 dark:bg-surface-900">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
        <!-- Section Header -->
        <div class="flex items-center justify-between mb-8">
            <div>
                <h2 class="text-3xl font-bold text-text-900 dark:text-text-100 mb-2">Event Mendatang</h2>
                <p class="text-text-600 dark:text-text-400">Ikuti event dan kesempatan networking untuk UMKM</p>
            </div>
            <a href="{{ route('events.index') }}" class="text-primary hover:text-primary-700 font-medium flex items-center gap-2">
                Lihat Semua Event
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        </div>

        <!-- Events Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($upcomingEvents as $event)
                <x-cards.event :event="$event" />
            @endforeach
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-primary to-primary-700 dark:from-primary-800 dark:to-primary-900">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-4xl text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
            Siap Memulai Bisnis UMKM Anda?
        </h2>
        <p class="text-lg text-white/90 mb-8">
            Bergabunglah dengan ratusan mahasiswa Telkom Purwokerto yang sudah sukses berbisnis di platform kami
        </p>
        <div class="flex flex-wrap gap-4 justify-center">
            <x-ui.button href="{{ route('register') }}" variant="secondary" size="lg">
                Daftar Sekarang
            </x-ui.button>
            <x-ui.button href="#" variant="outline" size="lg" class="border-white text-white hover:bg-white hover:text-primary">
                Pelajari Lebih Lanjut
            </x-ui.button>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
// Placeholder cart function
function addToCart(productId) {
    alert('Produk ditambahkan ke keranjang! (ID: ' + productId + ')');
    // This will be implemented in cart.js later
}
</script>
@endpush
