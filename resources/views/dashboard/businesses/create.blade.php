@extends('layouts.dashboard')

@section('page-title', 'Tambah Toko Baru')

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
                        placeholder="Contoh: Warung Makan Bu Siti"
                        required
                    />

                    <x-forms.textarea
                        label="Deskripsi Toko"
                        name="description"
                        placeholder="Ceritakan tentang toko Anda..."
                        rows="4"
                        required
                    />

                    <div class="grid md:grid-cols-2 gap-4">
                        <x-forms.select
                            label="Kategori"
                            name="category"
                            required
                        >
                            <option value="">Pilih Kategori</option>
                            <option value="kuliner">Kuliner</option>
                            <option value="fashion">Fashion</option>
                            <option value="kerajinan">Kerajinan</option>
                            <option value="teknologi">Teknologi</option>
                            <option value="jasa">Jasa</option>
                            <option value="lainnya">Lainnya</option>
                        </x-forms.select>

                        <x-forms.input
                            label="Nomor Telepon"
                            name="phone"
                            type="tel"
                            placeholder="08xxxxxxxxxx"
                            required
                        />
                    </div>

                    <x-forms.input
                        label="Email"
                        name="email"
                        type="email"
                        placeholder="email@example.com"
                        required
                    />
                </div>
            </div>

            <!-- Logo & Banner -->
            <div>
                <h3 class="text-lg font-semibold text-text-900 dark:text-text-100 mb-4">Logo & Banner Toko</h3>

                <div class="grid md:grid-cols-2 gap-4">
                    <x-forms.file-upload
                        label="Logo Toko"
                        name="logo"
                        accept="image/*"
                        help="Ukuran maksimal 2MB. Format: JPG, PNG"
                    />

                    <x-forms.file-upload
                        label="Banner Toko"
                        name="banner"
                        accept="image/*"
                        help="Ukuran maksimal 5MB. Rasio 16:9"
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
                        placeholder="Jalan, Nomor, RT/RW, Kelurahan, Kecamatan"
                        rows="3"
                        required
                    />

                    <div class="grid md:grid-cols-3 gap-4">
                        <x-forms.input
                            label="Kota/Kabupaten"
                            name="city"
                            type="text"
                            placeholder="Purwokerto"
                            required
                        />

                        <x-forms.input
                            label="Provinsi"
                            name="province"
                            type="text"
                            placeholder="Jawa Tengah"
                            required
                        />

                        <x-forms.input
                            label="Kode Pos"
                            name="postal_code"
                            type="text"
                            placeholder="53100"
                            required
                        />
                    </div>
                </div>
            </div>

            <!-- Operating Hours -->
            <div>
                <h3 class="text-lg font-semibold text-text-900 dark:text-text-100 mb-4">Jam Operasional</h3>

                <div class="space-y-3">
                    @foreach(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'] as $day)
                        <div class="flex items-center gap-4">
                            <div class="w-24">
                                <x-forms.checkbox name="operating_days[]" value="{{ strtolower($day) }}" checked>
                                    {{ $day }}
                                </x-forms.checkbox>
                            </div>
                            <div class="flex items-center gap-2 flex-1">
                                <input type="time" name="operating_hours[{{ strtolower($day) }}][open]" value="08:00" class="px-3 py-2 bg-surface2 dark:bg-surface-900 border border-border-300 dark:border-border-700 rounded-lg text-sm focus:ring-2 focus:ring-primary focus:border-transparent">
                                <span class="text-text-600 dark:text-text-400">-</span>
                                <input type="time" name="operating_hours[{{ strtolower($day) }}][close]" value="20:00" class="px-3 py-2 bg-surface2 dark:bg-surface-900 border border-border-300 dark:border-border-700 rounded-lg text-sm focus:ring-2 focus:ring-primary focus:border-transparent">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Social Media -->
            <div>
                <h3 class="text-lg font-semibold text-text-900 dark:text-text-100 mb-4">Media Sosial (Opsional)</h3>

                <div class="grid md:grid-cols-2 gap-4">
                    <x-forms.input
                        label="Instagram"
                        name="instagram"
                        type="text"
                        placeholder="@username"
                    />

                    <x-forms.input
                        label="Facebook"
                        name="facebook"
                        type="text"
                        placeholder="facebook.com/page"
                    />

                    <x-forms.input
                        label="WhatsApp"
                        name="whatsapp"
                        type="tel"
                        placeholder="08xxxxxxxxxx"
                    />

                    <x-forms.input
                        label="Website"
                        name="website"
                        type="url"
                        placeholder="https://example.com"
                    />
                </div>
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-end gap-3 pt-4 border-t border-border-300 dark:border-border-700">
                <x-ui.button href="{{ route('dashboard.businesses.index') }}" variant="outline" size="md">
                    Batal
                </x-ui.button>
                <x-ui.button type="submit" variant="primary" size="md">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Simpan Toko
                </x-ui.button>
            </div>
        </form>
    </div>

    <!-- Tips -->
    <div class="mt-6 bg-primary-50 dark:bg-primary-950 border border-primary-200 dark:border-primary-800 rounded-xl p-4">
        <div class="flex gap-3">
            <svg class="w-5 h-5 text-primary flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <div>
                <p class="text-sm text-primary-800 dark:text-primary-200">
                    <strong>Tips:</strong> Pastikan informasi toko lengkap untuk meningkatkan kepercayaan pembeli. Gunakan foto logo dan banner berkualitas tinggi.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
