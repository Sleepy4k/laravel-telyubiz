@extends('layouts.dashboard')

@section('page-title', 'Pengaturan')

@section('content')
<div class="max-w-4xl">
    <!-- Account Settings -->
    <div class="bg-surface2 dark:bg-surface-950 border border-border-300 dark:border-border-700 rounded-xl p-6 mb-6">
        <h3 class="text-lg font-semibold text-text-900 dark:text-text-100 mb-4">Pengaturan Akun</h3>

        <div class="space-y-4">
            <div class="flex items-center justify-between p-4 bg-surface-100 dark:bg-surface-900 rounded-lg">
                <div>
                    <p class="font-medium text-text-900 dark:text-text-100">Notifikasi Email</p>
                    <p class="text-sm text-text-600 dark:text-text-400">Terima notifikasi pesanan via email</p>
                </div>
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" class="sr-only peer" checked>
                    <div class="w-11 h-6 bg-surface-300 dark:bg-surface-700 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-primary rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary"></div>
                </label>
            </div>

            <div class="flex items-center justify-between p-4 bg-surface-100 dark:bg-surface-900 rounded-lg">
                <div>
                    <p class="font-medium text-text-900 dark:text-text-100">Notifikasi Push</p>
                    <p class="text-sm text-text-600 dark:text-text-400">Terima notifikasi push untuk pesanan baru</p>
                </div>
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" class="sr-only peer" checked>
                    <div class="w-11 h-6 bg-surface-300 dark:bg-surface-700 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-primary rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary"></div>
                </label>
            </div>

            <div class="flex items-center justify-between p-4 bg-surface-100 dark:bg-surface-900 rounded-lg">
                <div>
                    <p class="font-medium text-text-900 dark:text-text-100">Marketing Email</p>
                    <p class="text-sm text-text-600 dark:text-text-400">Terima tips dan update fitur baru</p>
                </div>
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" class="sr-only peer">
                    <div class="w-11 h-6 bg-surface-300 dark:bg-surface-700 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-primary rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary"></div>
                </label>
            </div>
        </div>
    </div>

    <!-- Store Preferences -->
    <div class="bg-surface2 dark:bg-surface-950 border border-border-300 dark:border-border-700 rounded-xl p-6 mb-6">
        <h3 class="text-lg font-semibold text-text-900 dark:text-text-100 mb-4">Preferensi Toko</h3>

        <form class="space-y-4">
            <x-forms.select label="Toko Default" name="default_business_id">
                <option value="">Pilih Toko</option>
                <option value="1">Warung Makan Bu Siti</option>
                <option value="2">Craft Corner</option>
            </x-forms.select>

            <x-forms.select label="Timezone" name="timezone">
                <option value="Asia/Jakarta">WIB (Jakarta, Surabaya)</option>
                <option value="Asia/Makassar">WITA (Makassar, Bali)</option>
                <option value="Asia/Jayapura">WIT (Jayapura)</option>
            </x-forms.select>

            <x-forms.select label="Format Mata Uang" name="currency_format">
                <option value="id">Rp 1.000.000</option>
                <option value="en">IDR 1,000,000</option>
            </x-forms.select>

            <div class="flex justify-end pt-4">
                <x-ui.button type="submit" variant="primary" size="md">
                    Simpan Perubahan
                </x-ui.button>
            </div>
        </form>
    </div>

    <!-- Security -->
    <div class="bg-surface2 dark:bg-surface-950 border border-border-300 dark:border-border-700 rounded-xl p-6 mb-6">
        <h3 class="text-lg font-semibold text-text-900 dark:text-text-100 mb-4">Keamanan</h3>

        <div class="space-y-4">
            <div class="flex items-center justify-between p-4 bg-surface-100 dark:bg-surface-900 rounded-lg">
                <div>
                    <p class="font-medium text-text-900 dark:text-text-100">Two-Factor Authentication (2FA)</p>
                    <p class="text-sm text-text-600 dark:text-text-400">Tambahan keamanan untuk akun Anda</p>
                </div>
                <x-ui.button variant="outline" size="sm">
                    Aktifkan
                </x-ui.button>
            </div>

            <div class="flex items-center justify-between p-4 bg-surface-100 dark:bg-surface-900 rounded-lg">
                <div>
                    <p class="font-medium text-text-900 dark:text-text-100">Sesi Aktif</p>
                    <p class="text-sm text-text-600 dark:text-text-400">3 perangkat sedang login</p>
                </div>
                <x-ui.button variant="outline" size="sm">
                    Kelola Sesi
                </x-ui.button>
            </div>

            <div class="flex items-center justify-between p-4 bg-surface-100 dark:bg-surface-900 rounded-lg">
                <div>
                    <p class="font-medium text-text-900 dark:text-text-100">Password</p>
                    <p class="text-sm text-text-600 dark:text-text-400">Terakhir diubah 3 bulan yang lalu</p>
                </div>
                <x-ui.button variant="outline" size="sm">
                    Ubah Password
                </x-ui.button>
            </div>
        </div>
    </div>

    <!-- Privacy -->
    <div class="bg-surface2 dark:bg-surface-950 border border-border-300 dark:border-border-700 rounded-xl p-6 mb-6">
        <h3 class="text-lg font-semibold text-text-900 dark:text-text-100 mb-4">Privasi & Data</h3>

        <div class="space-y-3">
            <x-ui.button variant="outline" size="md" class="w-full justify-between">
                <span>Download Data Saya</span>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                </svg>
            </x-ui.button>

            <x-ui.button variant="outline" size="md" class="w-full justify-between">
                <span>Export Laporan</span>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10" />
                </svg>
            </x-ui.button>
        </div>
    </div>

    <!-- Danger Zone -->
    <div class="bg-surface2 dark:bg-surface-950 border-2 border-danger-300 dark:border-danger-700 rounded-xl p-6">
        <h3 class="text-lg font-semibold text-danger-600 dark:text-danger-400 mb-4">Zona Bahaya</h3>

        <div class="space-y-4">
            <div class="flex items-center justify-between p-4 bg-danger-50 dark:bg-danger-950 rounded-lg">
                <div>
                    <p class="font-medium text-danger-900 dark:text-danger-100">Nonaktifkan Akun</p>
                    <p class="text-sm text-danger-700 dark:text-danger-300">Akun tidak akan bisa login sementara</p>
                </div>
                <x-ui.button variant="outline" size="sm" class="border-danger-600 text-danger-600 hover:bg-danger-50">
                    Nonaktifkan
                </x-ui.button>
            </div>

            <div class="flex items-center justify-between p-4 bg-danger-50 dark:bg-danger-950 rounded-lg">
                <div>
                    <p class="font-medium text-danger-900 dark:text-danger-100">Hapus Akun</p>
                    <p class="text-sm text-danger-700 dark:text-danger-300">Hapus permanen all data. Tidak dapat dibatalkan!</p>
                </div>
                <x-ui.button variant="danger" size="sm">
                    Hapus Akun
                </x-ui.button>
            </div>
        </div>
    </div>
</div>
@endsection
