@props([
    'id' => 'select-' . uniqid('', true),
    'wrapperClass' => 'sm:col-span-1',
    'options' => [],
    'wireModel' => null,
    'name' => 'name_here',
    'label' => 'Your label here',
])

<div
    x-data="{ show: false }"
    x-init="setTimeout(() => show = true, 50)"
    x-show="show"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 transform translate-y-4"
    x-transition:enter-end="opacity-100 transform translate-y-0"
    {{ $attributes->merge(['class' => $wrapperClass]) }}
>
    <label for="{{ $id }}" class="block text-sm font-medium leading-6 text-gray-900">
        {{ $label }}
    </label>
    <div class="mt-2">
        <select
            wire:model.live="{{ $wireModel }}"
            id="{{ $id }}"
            class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 @error('ddc_class_id') ring-red-500 focus:ring-red-500 @enderror"
        >
            <option value="" {{ old($wireModel) || $wireModel ? '' : 'selected' }} disabled>Select {{ $label }}</option>
            @foreach($options as $value => $label)
                <option value="{{ $value }}" {{ old($wireModel, $wireModel) === $value ? 'selected' : '' }}>{{ $label }}</option>
            @endforeach
        </select>
        @error('ddc_class_id')
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
</div>
