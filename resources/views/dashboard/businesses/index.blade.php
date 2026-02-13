@extends('layouts.dashboard')

@section('page-title', 'Toko Saya')

@php
// Dummy businesses data
$businesses = [
    [
        'id' => '01JKH81',
        'name' => 'Warung Makan Bu Siti',
        'slug' => 'warung-makan-bu-siti',
        'description' => 'Menyediakan makanan khas Jawa dengan cita rasa autentik',
        'logo' => 'https://ui-avatars.com/api/?name=Warung+Makan+Bu+Siti&background=D61F2C&color=fff&size=80',
        'category' => 'Kuliner',
        'status' => 'active', // active, inactive, pending
        'total_products' => 23,
        'total_orders' => 156,
        'total_revenue' => 12500000,
        'created_at' => '2023-08-15',
    ],
    [
        'id' => '01JKH82',
        'name' => 'Craft Corner',
        'slug' => 'craft-corner',
        'description' => 'Kerajinan tangan unik dan custom untuk berbagai kebutuhan',
        'logo' => 'https://ui-avatars.com/api/?name=Craft+Corner&background=64748B&color=fff&size=80',
        'category' => 'Kerajinan',
        'status' => 'active',
        'total_products' => 45,
        'total_orders' => 89,
        'total_revenue' => 8750000,
        'created_at' => '2023-09-20',
    ],
];

$statusColors = [
    'active' => 'success',
    'inactive' => 'secondary',
    'pending' => 'warning',
];

$statusLabels = [
    'active' => 'Aktif',
    'inactive' => 'Tidak Aktif',
    'pending' => 'Menunggu Verifikasi',
];
@endphp

@section('content')
<!-- Header -->
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
    <div>
        <p class="text-text-600 dark:text-text-400">Kelola semua toko dan bisnis Anda di satu tempat</p>
    </div>
    <x-ui.button href="{{ route('dashboard.businesses.create') }}" variant="primary" size="md">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
        </svg>
        Tambah Toko Baru
    </x-ui.button>
</div>

<!-- Businesses Grid -->
@if(count($businesses) > 0)
    <div class="grid md:grid-cols-2 gap-6">
        @foreach($businesses as $business)
            <div class="bg-surface2 dark:bg-surface-950 border border-border-300 dark:border-border-700 rounded-xl p-6 hover:shadow-lg transition-shadow">
                <div class="flex items-start gap-4 mb-4">
                    <img
                        src="{{ $business['logo'] }}"
                        alt="{{ $business['name'] }}"
                        class="w-16 h-16 rounded-lg flex-shrink-0"
                    >
                    <div class="flex-1 min-w-0">
                        <div class="flex items-start justify-between gap-2 mb-1">
                            <h3 class="text-lg font-semibold text-text-900 dark:text-text-100 truncate">{{ $business['name'] }}</h3>
                            <x-ui.badge :variant="$statusColors[$business['status']]" size="sm">
                                {{ $statusLabels[$business['status']] }}
                            </x-ui.badge>
                        </div>
                        <p class="text-sm text-text-600 dark:text-text-400 line-clamp-2 mb-2">{{ $business['description'] }}</p>
                        <x-ui.badge variant="secondary" size="sm">{{ $business['category'] }}</x-ui.badge>
                    </div>
                </div>

                <!-- Stats -->
                <div class="grid grid-cols-3 gap-4 mb-4 pb-4 border-b border-border-300 dark:border-border-700">
                    <div>
                        <p class="text-xs text-text-600 dark:text-text-400 mb-1">Produk</p>
                        <p class="text-lg font-bold text-text-900 dark:text-text-100">{{ $business['total_products'] }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-text-600 dark:text-text-400 mb-1">Pesanan</p>
                        <p class="text-lg font-bold text-text-900 dark:text-text-100">{{ $business['total_orders'] }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-text-600 dark:text-text-400 mb-1">Pendapatan</p>
                        <p class="text-lg font-bold text-primary">Rp {{ number_format($business['total_revenue'] / 1000000, 1) }}jt</p>
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex gap-2">
                    <x-ui.button href="{{ route('stores.show', $business['slug']) }}" variant="outline" size="sm" class="flex-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        Lihat Toko
                    </x-ui.button>
                    <x-ui.button href="{{ route('dashboard.businesses.edit', $business['id']) }}" variant="primary" size="sm" class="flex-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        Edit
                    </x-ui.button>
                    <button class="p-2 rounded-lg border border-border-300 dark:border-border-700 text-text-600 dark:text-text-400 hover:bg-surface-100 dark:hover:bg-surface-900 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                        </svg>
                    </button>
                </div>
            </div>
        @endforeach
    </div>
@else
    <!-- Empty State -->
    <div class="bg-surface2 dark:bg-surface-950 border border-border-300 dark:border-border-700 rounded-xl p-12 text-center">
        <svg class="w-24 h-24 mx-auto text-text-300 dark:text-text-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
        </svg>
        <h3 class="text-xl font-semibold text-text-900 dark:text-text-100 mb-2">Belum Ada Toko</h3>
        <p class="text-text-600 dark:text-text-400 mb-6">Mulai bisnis Anda dengan membuat toko pertama!</p>
        <x-ui.button href="{{ route('dashboard.businesses.create') }}" variant="primary" size="lg">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
            Buat Toko Pertama
        </x-ui.button>
    </div>
@endif

<!-- Tips -->
<div class="mt-8 bg-primary-50 dark:bg-primary-950 border border-primary-200 dark:border-primary-800 rounded-xl p-6">
    <div class="flex gap-4">
        <svg class="w-6 h-6 text-primary flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <div>
            <h4 class="font-semibold text-primary-900 dark:text-primary-100 mb-2">Tips Mengelola Toko</h4>
            <ul class="space-y-1 text-sm text-primary-800 dark:text-primary-200">
                <li>• Update informasi toko secara berkala untuk meningkatkan kepercayaan pelanggan</li>
                <li>• Tambahkan foto berkualitas tinggi untuk produk Anda</li>
                <li>• Respon cepat terhadap pertanyaan pelanggan dapat meningkatkan penjualan</li>
                <li>• Gunakan fitur event untuk promosi dan meningkatkan visibilitas toko</li>
            </ul>
        </div>
    </div>
</div>
@endsection
