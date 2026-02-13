@php
$currentRoute = Route::currentRouteName();
@endphp

<aside class="w-64 bg-surface2 dark:bg-surface-950 border-r border-border-300 dark:border-border-700 flex flex-col">
    <!-- Logo -->
    <div class="p-6 border-b border-border-300 dark:border-border-700">
        <a href="{{ route('home') }}" class="flex items-center gap-3">
            <div class="w-10 h-10 bg-primary rounded-lg flex items-center justify-center">
                <span class="text-white font-bold">T</span>
            </div>
            <span class="text-xl font-semibold text-text-900 dark:text-text-100">Telyubiz</span>
        </a>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 p-4 overflow-y-auto">
        <div class="space-y-1">
            <!-- Dashboard -->
            <a href="{{ route('dashboard.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg transition-colors {{ str_starts_with($currentRoute, 'dashboard.index') ? 'bg-primary text-white' : 'text-text-700 dark:text-text-300 hover:bg-surface-100 dark:hover:bg-surface-900' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                </svg>
                <span class="font-medium">Dashboard</span>
            </a>

            <!-- My Businesses -->
            <a href="{{ route('dashboard.businesses.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg transition-colors {{ str_starts_with($currentRoute, 'dashboard.businesses') ? 'bg-primary text-white' : 'text-text-700 dark:text-text-300 hover:bg-surface-100 dark:hover:bg-surface-900' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                </svg>
                <span class="font-medium">Toko Saya</span>
            </a>

            <!-- Products -->
            <a href="{{ route('dashboard.products.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg transition-colors {{ str_starts_with($currentRoute, 'dashboard.products') ? 'bg-primary text-white' : 'text-text-700 dark:text-text-300 hover:bg-surface-100 dark:hover:bg-surface-900' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                </svg>
                <span class="font-medium">Produk</span>
            </a>

            <!-- Orders -->
            <a href="{{ route('dashboard.orders.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg transition-colors {{ str_starts_with($currentRoute, 'dashboard.orders') ? 'bg-primary text-white' : 'text-text-700 dark:text-text-300 hover:bg-surface-100 dark:hover:bg-surface-900' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
                <span class="font-medium">Pesanan</span>
            </a>

            <!-- Events -->
            <a href="{{ route('dashboard.events.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg transition-colors {{ str_starts_with($currentRoute, 'dashboard.events') ? 'bg-primary text-white' : 'text-text-700 dark:text-text-300 hover:bg-surface-100 dark:hover:bg-surface-900' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <span class="font-medium">Event</span>
            </a>

            <!-- Divider -->
            <div class="my-3 border-t border-border-300 dark:border-border-700"></div>

            <!-- Team -->
            <a href="{{ route('dashboard.team') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg transition-colors {{ str_starts_with($currentRoute, 'dashboard.team') ? 'bg-primary text-white' : 'text-text-700 dark:text-text-300 hover:bg-surface-100 dark:hover:bg-surface-900' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                <span class="font-medium">Tim</span>
            </a>

            <!-- Withdrawals -->
            <a href="{{ route('dashboard.withdrawals.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg transition-colors {{ str_starts_with($currentRoute, 'dashboard.withdrawals') ? 'bg-primary text-white' : 'text-text-700 dark:text-text-300 hover:bg-surface-100 dark:hover:bg-surface-900' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                <span class="font-medium">Penarikan</span>
            </a>

            <!-- Divider -->
            <div class="my-3 border-t border-border-300 dark:border-border-700"></div>

            <!-- Settings -->
            <a href="{{ route('dashboard.settings.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg transition-colors {{ str_starts_with($currentRoute, 'dashboard.settings') ? 'bg-primary text-white' : 'text-text-700 dark:text-text-300 hover:bg-surface-100 dark:hover:bg-surface-900' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <span class="font-medium">Pengaturan</span>
            </a>
        </div>
    </nav>

    <!-- Footer -->
    <div class="p-4 border-t border-border-300 dark:border-border-700">
        <a href="{{ route('home') }}" class="flex items-center gap-2 px-4 py-2 text-sm text-text-600 dark:text-text-400 hover:text-primary">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Kembali ke Marketplace
        </a>
    </div>
</aside>
