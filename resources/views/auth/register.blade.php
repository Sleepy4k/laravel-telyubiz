@extends('layouts.guest')

@section('title', 'Daftar')

@section('content')
<div>
    <h1 class="text-2xl font-bold text-text-900 dark:text-text-100 mb-2">Buat Akun Baru</h1>
    <p class="text-text-600 dark:text-text-400 mb-8">Bergabung dengan Telyubiz sekarang</p>

    <form action="#" method="POST" class="space-y-6">
        @csrf

        <!-- Name -->
        <x-forms.input
            label="Nama Lengkap"
            name="name"
            type="text"
            placeholder="Masukkan nama lengkap"
            required
        />

        <!-- Phone -->
        <x-forms.input
            label="Nomor HP"
            name="phone"
            type="tel"
            placeholder="628xxxxxxxxxx"
            required
        />

        <!-- Email -->
        <x-forms.input
            label="Email"
            name="email"
            type="email"
            placeholder="email@example.com"
            required
        />

        <!-- Password -->
        <x-forms.input
            label="Password"
            name="password"
            type="password"
            placeholder="Minimal 8 karakter"
            required
        />

        <!-- Password Confirmation -->
        <x-forms.input
            label="Konfirmasi Password"
            name="password_confirmation"
            type="password"
            placeholder="Ketik ulang password"
            required
        />

        <!-- Terms -->
        <x-forms.checkbox name="terms" required>
            Saya setuju dengan <a href="#" class="text-primary hover:text-primary-700">Syarat & Ketentuan</a> dan <a href="#" class="text-primary hover:text-primary-700">Kebijakan Privasi</a>
        </x-forms.checkbox>

        <!-- Submit Button -->
        <x-ui.button type="submit" variant="primary" size="lg" class="w-full">
            Daftar
        </x-ui.button>

        <!-- Divider -->
        <div class="relative my-6">
            <div class="absolute inset-0 flex items-center">
                <div class="w-full border-t border-border-300 dark:border-border-700"></div>
            </div>
            <div class="relative flex justify-center text-sm">
                <span class="px-4 bg-surface-100 dark:bg-surface-900 text-text-600 dark:text-text-400">Atau daftar dengan</span>
            </div>
        </div>

        <!-- Social Login -->
        <div class="grid grid-cols-2 gap-4">
            <button type="button" class="flex items-center justify-center gap-2 px-4 py-3 border border-border-300 dark:border-border-700 rounded-lg hover:bg-surface2 dark:hover:bg-surface-950 transition-colors">
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                    <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                    <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
                    <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                </svg>
                <span class="text-sm font-medium">Google</span>
            </button>

            <button type="button" class="flex items-center justify-center gap-2 px-4 py-3 border border-border-300 dark:border-border-700 rounded-lg hover:bg-surface2 dark:hover:bg-surface-950 transition-colors">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M23.954 4.569c-.885.392-1.83.656-2.825.775 1.014-.611 1.794-1.574 2.163-2.723-.951.555-2.005.959-3.127 1.184-.896-.959-2.173-1.559-3.591-1.559-2.717 0-4.92 2.203-4.92 4.917 0 .39.045.765.127 1.124C7.691 8.094 4.066 6.13 1.64 3.161c-.427.722-.666 1.561-.666 2.475 0 1.71.87 3.213 2.188 4.096-.807-.026-1.566-.248-2.228-.616v.061c0 2.385 1.693 4.374 3.946 4.827-.413.111-.849.171-1.296.171-.314 0-.615-.03-.916-.086.631 1.953 2.445 3.377 4.604 3.417-1.68 1.319-3.809 2.105-6.102 2.105-.39 0-.779-.023-1.17-.067 2.189 1.394 4.768 2.209 7.557 2.209 9.054 0 13.999-7.496 13.999-13.986 0-.209 0-.42-.015-.63.961-.689 1.8-1.56 2.46-2.548l-.047-.02z"/>
                </svg>
                <span class="text-sm font-medium">Twitter</span>
            </button>
        </div>

        <!-- Login Link -->
        <p class="text-center text-sm text-text-600 dark:text-text-400">
            Sudah punya akun?
            <a href="{{ route('login') }}" class="text-primary hover:text-primary-700 font-medium">Masuk</a>
        </p>
    </form>
</div>
@endsection
