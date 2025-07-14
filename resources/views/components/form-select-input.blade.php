<!-- resources/views/components/form-select-input.blade.php -->

@props([
    'name' => '',
    'label' => '',
    'options' => [],
    'wireModel' => null,
    'required' => false,
])

<div class="mb-4">
    <label for="{{ $name }}" class="block text-sm font-medium text-gray-700 mb-1">
        {{ $label }}
        @if($required)
            <span class="text-red-500">*</span>
        @endif
    </label>

    <select
        {{ $attributes->merge([
            'class' => 'block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50' .
            ($errors->has($name) ? ' border-red-500' : '')
        ]) }}
        id="{{ $name }}"
        name="{{ $name }}"
        @if($wireModel) wire:model="{{ $wireModel }}" @endif
        @if($required) required @endif
    >
        <option value="" disabled>Select {{ $label }}</option>
        @foreach($options as $value => $text)
            <option value="{{ $value }}">{{ $text }}</option>
        @endforeach
    </select>

    @error($name)
    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>
