@props([
    'label' => '',
    'name' => '',
    'options' => [],
    'selected' => '',
    'placeholder' => 'Pilih opsi...',
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

    <select
        name="{{ $name }}"
        id="{{ $name }}"
        @if($required) required @endif
        {{ $attributes->merge([
            'class' => 'w-full px-4 py-2.5 bg-surface2 dark:bg-surface-900 border rounded-lg text-text-900 dark:text-text-200 focus:outline-none focus:ring-2 transition-colors appearance-none bg-no-repeat bg-right pr-10 ' .
                ($error ? 'border-danger-500 focus:ring-danger-500' : 'border-border-300 dark:border-border-700 focus:ring-primary focus:border-transparent')
        ]) }}
        style="background-image: url(&quot;data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e&quot;); background-position: right 0.5rem center; background-size: 1.5em 1.5em;"
    >
        @if($placeholder)
            <option value="">{{ $placeholder }}</option>
        @endif

        @foreach($options as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }}>
                {{ $label }}
            </option>
        @endforeach
    </select>

    @if($error)
        <p class="mt-1.5 text-sm text-danger-600 dark:text-danger-400">{{ $error }}</p>
    @endif
</div>
