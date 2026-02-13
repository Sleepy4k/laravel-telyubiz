@extends('layouts.dashboard')

@section('page-title', 'Produk')

@php
// Dummy products data
$products = [
    [
        'id' => '01JKHP01',
        'name' => 'Nasi Goreng Special',
        'slug' => 'nasi-goreng-special',
        'image' => 'https://picsum.photos/seed/product1/100/100',
        'price' => 15000,
        'stock' => 50,
        'sold' => 234,
        'status' => 'active',
        'category' => 'Makanan',
        'business' => ['name' => 'Warung Makan Bu Siti'],
    ],
    [
        'id' => '01JKHP02',
        'name' => 'Ayam Goreng Kremes',
        'slug' => 'ayam-goreng-kremes',
        'image' => 'https://picsum.photos/seed/product2/100/100',
        'price' => 18000,
        'stock' => 30,
        'sold' => 456,
        'status' => 'active',
        'category' => 'Makanan',
        'business' => ['name' => 'Warung Makan Bu Siti'],
    ],
    [
        'id' => '01JKHP03',
        'name' => 'Soto Ayam Kampung',
        'slug' => 'soto-ayam-kampung',
        'image' => 'https://picsum.photos/seed/product3/100/100',
        'price' => 12000,
        'stock' => 0,
        'sold' => 189,
        'status' => 'out_of_stock',
        'category' => 'Makanan',
        'business' => ['name' => 'Warung Makan Bu Siti'],
    ],
    [
        'id' => '01JKHP04',
        'name' => 'Gantungan Kunci Custom',
        'slug' => 'gantungan-kunci-custom',
        'image' => 'https://picsum.photos/seed/product4/100/100',
        'price' => 20000,
        'stock' => 100,
        'sold' => 892,
        'status' => 'active',
        'category' => 'Aksesori',
        'business' => ['name' => 'Craft Corner'],
    ],
];

$statusColors = [
    'active' => 'success',
    'out_of_stock' => 'danger',
    'inactive' => 'secondary',
    'draft' => 'warning',
];

$statusLabels = [
    'active' => 'Aktif',
    'out_of_stock' => 'Stok Habis',
    'inactive' => 'Tidak Aktif',
    'draft' => 'Draft',
];
@endphp

@section('content')
<!-- Header -->
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
    <div>
        <p class="text-text-600 dark:text-text-400">Kelola semua produk dari toko Anda</p>
    </div>
    <x-ui.button href="{{ route('dashboard.products.create') }}" variant="primary" size="md">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
        </svg>
        Tambah Produk
    </x-ui.button>
</div>

<!-- Filters & Search -->
<div class="bg-surface2 dark:bg-surface-950 border border-border-300 dark:border-border-700 rounded-xl p-4 mb-6">
    <div class="flex flex-col md:flex-row gap-4">
        <div class="flex-1">
            <input
                type="search"
                placeholder="Cari produk..."
                class="w-full px-4 py-2 bg-surface-100 dark:bg-surface-900 border border-border-300 dark:border-border-700 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent"
            >
        </div>
        <select class="px-4 py-2 bg-surface-100 dark:bg-surface-900 border border-border-300 dark:border-border-700 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
            <option value="">Semua Status</option>
            <option value="active">Aktif</option>
            <option value="out_of_stock">Stok Habis</option>
            <option value="inactive">Tidak Aktif</option>
            <option value="draft">Draft</option>
        </select>
        <select class="px-4 py-2 bg-surface-100 dark:bg-surface-900 border border-border-300 dark:border-border-700 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
            <option value="">Semua Kategori</option>
            <option value="makanan">Makanan</option>
            <option value="minuman">Minuman</option>
            <option value="aksesori">Aksesori</option>
        </select>
    </div>
</div>

<!-- Products Table -->
<div class="bg-surface2 dark:bg-surface-950 border border-border-300 dark:border-border-700 rounded-xl overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-surface-100 dark:bg-surface-900 border-b border-border-300 dark:border-border-700">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-text-600 dark:text-text-400 uppercase tracking-wider">Produk</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-text-600 dark:text-text-400 uppercase tracking-wider">Toko</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-text-600 dark:text-text-400 uppercase tracking-wider">Harga</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-text-600 dark:text-text-400 uppercase tracking-wider">Stok</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-text-600 dark:text-text-400 uppercase tracking-wider">Terjual</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-text-600 dark:text-text-400 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-text-600 dark:text-text-400 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-border-300 dark:divide-border-700">
                @foreach($products as $product)
                    <tr class="hover:bg-surface-100 dark:hover:bg-surface-900 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center gap-3">
                                <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="w-12 h-12 rounded-lg object-cover">
                                <div>
                                    <p class="font-medium text-text-900 dark:text-text-100">{{ $product['name'] }}</p>
                                    <p class="text-sm text-text-600 dark:text-text-400">{{ $product['category'] }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <p class="text-sm text-text-900 dark:text-text-100">{{ $product['business']['name'] }}</p>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <p class="font-semibold text-text-900 dark:text-text-100">Rp {{ number_format($product['price'], 0, ',', '.') }}</p>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <p class="text-sm {{ $product['stock'] > 0 ? 'text-text-900 dark:text-text-100' : 'text-danger-600 dark:text-danger-400' }}">
                                {{ $product['stock'] > 0 ? $product['stock'] : 'Habis' }}
                            </p>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <p class="text-sm text-text-900 dark:text-text-100">{{ $product['sold'] }}</p>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <x-ui.badge :variant="$statusColors[$product['status']]" size="sm">
                                {{ $statusLabels[$product['status']] }}
                            </x-ui.badge>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('products.show', $product['slug']) }}" target="_blank" class="p-2 text-text-600 dark:text-text-400 hover:text-primary rounded-lg hover:bg-surface-100 dark:hover:bg-surface-900 transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </a>
                                <a href="{{ route('dashboard.products.edit', $product['id']) }}" class="p-2 text-text-600 dark:text-text-400 hover:text-primary rounded-lg hover:bg-surface-100 dark:hover:bg-surface-900 transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>
                                <button class="p-2 text-text-600 dark:text-text-400 hover:text-danger-600 rounded-lg hover:bg-surface-100 dark:hover:bg-surface-900 transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="px-6 py-4 border-t border-border-300 dark:border-border-700">
        <div class="flex items-center justify-between">
            <p class="text-sm text-text-600 dark:text-text-400">
                Menampilkan 1 - {{ count($products) }} dari {{ count($products) }} produk
            </p>
            <div class="flex gap-2">
                <button class="px-3 py-1 border border-border-300 dark:border-border-700 rounded-lg text-sm disabled:opacity-50" disabled>
                    Sebelumnya
                </button>
                <button class="px-3 py-1 border border-border-300 dark:border-border-700 rounded-lg text-sm disabled:opacity-50" disabled>
                    Selanjutnya
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Quick Stats -->
<div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-6">
    <div class="bg-surface2 dark:bg-surface-950 border border-border-300 dark:border-border-700 rounded-xl p-4">
        <p class="text-sm text-text-600 dark:text-text-400 mb-1">Total Produk</p>
        <p class="text-2xl font-bold text-text-900 dark:text-text-100">{{ count($products) }}</p>
    </div>
    <div class="bg-surface2 dark:bg-surface-950 border border-border-300 dark:border-border-700 rounded-xl p-4">
        <p class="text-sm text-text-600 dark:text-text-400 mb-1">Produk Aktif</p>
        <p class="text-2xl font-bold text-success-600 dark:text-success-400">{{ collect($products)->where('status', 'active')->count() }}</p>
    </div>
    <div class="bg-surface2 dark:bg-surface-950 border border-border-300 dark:border-border-700 rounded-xl p-4">
        <p class="text-sm text-text-600 dark:text-text-400 mb-1">Stok Habis</p>
        <p class="text-2xl font-bold text-danger-600 dark:text-danger-400">{{ collect($products)->where('status', 'out_of_stock')->count() }}</p>
    </div>
    <div class="bg-surface2 dark:bg-surface-950 border border-border-300 dark:border-border-700 rounded-xl p-4">
        <p class="text-sm text-text-600 dark:text-text-400 mb-1">Total Terjual</p>
        <p class="text-2xl font-bold text-primary">{{ collect($products)->sum('sold') }}</p>
    </div>
</div>
@endsection
