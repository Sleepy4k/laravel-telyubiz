@props([
    'label' => '',
    'name' => '',
    'checked' => false,
    'value' => '',
])

<div class="flex items-start">
    <div class="flex items-center h-5">
        <input
            type="checkbox"
            name="{{ $name }}"
            id="{{ $name }}"
            value="{{ $value }}"
            @if($checked) checked @endif
            {{ $attributes->merge([
                'class' => 'w-4 h-4 text-primary bg-surface2 dark:bg-surface-900 border-border-300 dark:border-border-700 rounded focus:ring-primary focus:ring-2 transition-colors cursor-pointer'
            ]) }}
        >
    </div>
    @if($label || $slot->isNotEmpty())
        <div class="ml-3 text-sm">
            <label for="{{ $name }}" class="font-medium text-text-700 dark:text-text-300 cursor-pointer">
                {{ $label ?? $slot }}
            </label>
        </div>
    @endif
</div>
