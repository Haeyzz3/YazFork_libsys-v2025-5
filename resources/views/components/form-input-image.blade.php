@props([
    'id' => 'input-' . uniqid('', true),
    'name',
    'label',
    'required' => false,
    'disabled' => false,
    'class' => '',
    'wrapperClass' => 'sm:col-span-1',
    'accept' => 'image/*',
    'multiple' => false,
    'showPreview' => true,
    'maxPreviewHeight' => '200px',
    'attributes' => [],
])

<div class="{{ $wrapperClass }}">
    <label for="{{ $id }}" class="block text-sm font-medium leading-6 text-gray-900">
        {{ $label }} @if($required)
            <span class="text-red-600">*</span>
        @endif
    </label>
    <div class="mt-2">
        <input
            id="{{ $id }}"
            name="{{ $name }}"
            type="file"
            accept="{{ $accept }}"
            class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 file:mr-4 file:py-1 file:px-2 file:rounded-md file:border-0 file:text-sm file:font-medium file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 {{ $class }} @error($name) ring-red-500 focus:ring-red-500 @enderror"
        {{ $required ? 'required' : '' }}
        {{ $disabled ? 'disabled' : '' }}
        {{ $multiple ? 'multiple' : '' }}
        @foreach ($attributes as $key => $value)
            {{ $key }}="{{ $value }}"
        @endforeach
        wire:model.blur="{{ $name }}"
        >
        {{ $slot }}
        @error($name)
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror

        @if($showPreview)
            <!-- Livewire Preview -->
            @if(isset($this->{$name}) && $this->{$name})
                <div class="mt-3">
                    <div class="flex items-start space-x-3">
                        @if(method_exists($this->{$name}, 'temporaryUrl'))
                            <img src="{{ $this->{$name}->temporaryUrl() }}" alt="Preview" class="rounded-md shadow-sm border border-gray-300" style="max-height: {{ $maxPreviewHeight }}; max-width: 100%;">
                        @endif
                        <div class="flex-1 min-w-0">
                            <p class="text-sm text-gray-600 truncate">{{ $this->{$name}->getClientOriginalName() }}</p>
                            <p class="text-xs text-gray-500 mt-1">{{ $this->formatFileSize($this->{$name}->getSize()) }}</p>
                            <button type="button" wire:click="$set('{{ $name }}', null)" class="text-xs text-red-600 hover:text-red-800 mt-1">Remove</button>
                        </div>
                    </div>
                </div>
            @endif
        @endif
    </div>
</div>

@if($showPreview)
    <script>
        // Helper function that can be used in Livewire component
        window.formatFileSize = function(bytes) {
            if (bytes === 0) return '0 Bytes';
            const k = 1024;
            const sizes = ['Bytes', 'KB', 'MB', 'GB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
        };
    </script>
@endif
