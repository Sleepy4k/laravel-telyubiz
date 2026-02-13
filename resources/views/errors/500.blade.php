<x-layouts.error
    code="500"
    message="Server Error"
    title="Internal Server Error"
    description="Oops! Something went wrong on our end. Our team has been notified and we're working to fix the issue."
>
    <x-slot:icon>
        <div class="inline-block">
            <svg class="w-48 h-48 mx-auto text-danger-500 dark:text-danger-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>
        </div>
    </x-slot:icon>
</x-layouts.error>
