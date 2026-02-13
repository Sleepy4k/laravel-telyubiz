@props(['message' => ''])

<div {{ $attributes->merge(['class' => 'p-4 rounded-lg bg-success-50 dark:bg-success-950 border border-success-200 dark:border-success-800']) }}>
    <div class="flex items-start gap-3">
        <svg class="w-5 h-5 text-success-600 dark:text-success-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <div class="flex-1">
            <p class="text-sm font-medium text-success-800 dark:text-success-200">
                {{ $message ?: $slot }}
            </p>
        </div>
    </div>
</div>
