@extends('layouts.app')

@section('title', 'Event UMKM')

@php
$events = [
    ['id' => '01JKHR01', 'title' => 'Bazaar UMKM Purwokerto 2024', 'slug' => 'bazaar-umkm-purwokerto-2024', 'description' => 'Event tahunan untuk mempertemukan UMKM mahasiswa dengan konsumen', 'image' => 'https://picsum.photos/seed/event1/800/500', 'start_date' => '2024-03-15 08:00:00', 'end_date' => '2024-03-17 18:00:00', 'location' => 'GOR Satria Purwokerto', 'max_participants' => 50, 'registered_participants' => 34, 'registration_fee' => 100000, 'organizer' => ['name' => 'Telkom University', 'contact' => 'event@telkompurwokerto.ac.id'], 'is_open' => true, 'categories' => ['Bazaar', 'Networking']],
    ['id' => '01JKHR02', 'title' => 'Workshop Digital Marketing untuk UMKM', 'slug' => 'workshop-digital-marketing', 'description' => 'Belajar strategi digital marketing untuk meningkatkan penjualan', 'image' => 'https://picsum.photos/seed/event2/800/500', 'start_date' => '2024-03-20 13:00:00', 'end_date' => '2024-03-20 17:00:00', 'location' => 'Ruang Seminar Telkom', 'max_participants' => 30, 'registered_participants' => 28, 'registration_fee' => 0, 'organizer' => ['name' => 'Himpunan Mahasiswa', 'contact' => 'hm@telkompurwokerto.ac.id'], 'is_open' => true, 'categories' => ['Workshop', 'Edukasi']],
    ['id' => '01JKHR03', 'title' => 'Pelatihan Fotografi Produk', 'slug' => 'pelatihan-fotografi-produk', 'description' => 'Teknik fotografi produk untuk meningkatkan visual toko online', 'image' => 'https://picsum.photos/seed/event3/800/500', 'start_date' => '2024-03-25 09:00:00', 'end_date' => '2024-03-25 16:00:00', 'location' => 'Studio Foto Telkom', 'max_participants' => 20, 'registered_participants' => 15, 'registration_fee' => 50000, 'organizer' => ['name' => 'Komunitas Fotografi', 'contact' => 'foto@telkompurwokerto.ac.id'], 'is_open' => true, 'categories' => ['Workshop', 'Fotografi']],
    ['id' => '01JKHR04', 'title' => 'Pameran Produk UMKM Unggulan', 'slug' => 'pameran-produk-umkm', 'description' => 'Showcase produk-produk terbaik dari UMKM mahasiswa', 'image' => 'https://picsum.photos/seed/event4/800/500', 'start_date' => '2024-04-01 10:00:00', 'end_date' => '2024-04-03 20:00:00', 'location' => 'Aula Utama Telkom Purwokerto', 'max_participants' => 40, 'registered_participants' => 40, 'registration_fee' => 150000, 'organizer' => ['name' => 'BEM Telkom', 'contact' => 'bem@telkompurwokerto.ac.id'], 'is_open' => false, 'categories' => ['Pameran', 'Bazaar']],
];
@endphp

@section('content')
<!-- Header -->
<section class="bg-gradient-to-r from-primary-50 to-warning-50 dark:from-surface-950 dark:to-surface-900 py-12">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
        <h1 class="text-4xl font-bold text-text-900 dark:text-text-100 mb-2">Event UMKM</h1>
        <p class="text-lg text-text-600 dark:text-text-400">Ikuti berbagai event untuk mengembangkan bisnis Anda</p>
    </div>
</section>

<!-- Content -->
<section class="py-8">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
        <!-- Filters -->
        <div class="mb-8 flex flex-wrap gap-4">
            <button class="px-4 py-2 rounded-lg bg-primary text-white">Semua Event</button>
            <button class="px-4 py-2 rounded-lg border border-border-300 dark:border-border-700 text-text-700 dark:text-text-300 hover:border-primary hover:text-primary">Pendaftaran Dibuka</button>
            <button class="px-4 py-2 rounded-lg border border-border-300 dark:border-border-700 text-text-700 dark:text-text-300 hover:border-primary hover:text-primary">Gratis</button>
            <button class="px-4 py-2 rounded-lg border border-border-300 dark:border-border-700 text-text-700 dark:text-text-300 hover:border-primary hover:text-primary">Workshop</button>
            <button class="px-4 py-2 rounded-lg border border-border-300 dark:border-border-700 text-text-700 dark:text-text-300 hover:border-primary hover:text-primary">Bazaar</button>
        </div>

        <!-- Events Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($events as $event)
                <x-cards.event :event="$event" />
            @endforeach
        </div>
    </div>
</section>
@endsection
