<div>
    <form wire:submit.prevent="submit">
        <div class="space-y-8 mt-8">
            <div>
                <h2 class="text-base font-semibold leading-7 text-gray-900">Basic Information</h2>
            </div>
            <div class="grid max-w-6xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-3">
                <div class="sm:col-span-1">
                    <label for="accession-number" class="block text-sm font-medium leading-6 text-gray-900">Accession Number <span class="text-red-600">*</span></label>
                    <div class="mt-2">
                        <input
                            id="accession-number"
                            wire:model.blur="accessionNumber"
                            type="text"
                            placeholder="Enter accession number"
                            class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            class="@error('accessionNumber') ring-red-500 focus:ring-red-500 @enderror"
                            required
                        >
                        @error('accessionNumber')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="sm:col-span-1">
                    <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title <span class="text-red-600">*</span></label>
                    <div class="mt-2">
                        <input
                            id="title"
                            wire:model.blur="title"
                            type="text"
                            placeholder="Enter book title"
                            class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            class="@error('title') ring-red-500 focus:ring-red-500 @enderror"
                            required
                        >
                        @error('title')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="sm:col-span-1">
                    <label for="author" class="block text-sm font-medium leading-6 text-gray-900">Author</label>
                    <div class="mt-2">
                        <input
                            id="author"
                            wire:model.blur="author"
                            type="text"
                            placeholder="Enter primary author"
                            class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            class="@error('author') ring-red-500 focus:ring-red-500 @enderror"
                        >
                        @error('author')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <!-- Other fields (editor, publication-year, etc.) follow the same pattern -->
                <!-- Example for dynamic additional authors -->
                <div class="sm:col-span-1">
                    <label class="block text-sm font-medium leading-6 text-gray-900">Additional Authors</label>
                    @foreach($additionalAuthors as $index => $author)
                        <div class="mt-2 flex gap-x-2">
                            <input
                                wire:model.blur="additionalAuthors.{{ $index }}"
                                type="text"
                                placeholder="Enter additional author"
                                class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                class="@error('additionalAuthors.' . $index) ring-red-500 focus:ring-red-500 @enderror"
                            >
                            <button wire:click="removeAuthorField({{ $index }})" type="button" class="text-red-600">Remove</button>
                        </div>
                        @error('additionalAuthors.' . $index)
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    @endforeach
                    <button wire:click="addAuthorField" type="button" class="mt-2 text-sm font-semibold text-indigo-600">Add Author</button>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                <span wire:loading wire:target="submit">Saving...</span>
                <span wire:loading.remove wire:target="submit">Add Book</span>
            </button>
        </div>
    </form>
</div>
