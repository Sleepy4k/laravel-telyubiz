@extends('layouts.dashboard')

@section('page-title', 'Edit Toko')

@php
// Dummy business data
$business = [
    'id' => '01JKH81',
    'name' => 'Warung Makan Bu Siti',
    'slug' => 'warung-makan-bu-siti',
    'description' => 'Menyediakan makanan khas Jawa dengan cita rasa autentik dan harga terjangkau untuk mahasiswa',
    'logo' => 'https://ui-avatars.com/api/?name=Warung+Makan+Bu+Siti&background=D61F2C&color=fff&size=200',
    'banner' => 'https://picsum.photos/seed/store1/800/400',
    'category' => 'kuliner',
    'phone' => '+62 812 3456 7890',
    'email' => 'busiti@example.com',
    'address' => 'Jl. DI Panjaitan No. 128, Purwokerto Barat',
    'city' => 'Purwokerto',
    'province' => 'Jawa Tengah',
    'postal_code' => '53100',
    'instagram' => '@warungbusiti',
    'facebook' => 'facebook.com/warungbusiti',
    'whatsapp' => '081234567890',
    'website' => 'https://warungbusiti.com',
];
@endphp

@section('content')
<div class="max-w-4xl">
    <div class="mb-6">
        <a href="{{ route('dashboard.businesses.index') }}" class="text-primary hover:text-primary-700 font-medium flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Kembali ke Daftar Toko
        </a>
    </div>

    <div class="bg-surface2 dark:bg-surface-950 border border-border-300 dark:border-border-700 rounded-xl p-6">
        <form class="space-y-6">
            <!-- Basic Information -->
            <div>
                <h3 class="text-lg font-semibold text-text-900 dark:text-text-100 mb-4">Informasi Dasar</h3>

                <div class="space-y-4">
                    <x-forms.input
                        label="Nama Toko"
                        name="name"
                        type="text"
                        value="{{ $business['name'] }}"
                        required
                    />

                    <x-forms.textarea
                        label="Deskripsi Toko"
                        name="description"
                        rows="4"
                        required
                    >{{ $business['description'] }}</x-forms.textarea>

                    <div class="grid md:grid-cols-2 gap-4">
                        <x-forms.select
                            label="Kategori"
                            name="category"
                            required
                        >
                            <option value="">Pilih Kategori</option>
                            <option value="kuliner" {{ $business['category'] === 'kuliner' ? 'selected' : '' }}>Kuliner</option>
                            <option value="fashion" {{ $business['category'] === 'fashion' ? 'selected' : '' }}>Fashion</option>
                            <option value="kerajinan" {{ $business['category'] === 'kerajinan' ? 'selected' : '' }}>Kerajinan</option>
                            <option value="teknologi" {{ $business['category'] === 'teknologi' ? 'selected' : '' }}>Teknologi</option>
                            <option value="jasa" {{ $business['category'] === 'jasa' ? 'selected' : '' }}>Jasa</option>
                            <option value="lainnya" {{ $business['category'] === 'lainnya' ? 'selected' : '' }}>Lainnya</option>
                        </x-forms.select>

                        <x-forms.input
                            label="Nomor Telepon"
                            name="phone"
                            type="tel"
                            value="{{ $business['phone'] }}"
                            required
                        />
                    </div>

                    <x-forms.input
                        label="Email"
                        name="email"
                        type="email"
                        value="{{ $business['email'] }}"
                        required
                    />
                </div>
            </div>

            <!-- Current Images -->
            <div>
                <h3 class="text-lg font-semibold text-text-900 dark:text-text-100 mb-4">Logo & Banner Saat Ini</h3>

                <div class="grid md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <p class="text-sm font-medium text-text-700 dark:text-text-300 mb-2">Logo</p>
                        <img src="{{ $business['logo'] }}" alt="Logo" class="w-32 h-32 rounded-lg border-2 border-border-300 dark:border-border-700">
                    </div>
                    <div>
                        <p class="text-sm font-medium text-text-700 dark:text-text-300 mb-2">Banner</p>
                        <img src="{{ $business['banner'] }}" alt="Banner" class="w-full h-32 rounded-lg border-2 border-border-300 dark:border-border-700 object-cover">
                    </div>
                </div>

                <div class="grid md:grid-cols-2 gap-4">
                    <x-forms.file-upload
                        label="Upload Logo Baru"
                        name="logo"
                        accept="image/*"
                        help="Kosongkan jika tidak ingin mengubah"
                    />

                    <x-forms.file-upload
                        label="Upload Banner Baru"
                        name="banner"
                        accept="image/*"
                        help="Kosongkan jika tidak ingin mengubah"
                    />
                </div>
            </div>

            <!-- Address -->
            <div>
                <h3 class="text-lg font-semibold text-text-900 dark:text-text-100 mb-4">Alamat Toko</h3>

                <div class="space-y-4">
                    <x-forms.textarea
                        label="Alamat Lengkap"
                        name="address"
                        rows="3"
                        required
                    >{{ $business['address'] }}</x-forms.textarea>

                    <div class="grid md:grid-cols-3 gap-4">
                        <x-forms.input
                            label="Kota/Kabupaten"
                            name="city"
                            type="text"
                            value="{{ $business['city'] }}"
                            required
                        />

                        <x-forms.input
                            label="Provinsi"
                            name="province"
                            type="text"
                            value="{{ $business['province'] }}"
                            required
                        />

                        <x-forms.input
                            label="Kode Pos"
                            name="postal_code"
                            type="text"
                            value="{{ $business['postal_code'] }}"
                            required
                        />
                    </div>
                </div>
            </div>

            <!-- Social Media -->
            <div>
                <h3 class="text-lg font-semibold text-text-900 dark:text-text-100 mb-4">Media Sosial</h3>

                <div class="grid md:grid-cols-2 gap-4">
                    <x-forms.input
                        label="Instagram"
                        name="instagram"
                        type="text"
                        value="{{ $business['instagram'] }}"
                    />

                    <x-forms.input
                        label="Facebook"
                        name="facebook"
                        type="text"
                        value="{{ $business['facebook'] }}"
                    />

                    <x-forms.input
                        label="WhatsApp"
                        name="whatsapp"
                        type="tel"
                        value="{{ $business['whatsapp'] }}"
                    />

                    <x-forms.input
                        label="Website"
                        name="website"
                        type="url"
                        value="{{ $business['website'] }}"
                    />
                </div>
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-between pt-4 border-t border-border-300 dark:border-border-700">
                <x-ui.button type="button" variant="danger" size="md">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                    Hapus Toko
                </x-ui.button>

                <div class="flex items-center gap-3">
                    <x-ui.button href="{{ route('dashboard.businesses.index') }}" variant="outline" size="md">
                        Batal
                    </x-ui.button>
                    <x-ui.button type="submit" variant="primary" size="md">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Simpan Perubahan
                    </x-ui.button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
