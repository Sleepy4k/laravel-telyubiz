@extends('layouts.app')

@section('title', 'Detail Event')

@php
// Dummy event data
$event = [
    'id' => '01JKHR01',
    'title' => 'Bazaar UMKM Purwokerto 2024',
    'slug' => 'bazaar-umkm-purwokerto-2024',
    'description' => 'Event tahunan untuk mempertemukan UMKM mahasiswa dengan konsumen. Kesempatan emas untuk networking dan promosi produk!',
    'full_description' => 'Bazaar UMKM Purwokerto 2024 adalah event tahunan yang diselenggarakan oleh Telkom University Purwokerto untuk memfasilitasi UMKM mahasiswa dalam mempromosikan produk dan jasa mereka kepada masyarakat luas. Event ini juga menjadi ajang networking antar pelaku UMKM dan kesempatan untuk belajar dari pengusaha sukses yang akan hadir sebagai pembicara.',
    'image' => 'https://picsum.photos/seed/event1/1200/600',
    'start_date' => '2024-03-15 08:00:00',
    'end_date' => '2024-03-17 18:00:00',
    'location' => 'GOR Satria Purwokerto',
    'full_address' => 'Jl. Jenderal Soedirman No. 123, Purwokerto Timur, Banyumas, Jawa Tengah',
    'max_participants' => 50,
    'registered_participants' => 34,
    'registration_fee' => 100000,
    'organizer' => [
        'name' => 'Telkom University Purwokerto',
        'contact' => 'event@telkompurwokerto.ac.id',
        'phone' => '+62 281 1234567',
        'logo' => 'https://ui-avatars.com/api/?name=Telkom+University&background=D61F2C&color=fff&size=200',
    ],
    'is_open' => true,
    'categories' => ['Bazaar', 'Networking', 'Workshop'],
    'facilities' => [
        'Booth ukuran 3x3 meter',
        'Meja dan kursi',
        'Backdrop branding',
        'Listrik',
        'Konsumsi 2x sehari',
        'Sertifikat partisipasi',
    ],
    'requirements' => [
        'Mahasiswa aktif Telkom Purwokerto',
        'Memiliki usaha UMKM aktif minimal 3 bulan',
        'Melampirkan foto produk (min. 3 foto)',
        'Mengisi formulir pendaftaran',
        'Membayar biaya pendaftaran',
    ],
    'schedule' => [
        [
            'date' => '2024-03-15',
            'time' => '08:00 - 10:00',
            'activity' => 'Registrasi & Setup Booth',
        ],
        [
            'date' => '2024-03-15',
            'time' => '10:00 - 18:00',
            'activity' => 'Bazaar Day 1',
        ],
        [
            'date' => '2024-03-16',
            'time' => '09:00 - 18:00',
            'activity' => 'Bazaar Day 2 + Workshop Digital Marketing',
        ],
        [
            'date' => '2024-03-17',
            'time' => '09:00 - 16:00',
            'activity' => 'Bazaar Day 3',
        ],
        [
            'date' => '2024-03-17',
            'time' => '16:00 - 18:00',
            'activity' => 'Closing & Awarding',
        ],
    ],
];

// Registered participants (dummy)
$participants = [
    ['name' => 'Warung Makan Bu Siti', 'category' => 'Kuliner', 'logo' => 'https://ui-avatars.com/api/?name=Warung+Makan&background=D61F2C&color=fff'],
    ['name' => 'Craft Corner', 'category' => 'Kerajinan', 'logo' => 'https://ui-avatars.com/api/?name=Craft+Corner&background=64748B&color=fff'],
    ['name' => 'FreshBox Catering', 'category' => 'Catering', 'logo' => 'https://ui-avatars.com/api/?name=FreshBox&background=22C55E&color=fff'],
    ['name' => 'Tech Accessories Shop', 'category' => 'Teknologi', 'logo' => 'https://ui-avatars.com/api/?name=Tech+Shop&background=F59E0B&color=fff'],
];
@endphp

@section('content')
<!-- Event Header -->
<section class="relative">
    <!-- Banner Image -->
    <div class="h-64 md:h-96 overflow-hidden bg-surface-200 dark:bg-surface-800">
        <img
            src="{{ $event['image'] }}"
            alt="{{ $event['title'] }}"
            class="w-full h-full object-cover"
        >
    </div>

    <!-- Event Info Overlay -->
    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-6">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
            <div class="flex flex-wrap gap-2 mb-3">
                @foreach($event['categories'] as $category)
                    <x-ui.badge variant="secondary" size="sm" class="bg-white/20 text-white border-white/30">
                        {{ $category }}
                    </x-ui.badge>
                @endforeach
            </div>
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-2">{{ $event['title'] }}</h1>
            <p class="text-white/90 text-lg max-w-3xl">{{ $event['description'] }}</p>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="py-8">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
        <div class="grid lg:grid-cols-3 gap-8">
            <!-- Left Content -->
            <div class="lg:col-span-2 space-y-8">
                <!-- About Event -->
                <div class="bg-surface2 dark:bg-surface-950 rounded-xl border border-border-300 dark:border-border-700 p-6">
                    <h2 class="text-2xl font-bold text-text-900 dark:text-text-100 mb-4">Tentang Event</h2>
                    <p class="text-text-700 dark:text-text-300 leading-relaxed">{{ $event['full_description'] }}</p>
                </div>

                <!-- Facilities -->
                <div class="bg-surface2 dark:bg-surface-950 rounded-xl border border-border-300 dark:border-border-700 p-6">
                    <h2 class="text-2xl font-bold text-text-900 dark:text-text-100 mb-4">Fasilitas</h2>
                    <ul class="space-y-3">
                        @foreach($event['facilities'] as $facility)
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-success-600 dark:text-success-400 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                <span class="text-text-700 dark:text-text-300">{{ $facility }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Requirements -->
                <div class="bg-surface2 dark:bg-surface-950 rounded-xl border border-border-300 dark:border-border-700 p-6">
                    <h2 class="text-2xl font-bold text-text-900 dark:text-text-100 mb-4">Syarat & Ketentuan</h2>
                    <ul class="space-y-3">
                        @foreach($event['requirements'] as $requirement)
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-primary flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                                <span class="text-text-700 dark:text-text-300">{{ $requirement }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Schedule -->
                <div class="bg-surface2 dark:bg-surface-950 rounded-xl border border-border-300 dark:border-border-700 p-6">
                    <h2 class="text-2xl font-bold text-text-900 dark:text-text-100 mb-4">Jadwal Acara</h2>
                    <div class="space-y-4">
                        @foreach($event['schedule'] as $schedule)
                            <div class="flex gap-4 pb-4 border-b border-border-300 dark:border-border-700 last:border-0 last:pb-0">
                                <div class="flex-shrink-0 w-24">
                                    <div class="bg-primary-100 dark:bg-primary-900 rounded-lg p-3 text-center">
                                        <p class="text-xs font-medium text-primary-700 dark:text-primary-300">{{ \Carbon\Carbon::parse($schedule['date'])->format('d M') }}</p>
                                        <p class="text-xs text-primary-600 dark:text-primary-400 mt-1">{{ $schedule['time'] }}</p>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-semibold text-text-900 dark:text-text-100 mb-1">{{ $schedule['activity'] }}</h4>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Participants -->
                <div class="bg-surface2 dark:bg-surface-950 rounded-xl border border-border-300 dark:border-border-700 p-6">
                    <h2 class="text-2xl font-bold text-text-900 dark:text-text-100 mb-4">Tenant Terdaftar</h2>
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                        @foreach($participants as $participant)
                            <div class="text-center">
                                <img
                                    src="{{ $participant['logo'] }}"
                                    alt="{{ $participant['name'] }}"
                                    class="w-16 h-16 rounded-full mx-auto mb-2 border-2 border-border-300 dark:border-border-700"
                                >
                                <p class="text-sm font-medium text-text-900 dark:text-text-100">{{ $participant['name'] }}</p>
                                <p class="text-xs text-text-600 dark:text-text-400">{{ $participant['category'] }}</p>
                            </div>
                        @endforeach
                    </div>
                    <p class="text-center text-sm text-text-600 dark:text-text-400 mt-4">
                        Dan {{ $event['registered_participants'] - count($participants) }} tenant lainnya...
                    </p>
                </div>
            </div>

            <!-- Right Sidebar - Registration Card -->
            <div class="lg:col-span-1">
                <div class="sticky top-20 space-y-6">
                    <!-- Registration Card -->
                    <div class="bg-surface2 dark:bg-surface-950 rounded-xl border border-border-300 dark:border-border-700 p-6">
                        <!-- Price -->
                        <div class="mb-6">
                            <p class="text-sm text-text-600 dark:text-text-400 mb-1">Biaya Pendaftaran</p>
                            <p class="text-3xl font-bold text-primary">Rp {{ number_format($event['registration_fee'], 0, ',', '.') }}</p>
                        </div>

                        <!-- Availability -->
                        <div class="mb-6">
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-sm text-text-600 dark:text-text-400">Kuota Tersedia</span>
                                <span class="text-sm font-semibold text-text-900 dark:text-text-100">
                                    {{ $event['max_participants'] - $event['registered_participants'] }} / {{ $event['max_participants'] }}
                                </span>
                            </div>
                            <div class="w-full bg-surface-100 dark:bg-surface-900 rounded-full h-2">
                                <div class="bg-primary h-2 rounded-full" style="width: {{ ($event['registered_participants'] / $event['max_participants']) * 100 }}%"></div>
                            </div>
                        </div>

                        <!-- Date & Location -->
                        <div class="space-y-3 mb-6">
                            <div class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-text-600 dark:text-text-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <div>
                                    <p class="text-sm font-medium text-text-900 dark:text-text-100">Tanggal</p>
                                    <p class="text-sm text-text-600 dark:text-text-400">
                                        {{ \Carbon\Carbon::parse($event['start_date'])->format('d M Y') }} -
                                        {{ \Carbon\Carbon::parse($event['end_date'])->format('d M Y') }}
                                    </p>
                                </div>
                            </div>

                            <div class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-text-600 dark:text-text-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <div>
                                    <p class="text-sm font-medium text-text-900 dark:text-text-100">Lokasi</p>
                                    <p class="text-sm text-text-600 dark:text-text-400">{{ $event['location'] }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Registration Button -->
                        @if($event['is_open'] && $event['registered_participants'] < $event['max_participants'])
                            <x-ui.button variant="primary" size="lg" class="w-full mb-3">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                                Daftar Sekarang
                            </x-ui.button>
                        @else
                            <x-ui.button variant="secondary" size="lg" class="w-full mb-3" disabled>
                                {{ $event['registered_participants'] >= $event['max_participants'] ? 'Kuota Penuh' : 'Pendaftaran Ditutup' }}
                            </x-ui.button>
                        @endif

                        <x-ui.button variant="outline" size="md" class="w-full">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                            </svg>
                            Bagikan Event
                        </x-ui.button>
                    </div>

                    <!-- Organizer Info -->
                    <div class="bg-surface2 dark:bg-surface-950 rounded-xl border border-border-300 dark:border-border-700 p-6">
                        <h3 class="font-semibold text-text-900 dark:text-text-100 mb-4">Penyelenggara</h3>
                        <div class="flex items-center gap-3 mb-4">
                            <img
                                src="{{ $event['organizer']['logo'] }}"
                                alt="{{ $event['organizer']['name'] }}"
                                class="w-16 h-16 rounded-lg"
                            >
                            <div>
                                <p class="font-semibold text-text-900 dark:text-text-100">{{ $event['organizer']['name'] }}</p>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <div class="flex items-center gap-2 text-sm">
                                <svg class="w-4 h-4 text-text-600 dark:text-text-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <span class="text-text-600 dark:text-text-400">{{ $event['organizer']['contact'] }}</span>
                            </div>
                            <div class="flex items-center gap-2 text-sm">
                                <svg class="w-4 h-4 text-text-600 dark:text-text-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                <span class="text-text-600 dark:text-text-400">{{ $event['organizer']['phone'] }}</span>
                            </div>
                        </div>

                        <x-ui.button variant="outline" size="sm" class="w-full mt-4">
                            Hubungi Penyelenggara
                        </x-ui.button>
                    </div>

                    <!-- Map -->
                    <div class="bg-surface2 dark:bg-surface-950 rounded-xl border border-border-300 dark:border-border-700 overflow-hidden">
                        <div class="h-48 bg-surface-200 dark:bg-surface-800">
                            <img
                                src="https://picsum.photos/seed/map/600/300"
                                alt="Map"
                                class="w-full h-full object-cover"
                            >
                        </div>
                        <div class="p-4">
                            <p class="text-sm font-medium text-text-900 dark:text-text-100 mb-1">{{ $event['location'] }}</p>
                            <p class="text-xs text-text-600 dark:text-text-400">{{ $event['full_address'] }}</p>
                            <x-ui.button variant="outline" size="sm" class="w-full mt-3">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                                </svg>
                                Buka di Maps
                            </x-ui.button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
