<?php

use Illuminate\Support\Facades\Route;

// Public Pages
Route::get('/', fn() => view('public.index'))->name('home');
Route::get('/stores', fn() => view('public.stores.index'))->name('stores.index');
Route::get('/stores/{slug}', fn($slug) => view('public.stores.show', compact('slug')))->name('stores.show');
Route::get('/products/{slug}', fn($slug) => view('public.products.show', compact('slug')))->name('products.show');
Route::get('/events', fn() => view('public.events.index'))->name('events.index');
Route::get('/events/{slug}', fn($slug) => view('public.events.show', compact('slug')))->name('events.show');

// Auth Pages (placeholder routes)
Route::get('/login', fn() => view('auth.login'))->name('login');
Route::get('/register', fn() => view('auth.register'))->name('register');

// Shopping
Route::get('/cart', fn() => view('cart.index'))->name('cart.index');
Route::get('/checkout', fn() => view('cart.checkout'))->name('checkout');

// Account
Route::get('/account/orders', fn() => view('account.orders'))->name('account.orders');
Route::get('/account/profile', fn() => view('account.profile'))->name('account.profile');

// Dashboard (simulated auth)
Route::prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/', fn() => view('dashboard.index'))->name('index');

    // Businesses
    Route::get('/businesses', fn() => view('dashboard.businesses.index'))->name('businesses.index');
    Route::get('/businesses/create', fn() => view('dashboard.businesses.create'))->name('businesses.create');
    Route::get('/businesses/{id}/edit', fn($id) => view('dashboard.businesses.edit', compact('id')))->name('businesses.edit');

    // Products
    Route::get('/products', fn() => view('dashboard.products.index'))->name('products.index');
    Route::get('/products/create', fn() => view('dashboard.products.create'))->name('products.create');
    Route::get('/products/{id}/edit', fn($id) => view('dashboard.products.edit', compact('id')))->name('products.edit');

    // Team
    Route::get('/team', fn() => view('dashboard.team.index'))->name('team');

    // Events
    Route::get('/events', fn() => view('dashboard.events.index'))->name('events.index');
    Route::get('/events/create', fn() => view('dashboard.events.create'))->name('events.create');
    Route::get('/events/{id}/edit', fn($id) => view('dashboard.events.edit', compact('id')))->name('events.edit');
    Route::get('/events/{id}/participants', fn($id) => view('dashboard.events.participants', compact('id')))->name('events.participants');

    // Orders
    Route::get('/orders', fn() => view('dashboard.orders.index'))->name('orders.index');

    // Withdrawals
    Route::get('/withdrawals', fn() => view('dashboard.withdrawals.index'))->name('withdrawals.index');

    // Settings
    Route::get('/settings', fn() => view('dashboard.settings.index'))->name('settings.index');
});
