<x-layouts.records heading-title="Add Electronic Records">
    <form action="{{ route('digital.store') }}" method="POST">
        @csrf
        <div class="space-y-8 mt-8">
            <div>
                <h2 class="text-base font-semibold leading-7 text-gray-900">Basic Information</h2>
            </div>
            <div class="grid max-w-6xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-3">
                <div class="sm:col-span-1">
                    <label for="accession-number" class="block text-sm font-medium leading-6 text-gray-900">Accession Number</label>
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
                    <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                    <div class="mt-2">
                        <input
                            id="title"
                            name="title"
                            type="text"
                            placeholder="Enter book title"
                            class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
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
                            class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
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
                    <label for="publication-copyright-year" class="block text-sm font-medium leading-6 text-gray-900">Publication/Copyright Year</label>
                    <div class="mt-2">
                        <input
                            id="publication-copyright-year"
                            name="publication-copyright-year"
                            type="number"
                            placeholder="Enter publication year"
                            class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            value="{{ old('publication-copyright-year') }}"
                            required
                            @error('publication-copyright-year') ring-red-500 focus:ring-red-500 @enderror
                        >
                        @error('publication-copyright-year')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="sm:col-span-1">
                    <label for="publisher-producer" class="block text-sm font-medium leading-6 text-gray-900">Publisher/Producer</label>
                    <div class="mt-2">
                        <input
                            id="publisher-producer"
                            name="publisher-producer"
                            type="text"
                            placeholder="Enter publisher/producer"
                            class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            value="{{ old('publisher-producer') }}"
                            required
                            @error('publisher-producer') ring-red-500 focus:ring-red-500 @enderror
                        >
                        @error('publisher-producer')
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
                            class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
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

        <div class="space-y-8 mt-8">
            <div>
                <h2 class="text-base font-semibold leading-7 text-gray-900">Additional Contributors</h2>
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
                    <label for="editor-producer" class="block text-sm font-medium leading-6 text-gray-900">Editor/Producer</label>
                    <div class="mt-2">
                        <input
                            id="editor-producer"
                            name="editor-producer"
                            type="text"
                            placeholder="Enter editor name"
                            class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            value="{{ old('editor-producer') }}"
                            @error('editor-producer') ring-red-500 focus:ring-red-500 @enderror
                        >
                        @error('editor-producer')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="space-y-8 mt-8">
            <div>
                <h2 class="text-base font-semibold leading-7 text-gray-900">Classification & Access</h2>
            </div>
            <div class="grid max-w-6xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-2">

                <div class="sm:col-span-1">
                    <label for="ddc-classification" class="block text-sm font-medium leading-6 text-gray-900">DDC Classification <span class="text-red-500">*</span></label>
                    <div class="mt-2">
                        <select
                            id="ddc-classification"
                            name="ddc-classification"
                            class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm
                   ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600
                   sm:text-sm sm:leading-6"
                            onchange="updateCallNumber()"
                            required
                        >
                            <option value="" disabled selected>Select DDC classification</option>
                            <option value="Applied Science" {{ old('ddc-classification') == 'Applied Science' ? 'selected' : '' }}>Applied Science</option>
                            <option value="Arts" {{ old('ddc-classification') == 'Arts' ? 'selected' : '' }}>Arts</option>
                            <option value="Fiction" {{ old('ddc-classification') == 'Fiction' ? 'selected' : '' }}>Fiction</option>
                            <option value="General Works" {{ old('ddc-classification') == 'General Works' ? 'selected' : '' }}>General Works</option>
                            <option value="History" {{ old('ddc-classification') == 'History' ? 'selected' : '' }}>History</option>
                            <option value="Language" {{ old('ddc-classification') == 'Language' ? 'selected' : '' }}>Language</option>
                            <option value="Literature" {{ old('ddc-classification') == 'Literature' ? 'selected' : '' }}>Literature</option>
                            <option value="Philosophy" {{ old('ddc-classification') == 'Philosophy' ? 'selected' : '' }}>Philosophy</option>
                            <option value="Pure Science" {{ old('ddc-classification') == 'Pure Science' ? 'selected' : '' }}>Pure Science</option>
                            <option value="Religion" {{ old('ddc-classification') == 'Religion' ? 'selected' : '' }}>Religion</option>
                            <option value="Social Science" {{ old('ddc-classification') == 'Social Science' ? 'selected' : '' }}>Social Science</option>
                        </select>
                        @error('ddc-classification')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="sm:col-span-1">
                    <label for="call-number" class="block text-sm font-medium leading-6 text-gray-900">Call Number</label>
                    <div class="mt-2">
                        <input
                            disabled
                            id="call-number"
                            name="call-number"
                            type="text"
                            placeholder="Auto-suggested based on DDC"
                            class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm
                   ring-1 ring-inset ring-gray-300 placeholder:text-gray-400
                   focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            value="{{ old('call-number') }}"
                            readonly
                        >
                        @error('call-number')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="sm:col-span-1">
                    <label for="collection-type" class="block text-sm font-medium leading-6 text-gray-900">Collection Type</label>
                    <div class="mt-2">
                        <select
                            id="collection-type"
                            name="collection-type"
                            class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm
                   ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600
                   sm:text-sm sm:leading-6"
                        >
                            <option value="" disabled selected>Select collection type</option>
                            <option value="E-books" {{ old('collection-type') == 'E-books' ? 'selected' : '' }}>E-books</option>
                            <option value="Audiobooks" {{ old('collection-type') == 'Audiobooks' ? 'selected' : '' }}>Audiobooks</option>
                            <option value="Databases" {{ old('collection-type') == 'Databases' ? 'selected' : '' }}>Databases</option>
                            <option value="Digital Archives" {{ old('collection-type') == 'Digital Archives' ? 'selected' : '' }}>Digital Archives</option>
                            <option value="Multimedia" {{ old('collection-type') == 'Multimedia' ? 'selected' : '' }}>Multimedia</option>
                        </select>
                        @error('collection-type')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Access Method (dropdown: Online, CD/DVD, Local Server, Cloud Storage) --}}
                <div class="sm:col-span-1">
                    <label for="access-method" class="block text-sm font-medium leading-6 text-gray-900">Access Method</label>
                        <div class="mt-2">
                            <select
                                id="access-method"
                                name="access-method"
                                class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                >
                                <option value="" disabled selected>Select access method</option>
                                <option value="Online" {{ old('access-method') == 'Online' ? 'selected' : '' }}>Online</option>
                                <option value="Physical Media" {{ old('access-method') == 'Physical Media' ? 'selected' : '' }}>Physical Media</option>
                                <option value="Local Server" {{ old('access-method') == 'Local Server' ? 'selected' : '' }}>Local Server</option>
                                <option value="Cloud Storage" {{ old('access-method') == 'Cloud Storage' ? 'selected' : '' }}>Cloud Storage</option>
                            </select>
                            @error('access-method')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                </div>

            </div>
        </div>


        <div class="space-y-8 mt-8">
            <div>
                <h2 class="text-base font-semibold leading-7 text-gray-900">Technical Specifications</h2>
            </div>
            <div class="grid max-w-6xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-3">

                <div class="sm:col-span-1">
                    <label for="file_format" class="block text-sm font-medium leading-6 text-gray-900">File Format</label>
                    <div class="mt-2">
                        <select
                            id="file_format"
                            name="file_format"
                            class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm
                                ring-1 ring-inset ring-gray-300 placeholder:text-gray-400
                                focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        >
                            <option value="">Select file format</option>
                            <option value="PDF" {{ old('file_format') == 'PDF' ? 'selected' : '' }}>PDF</option>
                            <option value="EPUB" {{ old('file_format') == 'EPUB' ? 'selected' : '' }}>EPUB</option>
                            <option value="MP3" {{ old('file_format') == 'MP3' ? 'selected' : '' }}>MP3</option>
                            <option value="MP4" {{ old('file_format') == 'MP4' ? 'selected' : '' }}>MP4</option>
                            <option value="Other" {{ old('file_format') == 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                        @error('file_format')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="sm:col-span-1">
                    <label for="duration" class="block text-sm font-medium leading-6 text-gray-900">Duration</label>
                    <div class="mt-2">
                        <input
                            id="duration"
                            name="duration"
                            type="text"
                            placeholder="Enter duration (e.g., 1h 30m)"
                            class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm
                   ring-1 ring-inset ring-gray-300 placeholder:text-gray-400
                   focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            value="{{ old('duration') }}"
                        >
                        @error('duration')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="sm:col-span-1">
                    <label for="resource-cover-thumbnail" class="block text-sm font-medium leading-6 text-gray-900">Resource Cover/Thumbnail</label>
                    <div class="mt-2">
                        <input
                            id="resource-cover-thumbnail"
                            name="resource-cover-thumbnail"
                            type="file"
                            accept=".jpg,.png"
                            class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm
                   ring-1 ring-inset ring-gray-300 placeholder:text-gray-400
                   focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        >
                        @error('resource-cover-thumbnail')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="sm:col-span-1">
                    <label for="system_requirements" class="block text-sm font-medium leading-6 text-gray-900">System Requirements</label>
                    <div class="mt-2">
                    <textarea
                        id="system_requirements"
                        name="system_requirements"
                        placeholder="Enter system requirements"
                        class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm
                               ring-1 ring-inset ring-gray-300 placeholder:text-gray-400
                               focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    >{{ old('system_requirements') }}</textarea>
                        @error('system_requirements')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>


            </div>
        </div>

        <div class="space-y-8 mt-8">
            <div>
                <h2 class="text-base font-semibold leading-7 text-gray-900">Administrative Information</h2>
            </div>
            <div class="grid max-w-6xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-3">

                <div class="sm:col-span-1">
                    <label for="date-acquired" class="block text-sm font-medium leading-6 text-gray-900">Date Acquired</label>
                    <div class="mt-2">
                        <input
                            id="date-acquired"
                            name="date-acquired"
                            type="date"
                            class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            value="{{ old('date-acquired', date('Y-m-d')) }}"
                            @error('date-acquired') ring-red-500 focus:ring-red-500 @enderror
                        >
                        @error('date-acquired')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="sm:col-span-1">
                    <label for="source" class="block text-sm font-medium leading-6 text-gray-900">Source</label>
                    <div class="mt-2">
                        <select
                            id="source"
                            name="source"
                            class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            @error('source') ring-red-500 focus:ring-red-500 @enderror
                        >
                            <option value="" {{ old('source') == '' ? 'selected' : '' }}>Select source</option>
                            <option value="Purchase" {{ old('source') == 'Purchase' ? 'selected' : '' }}>Purchase</option>
                            <option value="Donation" {{ old('source') == 'Donation' ? 'selected' : '' }}>Donation</option>
                            <option value="Exchange" {{ old('source') == 'Exchange' ? 'selected' : '' }}>Exchange</option>
                            <option value="Government Depository" {{ old('source') == 'Government Depository' ? 'selected' : '' }}>Government Depository</option>
                        </select>
                        @error('source')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="sm:col-span-1">
                    <label for="purchase-amount" class="block text-sm font-medium leading-6 text-gray-900">Purchase Amount</label>
                    <div class="mt-2">
                        <input
                            id="purchase-amount"
                            name="purchase-amount"
                            type="number"
                            step="0.01"
                            placeholder="Enter amount"
                            class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            value="{{ old('purchase-amount') }}"
                            @error('purchase-amount') ring-red-500 focus:ring-red-500 @enderror
                        >
                        @error('purchase-amount')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="sm:col-span-1">
                    <label for="acquisition-status" class="block text-sm font-medium leading-6 text-gray-900">Acquisition Status</label>
                    <div class="mt-2">
                        <select
                            id="acquisition-status"
                            name="acquisition-status"
                            class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            @error('acquisition-status') ring-red-500 focus:ring-red-500 @enderror
                        >
                            <option value="" {{ old('acquisition-status') == '' ? 'selected' : '' }}>Select status</option>
                            <option value="Processing" {{ old('acquisition-status') == 'Processing' ? 'selected' : '' }}>Processing</option>
                            <option value="Available" {{ old('acquisition-status') == 'Available' ? 'selected' : '' }}>Available</option>
                            <option value="Pending Review" {{ old('acquisition-status') == 'Pending Review' ? 'selected' : '' }}>Pending Review</option>
                        </select>
                        @error('acquisition-status')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

            </div>
        </div>

        <div class="space-y-8 mt-8">
            <div>
                <h2 class="text-base font-semibold leading-7 text-gray-900">Content Description</h2>
            </div>
            <div class="grid max-w-6xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-3">

                <div class="sm:col-span-1">
                    <label for="summary-abstract" class="block text-sm font-medium leading-6 text-gray-900">Summary/Abstract</label>
                    <div class="mt-2">
                                <textarea
                                    id="summary-abstract"
                                    name="summary-abstract"
                                    rows="4"
                                    placeholder="Enter summary or abstract"
                                    class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    @error('summary-abstract') ring-red-500 focus:ring-red-500 @enderror
                                >{{ old('summary-abstract') }}</textarea>
                        @error('summary-abstract')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="sm:col-span-1">
                    <label for="additional-notes" class="block text-sm font-medium leading-6 text-gray-900">Additional Notes</label>
                    <div class="mt-2">
                                <textarea
                                    id="additional-notes"
                                    name="additional-notes"
                                    rows="4"
                                    placeholder="Enter additional notes"
                                    class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    @error('additional-notes') ring-red-500 focus:ring-red-500 @enderror
                                >{{ old('additional-notes') }}</textarea>
                        @error('additional-notes')
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

{{-- this is just a temporary fix --}}

<script>
    // DDC Classification to Call Number mapping
    const ddcCallNumbers = {
        'Applied Science': '600-699',
        'Arts': '700-799',
        'Fiction': 'F',
        'General Works': '000-099',
        'History': '900-999',
        'Language': '400-499',
        'Literature': '800-899',
        'Philosophy': '100-199',
        'Pure Science': '500-599',
        'Religion': '200-299',
        'Social Science': '300-399'
    };

    // Physical Location to Symbol mapping
    const locationSymbols = {
        'Circulation': 'CIRC',
        'Fiction': 'FIC',
        'Filipiniana': 'FIL',
        'General References': 'GEN',
        'Graduate School': 'GS',
        'Reserve': 'RES',
        'PCAARRD': 'PCAR',
        'Vertical Files': 'VF'
    };

    function updateCallNumber() {
        const ddcSelect = document.getElementById('ddc-classification');
        const callNumberInput = document.getElementById('call-number');

        if (ddcSelect.value && ddcCallNumbers[ddcSelect.value]) {
            callNumberInput.value = ddcCallNumbers[ddcSelect.value];
        } else {
            callNumberInput.value = '';
        }
    }

    function updateLocationSymbol() {
        const locationSelect = document.getElementById('physical-location');
        const symbolInput = document.getElementById('location-symbol');

        if (locationSelect.value && locationSymbols[locationSelect.value]) {
            symbolInput.value = locationSymbols[locationSelect.value];
        } else {
            symbolInput.value = '';
        }
    }

    // Initialize on page load if values are already selected
    document.addEventListener('DOMContentLoaded', function() {
        updateCallNumber();
        updateLocationSymbol();
    });
</script>
