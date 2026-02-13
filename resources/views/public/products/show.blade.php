@extends('layouts.app')

@php
$product = [
    'id' => '01JKHP01',
    'name' => 'Nasi Goreng Special',
    'slug' => 'nasi-goreng-special',
    'description' => 'Nasi goreng dengan bumbu rahasia yang sudah terkenal enak. Dilengkapi dengan telur mata sapi, ayam suwir, kerupuk, dan acar. Cocok untuk makan siang atau malam Anda. Bahan-bahan fresh dan dimasak langsung setelah order untuk menjaga kualitas.',
    'price' => 15000,
    'discount_price' => null,
    'images' => [
        'https://picsum.photos/seed/product1/800/800',
        'https://picsum.photos/seed/product1-2/800/800',
        'https://picsum.photos/seed/product1-3/800/800',
    ],
    'category' => 'Makanan',
    'stock' => 50,
    'sold' => 234,
    'rating' => 4.7,
    'total_reviews' => 87,
    'store' => [
        'id' => '01JKH81',
        'name' => 'Warung Makan Bu Siti',
        'slug' => 'warung-makan-bu-siti',
        'logo' => 'https://ui-avatars.com/api/?name=Warung+Makan+Bu+Siti&background=D61F2C&color=fff&size=128',
        'rating' => 4.8,
        'location' => 'Purwokerto Barat',
    ],
    'is_available' => true,
    'variants' => [
        ['name' => 'Level Pedas', 'options' => ['Tidak Pedas', 'Sedang', 'Pedas', 'Extra Pedas']],
        ['name' => 'Tambahan', 'options' => ['Tanpa Tambahan', 'Extra Telur (+5k)', 'Extra Ayam (+8k)', 'Extra Kerupuk (+2k)']],
    ],
];

$reviews = [
    ['user' => ['name' => 'Ahmad Rizki', 'avatar' => 'https://ui-avatars.com/api/?name=Ahmad+Rizki'], 'rating' => 5, 'comment' => 'Enak banget! Bumbu meresap sempurna, porsi juga banyak. Recommended!', 'date' => '2024-02-10', 'images' => ['https://picsum.photos/seed/review1/200/200']],
    ['user' => ['name' => 'Siti Nurhaliza', 'avatar' => 'https://ui-avatars.com/api/?name=Siti+Nurhaliza'], 'rating' => 4, 'comment' => 'Rasanya mantap, tapi delivery agak lama. Overall oke sih.', 'date' => '2024-02-08', 'images' => []],
    ['user' => ['name' => 'Budi Santoso', 'avatar' => 'https://ui-avatars.com/api/?name=Budi+Santoso'], 'rating' => 5, 'comment' => 'Langganan terus nih, ga pernah ngecewain!', 'date' => '2024-02-05', 'images' => []],
];

$relatedProducts = [
    ['id' => '01JKHP02', 'name' => 'Mie Goreng Jawa', 'slug' => 'mie-goreng-jawa', 'price' => 12000, 'discount_price' => null, 'images' => ['https://picsum.photos/seed/related1/400/400'], 'rating' => 4.6, 'sold' => 156, 'store' => ['name' => 'Warung Makan Bu Siti', 'slug' => 'warung-makan-bu-siti'], 'is_available' => true],
    ['id' => '01JKHP03', 'name' => 'Ayam Geprek', 'slug' => 'ayam-geprek', 'price' => 18000, 'discount_price' => 15000, 'images' => ['https://picsum.photos/seed/related2/400/400'], 'rating' => 4.8, 'sold' => 298, 'store' => ['name' => 'Warung Makan Bu Siti', 'slug' => 'warung-makan-bu-siti'], 'is_available' => true],
    ['id' => '01JKHP04', 'name' => 'Es Teh Manis', 'slug' => 'es-teh-manis', 'price' => 5000, 'discount_price' => null, 'images' => ['https://picsum.photos/seed/related3/400/400'], 'rating' => 4.5, 'sold' => 412, 'store' => ['name' => 'Warung Makan Bu Siti', 'slug' => 'warung-makan-bu-siti'], 'is_available' => true],
    ['id' => '01JKHP05', 'name' => 'Soto Ayam', 'slug' => 'soto-ayam', 'price' => 15000, 'discount_price' => null, 'images' => ['https://picsum.photos/seed/related4/400/400'], 'rating' => 4.7, 'sold' => 187, 'store' => ['name' => 'Warung Makan Bu Siti', 'slug' => 'warung-makan-bu-siti'], 'is_available' => true],
];
@endphp

@section('title', $product['name'])

@section('content')
<section class="py-8">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
        <!-- Breadcrumb -->
        <nav class="flex mb-6 text-sm" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('home') }}" class="text-text-600 dark:text-text-400 hover:text-primary">Beranda</a>
                </li>
                <li><span class="text-text-400 mx-2">/</span></li>
                <li class="inline-flex items-center">
                    <a href="{{ route('stores.show', $product['store']['slug']) }}" class="text-text-600 dark:text-text-400 hover:text-primary">{{ $product['store']['name'] }}</a>
                </li>
                <li><span class="text-text-400 mx-2">/</span></li>
                <li class="text-text-900 dark:text-text-100">{{ $product['name'] }}</li>
            </ol>
        </nav>

        <div class="grid lg:grid-cols-2 gap-8 mb-12">
            <!-- Product Images -->
            <div>
                <div class="sticky top-20">
                    <!-- Main Image -->
                    <div class="mb-4 rounded-xl overflow-hidden bg-surface-100 dark:bg-surface-900 aspect-square">
                        <img
                            id="mainImage"
                            src="{{ $product['images'][0] }}"
                            alt="{{ $product['name'] }}"
                            class="w-full h-full object-cover"
                        >
                    </div>

                    <!-- Thumbnail Images -->
                    <div class="grid grid-cols-4 gap-3">
                        @foreach($product['images'] as $index => $image)
                            <button
                                onclick="changeImage('{{ $image }}')"
                                class="rounded-lg overflow-hidden border-2 transition-colors {{ $index === 0 ? 'border-primary' : 'border-border-300 dark:border-border-700 hover:border-primary' }}"
                            >
                                <img src="{{ $image }}" alt="Thumbnail {{ $index + 1 }}" class="w-full aspect-square object-cover">
                            </button>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Product Info -->
            <div>
                <div class="mb-4">
                    <h1 class="text-3xl font-bold text-text-900 dark:text-text-100 mb-3">{{ $product['name'] }}</h1>

                    <!-- Rating & Sold -->
                    <div class="flex items-center gap-4 mb-4">
                        <div class="flex items-center gap-1">
                            @for($i = 1; $i <= 5; $i++)
                                <svg class="w-5 h-5 {{ $i <= floor($product['rating']) ? 'text-warning-500' : 'text-text-300 dark:text-text-600' }}" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                            @endfor
                            <span class="ml-2 text-sm font-medium text-text-900 dark:text-text-100">{{ $product['rating'] }}</span>
                            <span class="text-sm text-text-500 dark:text-text-500">({{ $product['total_reviews'] }} ulasan)</span>
                        </div>
                        <span class="text-sm text-text-600 dark:text-text-400">{{ $product['sold'] }} terjual</span>
                    </div>

                    <!-- Price -->
                    <div class="mb-6">
                        @if($product['discount_price'])
                            <div class="flex items-center gap-3 mb-2">
                                <span class="text-3xl font-bold text-primary">Rp {{ number_format($product['discount_price'], 0, ',', '.') }}</span>
                                <x-ui.badge variant="danger">
                                    -{{ round((($product['price'] - $product['discount_price']) / $product['price']) * 100) }}%
                                </x-ui.badge>
                            </div>
                            <span class="text-lg text-text-500 dark:text-text-500 line-through">Rp {{ number_format($product['price'], 0, ',', '.') }}</span>
                        @else
                            <span class="text-3xl font-bold text-text-900 dark:text-text-100">Rp {{ number_format($product['price'], 0, ',', '.') }}</span>
                        @endif
                    </div>
                </div>

                <!-- Description -->
                <div class="mb-6 pb-6 border-b border-border-300 dark:border-border-700">
                    <h3 class="font-semibold text-text-900 dark:text-text-100 mb-2">Deskripsi</h3>
                    <p class="text-text-600 dark:text-text-400 leading-relaxed">{{ $product['description'] }}</p>
                </div>

                <!-- Variants -->
                @foreach($product['variants'] as $variant)
                    <div class="mb-6">
                        <h3 class="font-semibold text-text-900 dark:text-text-100 mb-3">{{ $variant['name'] }}</h3>
                        <div class="flex flex-wrap gap-2">
                            @foreach($variant['options'] as $option)
                                <button class="px-4 py-2 rounded-lg border-2 border-border-300 dark:border-border-700 text-text-700 dark:text-text-300 hover:border-primary hover:text-primary transition-colors">
                                    {{ $option }}
                                </button>
                            @endforeach
                        </div>
                    </div>
                @endforeach

                <!-- Quantity & Actions -->
                <div class="flex flex-wrap gap-4 mb-6">
                    <div class="flex items-center gap-3 bg-surface2 dark:bg-surface-950 border border-border-300 dark:border-border-700 rounded-lg p-2">
                        <button class="w-8 h-8 flex items-center justify-center rounded hover:bg-surface-100 dark:hover:bg-surface-900">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                            </svg>
                        </button>
                        <input type="number" value="1" min="1" class="w-16 text-center bg-transparent outline-none text-text-900 dark:text-text-100">
                        <button class="w-8 h-8 flex items-center justify-center rounded hover:bg-surface-100 dark:hover:bg-surface-900">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                        </button>
                    </div>

                    <span class="text-sm text-text-500 dark:text-text-500 self-center">Stok: {{ $product['stock'] }}</span>
                </div>

                <div class="flex gap-3">
                    <x-ui.button variant="primary" size="lg" class="flex-1">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        Tambah ke Keranjang
                    </x-ui.button>
                    <x-ui.button variant="outline-secondary" size="lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </x-ui.button>
                </div>

                <!-- Store Info -->
                <div class="mt-8 p-4 bg-surface2 dark:bg-surface-950 border border-border-300 dark:border-border-700 rounded-xl">
                    <div class="flex items-center gap-4">
                        <img src="{{ $product['store']['logo'] }}" alt="{{ $product['store']['name'] }}" class="w-16 h-16 rounded-lg">
                        <div class="flex-1">
                            <h4 class="font-semibold text-text-900 dark:text-text-100">{{ $product['store']['name'] }}</h4>
                            <div class="flex items-center gap-3 text-sm text-text-600 dark:text-text-400 mt-1">
                                <div class="flex items-center gap-1">
                                    <svg class="w-4 h-4 text-warning-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    <span>{{ $product['store']['rating'] }}</span>
                                </div>
                                <span>•</span>
                                <span>{{ $product['store']['location'] }}</span>
                            </div>
                        </div>
                        <x-ui.button href="{{ route('stores.show', $product['store']['slug']) }}" variant="outline-secondary" size="sm">
                            Kunjungi Toko
                        </x-ui.button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Reviews Section -->
        <div class="mb-12">
            <h2 class="text-2xl font-bold text-text-900 dark:text-text-100 mb-6">Ulasan Pembeli</h2>

            <div class="space-y-4">
                @foreach($reviews as $review)
                    <div class="p-6 bg-surface2 dark:bg-surface-950 border border-border-300 dark:border-border-700 rounded-xl">
                        <div class="flex items-start gap-4">
                            <img src="{{ $review['user']['avatar'] }}" alt="{{ $review['user']['name'] }}" class="w-12 h-12 rounded-full">
                            <div class="flex-1">
                                <div class="flex items-center justify-between mb-2">
                                    <div>
                                        <h4 class="font-semibold text-text-900 dark:text-text-100">{{ $review['user']['name'] }}</h4>
                                        <div class="flex items-center gap-2 mt-1">
                                            <div class="flex">
                                                @for($i = 1; $i <= 5; $i++)
                                                    <svg class="w-4 h-4 {{ $i <= $review['rating'] ? 'text-warning-500' : 'text-text-300' }}" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                    </svg>
                                                @endfor
                                            </div>
                                            <span class="text-sm text-text-500">{{ \Carbon\Carbon::parse($review['date'])->diffForHumans() }}</span>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-text-600 dark:text-text-400 mb-3">{{ $review['comment'] }}</p>
                                @if(count($review['images']) > 0)
                                    <div class="flex gap-2">
                                        @foreach($review['images'] as $image)
                                            <img src="{{ $image }}" alt="Review image" class="w-20 h-20 rounded-lg object-cover">
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Related Products -->
        <div>
            <h2 class="text-2xl font-bold text-text-900 dark:text-text-100 mb-6">Produk Lainnya dari Toko Ini</h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 lg:gap-6">
                @foreach($relatedProducts as $related)
                    <x-cards.product :product="$related" />
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
function changeImage(src) {
    document.getElementById('mainImage').src = src;

    // Update active thumbnail
    document.querySelectorAll('[onclick^="changeImage"]').forEach(btn => {
        btn.classList.remove('border-primary');
        btn.classList.add('border-border-300', 'dark:border-border-700');
    });
    event.currentTarget.classList.add('border-primary');
    event.currentTarget.classList.remove('border-border-300', 'dark:border-border-700');
}
</script>
@endpush
