<x-layouts.records heading-title="Add book">
    <form action="{{ route('books.store') }}" method="POST">
        @csrf
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
                            name="accession-number"
                            type="text"
                            placeholder="Enter accession number"
                            class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            value="{{ old('accession-number') }}"
                            required
                            @error('accession-number') ring-red-500 focus:ring-red-500 @enderror
                        >
                        @error('accession-number')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="sm:col-span-1">
                    <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title <span class="text-red-600">*</span></label>
                    <div class="mt-2">
                        <input
                            id="title"
                            name="title"
                            type="text"
                            placeholder="Enter book title"
                            class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1
                            ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset
                             focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            value="{{ old('title') }}"
                            required
                            @error('title') ring-red-500 focus:ring-red-500 @enderror
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
                            name="author"
                            type="text"
                            placeholder="Enter primary author"
                            class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            value="{{ old('author') }}"
                            @error('author') ring-red-500 focus:ring-red-500 @enderror
                        >
                        @error('author')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="sm:col-span-1">
                    <label for="editor" class="block text-sm font-medium leading-6 text-gray-900">Editor</label>
                    <div class="mt-2">
                        <input
                            id="editor"
                            name="editor"
                            type="text"
                            placeholder="Enter editor name"
                            class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            value="{{ old('editor') }}"
                            @error('editor') ring-red-500 focus:ring-red-500 @enderror
                        >
                        @error('editor')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="sm:col-span-1">
                    <label for="publication-year" class="block text-sm font-medium leading-6 text-gray-900">Year of Publication <span class="text-red-600">*</span></label>
                    <div class="mt-2">
                        <input
                            id="publication-year"
                            name="publication-year"
                            type="number"
                            placeholder="Enter year of publication"
                            class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            value="{{ old('publication-year') }}"
                            required
                            @error('publication-year') ring-red-500 focus:ring-red-500 @enderror
                        >
                        @error('publication-year')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="sm:col-span-1">
                    <label for="publisher" class="block text-sm font-medium leading-6 text-gray-900">Publisher <span class="text-red-600">*</span></label>
                    <div class="mt-2">
                        <input
                            id="publisher"
                            name="publisher"
                            type="text"
                            placeholder="Enter publisher"
                            class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            value="{{ old('publisher') }}"
                            required
                            @error('publisher') ring-red-500 focus:ring-red-500 @enderror
                        >
                        @error('publisher')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="sm:col-span-1">
                    <label for="place-of-publication" class="block text-sm font-medium leading-6 text-gray-900">Place of Publication <span class="text-red-600">*</span></label>
                    <div class="mt-2">
                        <input
                            id="place-of-publication"
                            name="place-of-publication"
                            type="text"
                            placeholder="Enter place of publication"
                            class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            value="{{ old('place-of-publication') }}"
                            required
                            @error('place-of-publication') ring-red-500 focus:ring-red-500 @enderror
                        >
                        @error('place-of-publication')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="sm:col-span-1">
                    <label for="isbn" class="block text-sm font-medium leading-6 text-gray-900">ISBN <span class="text-red-600">*</span></label>
                    <div class="mt-2">
                        <input
                            id="isbn"
                            name="isbn"
                            type="text"
                            placeholder="Enter ISBN"
                            class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            value="{{ old('isbn') }}"
                            required
                            @error('isbn') ring-red-500 focus:ring-red-500 @enderror
                        >
                        @error('isbn')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="space-y-8 mt-8">
            <div>
                <h2 class="text-base font-semibold leading-7 text-gray-900">Additional Authors & Contributors</h2>
            </div>
            <div class="grid max-w-6xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-3">
                <div class="sm:col-span-2">
                    <label for="additional-authors" class="block text-sm font-medium leading-6 text-gray-900">Additional Authors</label>
                    <div class="mt-2">
                        <input
                            id="additional-authors"
                            name="additional-authors"
                            type="text"
                            placeholder="Enter additional authors (separate multiple authors with commas)"
                            class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            value="{{ old('additional-authors') }}"
                            @error('additional-authors') ring-red-500 focus:ring-red-500 @enderror
                        >
                        @error('additional-authors')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="sm:col-span-1">
                    <label for="series-title" class="block text-sm font-medium leading-6 text-gray-900">Series Title</label>
                    <div class="mt-2">
                        <input
                            id="series-title"
                            name="series-title"
                            type="text"
                            placeholder="Enter series title"
                            class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            value="{{ old('series-title') }}"
                            @error('series-title') ring-red-500 focus:ring-red-500 @enderror
                        >
                        @error('series-title')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add Book</button>
        </div>
    </form>
</x-layouts.records>
