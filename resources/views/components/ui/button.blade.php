@props([
    'type' => 'button',
    'variant' => 'primary',
    'size' => 'md',
    'loading' => false,
    'disabled' => false,
])

@php
$variantClasses = [
    'primary' => 'bg-primary hover:bg-primary-700 text-white shadow-md hover:shadow-lg',
    'secondary' => 'bg-secondary-600 hover:bg-secondary-700 text-white shadow-md hover:shadow-lg',
    'outline' => 'border-2 border-primary text-primary hover:bg-primary hover:text-white',
    'outline-secondary' => 'border-2 border-border-300 dark:border-border-700 text-text-700 dark:text-text-300 hover:bg-surface-100 dark:hover:bg-surface-900',
    'danger' => 'bg-danger hover:bg-danger-700 text-white shadow-md hover:shadow-lg',
    'success' => 'bg-success hover:bg-success-700 text-white shadow-md hover:shadow-lg',
    'ghost' => 'text-text-700 dark:text-text-300 hover:bg-surface-100 dark:hover:bg-surface-900',
];

$sizeClasses = [
    'sm' => 'px-3 py-1.5 text-sm',
    'md' => 'px-6 py-2.5 text-base',
    'lg' => 'px-8 py-3 text-lg',
];

$classes = ($variantClasses[$variant] ?? $variantClasses['primary']) . ' ' . ($sizeClasses[$size] ?? $sizeClasses['md']);
@endphp

<button
    type="{{ $type }}"
    {{ $attributes->merge([
        'class' => 'rounded-lg transition-all duration-200 font-medium disabled:opacity-50 disabled:cursor-not-allowed inline-flex items-center justify-center gap-2 ' . $classes
    ]) }}
    @if($loading || $disabled) disabled @endif
>
    @if($loading)
        <svg class="animate-spin h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
    @endif
    {{ $slot }}
</button>
