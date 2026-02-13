@extends('layouts.app')

@section('title', 'Keranjang Belanja')

@section('content')
<section class="py-8">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
        <h1 class="text-3xl font-bold text-text-900 dark:text-text-100 mb-8">Keranjang Belanja</h1>

        <div class="grid lg:grid-cols-3 gap-8">
            <!-- Cart Items -->
            <div class="lg:col-span-2 space-y-4" id="cartItems">
                <!-- Cart items will be rendered here by JavaScript -->
                <div class="text-center py-16 bg-surface2 dark:bg-surface-950 rounded-xl border border-border-300 dark:border-border-700">
                    <svg class="w-24 h-24 mx-auto text-text-300 dark:text-text-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <p class="text-text-600 dark:text-text-400 text-lg mb-4">Keranjang Anda kosong</p>
                    <x-ui.button href="{{ route('stores.index') }}" variant="primary">
                        Mulai Belanja
                    </x-ui.button>
                </div>
            </div>

            <!-- Order Summary -->
            <div>
                <div class="bg-surface2 dark:bg-surface-950 rounded-xl border border-border-300 dark:border-border-700 p-6 sticky top-20">
                    <h3 class="text-lg font-semibold text-text-900 dark:text-text-100 mb-4">Ringkasan Belanja</h3>

                    <div class="space-y-3 mb-4 pb-4 border-b border-border-300 dark:border-border-700">
                        <div class="flex justify-between text-text-600 dark:text-text-400">
                            <span>Subtotal</span>
                            <span id="subtotal">Rp 0</span>
                        </div>
                        <div class="flex justify-between text-text-600 dark:text-text-400">
                            <span>Biaya Admin</span>
                            <span>Rp 2.000</span>
                        </div>
                    </div>

                    <div class="flex justify-between text-lg font-bold text-text-900 dark:text-text-100 mb-6">
                        <span>Total</span>
                        <span id="total">Rp 2.000</span>
                    </div>

                    <x-ui.button href="{{ route('checkout') }}" variant="primary" size="lg" class="w-full" id="checkoutBtn">
                        Lanjut ke Pembayaran
                    </x-ui.button>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script src="{{ asset('resources/js/cart.js') }}"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const cart = new Cart();
    renderCart(cart);

    function renderCart(cartInstance) {
        const container = document.getElementById('cartItems');
        const items = cartInstance.items;

        if (items.length === 0) {
            return; // Show empty state (already in HTML)
        }

        container.innerHTML = items.map((item, index) => `
            <div class="flex gap-4 p-4 bg-surface2 dark:bg-surface-950 rounded-xl border border-border-300 dark:border-border-700">
                <img src="${item.image}" alt="${item.name}" class="w-24 h-24 rounded-lg object-cover">
                <div class="flex-1">
                    <h3 class="font-semibold text-text-900 dark:text-text-100 mb-1">${item.name}</h3>
                    <p class="text-sm text-text-600 dark:text-text-400">${item.store.name}</p>
                    <p class="text-lg font-bold text-primary mt-2">Rp ${item.price.toLocaleString('id-ID')}</p>
                </div>
                <div class="flex flex-col items-end justify-between">
                    <button data-cart-remove="${index}" class="text-danger-600 hover:text-danger-700">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </button>
                    <div class="flex items-center gap-2 bg-surface-100 dark:bg-surface-900 rounded-lg p-1">
                        <button data-cart-decrease="${index}" class="w-8 h-8 flex items-center justify-center rounded hover:bg-surface2 dark:hover:bg-surface-950">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                            </svg>
                        </button>
                        <span class="w-8 text-center font-medium">${item.quantity}</span>
                        <button data-cart-increase="${index}" class="w-8 h-8 flex items-center justify-center rounded hover:bg-surface2 dark:hover:bg-surface-950">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        `).join('');

        // Update summary
        const subtotal = cartInstance.getTotal();
        const admin = 2000;
        const total = subtotal + admin;

        document.getElementById('subtotal').textContent = `Rp ${subtotal.toLocaleString('id-ID')}`;
        document.getElementById('total').textContent = `Rp ${total.toLocaleString('id-ID')}`;

        // Enable checkout button
        document.getElementById('checkoutBtn').classList.remove('opacity-50', 'cursor-not-allowed');
    }
});
</script>
@endpush
