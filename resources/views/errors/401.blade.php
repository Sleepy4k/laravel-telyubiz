<x-layouts.error
    code="401"
    message="Unauthorized"
    title="Authentication Required"
    description="You need to be authenticated to access this resource. Please log in and try again."
>
    <x-slot:icon>
        <div class="inline-block">
            <svg class="w-48 h-48 mx-auto text-primary-500 dark:text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
        </div>
    </x-slot:icon>

    <x-slot:action>
        <a
            href="{{ route('login') }}"
            class="px-6 py-3 bg-secondary-600 text-white rounded-lg hover:bg-secondary-700 transition-colors inline-flex items-center gap-2"
        >
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
            </svg>
            Log In
        </a>
    </x-slot:action>
</x-layouts.error>
