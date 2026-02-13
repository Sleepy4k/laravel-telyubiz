@props([
    'label' => '',
    'name' => '',
    'rows' => 4,
    'value' => '',
    'placeholder' => '',
    'required' => false,
    'error' => null,
])

<div class="w-full">
    @if($label)
        <label for="{{ $name }}" class="block text-sm font-medium text-text-700 dark:text-text-300 mb-2">
            {{ $label }}
            @if($required)
                <span class="text-danger">*</span>
            @endif
        </label>
    @endif

    <textarea
        name="{{ $name }}"
        id="{{ $name }}"
        rows="{{ $rows }}"
        placeholder="{{ $placeholder }}"
        @if($required) required @endif
        {{ $attributes->merge([
            'class' => 'w-full px-4 py-2.5 bg-surface2 dark:bg-surface-900 border rounded-lg text-text-900 dark:text-text-200 placeholder:text-text-400 dark:placeholder:text-text-500 focus:outline-none focus:ring-2 transition-colors resize-vertical ' .
                ($error ? 'border-danger-500 focus:ring-danger-500' : 'border-border-300 dark:border-border-700 focus:ring-primary focus:border-transparent')
        ]) }}
    >{{ $value }}</textarea>

    @if($error)
        <p class="mt-1.5 text-sm text-danger-600 dark:text-danger-400">{{ $error }}</p>
    @endif
</div>
