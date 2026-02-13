@props([
    'label' => '',
    'name' => '',
    'accept' => 'image/*',
    'multiple' => false,
    'preview' => true,
    'error' => null,
])

<div class="w-full" x-data="{ files: [], previews: [] }">
    @if($label)
        <label for="{{ $name }}" class="block text-sm font-medium text-text-700 dark:text-text-300 mb-2">
            {{ $label }}
        </label>
    @endif

    <div class="relative">
        <input
            type="file"
            name="{{ $name }}"
            id="{{ $name }}"
            accept="{{ $accept }}"
            @if($multiple) multiple @endif
            @change="handleFileSelect($event)"
            class="hidden"
        >

        <label
            for="{{ $name }}"
            class="flex flex-col items-center justify-center w-full h-40 px-4 py-6 border-2 border-dashed rounded-lg cursor-pointer transition-colors {{ $error ? 'border-danger-500 bg-danger-50 dark:bg-danger-950' : 'border-border-300 dark:border-border-700 bg-surface-100 dark:bg-surface-900 hover:bg-surface-200 dark:hover:bg-surface-800' }}"
        >
            <svg class="w-10 h-10 text-text-400 dark:text-text-500 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
            </svg>
            <p class="text-sm text-text-600 dark:text-text-400 mb-1">
                <span class="font-semibold">Klik untuk upload</span> atau drag and drop
            </p>
            <p class="text-xs text-text-500 dark:text-text-500">
                PNG, JPG, GIF up to 10MB
            </p>
        </label>
    </div>

    <!-- File Preview -->
    @if($preview)
        <div x-show="previews.length > 0" class="mt-4 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
            <template x-for="(preview, index) in previews" :key="index">
                <div class="relative group">
                    <img
                        :src="preview"
                        class="w-full h-32 object-cover rounded-lg border-2 border-border-300 dark:border-border-700"
                    >
                    <button
                        type="button"
                        @click="removeFile(index)"
                        class="absolute top-2 right-2 p-1 bg-danger text-white rounded-full opacity-0 group-hover:opacity-100 transition-opacity"
                    >
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </template>
        </div>
    @endif

    @if($error)
        <p class="mt-1.5 text-sm text-danger-600 dark:text-danger-400">{{ $error }}</p>
    @endif
</div>

<script>
function handleFileSelect(event) {
    const files = Array.from(event.target.files);
    this.files = files;

    // Generate previews for images
    this.previews = [];
    files.forEach(file => {
        if (file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = (e) => {
                this.previews.push(e.target.result);
            };
            reader.readAsDataURL(file);
        }
    });
}

function removeFile(index) {
    this.files.splice(index, 1);
    this.previews.splice(index, 1);

    // Clear input if no files remain
    if (this.files.length === 0) {
        document.getElementById('{{ $name }}').value = '';
    }
}
</script>
