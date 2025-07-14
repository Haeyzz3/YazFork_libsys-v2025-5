<div class="sm:col-span-1">
    <label class="block text-sm font-medium leading-6 text-gray-900">{{ $label }}</label>
    @foreach($items as $index => $item)
        <div class="mt-2 flex gap-x-2">
            <input
                wire:model.blur="{{ $wireModelPrefix }}.{{ $index }}"
                type="text"
                placeholder="{{ $placeholder }}"
                class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 @error($wireModelPrefix . '.' . $index) ring-red-500 focus:ring-red-500 @enderror"
            >
            <button wire:click="removeItem({{ $index }})" type="button" class="text-red-600">Remove</button>
        </div>
        @error($wireModelPrefix . '.' . $index)
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    @endforeach
    <button wire:click="addItem" type="button" class="mt-2 text-sm font-semibold text-indigo-600">Add {{ $type }}</button>
</div>
