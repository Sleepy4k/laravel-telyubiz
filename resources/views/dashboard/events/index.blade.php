@extends('layouts.dashboard')

@section('page-title', 'Event Saya')

@php
$events = [
    [
        'id' => '01JKHR01',
        'title' => 'Bazaar UMKM Purwokerto 2024',
        'slug' => 'bazaar-umkm-purwokerto-2024',
        'image' => 'https://picsum.photos/seed/event1/400/200',
        'start_date' => '2024-03-15 08:00:00',
        'end_date' => '2024-03-17 18:00:00',
        'location' => 'GOR Satria Purwokerto',
        'max_participants' => 50,
        'registered_participants' => 34,
        'registration_fee' => 100000,
        'status' => 'open',
        'my_participation_status' => 'registered',
    ],
    [
        'id' => '01JKHR02',
        'title' => 'Workshop Digital Marketing',
        'slug' => 'workshop-digital-marketing',
        'image' => 'https://picsum.photos/seed/event2/400/200',
        'start_date' => '2024-03-20 13:00:00',
        'end_date' => '2024-03-20 17:00:00',
        'location' => 'Ruang Seminar Telkom',
        'max_participants' => 30,
        'registered_participants' => 15,
        'registration_fee' => 0,
        'status' => 'open',
        'my_participation_status' => null,
    ],
];

$statusColors = [
    'open' => 'success',
    'closed' => 'secondary',
    'cancelled' => 'danger',
];

$statusLabels = [
    'open' => 'Pendaftaran Dibuka',
    'closed' => 'Pendaftaran Ditutup',
    'cancelled' => 'Dibatalkan',
];
@endphp

@section('content')
<!-- Header -->
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
    <div>
        <p class="text-text-600 dark:text-text-400">Ikuti event untuk promosi dan networking</p>
    </div>
    <x-ui.button href="{{ route('events.index') }}" variant="outline" size="md">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>
        Cari Event Lainnya
    </x-ui.button>
</div>

<!-- Events Grid -->
<div class="grid md:grid-cols-2 gap-6">
    @foreach($events as $event)
        <div class="bg-surface2 dark:bg-surface-950 border border-border-300 dark:border-border-700 rounded-xl overflow-hidden hover:shadow-lg transition-shadow">
            <!-- Event Image -->
            <div class="relative h-48 overflow-hidden">
                <img src="{{ $event['image'] }}" alt="{{ $event['title'] }}" class="w-full h-full object-cover">
                <div class="absolute top-4 right-4">
                    <x-ui.badge :variant="$statusColors[$event['status']]" size="md">
                        {{ $statusLabels[$event['status']] }}
                    </x-ui.badge>
                </div>
            </div>

            <!-- Event Info -->
            <div class="p-6">
                <h3 class="text-lg font-semibold text-text-900 dark:text-text-100 mb-3">{{ $event['title'] }}</h3>

                <div class="space-y-2 mb-4">
                    <div class="flex items-center gap-2 text-sm text-text-600 dark:text-text-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <span>{{ \Carbon\Carbon::parse($event['start_date'])->format('d M Y') }} - {{ \Carbon\Carbon::parse($event['end_date'])->format('d M Y') }}</span>
                    </div>

                    <div class="flex items-center gap-2 text-sm text-text-600 dark:text-text-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span>{{ $event['location'] }}</span>
                    </div>

                    <div class="flex items-center gap-2 text-sm text-text-600 dark:text-text-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        <span>{{ $event['registered_participants'] }} / {{ $event['max_participants'] }} Peserta</span>
                    </div>

                    <div class="flex items-center gap-2 text-sm font-semibold text-primary">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>{{ $event['registration_fee'] > 0 ? 'Rp ' . number_format($event['registration_fee'], 0, ',', '.') : 'Gratis' }}</span>
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex gap-2">
                    <x-ui.button href="{{ route('events.show', $event['slug']) }}" variant="outline" size="sm" class="flex-1">
                        Lihat Detail
                    </x-ui.button>

                    @if($event['my_participation_status'] === 'registered')
                        <x-ui.button variant="success" size="sm" class="flex-1" disabled>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Sudah Terdaftar
                        </x-ui.button>
                    @elseif($event['status'] === 'open' && $event['registered_participants'] < $event['max_participants'])
                        <x-ui.button variant="primary" size="sm" class="flex-1">
                            Daftar Sekarang
                        </x-ui.button>
                    @else
                        <x-ui.button variant="secondary" size="sm" class="flex-1" disabled>
                            Tidak Tersedia
                        </x-ui.button>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
</div>

<!-- Empty State -->
@if(count($events) === 0)
    <div class="bg-surface2 dark:bg-surface-950 border border-border-300 dark:border-border-700 rounded-xl p-12 text-center">
        <svg class="w-24 h-24 mx-auto text-text-300 dark:text-text-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
        </svg>
        <h3 class="text-xl font-semibold text-text-900 dark:text-text-100 mb-2">Belum Ada Event</h3>
        <p class="text-text-600 dark:text-text-400 mb-6">Cari dan daftar event untuk promosi bisnis Anda!</p>
        <x-ui.button href="{{ route('events.index') }}" variant="primary" size="lg">
            Jelajahi Event
        </x-ui.button>
    </div>
@endif
@endsection
