@extends('layouts.dashboard')

@section('page-title', 'Edit Produk')

@php
$product = [
    'id' => '01JKHP01',
    'name' => 'Nasi Goreng Special',
    'description' => 'Nasi goreng dengan bumbu rahasia, telur, ayam, dan kerupuk. Dibuat dengan bahan-bahan pilihan dan bumbu khas yang membuat rasanya istimewa.',
    'category' => 'makanan',
    'price' => 15000,
    'discount_price' => null,
    'stock' => 50,
    'sku' => 'PRD-001',
    'weight' => 500,
    'images' => ['https://picsum.photos/seed/product1/400/400'],
    'business_id' => '1',
    'is_active' => true,
    'is_featured' => false,
];
@endphp

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
                        <option value="1" {{ $product['business_id'] === '1' ? 'selected' : '' }}>Warung Makan Bu Siti</option>
                        <option value="2" {{ $product['business_id'] === '2' ? 'selected' : '' }}>Craft Corner</option>
                    </x-forms.select>

                    <x-forms.input
                        label="Nama Produk"
                        name="name"
                        type="text"
                        value="{{ $product['name'] }}"
                        required
                    />

                    <x-forms.textarea
                        label="Deskripsi Produk"
                        name="description"
                        rows="5"
                        required
                    >{{ $product['description'] }}</x-forms.textarea>

                    <div class="grid md:grid-cols-2 gap-4">
                        <x-forms.select label="Kategori" name="category" required>
                            <option value="">Pilih Kategori</option>
                            <option value="makanan" {{ $product['category'] === 'makanan' ? 'selected' : '' }}>Makanan</option>
                            <option value="minuman" {{ $product['category'] === 'minuman' ? 'selected' : '' }}>Minuman</option>
                            <option value="fashion" {{ $product['category'] === 'fashion' ? 'selected' : '' }}>Fashion</option>
                            <option value="aksesori" {{ $product['category'] === 'aksesori' ? 'selected' : '' }}>Aksesori</option>
                            <option value="elektronik" {{ $product['category'] === 'elektronik' ? 'selected' : '' }}>Elektronik</option>
                        </x-forms.select>

                        <x-forms.input
                            label="SKU (Opsional)"
                            name="sku"
                            type="text"
                            value="{{ $product['sku'] }}"
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
                        value="{{ $product['price'] }}"
                        required
                    />

                    <x-forms.input
                        label="Harga Diskon (Opsional)"
                        name="discount_price"
                        type="number"
                        value="{{ $product['discount_price'] }}"
                    />

                    <x-forms.input
                        label="Stok"
                        name="stock"
                        type="number"
                        value="{{ $product['stock'] }}"
                        required
                    />
                </div>
            </div>

            <!-- Current Images -->
            <div>
                <h3 class="text-lg font-semibold text-text-900 dark:text-text-100 mb-4">Foto Produk Saat Ini</h3>

                <div class="grid grid-cols-3 md:grid-cols-5 gap-4 mb-4">
                    @foreach($product['images'] as $image)
                        <div class="relative group">
                            <img src="{{ $image }}" alt="Product" class="w-full aspect-square rounded-lg object-cover border-2 border-border-300 dark:border-border-700">
                            <button type="button" class="absolute top-2 right-2 p-1 bg-danger-600 text-white rounded-full opacity-0 group-hover:opacity-100 transition-opacity">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    @endforeach
                </div>

                <x-forms.file-upload
                    label="Tambah Foto Baru"
                    name="images[]"
                    accept="image/*"
                    help="Kosongkan jika tidak ingin menambah foto"
                />
            </div>

            <!-- Shipping -->
            <div>
                <h3 class="text-lg font-semibold text-text-900 dark:text-text-100 mb-4">Pengiriman</h3>

                <div class="grid md:grid-cols-3 gap-4">
                    <x-forms.input
                        label="Berat (gram)"
                        name="weight"
                        type="number"
                        value="{{ $product['weight'] }}"
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
                    <x-forms.checkbox name="is_active" value="1" :checked="$product['is_active']">
                        Aktifkan produk (produk akan ditampilkan di toko)
                    </x-forms.checkbox>

                    <x-forms.checkbox name="is_featured" value="1" :checked="$product['is_featured']">
                        Jadikan produk unggulan
                    </x-forms.checkbox>
                </div>
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-between pt-4 border-t border-border-300 dark:border-border-700">
                <x-ui.button type="button" variant="danger" size="md">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                    Hapus Produk
                </x-ui.button>

                <div class="flex items-center gap-3">
                    <x-ui.button href="{{ route('dashboard.products.index') }}" variant="outline" size="md">
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
