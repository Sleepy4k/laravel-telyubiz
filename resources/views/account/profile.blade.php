@extends('layouts.app')

@section('title', 'Profil Saya')

@php
// Dummy user data
$user = [
    'name' => 'Budi Santoso',
    'email' => 'budi.santoso@example.com',
    'phone' => '+62 812 3456 7890',
    'avatar' => 'https://ui-avatars.com/api/?name=Budi+Santoso&background=D61F2C&color=fff&size=200',
    'joined_date' => '2023-08-15',
    'address' => 'Jl. DI Panjaitan No. 128, Purwokerto Barat',
    'city' => 'Purwokerto',
    'province' => 'Jawa Tengah',
    'postal_code' => '53100',
    'bio' => 'Mahasiswa Telkom Purwokerto yang aktif berwirausaha',
];
@endphp

@section('content')
<section class="py-8 min-h-screen bg-surface-100 dark:bg-surface-900">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-5xl">
        <h1 class="text-3xl font-bold text-text-900 dark:text-text-100 mb-8">Profil Saya</h1>

        <div class="grid lg:grid-cols-3 gap-6">
            <!-- Left Sidebar - Profile Card -->
            <div class="lg:col-span-1">
                <div class="bg-surface2 dark:bg-surface-950 rounded-xl border border-border-300 dark:border-border-700 p-6">
                    <!-- Avatar -->
                    <div class="text-center mb-6">
                        <div class="relative inline-block">
                            <img
                                src="{{ $user['avatar'] }}"
                                alt="{{ $user['name'] }}"
                                class="w-32 h-32 rounded-full mx-auto mb-4 border-4 border-surface-100 dark:border-surface-900"
                            >
                            <button class="absolute bottom-4 right-0 p-2 bg-primary rounded-full text-white hover:bg-primary-700 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </button>
                        </div>
                        <h2 class="text-xl font-bold text-text-900 dark:text-text-100 mb-1">{{ $user['name'] }}</h2>
                        <p class="text-sm text-text-600 dark:text-text-400">Member sejak {{ \Carbon\Carbon::parse($user['joined_date'])->format('F Y') }}</p>
                    </div>

                    <!-- Stats -->
                    <div class="grid grid-cols-3 gap-3 mb-6 pb-6 border-b border-border-300 dark:border-border-700">
                        <div class="text-center">
                            <p class="text-2xl font-bold text-primary">4</p>
                            <p class="text-xs text-text-600 dark:text-text-400">Pesanan</p>
                        </div>
                        <div class="text-center">
                            <p class="text-2xl font-bold text-primary">0</p>
                            <p class="text-xs text-text-600 dark:text-text-400">Toko</p>
                        </div>
                        <div class="text-center">
                            <p class="text-2xl font-bold text-primary">12</p>
                            <p class="text-xs text-text-600 dark:text-text-400">Ulasan</p>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="space-y-2">
                        <a href="{{ route('account.orders') }}" class="flex items-center gap-3 p-3 rounded-lg hover:bg-surface-100 dark:hover:bg-surface-900 transition-colors">
                            <svg class="w-5 h-5 text-text-600 dark:text-text-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                            <span class="text-sm font-medium text-text-900 dark:text-text-100">Pesanan Saya</span>
                        </a>
                        <a href="{{ route('dashboard.index') }}" class="flex items-center gap-3 p-3 rounded-lg hover:bg-surface-100 dark:hover:bg-surface-900 transition-colors">
                            <svg class="w-5 h-5 text-text-600 dark:text-text-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                            <span class="text-sm font-medium text-text-900 dark:text-text-100">Dashboard Toko</span>
                        </a>
                        <button class="w-full flex items-center gap-3 p-3 rounded-lg hover:bg-surface-100 dark:hover:bg-surface-900 transition-colors text-danger-600 dark:text-danger-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            <span class="text-sm font-medium">Keluar</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Right Content - Profile Settings -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Personal Information -->
                <div class="bg-surface2 dark:bg-surface-950 rounded-xl border border-border-300 dark:border-border-700 p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-xl font-semibold text-text-900 dark:text-text-100">Informasi Pribadi</h2>
                        <x-ui.button variant="outline" size="sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            Edit
                        </x-ui.button>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-text-700 dark:text-text-300 mb-2">Nama Lengkap</label>
                            <p class="text-text-900 dark:text-text-100">{{ $user['name'] }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-text-700 dark:text-text-300 mb-2">Email</label>
                            <p class="text-text-900 dark:text-text-100">{{ $user['email'] }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-text-700 dark:text-text-300 mb-2">Nomor Telepon</label>
                            <p class="text-text-900 dark:text-text-100">{{ $user['phone'] }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-text-700 dark:text-text-300 mb-2">Tanggal Bergabung</label>
                            <p class="text-text-900 dark:text-text-100">{{ \Carbon\Carbon::parse($user['joined_date'])->format('d F Y') }}</p>
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-text-700 dark:text-text-300 mb-2">Bio</label>
                            <p class="text-text-900 dark:text-text-100">{{ $user['bio'] }}</p>
                        </div>
                    </div>
                </div>

                <!-- Address Information -->
                <div class="bg-surface2 dark:bg-surface-950 rounded-xl border border-border-300 dark:border-border-700 p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-xl font-semibold text-text-900 dark:text-text-100">Alamat</h2>
                        <x-ui.button variant="outline" size="sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            Edit
                        </x-ui.button>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-text-700 dark:text-text-300 mb-2">Alamat Lengkap</label>
                            <p class="text-text-900 dark:text-text-100">{{ $user['address'] }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-text-700 dark:text-text-300 mb-2">Kota/Kabupaten</label>
                            <p class="text-text-900 dark:text-text-100">{{ $user['city'] }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-text-700 dark:text-text-300 mb-2">Provinsi</label>
                            <p class="text-text-900 dark:text-text-100">{{ $user['province'] }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-text-700 dark:text-text-300 mb-2">Kode Pos</label>
                            <p class="text-text-900 dark:text-text-100">{{ $user['postal_code'] }}</p>
                        </div>
                    </div>
                </div>

                <!-- Change Password -->
                <div class="bg-surface2 dark:bg-surface-950 rounded-xl border border-border-300 dark:border-border-700 p-6">
                    <h2 class="text-xl font-semibold text-text-900 dark:text-text-100 mb-6">Ubah Password</h2>

                    <form class="space-y-4">
                        <x-forms.input
                            label="Password Lama"
                            name="current_password"
                            type="password"
                            placeholder="Masukkan password lama"
                        />

                        <x-forms.input
                            label="Password Baru"
                            name="new_password"
                            type="password"
                            placeholder="Masukkan password baru"
                        />

                        <x-forms.input
                            label="Konfirmasi Password Baru"
                            name="password_confirmation"
                            type="password"
                            placeholder="Konfirmasi password baru"
                        />

                        <div class="flex justify-end">
                            <x-ui.button variant="primary" size="md">
                                Simpan Password
                            </x-ui.button>
                        </div>
                    </form>
                </div>

                <!-- Preferences -->
                <div class="bg-surface2 dark:bg-surface-950 rounded-xl border border-border-300 dark:border-border-700 p-6">
                    <h2 class="text-xl font-semibold text-text-900 dark:text-text-100 mb-6">Preferensi</h2>

                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-4 bg-surface-100 dark:bg-surface-900 rounded-lg">
                            <div>
                                <p class="font-medium text-text-900 dark:text-text-100">Notifikasi Email</p>
                                <p class="text-sm text-text-600 dark:text-text-400">Terima update pesanan via email</p>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" class="sr-only peer" checked>
                                <div class="w-11 h-6 bg-surface-300 dark:bg-surface-700 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-primary rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary"></div>
                            </label>
                        </div>

                        <div class="flex items-center justify-between p-4 bg-surface-100 dark:bg-surface-900 rounded-lg">
                            <div>
                                <p class="font-medium text-text-900 dark:text-text-100">Notifikasi Push</p>
                                <p class="text-sm text-text-600 dark:text-text-400">Terima notifikasi promo dan event</p>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" class="sr-only peer">
                                <div class="w-11 h-6 bg-surface-300 dark:bg-surface-700 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-primary rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary"></div>
                            </label>
                        </div>

                        <div class="flex items-center justify-between p-4 bg-surface-100 dark:bg-surface-900 rounded-lg">
                            <div>
                                <p class="font-medium text-text-900 dark:text-text-100">Newsletter</p>
                                <p class="text-sm text-text-600 dark:text-text-400">Terima tips dan artikel menarik</p>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" class="sr-only peer" checked>
                                <div class="w-11 h-6 bg-surface-300 dark:bg-surface-700 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-primary rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary"></div>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Danger Zone -->
                <div class="bg-surface2 dark:bg-surface-950 rounded-xl border border-danger-300 dark:border-danger-700 p-6">
                    <h2 class="text-xl font-semibold text-danger-600 dark:text-danger-400 mb-4">Zona Bahaya</h2>
                    <p class="text-sm text-text-600 dark:text-text-400 mb-4">
                        Aksi di bawah ini bersifat permanen dan tidak dapat dibatalkan. Pastikan Anda yakin sebelum melanjutkan.
                    </p>
                    <x-ui.button variant="danger" size="md">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                        Hapus Akun
                    </x-ui.button>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
