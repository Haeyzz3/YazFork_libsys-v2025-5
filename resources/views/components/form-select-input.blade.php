@props([
    'id' => 'input-' . uniqid('', true),
    'options' => [],
    'wireModel' => null,
    'wrapperClass' => 'sm:col-span-1',
    'label' => 'My label',
    'required' => null,
    'class' => '',
    'name' => '',
])

<div x-data="{ show: false }" x-init="setTimeout(() => show = true, 50)" x-show="show" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform translate-y-4" x-transition:enter-end="opacity-100 transform translate-y-0" class="{{ $wrapperClass }}">
    <label for="{{ $id }}" class="block text-sm font-medium leading-6 text-gray-900">
        {{ $label }} @if($required)
            <span class="text-red-600">*</span>
        @endif
    </label>
    <div class="mt-2">
        <select
            wire:model.change="{{ $wireModel }}"
            id="{{ $id }}"
            @if($required) required @endif
            class="block w-full rounded-md text-sm border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300
                {{ $class }} @error($name) ring-red-500 focus:ring-red-500 @enderror"
        >
            <option value="" selected disabled>Select {{ $label }}</option>
            @foreach($options as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        @error($name)
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
</div>
