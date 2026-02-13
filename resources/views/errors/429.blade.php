<x-layouts.error
    code="429"
    message="Too Many Requests"
    title="Rate Limit Exceeded"
    description="You've made too many requests in a short period. Please wait a moment and try again."
>
    <x-slot:icon>
        <div class="inline-block">
            <svg class="w-48 h-48 mx-auto text-warning-500 dark:text-warning-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z" />
            </svg>
        </div>
    </x-slot:icon>
</x-layouts.error>
