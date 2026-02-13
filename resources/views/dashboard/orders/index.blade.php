@extends('layouts.dashboard')

@section('page-title', 'Pesanan')

@php
$orders = [
    [
        'id' => '01JKHX01',
        'order_number' => 'ORD-2024-0001',
        'customer' => ['name' => 'John Doe', 'phone' => '081234567890'],
        'items' => [
            ['product' => ['name' => 'Nasi Goreng Special'], 'quantity' => 2, 'price' => 15000],
        ],
        'total' => 42000,
        'status' => 'completed',
        'payment_status' => 'paid',
        'created_at' => '2024-02-13 10:30:00',
        'shipping_address' => 'Jl. DI Panjaitan No. 128, Purwokerto',
    ],
    [
        'id' => '01JKHX02',
        'order_number' => 'ORD-2024-0002',
        'customer' => ['name' => 'Jane Smith', 'phone' => '081234567891'],
        'items' => [
            ['product' => ['name' => 'Ayam Goreng Kremes'], 'quantity' => 1, 'price' => 18000],
        ],
        'total' => 30000,
        'status' => 'processing',
        'payment_status' => 'paid',
        'created_at' => '2024-02-12 14:15:00',
        'shipping_address' => 'Jl. HR Bunyamin No. 45, Purwokerto',
    ],
    [
        'id' => '01JKHX03',
        'order_number' => 'ORD-2024-0003',
        'customer' => ['name' => 'Ahmad', 'phone' => '081234567892'],
        'items' => [
            ['product' => ['name' => 'Soto Ayam'], 'quantity' => 3, 'price' => 12000],
        ],
        'total' => 48000,
        'status' => 'pending',
        'payment_status' => 'unpaid',
        'created_at' => '2024-02-10 09:20:00',
        'shipping_address' => 'Kampus Telkom Purwokerto',
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
    'pending' => 'Menunggu',
    'processing' => 'Diproses',
    'shipped' => 'Dikirim',
    'completed' => 'Selesai',
    'cancelled' => 'Dibatalkan',
];
@endphp

@section('content')
<!-- Filters -->
<div class="bg-surface2 dark:bg-surface-950 border border-border-300 dark:border-border-700 rounded-xl p-4 mb-6">
    <div class="flex flex-col md:flex-row gap-4">
        <div class="flex-1">
            <input
                type="search"
                placeholder="Cari pesanan..."
                class="w-full px-4 py-2 bg-surface-100 dark:bg-surface-900 border border-border-300 dark:border-border-700 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent"
            >
        </div>
        <select class="px-4 py-2 bg-surface-100 dark:bg-surface-900 border border-border-300 dark:border-border-700 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
            <option value="">Semua Status</option>
            <option value="pending">Menunggu</option>
            <option value="processing">Diproses</option>
            <option value="shipped">Dikirim</option>
            <option value="completed">Selesai</option>
            <option value="cancelled">Dibatalkan</option>
        </select>
        <select class="px-4 py-2 bg-surface-100 dark:bg-surface-900 border border-border-300 dark:border-border-700 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
            <option value="">Semua Pembayaran</option>
            <option value="paid">Sudah Dibayar</option>
            <option value="unpaid">Belum Dibayar</option>
        </select>
    </div>
</div>

<!-- Orders Table -->
<div class="bg-surface2 dark:bg-surface-950 border border-border-300 dark:border-border-700 rounded-xl overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-surface-100 dark:bg-surface-900 border-b border-border-300 dark:border-border-700">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-text-600 dark:text-text-400 uppercase">Order ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-text-600 dark:text-text-400 uppercase">Pelanggan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-text-600 dark:text-text-400 uppercase">Produk</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-text-600 dark:text-text-400 uppercase">Total</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-text-600 dark:text-text-400 uppercase">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-text-600 dark:text-text-400 uppercase">Tanggal</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-text-600 dark:text-text-400 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-border-300 dark:divide-border-700">
                @foreach($orders as $order)
                    <tr class="hover:bg-surface-100 dark:hover:bg-surface-900">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <p class="font-medium text-text-900 dark:text-text-100">{{ $order['order_number'] }}</p>
                        </td>
                        <td class="px-6 py-4">
                            <p class="font-medium text-text-900 dark:text-text-100">{{ $order['customer']['name'] }}</p>
                            <p class="text-sm text-text-600 dark:text-text-400">{{ $order['customer']['phone'] }}</p>
                        </td>
                        <td class="px-6 py-4">
                            @foreach($order['items'] as $item)
                                <p class="text-sm text-text-900 dark:text-text-100">{{ $item['product']['name'] }} ({{ $item['quantity'] }}x)</p>
                            @endforeach
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <p class="font-semibold text-text-900 dark:text-text-100">Rp {{ number_format($order['total'], 0, ',', '.') }}</p>
                            <p class="text-xs {{ $order['payment_status'] === 'paid' ? 'text-success-600' : 'text-danger-600' }}">
                                {{ $order['payment_status'] === 'paid' ? 'Dibayar' : 'Belum Dibayar' }}
                            </p>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <x-ui.badge :variant="$statusColors[$order['status']]" size="sm">
                                {{ $statusLabels[$order['status']] }}
                            </x-ui.badge>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <p class="text-sm text-text-900 dark:text-text-100">{{ \Carbon\Carbon::parse($order['created_at'])->format('d M Y') }}</p>
                            <p class="text-xs text-text-600 dark:text-text-400">{{ \Carbon\Carbon::parse($order['created_at'])->format('H:i') }}</p>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right">
                            <div class="flex items-center justify-end gap-2">
                                <x-ui.button variant="outline" size="sm">
                                    Detail
                                </x-ui.button>
                                @if($order['status'] === 'pending')
                                    <x-ui.button variant="primary" size="sm">
                                        Proses
                                    </x-ui.button>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Stats -->
<div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-6">
    <div class="bg-surface2 dark:bg-surface-950 border border-border-300 dark:border-border-700 rounded-xl p-4">
        <p class="text-sm text-text-600 dark:text-text-400 mb-1">Total Pesanan</p>
        <p class="text-2xl font-bold text-text-900 dark:text-text-100">{{ count($orders) }}</p>
    </div>
    <div class="bg-surface2 dark:bg-surface-950 border border-border-300 dark:border-border-700 rounded-xl p-4">
        <p class="text-sm text-text-600 dark:text-text-400 mb-1">Menunggu</p>
        <p class="text-2xl font-bold text-warning-600 dark:text-warning-400">{{ collect($orders)->where('status', 'pending')->count() }}</p>
    </div>
    <div class="bg-surface2 dark:bg-surface-950 border border-border-300 dark:border-border-700 rounded-xl p-4">
        <p class="text-sm text-text-600 dark:text-text-400 mb-1">Selesai</p>
        <p class="text-2xl font-bold text-success-600 dark:text-success-400">{{ collect($orders)->where('status', 'completed')->count() }}</p>
    </div>
    <div class="bg-surface2 dark:bg-surface-950 border border-border-300 dark:border-border-700 rounded-xl p-4">
        <p class="text-sm text-text-600 dark:text-text-400 mb-1">Total Pendapatan</p>
        <p class="text-2xl font-bold text-primary">Rp {{ number_format(collect($orders)->sum('total'), 0, ',', '.') }}</p>
    </div>
</div>
@endsection
