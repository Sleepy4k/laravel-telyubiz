@extends('layouts.dashboard')

@section('page-title', 'Penarikan Dana')

@php
// Account balance
$balance = [
    'available' => 5250000,
    'pending' => 750000,
    'withdrawn' => 12500000,
];

// Withdrawal history
$withdrawals = [
    [
        'id' => '01JKHW01',
        'amount' => 2000000,
        'bank' => ['name' => 'BCA', 'account_number' => '1234567890', 'account_name' => 'Budi Santoso'],
        'status' => 'completed',
        'requested_at' => '2024-02-10 09:00:00',
        'processed_at' => '2024-02-11 14:30:00',
        'reference_number' => 'WD-2024-001',
    ],
    [
        'id' => '01JKHW02',
        'amount' => 1500000,
        'bank' => ['name' => 'BCA', 'account_number' => '1234567890', 'account_name' => 'Budi Santoso'],
        'status' => 'processing',
        'requested_at' => '2024-02-13 10:15:00',
        'processed_at' => null,
        'reference_number' => 'WD-2024-002',
    ],
    [
        'id' => '01JKHW03',
        'amount' => 1000000,
        'bank' => ['name' => 'Mandiri', 'account_number' => '0987654321', 'account_name' => 'Budi Santoso'],
        'status' => 'rejected',
        'requested_at' => '2024-02-08 15:20:00',
        'processed_at' => '2024-02-09 10:00:00',
        'reference_number' => 'WD-2024-003',
        'rejection_reason' => 'Informasi rekening tidak valid',
    ],
];

$statusColors = [
    'pending' => 'warning',
    'processing' => 'secondary',
    'completed' => 'success',
    'rejected' => 'danger',
];

$statusLabels = [
    'pending' => 'Menunggu',
    'processing' => 'Diproses',
    'completed' => 'Selesai',
    'rejected' => 'Ditolak',
];
@endphp

@section('content')
<!-- Balance Cards -->
<div class="grid md:grid-cols-3 gap-6 mb-6">
    <div class="bg-gradient-to-br from-success-500 to-success-700 rounded-xl p-6 text-white">
        <p class="text-success-100 mb-2">Saldo Tersedia</p>
        <p class="text-3xl font-bold mb-1">Rp {{ number_format($balance['available'], 0, ',', '.') }}</p>
        <p class="text-sm text-success-100">Dapat ditarik</p>
    </div>

    <div class="bg-gradient-to-br from-warning-500 to-warning-700 rounded-xl p-6 text-white">
        <p class="text-warning-100 mb-2">Saldo Tertunda</p>
        <p class="text-3xl font-bold mb-1">Rp {{ number_format($balance['pending'], 0, ',', '.') }}</p>
        <p class="text-sm text-warning-100">Menunggu verifikasi</p>
    </div>

    <div class="bg-gradient-to-br from-primary-500 to-primary-700 rounded-xl p-6 text-white">
        <p class="text-primary-100 mb-2">Total Penarikan</p>
        <p class="text-3xl font-bold mb-1">Rp {{ number_format($balance['withdrawn'], 0, ',', '.') }}</p>
        <p class="text-sm text-primary-100">Berhasil ditarik</p>
    </div>
</div>

<!-- Withdrawal Request Form -->
<div class="bg-surface2 dark:bg-surface-950 border border-border-300 dark:border-border-700 rounded-xl p-6 mb-6">
    <h3 class="text-lg font-semibold text-text-900 dark:text-text-100 mb-4">Ajukan Penarikan Dana</h3>

    <form class="space-y-4">
        <div class="grid md:grid-cols-2 gap-4">
            <x-forms.input
                label="Jumlah Penarikan"
                name="amount"
                type="number"
                placeholder="Minimal Rp 100.000"
                required
            >
                <x-slot name="prefix">Rp</x-slot>
            </x-forms.input>

            <x-forms.select label="Rekening Tujuan" name="bank_account_id" required>
                <option value="">Pilih Rekening</option>
                <option value="1">BCA - 1234567890 (Budi Santoso)</option>
                <option value="2">Mandiri - 0987654321 (Budi Santoso)</option>
            </x-forms.select>
        </div>

        <x-forms.textarea
            label="Catatan (Opsional)"
            name="notes"
            placeholder="Tambahkan catatan jika diperlukan"
            rows="2"
        />

        <div class="bg-primary-50 dark:bg-primary-950 border border-primary-200 dark:border-primary-800 rounded-lg p-4">
            <h4 class="font-medium text-primary-900 dark:text-primary-100 mb-2">Informasi Penting:</h4>
            <ul class="text-sm text-primary-800 dark:text-primary-200 space-y-1">
                <li>• Minimal penarikan: Rp 100.000</li>
                <li>• Biaya admin: Rp 5.000 per transaksi</li>
                <li>• Proses penarikan: 1-3 hari kerja</li>
                <li>• Pastikan data rekening sudah benar dan terverifikasi</li>
            </ul>
        </div>

        <div class="flex justify-between items-center pt-4">
            <div class="text-sm text-text-600 dark:text-text-400">
                Anda akan menerima: <span class="font-semibold text-text-900 dark:text-text-100">Rp 0</span>
            </div>
            <x-ui.button type="submit" variant="primary" size="md">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Ajukan Penarikan
            </x-ui.button>
        </div>
    </form>
</div>

<!-- Withdrawal History -->
<div class="bg-surface2 dark:bg-surface-950 border border-border-300 dark:border-border-700 rounded-xl overflow-hidden">
    <div class="px-6 py-4 border-b border-border-300 dark:border-border-700">
        <h3 class="text-lg font-semibold text-text-900 dark:text-text-100">Riwayat Penarikan</h3>
    </div>

    <div class="divide-y divide-border-300 dark:divide-border-700">
        @foreach($withdrawals as $withdrawal)
            <div class="p-6 hover:bg-surface-100 dark:hover:bg-surface-900 transition-colors">
                <div class="flex items-start justify-between gap-4 mb-3">
                    <div class="flex-1">
                        <div class="flex items-center gap-2 mb-2">
                            <p class="font-semibold text-text-900 dark:text-text-100">{{ $withdrawal['reference_number'] }}</p>
                            <x-ui.badge :variant="$statusColors[$withdrawal['status']]" size="sm">
                                {{ $statusLabels[$withdrawal['status']] }}
                            </x-ui.badge>
                        </div>
                        <p class="text-2xl font-bold text-primary mb-2">Rp {{ number_format($withdrawal['amount'], 0, ',', '.') }}</p>
                        <div class="flex items-center gap-4 text-sm text-text-600 dark:text-text-400">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                </svg>
                                <span>{{ $withdrawal['bank']['name'] }} - {{ substr($withdrawal['bank']['account_number'], -4) }}</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <span>{{ \Carbon\Carbon::parse($withdrawal['requested_at'])->format('d M Y H:i') }}</span>
                            </div>
                        </div>

                        @if($withdrawal['status'] === 'rejected' && isset($withdrawal['rejection_reason']))
                            <div class="mt-3 p-3 bg-danger-50 dark:bg-danger-950 border border-danger-200 dark:border-danger-800 rounded-lg">
                                <p class="text-sm text-danger-800 dark:text-danger-200">
                                    <strong>Alasan Penolakan:</strong> {{ $withdrawal['rejection_reason'] }}
                                </p>
                            </div>
                        @endif

                        @if($withdrawal['status'] === 'completed' && $withdrawal['processed_at'])
                            <div class="mt-2 text-sm text-success-600 dark:text-success-400">
                                Berhasil diproses pada {{ \Carbon\Carbon::parse($withdrawal['processed_at'])->format('d M Y H:i') }}
                            </div>
                        @endif
                    </div>

                    @if($withdrawal['status'] === 'processing')
                        <x-ui.button variant="outline" size="sm">
                            Batalkan
                        </x-ui.button>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Bank Accounts Management -->
<div class="mt-6 bg-surface2 dark:bg-surface-950 border border-border-300 dark:border-border-700 rounded-xl p-6">
    <div class="flex items-center justify-between mb-4">
        <h3 class="text-lg font-semibold text-text-900 dark:text-text-100">Rekening Bank</h3>
        <x-ui.button variant="outline" size="sm">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
            Tambah Rekening
        </x-ui.button>
    </div>

    <div class="space-y-3">
        <div class="flex items-center justify-between p-4 bg-surface-100 dark:bg-surface-900 rounded-lg">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 bg-primary rounded-lg flex items-center justify-center text-white font-bold">
                    BCA
                </div>
                <div>
                    <p class="font-medium text-text-900 dark:text-text-100">1234567890</p>
                    <p class="text-sm text-text-600 dark:text-text-400">Budi Santoso</p>
                </div>
            </div>
            <div class="flex items-center gap-2">
                <x-ui.badge variant="success" size="sm">Terverifikasi</x-ui.badge>
                <button class="p-2 text-text-600 dark:text-text-400 hover:text-danger-600 rounded-lg hover:bg-surface-100 dark:hover:bg-surface-900">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
