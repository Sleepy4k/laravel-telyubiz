@extends('layouts.app')

@section('title', 'Pesanan Saya')

@php
// Dummy orders data
$orders = [
    [
        'id' => '01JKHX01',
        'order_number' => 'ORD-2024-0001',
        'created_at' => '2024-02-13 10:30:00',
        'status' => 'completed', // pending, processing, shipped, completed, cancelled
        'payment_status' => 'paid',
        'items' => [
            [
                'product' => ['name' => 'Nasi Goreng Special', 'image' => 'https://picsum.photos/seed/product1/100/100'],
                'quantity' => 2,
                'price' => 15000,
            ],
        ],
        'subtotal' => 30000,
        'shipping_cost' => 10000,
        'admin_fee' => 2000,
        'total' => 42000,
        'shipping_address' => 'Jl. DI Panjaitan No. 128, Purwokerto Barat',
        'store' => ['name' => 'Warung Makan Bu Siti', 'slug' => 'warung-makan-bu-siti'],
    ],
    [
        'id' => '01JKHX02',
        'order_number' => 'ORD-2024-0002',
        'created_at' => '2024-02-12 14:15:00',
        'status' => 'shipped',
        'payment_status' => 'paid',
        'items' => [
            [
                'product' => ['name' => 'Gantungan Kunci Custom', 'image' => 'https://picsum.photos/seed/product2/100/100'],
                'quantity' => 3,
                'price' => 20000,
            ],
        ],
        'subtotal' => 60000,
        'shipping_cost' => 10000,
        'admin_fee' => 2000,
        'total' => 72000,
        'shipping_address' => 'Jl. HR Bunyamin No. 45, Purwokerto Timur',
        'store' => ['name' => 'Craft Corner', 'slug' => 'craft-corner'],
        'tracking_number' => 'JNE1234567890',
    ],
    [
        'id' => '01JKHX03',
        'order_number' => 'ORD-2024-0003',
        'created_at' => '2024-02-10 09:20:00',
        'status' => 'processing',
        'payment_status' => 'paid',
        'items' => [
            [
                'product' => ['name' => 'Paket Snack Box 20 Orang', 'image' => 'https://picsum.photos/seed/product3/100/100'],
                'quantity' => 1,
                'price' => 270000,
            ],
        ],
        'subtotal' => 270000,
        'shipping_cost' => 0,
        'admin_fee' => 2000,
        'total' => 272000,
        'shipping_address' => 'Kampus Telkom Purwokerto',
        'store' => ['name' => 'FreshBox Catering', 'slug' => 'freshbox-catering'],
    ],
    [
        'id' => '01JKHX04',
        'order_number' => 'ORD-2024-0004',
        'created_at' => '2024-02-08 16:45:00',
        'status' => 'pending',
        'payment_status' => 'unpaid',
        'items' => [
            [
                'product' => ['name' => 'Case HP Transparant', 'image' => 'https://picsum.photos/seed/product4/100/100'],
                'quantity' => 2,
                'price' => 35000,
            ],
        ],
        'subtotal' => 70000,
        'shipping_cost' => 10000,
        'admin_fee' => 2000,
        'total' => 82000,
        'shipping_address' => 'Jl. Overste Isdiman No. 89, Purwokerto Utara',
        'store' => ['name' => 'Tech Accessories Shop', 'slug' => 'tech-accessories-shop'],
    ],
];

$statusColors = [
    'pending' => 'warning',
    'processing' => 'secondary',
    'shipped' => 'primary',
    'completed' => 'success',
    'cancelled' => 'danger',
];

$statusLabels = [
    'pending' => 'Menunggu Pembayaran',
    'processing' => 'Diproses',
    'shipped' => 'Dikirim',
    'completed' => 'Selesai',
    'cancelled' => 'Dibatalkan',
];
@endphp

@section('content')
<section class="py-8 min-h-screen bg-surface-100 dark:bg-surface-900">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-5xl">
        <h1 class="text-3xl font-bold text-text-900 dark:text-text-100 mb-8">Pesanan Saya</h1>

        <!-- Filter Tabs -->
        <div class="bg-surface2 dark:bg-surface-950 rounded-xl border border-border-300 dark:border-border-700 p-2 mb-6">
            <div class="flex flex-wrap gap-2">
                <button class="px-4 py-2 rounded-lg bg-primary text-white font-medium text-sm transition-colors">
                    Semua
                </button>
                <button class="px-4 py-2 rounded-lg hover:bg-surface-100 dark:hover:bg-surface-900 text-text-700 dark:text-text-300 font-medium text-sm transition-colors">
                    Menunggu Pembayaran
                </button>
                <button class="px-4 py-2 rounded-lg hover:bg-surface-100 dark:hover:bg-surface-900 text-text-700 dark:text-text-300 font-medium text-sm transition-colors">
                    Diproses
                </button>
                <button class="px-4 py-2 rounded-lg hover:bg-surface-100 dark:hover:bg-surface-900 text-text-700 dark:text-text-300 font-medium text-sm transition-colors">
                    Dikirim
                </button>
                <button class="px-4 py-2 rounded-lg hover:bg-surface-100 dark:hover:bg-surface-900 text-text-700 dark:text-text-300 font-medium text-sm transition-colors">
                    Selesai
                </button>
            </div>
        </div>

        <!-- Orders List -->
        <div class="space-y-4">
            @foreach($orders as $order)
                <div class="bg-surface2 dark:bg-surface-950 rounded-xl border border-border-300 dark:border-border-700 overflow-hidden">
                    <!-- Order Header -->
                    <div class="p-4 border-b border-border-300 dark:border-border-700 bg-surface-100 dark:bg-surface-900">
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                            <div class="flex items-center gap-3">
                                <div>
                                    <p class="text-sm text-text-600 dark:text-text-400">Order ID</p>
                                    <p class="font-semibold text-text-900 dark:text-text-100">{{ $order['order_number'] }}</p>
                                </div>
                                <div class="h-8 w-px bg-border-300 dark:bg-border-700"></div>
                                <div>
                                    <p class="text-sm text-text-600 dark:text-text-400">Tanggal</p>
                                    <p class="font-medium text-text-900 dark:text-text-100">{{ \Carbon\Carbon::parse($order['created_at'])->format('d M Y') }}</p>
                                </div>
                            </div>
                            <x-ui.badge :variant="$statusColors[$order['status']]" size="md">
                                {{ $statusLabels[$order['status']] }}
                            </x-ui.badge>
                        </div>
                    </div>

                    <!-- Order Items -->
                    <div class="p-4">
                        <!-- Store Name -->
                        <div class="flex items-center gap-2 mb-3">
                            <svg class="w-4 h-4 text-text-600 dark:text-text-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                            <a href="{{ route('stores.show', $order['store']['slug']) }}" class="font-medium text-text-900 dark:text-text-100 hover:text-primary">
                                {{ $order['store']['name'] }}
                            </a>
                        </div>

                        @foreach($order['items'] as $item)
                            <div class="flex gap-4 mb-3">
                                <img
                                    src="{{ $item['product']['image'] }}"
                                    alt="{{ $item['product']['name'] }}"
                                    class="w-16 h-16 md:w-20 md:h-20 rounded-lg object-cover"
                                >
                                <div class="flex-1">
                                    <h4 class="font-medium text-text-900 dark:text-text-100 mb-1">{{ $item['product']['name'] }}</h4>
                                    <p class="text-sm text-text-600 dark:text-text-400">{{ $item['quantity'] }}x @ Rp {{ number_format($item['price'], 0, ',', '.') }}</p>
                                </div>
                                <div class="text-right">
                                    <p class="font-semibold text-primary">Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</p>
                                </div>
                            </div>
                        @endforeach

                        <!-- Shipping Address -->
                        <div class="mt-3 pt-3 border-t border-border-300 dark:border-border-700">
                            <div class="flex items-start gap-2 text-sm">
                                <svg class="w-4 h-4 text-text-600 dark:text-text-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <div>
                                    <p class="text-text-600 dark:text-text-400">Alamat Pengiriman:</p>
                                    <p class="text-text-900 dark:text-text-100">{{ $order['shipping_address'] }}</p>
                                </div>
                            </div>

                            @if(isset($order['tracking_number']))
                                <div class="flex items-center gap-2 text-sm mt-2">
                                    <svg class="w-4 h-4 text-text-600 dark:text-text-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <p class="text-text-600 dark:text-text-400">Nomor Resi: <span class="font-medium text-text-900 dark:text-text-100">{{ $order['tracking_number'] }}</span></p>
                                </div>
                            @endif>
                        </div>
                    </div>

                    <!-- Order Footer -->
                    <div class="p-4 border-t border-border-300 dark:border-border-700 bg-surface-100 dark:bg-surface-900">
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                            <div class="text-sm space-y-1">
                                <p class="text-text-600 dark:text-text-400">
                                    Total Belanja: <span class="font-semibold text-text-900 dark:text-text-100 text-lg">Rp {{ number_format($order['total'], 0, ',', '.') }}</span>
                                </p>
                                @if($order['payment_status'] === 'unpaid')
                                    <p class="text-danger-600 dark:text-danger-400 text-xs">Belum dibayar</p>
                                @endif
                            </div>

                            <div class="flex flex-wrap gap-2">
                                @if($order['status'] === 'completed')
                                    <x-ui.button variant="outline" size="sm">
                                        Beli Lagi
                                    </x-ui.button>
                                    <x-ui.button variant="primary" size="sm">
                                        Beri Ulasan
                                    </x-ui.button>
                                @elseif($order['status'] === 'shipped')
                                    <x-ui.button variant="outline" size="sm">
                                        Lacak Paket
                                    </x-ui.button>
                                    <x-ui.button variant="success" size="sm">
                                        Terima Pesanan
                                    </x-ui.button>
                                @elseif($order['status'] === 'pending' && $order['payment_status'] === 'unpaid')
                                    <x-ui.button variant="outline" size="sm">
                                        Batalkan
                                    </x-ui.button>
                                    <x-ui.button variant="primary" size="sm">
                                        Bayar Sekarang
                                    </x-ui.button>
                                @else
                                    <x-ui.button variant="outline" size="sm">
                                        Hubungi Penjual
                                    </x-ui.button>
                                    <x-ui.button variant="primary" size="sm">
                                        Lihat Detail
                                    </x-ui.button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Empty State (if no orders) -->
        @if(count($orders) === 0)
            <div class="bg-surface2 dark:bg-surface-950 rounded-xl border border-border-300 dark:border-border-700 p-12 text-center">
                <svg class="w-24 h-24 mx-auto text-text-300 dark:text-text-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
                <h3 class="text-xl font-semibold text-text-900 dark:text-text-100 mb-2">Belum Ada Pesanan</h3>
                <p class="text-text-600 dark:text-text-400 mb-6">Ayo mulai belanja dan temukan produk favorit Anda!</p>
                <x-ui.button href="{{ route('stores.index') }}" variant="primary" size="lg">
                    Mulai Belanja
                </x-ui.button>
            </div>
        @endif
    </div>
</section>
@endsection
