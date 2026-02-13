@props([
    'store' => []
])

<a href="{{ route('stores.show', $store['slug']) }}" class="group block bg-surface2 dark:bg-surface-950 rounded-xl shadow-md hover:shadow-xl border border-border-300 dark:border-border-700 overflow-hidden transition-all duration-300 hover:-translate-y-1">
    <!-- Store Banner -->
    <div class="relative h-48 bg-gradient-to-br from-primary-100 to-primary-200 dark:from-primary-900 dark:to-primary-950 overflow-hidden">
        <img
            src="{{ $store['banner'] }}"
            alt="{{ $store['name'] }}"
            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
        >
        @if($store['is_verified'] ?? false)
            <div class="absolute top-3 right-3">
                <x-ui.badge variant="success" size="sm">
                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                    Verified
                </x-ui.badge>
            </div>
        @endif
    </div>

    <!-- Store Info -->
    <div class="p-5">
        <!-- Logo & Name -->
        <div class="flex items-start gap-4 mb-3">
            <img
                src="{{ $store['logo'] }}"
                alt="{{ $store['name'] }}"
                class="w-16 h-16 rounded-lg border-2 border-surface-100 dark:border-surface-900 shadow-md -mt-10 bg-white dark:bg-surface-950"
            >
            <div class="flex-1 mt-1">
                <h3 class="text-lg font-semibold text-text-900 dark:text-text-100 group-hover:text-primary transition-colors line-clamp-1">
                    {{ $store['name'] }}
                </h3>
                <p class="text-sm text-text-600 dark:text-text-400 mt-0.5">
                    <svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    {{ $store['location'] }}
                </p>
            </div>
        </div>

        <!-- Description -->
        <p class="text-sm text-text-600 dark:text-text-400 mb-4 line-clamp-2">
            {{ $store['description'] }}
        </p>

        <!-- Stats -->
        <div class="flex items-center justify-between pt-4 border-t border-border-300 dark:border-border-700">
            <!-- Rating -->
            <div class="flex items-center gap-1.5">
                <svg class="w-5 h-5 text-warning-500" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>
                <span class="text-sm font-medium text-text-900 dark:text-text-100">
                    {{ $store['rating'] }}
                </span>
                <span class="text-xs text-text-500 dark:text-text-500">
                    ({{ $store['total_reviews'] }})
                </span>
            </div>

            <!-- Category Badge -->
            <x-ui.badge variant="secondary" size="sm">
                {{ $store['category'] }}
            </x-ui.badge>
        </div>
    </div>
</a>
