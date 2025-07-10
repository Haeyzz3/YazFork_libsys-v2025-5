@props([
    'id' => 'additional-authors-' . uniqid('', true),
    'name' => 'additionalAuthors',
    'label' => 'Additional Authors',
    'placeholder' => 'Enter additional author',
    'authors' => [],
    'wrapperClass' => 'sm:col-span-1',
    'addButtonText' => 'Add Author',
    'removeButtonText' => 'Remove',
    'addButtonClass' => 'mt-2 text-sm font-semibold text-indigo-600',
    'removeButtonClass' => 'text-red-600',
    'inputClass' => '',
    'attributes' => [],
])

<div class="{{ $wrapperClass }}">
    <label for="{{ $id }}" class="block text-sm font-medium leading-6 text-gray-900">
        {{ $label }}
    </label>
    @foreach($authors as $index => $author)
        <div class="mt-2 flex gap-x-2">
            <input
                id="{{ $id }}-{{ $index }}"
                wire:model.blur="{{ $name }}.{{ $index }}"
                type="text"
                placeholder="{{ $placeholder }}"
                class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 {{ $inputClass }} @error($name . '.' . $index) ring-red-500 focus:ring-red-500 @enderror"
                value="{{ e(old($name . '.' . $index, $author)) }}"
            @foreach ($attributes as $key => $value)
                {{ $key }}="{{ $value }}"
            @endforeach
            >
            <button wire:click="removeAuthorField({{ $index }})" type="button" class="{{ $removeButtonClass }}">{{ $removeButtonText }}</button>
        </div>
        @error($name . '.' . $index)
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    @endforeach
    <button wire:click="addAuthorField" type="button" class="{{ $addButtonClass }}">{{ $addButtonText }}</button>
</div>
