@props([
    'product' => []
])

<a href="{{ route('products.show', $product['slug']) }}" class="group block bg-surface2 dark:bg-surface-950 rounded-xl shadow-md hover:shadow-xl border border-border-300 dark:border-border-700 overflow-hidden transition-all duration-300 hover:-translate-y-1">
    <!-- Product Image -->
    <div class="relative aspect-square bg-surface-100 dark:bg-surface-900 overflow-hidden">
        <img
            src="{{ $product['images'][0] ?? 'https://picsum.photos/seed/default/400/400' }}"
            alt="{{ $product['name'] }}"
            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
        >

        @if($product['discount_price'] ?? false)
            <div class="absolute top-3 left-3">
                <x-ui.badge variant="danger" size="sm">
                    -{{ round((($product['price'] - $product['discount_price']) / $product['price']) * 100) }}%
                </x-ui.badge>
            </div>
        @endif

        @if(!($product['is_available'] ?? true))
            <div class="absolute inset-0 bg-black bg-opacity-60 flex items-center justify-center">
                <span class="text-white font-semibold">Stok Habis</span>
            </div>
        @endif

        <!-- Quick Add to Cart (Hover) -->
        <button
            onclick="event.preventDefault(); addToCart('{{ $product['id'] }}'); return false;"
            class="absolute bottom-3 right-3 p-2.5 bg-primary hover:bg-primary-700 text-white rounded-lg shadow-lg opacity-0 group-hover:opacity-100 translate-y-2 group-hover:translate-y-0 transition-all duration-200"
        >
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
        </button>
    </div>

    <!-- Product Info -->
    <div class="p-4">
        <!-- Product Name -->
        <h3 class="text-base font-semibold text-text-900 dark:text-text-100 mb-2 line-clamp-2 group-hover:text-primary transition-colors">
            {{ $product['name'] }}
        </h3>

        <!-- Price -->
        <div class="mb-3">
            @if($product['discount_price'] ?? false)
                <div class="flex items-center gap-2">
                    <span class="text-lg font-bold text-primary">
                        Rp {{ number_format($product['discount_price'], 0, ',', '.') }}
                    </span>
                    <span class="text-sm text-text-500 dark:text-text-500 line-through">
                        Rp {{ number_format($product['price'], 0, ',', '.') }}
                    </span>
                </div>
            @else
                <span class="text-lg font-bold text-text-900 dark:text-text-100">
                    Rp {{ number_format($product['price'], 0, ',', '.') }}
                </span>
            @endif
        </div>

        <!-- Store Info & Stats -->
        <div class="flex items-center justify-between pt-3 border-t border-border-300 dark:border-border-700">
            <span class="text-xs text-text-600 dark:text-text-400 truncate flex-1 mr-2">
                {{ $product['store']['name'] }}
            </span>

            <div class="flex items-center gap-3 text-xs text-text-500 dark:text-text-500">
                <!-- Rating -->
                <div class="flex items-center gap-0.5">
                    <svg class="w-4 h-4 text-warning-500" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                    <span>{{ $product['rating'] }}</span>
                </div>

                <!-- Sold -->
                <span>{{ $product['sold'] ?? 0 }} terjual</span>
            </div>
        </div>
    </div>
</a>
