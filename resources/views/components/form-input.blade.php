@props([
    'id' => 'input-' . uniqid('', true),
    'name',
    'label',
    'placeholder' => null,
    'value' => '',
    'type' => 'text',
    'required' => false,
    'disabled' => false,
    'readonly' => false,
    'class' => '',
    'wrapperClass' => 'sm:col-span-1',
    'attributes' => [],
    'wireModel' => null,
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
            type="{{ $type }}"
            @if($placeholder) placeholder="{{ $placeholder }}" @endif
            class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 {{ $class }} @error($name) ring-red-500 focus:ring-red-500 @enderror"
            value="{{ e(old($name, $value)) }}"
        {{ $required ? 'required' : '' }}
        {{ $disabled ? 'disabled' : '' }}
        {{ $readonly ? 'readonly' : '' }}
        @foreach ($attributes as $key => $value)
            {{ $key }}="{{ $value }}"
        @endforeach
        @if($wireModel) wire:model.blur="{{ $wireModel }}" @endif
        >
        {{ $slot }}
        @error($name)
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
</div>
