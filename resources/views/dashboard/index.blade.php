@extends('layouts.dashboard')

@section('page-title', 'Dashboard')

@section('content')
<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-surface2 dark:bg-surface-950 border border-border-300 dark:border-border-700 rounded-xl p-6">
        <div class="flex items-center justify-between mb-2">
            <h3 class="text-sm font-medium text-text-600 dark:text-text-400">Total Penjualan</h3>
            <div class="p-2 bg-primary-100 dark:bg-primary-900 rounded-lg">
                <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
        </div>
        <p class="text-2xl font-bold text-text-900 dark:text-text-100">Rp 12.500.000</p>
        <p class="text-xs text-success-600 dark:text-success-400 mt-1">+12.5% dari bulan lalu</p>
    </div>

    <div class="bg-surface2 dark:bg-surface-950 border border-border-300 dark:border-border-700 rounded-xl p-6">
        <div class="flex items-center justify-between mb-2">
            <h3 class="text-sm font-medium text-text-600 dark:text-text-400">Pesanan</h3>
            <div class="p-2 bg-warning-100 dark:bg-warning-900 rounded-lg">
                <svg class="w-5 h-5 text-warning-600 dark:text-warning-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
            </div>
        </div>
        <p class="text-2xl font-bold text-text-900 dark:text-text-100">234</p>
        <p class="text-xs text-success-600 dark:text-success-400 mt-1">+8% dari bulan lalu</p>
    </div>

    <div class="bg-surface2 dark:bg-surface-950 border border-border-300 dark:border-border-700 rounded-xl p-6">
        <div class="flex items-center justify-between mb-2">
            <h3 class="text-sm font-medium text-text-600 dark:text-text-400">Produk</h3>
            <div class="p-2 bg-success-100 dark:bg-success-900 rounded-lg">
                <svg class="w-5 h-5 text-success-600 dark:text-success-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                </svg>
            </div>
        </div>
        <p class="text-2xl font-bold text-text-900 dark:text-text-100">45</p>
        <p class="text-xs text-text-600 dark:text-text-400 mt-1">23 aktif, 22 draft</p>
    </div>

    <div class="bg-surface2 dark:bg-surface-950 border border-border-300 dark:border-border-700 rounded-xl p-6">
        <div class="flex items-center justify-between mb-2">
            <h3 class="text-sm font-medium text-text-600 dark:text-text-400">Pelanggan</h3>
            <div class="p-2 bg-secondary-100 dark:bg-secondary-900 rounded-lg">
                <svg class="w-5 h-5 text-secondary-600 dark:text-secondary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
            </div>
        </div>
        <p class="text-2xl font-bold text-text-900 dark:text-text-100">156</p>
        <p class="text-xs text-success-600 dark:text-success-400 mt-1">+15 bulan ini</p>
    </div>
</div>

<!-- Quick Actions -->
<div class="mb-8">
    <h2 class="text-xl font-bold text-text-900 dark:text-text-100 mb-4">Aksi Cepat</h2>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <a href="#" class="flex flex-col items-center justify-center p-6 bg-surface2 dark:bg-surface-950 border border-border-300 dark:border-border-700 rounded-xl hover:border-primary transition-colors">
            <svg class="w-8 h-8 text-primary mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
            <span class="text-sm font-medium text-text-900 dark:text-text-100">Tambah Produk</span>
        </a>

        <a href="#" class="flex flex-col items-center justify-center p-6 bg-surface2 dark:bg-surface-950 border border-border-300 dark:border-border-700 rounded-xl hover:border-primary transition-colors">
            <svg class="w-8 h-8 text-primary mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
            </svg>
            <span class="text-sm font-medium text-text-900 dark:text-text-100">Lihat Pesanan</span>
        </a>

        <a href="#" class="flex flex-col items-center justify-center p-6 bg-surface2 dark:bg-surface-950 border border-border-300 dark:border-border-700 rounded-xl hover:border-primary transition-colors">
            <svg class="w-8 h-8 text-primary mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            <span class="text-sm font-medium text-text-900 dark:text-text-100">Buat Event</span>
        </a>

        <a href="#" class="flex flex-col items-center justify-center p-6 bg-surface2 dark:bg-surface-950 border border-border-300 dark:border-border-700 rounded-xl hover:border-primary transition-colors">
            <svg class="w-8 h-8 text-primary mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
            <span class="text-sm font-medium text-text-900 dark:text-text-100">Undang Tim</span>
        </a>
    </div>
</div>

<!-- Recent Orders & Activity -->
<div class="grid lg:grid-cols-2 gap-8">
    <div>
        <h2 class="text-xl font-bold text-text-900 dark:text-text-100 mb-4">Pesanan Terbaru</h2>
        <div class="bg-surface2 dark:bg-surface-950 border border-border-300 dark:border-border-700 rounded-xl overflow-hidden">
            <div class="divide-y divide-border-300 dark:divide-border-700">
                @for($i = 1; $i <= 5; $i++)
                    <div class="p-4 hover:bg-surface-100 dark:hover:bg-surface-900 transition-colors">
                        <div class="flex items-center justify-between mb-2">
                            <span class="font-medium text-text-900 dark:text-text-100">#ORD-2024-{{ str_pad($i, 4, '0', STR_PAD_LEFT) }}</span>
                            <x-ui.badge variant="warning" size="sm">Pending</x-ui.badge>
                        </div>
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-text-600 dark:text-text-400">2 produk</span>
                            <span class="font-medium text-text-900 dark:text-text-100">Rp {{ number_format(rand(50000, 500000), 0, ',', '.') }}</span>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>

    <div>
        <h2 class="text-xl font-bold text-text-900 dark:text-text-100 mb-4">Produk Terlaris</h2>
        <div class="bg-surface2 dark:bg-surface-950 border border-border-300 dark:border-border-700 rounded-xl overflow-hidden">
            <div class="divide-y divide-border-300 dark:divide-border-700">
                @for($i = 1; $i <= 5; $i++)
                    <div class="p-4 hover:bg-surface-100 dark:hover:bg-surface-900 transition-colors">
                        <div class="flex gap-3">
                            <img src="https://picsum.photos/seed/product{{ $i }}/80/80" alt="Product" class="w-12 h-12 rounded-lg object-cover">
                            <div class="flex-1">
                                <h4 class="font-medium text-text-900 dark:text-text-100 mb-1">Produk {{ $i }}</h4>
                                <div class="flex items-center justify-between text-sm">
                                    <span class="text-text-600 dark:text-text-400">{{ rand(50, 200) }} terjual</span>
                                    <span class="font-medium text-primary">Rp {{ number_format(rand(10000, 100000), 0, ',', '.') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>
</div>
@endsection
