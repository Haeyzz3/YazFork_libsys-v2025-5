<x-layouts.app :title="__('Manage Patrons')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">

        <div class="px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-base font-semibold leading-6 text-gray-900">Add book</h1>
                </div>
            </div>

            <div>
                <div class="sm:hidden">
                    <label for="tabs" class="sr-only">Select a tab</label>
                    <!-- Use an "onChange" listener to redirect the user to the selected tab URL. -->
                    <select id="tabs" name="tabs" class="block w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                        <option>My Account</option>
                        <option>Company</option>
                        <option selected>Team Members</option>
                        <option>Billing</option>
                    </select>
                </div>

                <div class="hidden sm:block">
                    <div class="border-b border-gray-200">
                        <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                            {{-- Add Book Tab --}}
                            <a href="{{ route('books.index') }}"
                               class="group inline-flex items-center border-b-2 {{ request()->routeIs('books.index') ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} px-1 py-4 text-sm font-medium">
                                <svg class="-ml-0.5 mr-2 h-5 w-5 {{ request()->routeIs('books.create') ? 'text-indigo-500' : 'text-gray-400 group-hover:text-gray-500' }}" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path d="M10 8a3 3 0 100-6 3 3 0 000 6zM3.465 14.493a1.23 1.23 0 00.41 1.412A9.957 9.957 0 0010 18c2.31 0 4.438-.784 6.131-2.1.43-.333.604-.903.408-1.41a7.002 7.002 0 00-13.074.003z" />
                                </svg>
                                <span>Books</span>
                            </a>

                            <a href="{{ route('e-collections.index') }}"
                               class="group inline-flex items-center border-b-2 {{ request()->routeIs('e-collections.index') ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} px-1 py-4 text-sm font-medium">
                                <svg class="-ml-0.5 mr-2 h-5 w-5 {{ request()->routeIs('books.create') ? 'text-indigo-500' : 'text-gray-400 group-hover:text-gray-500' }}" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path d="M10 8a3 3 0 100-6 3 3 0 000 6zM3.465 14.493a1.23 1.23 0 00.41 1.412A9.957 9.957 0 0010 18c2.31 0 4.438-.784 6.131-2.1.43-.333.604-.903.408-1.41a7.002 7.002 0 00-13.074.003z" />
                                </svg>
                                <span>E-collections</span>
                            </a>

                        </nav>
                    </div>
                </div>
            </div>

            <form action="#" method="POST">
                @csrf
                <div class="space-y-8 mt-8">

                    <div>
                        <h2 class="text-base font-semibold leading-7 text-gray-900">Basic Information</h2>
                    </div>

                    <div class="grid max-w-4xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-3">
                        <div class="sm:col-span-1">
                            <label for="accession-number" class="block text-sm font-medium leading-6 text-gray-900">Accession Number</label>
                            <div class="mt-2">
                                <input
                                    id="accession-number"
                                    name="accession-number"
                                    type="text"
                                    placeholder="Enter accession number"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
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
                            <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                            <div class="mt-2">
                                <input
                                    id="title"
                                    name="title"
                                    type="text"
                                    placeholder="Enter book title"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
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
                            <label for="primary-author" class="block text-sm font-medium leading-6 text-gray-900">Primary Author</label>
                            <div class="mt-2">
                                <input
                                    id="primary-author"
                                    name="primary-author"
                                    type="text"
                                    placeholder="Enter primary author"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    value="{{ old('primary-author') }}"
                                    required
                                    @error('primary-author') ring-red-500 focus:ring-red-500 @enderror
                                >
                                @error('primary-author')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="sm:col-span-1">
                            <label for="publication-year" class="block text-sm font-medium leading-6 text-gray-900">Publication Year</label>
                            <div class="mt-2">
                                <input
                                    id="publication-year"
                                    name="publication-year"
                                    type="number"
                                    placeholder="Enter publication year"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
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
                            <label for="publisher" class="block text-sm font-medium leading-6 text-gray-900">Publisher</label>
                            <div class="mt-2">
                                <input
                                    id="publisher"
                                    name="publisher"
                                    type="text"
                                    placeholder="Enter publisher"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
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
                            <label for="place-of-publication" class="block text-sm font-medium leading-6 text-gray-900">Place of Publication</label>
                            <div class="mt-2">
                                <input
                                    id="place-of-publication"
                                    name="place-of-publication"
                                    type="text"
                                    placeholder="Enter place of publication"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
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
                            <label for="isbn-issn" class="block text-sm font-medium leading-6 text-gray-900">ISBN/ISSN</label>
                            <div class="mt-2">
                                <input
                                    id="isbn-issn"
                                    name="isbn-issn"
                                    type="text"
                                    placeholder="Enter ISBN/ISSN"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    value="{{ old('isbn-issn') }}"
                                    required
                                    @error('isbn-issn') ring-red-500 focus:ring-red-500 @enderror
                                >
                                @error('isbn-issn')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="sm:col-span-1">
                            <label for="language" class="block text-sm font-medium leading-6 text-gray-900">Language</label>
                            <div class="mt-2">
                                <select
                                    id="language"
                                    name="language"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    required
                                    @error('language') ring-red-500 focus:ring-red-500 @enderror
                                >
                                    <option value="" disabled selected>Select a language</option>
                                    <option value="English" {{ old('language') == 'English' ? 'selected' : '' }}>English</option>
                                    <option value="Spanish" {{ old('language') == 'Spanish' ? 'selected' : '' }}>Spanish</option>
                                    <option value="French" {{ old('language') == 'French' ? 'selected' : '' }}>French</option>
                                    <option value="German" {{ old('language') == 'German' ? 'selected' : '' }}>German</option>
                                    <option value="Chinese" {{ old('language') == 'Chinese' ? 'selected' : '' }}>Chinese</option>
                                    <option value="Other" {{ old('language') == 'Other' ? 'selected' : '' }}>Other</option>
                                </select>
                                @error('language')
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

        </div>
    </div>
</x-layouts.app>
