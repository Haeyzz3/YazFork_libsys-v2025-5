@props([
    'id' => 'select-' . uniqid('', true),
    'name',
    'label',
    'options' => [],
    'required' => false,
    'disabled' => false,
    'class' => '',
    'wrapperClass' => 'sm:col-span-1',
    'attributes' => [],
])

<div x-data="{ show: false }" x-init="setTimeout(() => show = true, 50)" x-show="show" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform translate-y-4" x-transition:enter-end="opacity-100 transform translate-y-0" class="{{ $wrapperClass }}">
    <label for="{{ $id }}" class="block text-sm font-medium leading-6 text-gray-900">
        {{ $label }} @if($required)
            <span class="text-red-600">*</span>
        @endif
    </label>
    <div class="mt-2">
        <select
                id="{{ $id }}"
                name="{{ $name }}"
                class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 {{ $class }} @error($name) ring-red-500 focus:ring-red-500 @enderror"
                {{ $required ? 'required' : '' }}
                {{ $disabled ? 'disabled' : '' }}
            @foreach ($attributes as $key => $value)
                {{ $key }}="{{ $value }}"
            @endforeach
            wire:model.live="{{ $name }}"
            >
            <option value="" disabled {{ old($name) ? '' : 'selected' }}>Select {{ $label }}</option>
            @foreach ($options as $text)
                <option value="{{ $text }}" {{ old($name) == $text ? 'selected' : '' }}>{{ $text }}</option>
            @endforeach
        </select>
        @error($name)
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
</div>
