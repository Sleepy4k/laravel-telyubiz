@extends('layouts.dashboard')

@section('page-title', 'Tambah Produk')

@section('content')
<div class="max-w-4xl">
    <div class="mb-6">
        <a href="{{ route('dashboard.products.index') }}" class="text-primary hover:text-primary-700 font-medium flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Kembali ke Daftar Produk
        </a>
    </div>

    <div class="bg-surface2 dark:bg-surface-950 border border-border-300 dark:border-border-700 rounded-xl p-6">
        <form class="space-y-6">
            <!-- Product Info -->
            <div>
                <h3 class="text-lg font-semibold text-text-900 dark:text-text-100 mb-4">Informasi Produk</h3>

                <div class="space-y-4">
                    <x-forms.select label="Pilih Toko" name="business_id" required>
                        <option value="">Pilih Toko</option>
                        <option value="1">Warung Makan Bu Siti</option>
                        <option value="2">Craft Corner</option>
                    </x-forms.select>

                    <x-forms.input
                        label="Nama Produk"
                        name="name"
                        type="text"
                        placeholder="Contoh: Nasi Goreng Special"
                        required
                    />

                    <x-forms.textarea
                        label="Deskripsi Produk"
                        name="description"
                        placeholder="Deskripsikan produk Anda dengan detail..."
                        rows="5"
                        required
                    />

                    <div class="grid md:grid-cols-2 gap-4">
                        <x-forms.select label="Kategori" name="category" required>
                            <option value="">Pilih Kategori</option>
                            <option value="makanan">Makanan</option>
                            <option value="minuman">Minuman</option>
                            <option value="fashion">Fashion</option>
                            <option value="aksesori">Aksesori</option>
                            <option value="elektronik">Elektronik</option>
                        </x-forms.select>

                        <x-forms.input
                            label="SKU (Opsional)"
                            name="sku"
                            type="text"
                            placeholder="PRD-001"
                        />
                    </div>
                </div>
            </div>

            <!-- Pricing & Stock -->
            <div>
                <h3 class="text-lg font-semibold text-text-900 dark:text-text-100 mb-4">Harga & Stok</h3>

                <div class="grid md:grid-cols-3 gap-4">
                    <x-forms.input
                        label="Harga Normal"
                        name="price"
                        type="number"
                        placeholder="15000"
                        required
                    />

                    <x-forms.input
                        label="Harga Diskon (Opsional)"
                        name="discount_price"
                        type="number"
                        placeholder="12000"
                    />

                    <x-forms.input
                        label="Stok"
                        name="stock"
                        type="number"
                        placeholder="100"
                        required
                    />
                </div>

                <div class="mt-4">
                    <x-forms.checkbox name="track_stock" value="1" checked>
                        Lacak stok produk
                    </x-forms.checkbox>
                </div>
            </div>

            <!-- Product Images -->
            <div>
                <h3 class="text-lg font-semibold text-text-900 dark:text-text-100 mb-4">Foto Produk</h3>

                <div class="grid md:grid-cols-3 gap-4">
                    <x-forms.file-upload
                        label="Foto Utama"
                        name="images[]"
                        accept="image/*"
                        required
                        help="Foto pertama akan menjadi foto utama"
                    />

                    <x-forms.file-upload
                        label="Foto 2 (Opsional)"
                        name="images[]"
                        accept="image/*"
                    />

                    <x-forms.file-upload
                        label="Foto 3 (Opsional)"
                        name="images[]"
                        accept="image/*"
                    />
                </div>

                <p class="text-sm text-text-600 dark:text-text-400 mt-2">
                    Upload minimal 1 foto, maksimal 5 foto. Format: JPG, PNG. Ukuran maksimal: 2MB per foto
                </p>
            </div>

            <!-- Product Variants (Optional) -->
            <div>
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-text-900 dark:text-text-100">Varian Produk (Opsional)</h3>
                    <x-ui.button type="button" variant="outline" size="sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Tambah Varian
                    </x-ui.button>
                </div>

                <div class="bg-surface-100 dark:bg-surface-900 rounded-lg p-4 text-center">
                    <p class="text-sm text-text-600 dark:text-text-400">Belum ada varian. Klik "Tambah Varian" untuk menambahkan ukuran, warna, atau varian lainnya.</p>
                </div>
            </div>

            <!-- Shipping -->
            <div>
                <h3 class="text-lg font-semibold text-text-900 dark:text-text-100 mb-4">Pengiriman</h3>

                <div class="grid md:grid-cols-3 gap-4">
                    <x-forms.input
                        label="Berat (gram)"
                        name="weight"
                        type="number"
                        placeholder="500"
                        required
                    />

                    <x-forms.input
                        label="Panjang (cm)"
                        name="length"
                        type="number"
                        placeholder="20"
                    />

                    <x-forms.input
                        label="Lebar (cm)"
                        name="width"
                        type="number"
                        placeholder="15"
                    />
                </div>
            </div>

            <!-- Status -->
            <div>
                <h3 class="text-lg font-semibold text-text-900 dark:text-text-100 mb-4">Status</h3>

                <div class="space-y-3">
                    <x-forms.checkbox name="is_active" value="1" checked>
                        Aktifkan produk (produk akan ditampilkan di toko)
                    </x-forms.checkbox>

                    <x-forms.checkbox name="is_featured" value="1">
                        Jadikan produk unggulan
                    </x-forms.checkbox>
                </div>
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-end gap-3 pt-4 border-t border-border-300 dark:border-border-700">
                <x-ui.button type="button" variant="outline" size="md">
                    Simpan sebagai Draft
                </x-ui.button>
                <x-ui.button href="{{ route('dashboard.products.index') }}" variant="outline" size="md">
                    Batal
                </x-ui.button>
                <x-ui.button type="submit" variant="primary" size="md">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Publikasikan Produk
                </x-ui.button>
            </div>
        </form>
    </div>
</div>
@endsection
