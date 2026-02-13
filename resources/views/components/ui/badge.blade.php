@props([
    'variant' => 'primary',
    'size' => 'md',
])

@php
$variantClasses = [
    'primary' => 'bg-primary-100 dark:bg-primary-900 text-primary-800 dark:text-primary-200',
    'secondary' => 'bg-secondary-100 dark:bg-secondary-900 text-secondary-800 dark:text-secondary-200',
    'success' => 'bg-success-100 dark:bg-success-900 text-success-800 dark:text-success-200',
    'warning' => 'bg-warning-100 dark:bg-warning-900 text-warning-800 dark:text-warning-200',
    'danger' => 'bg-danger-100 dark:bg-danger-900 text-danger-800 dark:text-danger-200',
    'info' => 'bg-surface-200 dark:bg-surface-800 text-text-800 dark:text-text-200',
];

$sizeClasses = [
    'sm' => 'px-2 py-0.5 text-xs',
    'md' => 'px-3 py-1 text-sm',
    'lg' => 'px-4 py-1.5 text-base',
];

$classes = ($variantClasses[$variant] ?? $variantClasses['primary']) . ' ' . ($sizeClasses[$size] ?? $sizeClasses['md']);
@endphp

<span {{ $attributes->merge(['class' => 'inline-flex items-center gap-1 font-medium rounded-full ' . $classes]) }}>
    {{ $slot }}
</span>
