<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $message }} - {{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/css/layouts/error.css', 'resources/js/app.js', 'resources/js/layouts/error.js', 'resources/js/theme.js'])
</head>

<body class="bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 antialiased">
    <div class="min-h-screen flex items-center justify-center px-4 py-12">
        <div class="max-w-2xl w-full">
            <div class="text-center">
                <div class="mb-8">
                    {{ $icon ?? '' }}
                </div>

                <div class="mb-4">
                    <h1
                        class="text-8xl md:text-9xl font-bold bg-gradient-to-r from-primary-600 to-danger-600 bg-clip-text text-transparent">
                        {{ $code }}
                    </h1>
                </div>

                <div class="mb-8">
                    <h2 class="text-2xl md:text-3xl font-semibold mb-3">
                        {{ $title ?? $message }}
                    </h2>
                    <p class="text-gray-600 dark:text-gray-400 text-lg">
                        {{ $description ?? 'Something went wrong. Please try again later.' }}
                    </p>
                </div>

                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                    <button data-href="{{ url('/') }}" id="home-button"
                        class="px-6 py-3 bg-primary text-white rounded-lg hover:bg-primary-700 transition-colors inline-flex items-center gap-2 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        Back to Home
                    </button>

                    @if (isset($action) && $action)
                        {{ $action }}
                    @else
                        <button id="go-back-button"
                            class="px-6 py-3 bg-secondary-600 text-white rounded-lg hover:bg-secondary-700 transition-colors inline-flex items-center gap-2 cursor-pointer">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            Go Back
                        </button>
                    @endif
                </div>

                @if (isset($slot) && $slot)
                    <div class="mt-12">
                        {{ $slot }}
                    </div>
                @endif
            </div>

            <div class="absolute inset-0 -z-10 overflow-hidden pointer-events-none">
                <div
                    class="absolute top-0 left-1/4 w-96 h-96 bg-primary-200 dark:bg-primary-900 rounded-full mix-blend-multiply dark:mix-blend-soft-light filter blur-3xl opacity-20 animate-blob">
                </div>
                <div
                    class="absolute top-0 right-1/4 w-96 h-96 bg-danger-200 dark:bg-danger-900 rounded-full mix-blend-multiply dark:mix-blend-soft-light filter blur-3xl opacity-20 animate-blob animation-delay-2000">
                </div>
                <div
                    class="absolute bottom-0 left-1/3 w-96 h-96 bg-secondary-200 dark:bg-secondary-900 rounded-full mix-blend-multiply dark:mix-blend-soft-light filter blur-3xl opacity-20 animate-blob animation-delay-4000">
                </div>
            </div>
        </div>
    </div>
</body>

</html>
