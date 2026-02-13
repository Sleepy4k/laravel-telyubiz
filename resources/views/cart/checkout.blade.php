@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
<section class="py-8 min-h-screen">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
        <h1 class="text-3xl font-bold text-text-900 dark:text-text-100 mb-8">Checkout</h1>

        <div class="grid lg:grid-cols-3 gap-8">
            <!-- Left - Checkout Form -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Shipping Information -->
                <div class="bg-surface2 dark:bg-surface-950 rounded-xl border border-border-300 dark:border-border-700 p-6">
                    <h2 class="text-xl font-semibold text-text-900 dark:text-text-100 mb-4">Informasi Pengiriman</h2>
                    <form class="space-y-4">
                        <div class="grid md:grid-cols-2 gap-4">
                            <x-forms.input
                                label="Nama Lengkap"
                                name="full_name"
                                type="text"
                                placeholder="Masukkan nama lengkap"
                                required
                            />
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

                        <x-forms.textarea
                            label="Alamat Lengkap"
                            name="address"
                            placeholder="Jalan, Nomor Rumah, RT/RW, Kelurahan, Kecamatan"
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

                        <x-forms.textarea
                            label="Catatan (Opsional)"
                            name="notes"
                            placeholder="Catatan untuk penjual (warna, ukuran, dll)"
                            rows="2"
                        />
                    </form>
                </div>

                <!-- Payment Method -->
                <div class="bg-surface2 dark:bg-surface-950 rounded-xl border border-border-300 dark:border-border-700 p-6">
                    <h2 class="text-xl font-semibold text-text-900 dark:text-text-100 mb-4">Metode Pembayaran</h2>
                    <div class="space-y-3">
                        <!-- Bank Transfer -->
                        <label class="flex items-center gap-4 p-4 border-2 border-border-300 dark:border-border-700 rounded-lg cursor-pointer hover:border-primary transition-colors">
                            <input type="radio" name="payment_method" value="bank_transfer" class="w-5 h-5 text-primary" checked>
                            <div class="flex-1">
                                <div class="flex items-center gap-2 mb-1">
                                    <svg class="w-5 h-5 text-text-600 dark:text-text-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                    </svg>
                                    <p class="font-medium text-text-900 dark:text-text-100">Transfer Bank</p>
                                </div>
                                <p class="text-sm text-text-600 dark:text-text-400">BCA, Mandiri, BNI, BRI</p>
                            </div>
                        </label>

                        <!-- E-Wallet -->
                        <label class="flex items-center gap-4 p-4 border-2 border-border-300 dark:border-border-700 rounded-lg cursor-pointer hover:border-primary transition-colors">
                            <input type="radio" name="payment_method" value="e_wallet" class="w-5 h-5 text-primary">
                            <div class="flex-1">
                                <div class="flex items-center gap-2 mb-1">
                                    <svg class="w-5 h-5 text-text-600 dark:text-text-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <p class="font-medium text-text-900 dark:text-text-100">E-Wallet</p>
                                </div>
                                <p class="text-sm text-text-600 dark:text-text-400">GoPay, OVO, Dana, ShopeePay</p>
                            </div>
                        </label>

                        <!-- COD -->
                        <label class="flex items-center gap-4 p-4 border-2 border-border-300 dark:border-border-700 rounded-lg cursor-pointer hover:border-primary transition-colors">
                            <input type="radio" name="payment_method" value="cod" class="w-5 h-5 text-primary">
                            <div class="flex-1">
                                <div class="flex items-center gap-2 mb-1">
                                    <svg class="w-5 h-5 text-text-600 dark:text-text-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                    <p class="font-medium text-text-900 dark:text-text-100">Cash on Delivery (COD)</p>
                                </div>
                                <p class="text-sm text-text-600 dark:text-text-400">Bayar saat barang diterima</p>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Shipping Method -->
                <div class="bg-surface2 dark:bg-surface-950 rounded-xl border border-border-300 dark:border-border-700 p-6">
                    <h2 class="text-xl font-semibold text-text-900 dark:text-text-100 mb-4">Metode Pengiriman</h2>
                    <div class="space-y-3">
                        <!-- Regular -->
                        <label class="flex items-center justify-between p-4 border-2 border-border-300 dark:border-border-700 rounded-lg cursor-pointer hover:border-primary transition-colors">
                            <div class="flex items-center gap-4">
                                <input type="radio" name="shipping_method" value="regular" class="w-5 h-5 text-primary" checked>
                                <div>
                                    <p class="font-medium text-text-900 dark:text-text-100">Reguler (3-5 hari)</p>
                                    <p class="text-sm text-text-600 dark:text-text-400">JNE Regular</p>
                                </div>
                            </div>
                            <p class="font-semibold text-text-900 dark:text-text-100">Rp 10.000</p>
                        </label>

                        <!-- Express -->
                        <label class="flex items-center justify-between p-4 border-2 border-border-300 dark:border-border-700 rounded-lg cursor-pointer hover:border-primary transition-colors">
                            <div class="flex items-center gap-4">
                                <input type="radio" name="shipping_method" value="express" class="w-5 h-5 text-primary">
                                <div>
                                    <p class="font-medium text-text-900 dark:text-text-100">Express (1-2 hari)</p>
                                    <p class="text-sm text-text-600 dark:text-text-400">JNE YES</p>
                                </div>
                            </div>
                            <p class="font-semibold text-text-900 dark:text-text-100">Rp 20.000</p>
                        </label>

                        <!-- Same Day -->
                        <label class="flex items-center justify-between p-4 border-2 border-border-300 dark:border-border-700 rounded-lg cursor-pointer hover:border-primary transition-colors">
                            <div class="flex items-center gap-4">
                                <input type="radio" name="shipping_method" value="same_day" class="w-5 h-5 text-primary">
                                <div>
                                    <p class="font-medium text-text-900 dark:text-text-100">Same Day (Hari ini)</p>
                                    <p class="text-sm text-text-600 dark:text-text-400">Instant Delivery</p>
                                </div>
                            </div>
                            <p class="font-semibold text-text-900 dark:text-text-100">Rp 30.000</p>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Right - Order Summary -->
            <div class="lg:col-span-1">
                <div class="sticky top-20 bg-surface2 dark:bg-surface-950 rounded-xl border border-border-300 dark:border-border-700 p-6">
                    <h2 class="text-xl font-semibold text-text-900 dark:text-text-100 mb-4">Ringkasan Pesanan</h2>

                    <!-- Cart Items -->
                    <div class="space-y-3 mb-4 pb-4 border-b border-border-300 dark:border-border-700">
                        <div class="flex gap-3">
                            <img
                                src="https://picsum.photos/seed/product1/100/100"
                                alt="Product"
                                class="w-16 h-16 rounded-lg object-cover"
                            >
                            <div class="flex-1">
                                <p class="text-sm font-medium text-text-900 dark:text-text-100 line-clamp-2">Nasi Goreng Special</p>
                                <p class="text-xs text-text-600 dark:text-text-400">2x</p>
                                <p class="text-sm font-semibold text-primary">Rp 30.000</p>
                            </div>
                        </div>
                        <div class="flex gap-3">
                            <img
                                src="https://picsum.photos/seed/product2/100/100"
                                alt="Product"
                                class="w-16 h-16 rounded-lg object-cover"
                            >
                            <div class="flex-1">
                                <p class="text-sm font-medium text-text-900 dark:text-text-100 line-clamp-2">Gantungan Kunci Custom</p>
                                <p class="text-xs text-text-600 dark:text-text-400">1x</p>
                                <p class="text-sm font-semibold text-primary">Rp 20.000</p>
                            </div>
                        </div>
                    </div>

                    <!-- Price Breakdown -->
                    <div class="space-y-3 mb-4 pb-4 border-b border-border-300 dark:border-border-700">
                        <div class="flex justify-between text-sm">
                            <span class="text-text-600 dark:text-text-400">Subtotal</span>
                            <span class="font-medium text-text-900 dark:text-text-100">Rp 50.000</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-text-600 dark:text-text-400">Ongkos Kirim</span>
                            <span class="font-medium text-text-900 dark:text-text-100">Rp 10.000</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-text-600 dark:text-text-400">Biaya Admin</span>
                            <span class="font-medium text-text-900 dark:text-text-100">Rp 2.000</span>
                        </div>
                    </div>

                    <!-- Total -->
                    <div class="flex justify-between text-lg font-bold text-text-900 dark:text-text-100 mb-6">
                        <span>Total</span>
                        <span class="text-primary">Rp 62.000</span>
                    </div>

                    <!-- Checkout Button -->
                    <x-ui.button variant="primary" size="lg" class="w-full mb-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Bayar Sekarang
                    </x-ui.button>

                    <!-- Terms -->
                    <p class="text-xs text-text-600 dark:text-text-400 text-center">
                        Dengan melanjutkan, Anda menyetujui
                        <a href="#" class="text-primary hover:underline">Syarat & Ketentuan</a>
                        yang berlaku
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
