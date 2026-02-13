<x-layouts.error
    code="419"
    message="Page Expired"
    title="Session Expired"
    description="Your session has expired due to inactivity. Please refresh the page and try again."
>
    <x-slot:icon>
        <div class="inline-block">
            <svg class="w-48 h-48 mx-auto text-secondary-500 dark:text-secondary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>
    </x-slot:icon>

    <x-slot:action>
        <button
            onclick="window.location.reload()"
            class="px-6 py-3 bg-secondary-600 text-white rounded-lg hover:bg-secondary-700 transition-colors inline-flex items-center gap-2"
        >
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
            </svg>
            Refresh Page
        </button>
    </x-slot:action>
</x-layouts.error>
