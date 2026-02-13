@props(['message' => ''])

<div {{ $attributes->merge(['class' => 'p-4 rounded-lg bg-danger-50 dark:bg-danger-950 border border-danger-200 dark:border-danger-800']) }}>
    <div class="flex items-start gap-3">
        <svg class="w-5 h-5 text-danger-600 dark:text-danger-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <div class="flex-1">
            <p class="text-sm font-medium text-danger-800 dark:text-danger-200">
                {{ $message ?: $slot }}
            </p>
        </div>
    </div>
</div>
