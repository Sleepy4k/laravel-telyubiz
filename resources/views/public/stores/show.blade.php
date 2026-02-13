@extends('layouts.app')

@section('title', 'Detail Toko')

@php
// Dummy store data
$store = [
    'id' => '01JKH81',
    'name' => 'Warung Makan Bu Siti',
    'slug' => 'warung-makan-bu-siti',
    'description' => 'Menyediakan makanan khas Jawa dengan cita rasa autentik dan harga terjangkau untuk mahasiswa. Kami berdiri sejak 2020 dan telah melayani ribuan mahasiswa Telkom Purwokerto dengan penuh dedikasi.',
    'logo' => 'https://ui-avatars.com/api/?name=Warung+Makan+Bu+Siti&background=D61F2C&color=fff&size=200',
    'banner' => 'https://picsum.photos/seed/store1/1200/400',
    'category' => 'Kuliner',
    'rating' => 4.8,
    'total_reviews' => 156,
    'total_products' => 23,
    'location' => 'Jl. DI Panjaitan No. 128, Purwokerto Barat',
    'phone' => '+62 812 3456 7890',
    'email' => 'busiti@example.com',
    'is_verified' => true,
    'joined_date' => '2020-03-15',
    'owner' => ['name' => 'Siti Nurhaliza', 'avatar' => 'https://ui-avatars.com/api/?name=Siti+Nurhaliza&background=64748B&color=fff'],
    'operating_hours' => [
        'Senin - Jumat' => '08:00 - 20:00',
        'Sabtu - Minggu' => '09:00 - 21:00',
    ],
];

// Store products
$products = [
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
        'is_available' => true,
    ],
    [
        'id' => '01JKHP05',
        'name' => 'Ayam Goreng Kremes',
        'slug' => 'ayam-goreng-kremes',
        'description' => 'Ayam goreng renyah dengan kremesan khas',
        'price' => 18000,
        'discount_price' => 15000,
        'images' => ['https://picsum.photos/seed/product5/600/600'],
        'category' => 'Makanan',
        'stock' => 30,
        'sold' => 456,
        'rating' => 4.9,
        'total_reviews' => 123,
        'is_available' => true,
    ],
    [
        'id' => '01JKHP06',
        'name' => 'Soto Ayam Kampung',
        'slug' => 'soto-ayam-kampung',
        'description' => 'Soto ayam dengan kuah bening dan rempah pilihan',
        'price' => 12000,
        'discount_price' => null,
        'images' => ['https://picsum.photos/seed/product6/600/600'],
        'category' => 'Makanan',
        'stock' => 40,
        'sold' => 189,
        'rating' => 4.6,
        'total_reviews' => 67,
        'is_available' => true,
    ],
    [
        'id' => '01JKHP07',
        'name' => 'Es Teh Manis',
        'slug' => 'es-teh-manis',
        'description' => 'Teh manis dingin yang menyegarkan',
        'price' => 3000,
        'discount_price' => null,
        'images' => ['https://picsum.photos/seed/product7/600/600'],
        'category' => 'Minuman',
        'stock' => 100,
        'sold' => 892,
        'rating' => 4.5,
        'total_reviews' => 234,
        'is_available' => true,
    ],
    [
        'id' => '01JKHP08',
        'name' => 'Nasi Pecel',
        'slug' => 'nasi-pecel',
        'description' => 'Nasi pecel dengan sayuran segar dan sambal kacang',
        'price' => 10000,
        'discount_price' => null,
        'images' => ['https://picsum.photos/seed/product8/600/600'],
        'category' => 'Makanan',
        'stock' => 35,
        'sold' => 345,
        'rating' => 4.8,
        'total_reviews' => 112,
        'is_available' => true,
    ],
    [
        'id' => '01JKHP09',
        'name' => 'Tempe Mendoan',
        'slug' => 'tempe-mendoan',
        'description' => 'Tempe goreng khas Purwokerto yang renyah',
        'price' => 5000,
        'discount_price' => null,
        'images' => ['https://picsum.photos/seed/product9/600/600'],
        'category' => 'Makanan',
        'stock' => 50,
        'sold' => 567,
        'rating' => 4.9,
        'total_reviews' => 198,
        'is_available' => true,
    ],
];

// Store reviews
$reviews = [
    [
        'id' => '01JKHR01',
        'user' => ['name' => 'Ahmad Fauzi', 'avatar' => 'https://ui-avatars.com/api/?name=Ahmad+Fauzi&background=22C55E&color=fff'],
        'rating' => 5,
        'comment' => 'Makanannya enak banget! Nasi gorengnya juara, bumbu meresap sempurna. Harga juga ramah kantong mahasiswa.',
        'images' => ['https://picsum.photos/seed/review1/200/200'],
        'created_at' => '2024-02-10 14:30:00',
    ],
    [
        'id' => '01JKHR02',
        'user' => ['name' => 'Dewi Lestari', 'avatar' => 'https://ui-avatars.com/api/?name=Dewi+Lestari&background=F59E0B&color=fff'],
        'rating' => 5,
        'comment' => 'Langganan saya kalau lagi kangen masakan rumah. Bu Siti orangnya ramah dan porsinya selalu pas!',
        'images' => [],
        'created_at' => '2024-02-08 10:15:00',
    ],
    [
        'id' => '01JKHR03',
        'user' => ['name' => 'Budi Santoso', 'avatar' => 'https://ui-avatars.com/api/?name=Budi+Santoso&background=64748B&color=fff'],
        'rating' => 4,
        'comment' => 'Tempe mendoannya recommended! Cuma kadang harus nunggu agak lama kalau jam makan siang.',
        'images' => ['https://picsum.photos/seed/review3a/200/200', 'https://picsum.photos/seed/review3b/200/200'],
        'created_at' => '2024-02-05 18:45:00',
    ],
];
@endphp

@section('content')
<!-- Store Header/Banner -->
<section class="relative">
    <!-- Banner -->
    <div class="h-64 md:h-80 overflow-hidden bg-surface-200 dark:bg-surface-800">
        <img
            src="{{ $store['banner'] }}"
            alt="{{ $store['name'] }}"
            class="w-full h-full object-cover"
        >
    </div>

    <!-- Store Info Card -->
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
        <div class="relative -mt-16 md:-mt-20">
            <div class="bg-surface2 dark:bg-surface-950 rounded-xl border border-border-300 dark:border-border-700 shadow-xl p-6">
                <div class="flex flex-col md:flex-row gap-6">
                    <!-- Logo -->
                    <div class="flex-shrink-0">
                        <img
                            src="{{ $store['logo'] }}"
                            alt="{{ $store['name'] }}"
                            class="w-24 h-24 md:w-32 md:h-32 rounded-xl border-4 border-surface2 dark:border-surface-950 shadow-lg"
                        >
                    </div>

                    <!-- Store Details -->
                    <div class="flex-1">
                        <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-4 mb-4">
                            <div>
                                <div class="flex items-center gap-2 mb-2">
                                    <h1 class="text-2xl md:text-3xl font-bold text-text-900 dark:text-text-100">{{ $store['name'] }}</h1>
                                    @if($store['is_verified'])
                                        <x-ui.badge variant="success" size="sm">
                                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                            </svg>
                                            Terverifikasi
                                        </x-ui.badge>
                                    @endif
                                </div>
                                <x-ui.badge variant="secondary" size="sm" class="mb-2">{{ $store['category'] }}</x-ui.badge>

                                <!-- Rating -->
                                <div class="flex items-center gap-3 text-sm">
                                    <div class="flex items-center gap-1">
                                        <svg class="w-5 h-5 text-warning-500" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                        <span class="font-semibold text-text-900 dark:text-text-100">{{ $store['rating'] }}</span>
                                    </div>
                                    <span class="text-text-600 dark:text-text-400">({{ $store['total_reviews'] }} ulasan)</span>
                                    <span class="text-text-600 dark:text-text-400">•</span>
                                    <span class="text-text-600 dark:text-text-400">{{ $store['total_products'] }} produk</span>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="flex gap-2">
                                <x-ui.button variant="outline" size="sm">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                                    </svg>
                                    Bagikan
                                </x-ui.button>
                                <x-ui.button variant="primary" size="sm">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                    </svg>
                                    Chat Toko
                                </x-ui.button>
                            </div>
                        </div>

                        <p class="text-text-600 dark:text-text-400 leading-relaxed">{{ $store['description'] }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="py-8">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
        <div class="grid lg:grid-cols-3 gap-8">
            <!-- Left Content - Products -->
            <div class="lg:col-span-2">
                <!-- Product List Header -->
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-bold text-text-900 dark:text-text-100">Produk Toko</h2>
                    <select class="px-4 py-2 bg-surface2 dark:bg-surface-900 border border-border-300 dark:border-border-700 rounded-lg text-sm focus:ring-2 focus:ring-primary focus:border-transparent">
                        <option>Semua Kategori</option>
                        <option>Makanan</option>
                        <option>Minuman</option>
                    </select>
                </div>

                <!-- Products Grid -->
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mb-8">
                    @foreach($products as $product)
                        <x-cards.product :product="array_merge($product, ['store' => ['name' => $store['name'], 'slug' => $store['slug']]])" />
                    @endforeach
                </div>

                <!-- Reviews Section -->
                <div class="mt-12">
                    <h2 class="text-2xl font-bold text-text-900 dark:text-text-100 mb-6">Ulasan Pelanggan</h2>

                    <div class="space-y-4">
                        @foreach($reviews as $review)
                            <div class="bg-surface2 dark:bg-surface-950 rounded-xl border border-border-300 dark:border-border-700 p-6">
                                <div class="flex items-start gap-4">
                                    <img
                                        src="{{ $review['user']['avatar'] }}"
                                        alt="{{ $review['user']['name'] }}"
                                        class="w-12 h-12 rounded-full flex-shrink-0"
                                    >
                                    <div class="flex-1">
                                        <div class="flex items-center justify-between mb-2">
                                            <div>
                                                <h4 class="font-semibold text-text-900 dark:text-text-100">{{ $review['user']['name'] }}</h4>
                                                <p class="text-sm text-text-600 dark:text-text-400">{{ \Carbon\Carbon::parse($review['created_at'])->diffForHumans() }}</p>
                                            </div>
                                            <div class="flex items-center gap-1">
                                                @for($i = 0; $i < 5; $i++)
                                                    <svg class="w-4 h-4 {{ $i < $review['rating'] ? 'text-warning-500' : 'text-text-300 dark:text-text-600' }}" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                    </svg>
                                                @endfor
                                            </div>
                                        </div>
                                        <p class="text-text-700 dark:text-text-300 mb-3">{{ $review['comment'] }}</p>

                                        @if(count($review['images']) > 0)
                                            <div class="flex gap-2">
                                                @foreach($review['images'] as $image)
                                                    <img
                                                        src="{{ $image }}"
                                                        alt="Review image"
                                                        class="w-20 h-20 rounded-lg object-cover cursor-pointer hover:opacity-80 transition-opacity"
                                                    >
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-6 text-center">
                        <x-ui.button variant="outline" size="md">
                            Lihat Semua Ulasan ({{ $store['total_reviews'] }})
                        </x-ui.button>
                    </div>
                </div>
            </div>

            <!-- Right Sidebar - Store Info -->
            <div class="lg:col-span-1">
                <div class="sticky top-20 space-y-6">
                    <!-- Store Info Card -->
                    <div class="bg-surface2 dark:bg-surface-950 rounded-xl border border-border-300 dark:border-border-700 p-6">
                        <h3 class="font-semibold text-text-900 dark:text-text-100 mb-4">Informasi Toko</h3>

                        <div class="space-y-4">
                            <!-- Location -->
                            <div class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-text-600 dark:text-text-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <div>
                                    <p class="text-sm font-medium text-text-900 dark:text-text-100">Lokasi</p>
                                    <p class="text-sm text-text-600 dark:text-text-400">{{ $store['location'] }}</p>
                                </div>
                            </div>

                            <!-- Phone -->
                            <div class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-text-600 dark:text-text-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                <div>
                                    <p class="text-sm font-medium text-text-900 dark:text-text-100">Telepon</p>
                                    <p class="text-sm text-text-600 dark:text-text-400">{{ $store['phone'] }}</p>
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-text-600 dark:text-text-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <div>
                                    <p class="text-sm font-medium text-text-900 dark:text-text-100">Email</p>
                                    <p class="text-sm text-text-600 dark:text-text-400">{{ $store['email'] }}</p>
                                </div>
                            </div>

                            <!-- Joined Date -->
                            <div class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-text-600 dark:text-text-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <div>
                                    <p class="text-sm font-medium text-text-900 dark:text-text-100">Bergabung Sejak</p>
                                    <p class="text-sm text-text-600 dark:text-text-400">{{ \Carbon\Carbon::parse($store['joined_date'])->format('F Y') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Operating Hours -->
                    <div class="bg-surface2 dark:bg-surface-950 rounded-xl border border-border-300 dark:border-border-700 p-6">
                        <h3 class="font-semibold text-text-900 dark:text-text-100 mb-4">Jam Operasional</h3>
                        <div class="space-y-2">
                            @foreach($store['operating_hours'] as $day => $hours)
                                <div class="flex justify-between text-sm">
                                    <span class="text-text-600 dark:text-text-400">{{ $day }}</span>
                                    <span class="font-medium text-text-900 dark:text-text-100">{{ $hours }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Owner Info -->
                    <div class="bg-surface2 dark:bg-surface-950 rounded-xl border border-border-300 dark:border-border-700 p-6">
                        <h3 class="font-semibold text-text-900 dark:text-text-100 mb-4">Pemilik Toko</h3>
                        <div class="flex items-center gap-3">
                            <img
                                src="{{ $store['owner']['avatar'] }}"
                                alt="{{ $store['owner']['name'] }}"
                                class="w-12 h-12 rounded-full"
                            >
                            <div>
                                <p class="font-medium text-text-900 dark:text-text-100">{{ $store['owner']['name'] }}</p>
                                <p class="text-sm text-text-600 dark:text-text-400">Owner</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
