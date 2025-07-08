<x-layouts.records heading-title="Edit Book">
    <form action="{{ route('books.update', $record) }}" method="POST">
        @csrf
        @method('PUT')
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
                            value="{{ old('accession-number', $record->accession_number) }}"
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
                            value="{{ old('title', $record->title) }}"
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
                            value="{{ old('primary-author', $record->book->primary_author) }}"
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
                            class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            value="{{ old('publication-year', $record->book->publication_year) }}"
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
                            class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            value="{{ old('publisher', $record->book->publisher) }}"
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
                            class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            value="{{ old('place-of-publication', $record->book->place_of_publication) }}"
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
                            class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            value="{{ old('isbn-issn', $record->book->isbn_issn) }}"
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
                            class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            required
                            @error('language') ring-red-500 focus:ring-red-500 @enderror
                        >
                            <option value="" disabled>Select a language</option>
                            <option value="English" {{ old('language', $record->language) == 'English' ? 'selected' : '' }}>English</option>
                            <option value="Spanish" {{ old('language', $record->language) == 'Spanish' ? 'selected' : '' }}>Spanish</option>
                            <option value="French" {{ old('language', $record->language) == 'French' ? 'selected' : '' }}>French</option>
                            <option value="German" {{ old('language', $record->language) == 'German' ? 'selected' : '' }}>German</option>
                            <option value="Chinese" {{ old('language', $record->language) == 'Chinese' ? 'selected' : '' }}>Chinese</option>
                            <option value="Other" {{ old('language', $record->language) == 'Other' ? 'selected' : '' }}>Other</option>
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
                            value="{{ old('additional-authors', $record->book->additional_authors) }}"
                            @error('additional-authors') ring-red-500 focus:ring-red-500 @enderror
                        >
                        @error('additional-authors')
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
                            value="{{ old('editor', $record->book->editor) }}"
                            @error('editor') ring-red-500 focus:ring-red-500 @enderror
                        >
                        @error('editor')
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
                            value="{{ old('series-title', $record->book->series_title) }}"
                            @error('series-title') ring-red-500 focus:ring-red-500 @enderror
                        >
                        @error('series-title')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="space-y-8 mt-8">
            <div>
                <h2 class="text-base font-semibold leading-7 text-gray-900">Classification & Location</h2>
            </div>
            <div class="grid max-w-6xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-2">
                <div class="sm:col-span-1">
                    <label for="ddc-classification" class="block text-sm font-medium leading-6 text-gray-900">DDC Classification <span class="text-red-500">*</span></label>
                    <div class="mt-2">
                        <select
                            id="ddc-classification"
                            name="ddc-classification"
                            class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            onchange="updateCallNumber()"
                            required
                            @error('ddc-classification') ring-red-500 focus:ring-red-500 @enderror
                        >
                            <option value="" disabled>Select DDC classification</option>
                            <option value="Applied Science" {{ old('ddc-classification', $record->ddc_classification) == 'Applied Science' ? 'selected' : '' }}>Applied Science</option>
                            <option value="Arts" {{ old('ddc-classification', $record->ddc_classification) == 'Arts' ? 'selected' : '' }}>Arts</option>
                            <option value="Fiction" {{ old('ddc-classification', $record->ddc_classification) == 'Fiction' ? 'selected' : '' }}>Fiction</option>
                            <option value="General Works" {{ old('ddc-classification', $record->ddc_classification) == 'General Works' ? 'selected' : '' }}>General Works</option>
                            <option value="History" {{ old('ddc-classification', $record->ddc_classification) == 'History' ? 'selected' : '' }}>History</option>
                            <option value="Language" {{ old('ddc-classification', $record->ddc_classification) == 'Language' ? 'selected' : '' }}>Language</option>
                            <option value="Literature" {{ old('ddc-classification', $record->ddc_classification) == 'Literature' ? 'selected' : '' }}>Literature</option>
                            <option value="Philosophy" {{ old('ddc-classification', $record->ddc_classification) == 'Philosophy' ? 'selected' : '' }}>Philosophy</option>
                            <option value="Pure Science" {{ old('ddc-classification', $record->ddc_classification) == 'Pure Science' ? 'selected' : '' }}>Pure Science</option>
                            <option value="Religion" {{ old('ddc-classification', $record->ddc_classification) == 'Religion' ? 'selected' : '' }}>Religion</option>
                            <option value="Social Science" {{ old('ddc-classification', $record->ddc_classification) == 'Social Science' ? 'selected' : '' }}>Social Science</option>
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
                            class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            value="{{ old('call-number', $record->call_number) }}"
                            readonly
                        >
                        @error('call-number')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="sm:col-span-1">
                    <label for="physical-location" class="block text-sm font-medium leading-6 text-gray-900">Physical Location</label>
                    <div class="mt-2">
                        <select
                            id="physical-location"
                            name="physical-location"
                            class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            onchange="updateLocationSymbol()"
                            @error('physical-location') ring-red-500 focus:ring-red-500 @enderror
                        >
                            <option value="" disabled>Select physical location</option>
                            <option value="Circulation" {{ old('physical-location', $record->physical_location) == 'Circulation' ? 'selected' : '' }}>Circulation</option>
                            <option value="Fiction" {{ old('physical-location', $record->physical_location) == 'Fiction' ? 'selected' : '' }}>Fiction</option>
                            <option value="Filipiniana" {{ old('physical-location', $record->physical_location) == 'Filipiniana' ? 'selected' : '' }}>Filipiniana</option>
                            <option value="General References" {{ old('physical-location', $record->physical_location) == 'General References' ? 'selected' : '' }}>General References</option>
                            <option value="Graduate School" {{ old('physical-location', $record->physical_location) == 'Graduate School' ? 'selected' : '' }}>Graduate School</option>
                            <option value="Reserve" {{ old('physical-location', $record->physical_location) == 'Reserve' ? 'selected' : '' }}>Reserve</option>
                            <option value="PCAARRD" {{ old('physical-location', $record->physical_location) == 'PCAARRD' ? 'selected' : '' }}>PCAARRD</option>
                            <option value="Vertical Files" {{ old('physical-location', $record->physical_location) == 'Vertical Files' ? 'selected' : '' }}>Vertical Files</option>
                        </select>
                        @error('physical-location')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="sm:col-span-1">
                    <label for="location-symbol" class="block text-sm font-medium leading-6 text-gray-900">Location Symbol</label>
                    <div class="mt-2">
                        <input
                            disabled
                            id="location-symbol"
                            name="location-symbol"
                            type="text"
                            placeholder="Auto-generated based on location"
                            class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            value="{{ old('location-symbol', $record->location_symbol) }}"
                            readonly
                        >
                        @error('location-symbol')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="space-y-8 mt-8">
            <div>
                <h2 class="text-base font-semibold leading-7 text-gray-900">Physical Description</h2>
            </div>
            <div class="grid max-w-6xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-3">
                <div class="sm:col-span-1">
                    <label for="edition" class="block text-sm font-medium leading-6 text-gray-900">Edition</label>
                    <div class="mt-2">
                        <input
                            id="edition"
                            name="edition"
                            type="text"
                            placeholder="Enter edition"
                            class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            value="{{ old('edition', $record->book->edition) }}"
                            @error('edition') ring-red-500 focus:ring-red-500 @enderror
                        >
                        @error('edition')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="sm:col-span-1">
                    <label for="cover-type" class="block text-sm font-medium leading-6 text-gray-900">Cover Type</label>
                    <div class="mt-2">
                        <select
                            id="cover-type"
                            name="cover-type"
                            class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            @error('cover-type') ring-red-500 focus:ring-red-500 @enderror
                        >
                            <option value="" disabled>Select cover type</option>
                            <option value="Hardcover" {{ old('cover-type', $record->book->cover_type) == 'Hardcover' ? 'selected' : '' }}>Hardcover</option>
                            <option value="Paperback" {{ old('cover-type', $record->book->cover_type) == 'Paperback' ? 'selected' : '' }}>Paperback</option>
                            <option value="Spiral-bound" {{ old('cover-type', $record->book->cover_type) == 'Spiral-bound' ? 'selected' : '' }}>Spiral-bound</option>
                            <option value="Other" {{ old('cover-type', $record->book->cover_type) == 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                        @error('cover-type')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="sm:col-span-1">
                    <label for="book-cover-image" class="block text-sm font-medium leading-6 text-gray-900">Book Cover Image</label>
                    <div class="mt-2">
                        <input
                            id="book-cover-image"
                            name="book-cover-image"
                            type="file"
                            accept=".jpg,.jpeg,.png,.pdf"
                            class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        >
                        @if($record->book->book_cover_image)
                            <p class="mt-2 text-sm text-gray-600">Current image: <a href="{{ asset('storage/' . $record->book->book_cover_image) }}" target="_blank">View current cover</a></p>
                        @endif
                        @error('book-cover-image')
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
                            value="{{ old('date-acquired', $record->date_acquired) }}"
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
                            <option value="" disabled>Select source</option>
                            <option value="Purchase" {{ old('source', $record->source) == 'Purchase' ? 'selected' : '' }}>Purchase</option>
                            <option value="Donation" {{ old('source', $record->source) == 'Donation' ? 'selected' : '' }}>Donation</option>
                            <option value="Exchange" {{ old('source', $record->source) == 'Exchange' ? 'selected' : '' }}>Exchange</option>
                            <option value="Government Depository" {{ old('source', $record->source) == 'Government Depository' ? 'selected' : '' }}>Government Depository</option>
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
                            value="{{ old('purchase-amount', $record->purchase_amount) }}"
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
                            <option value="" disabled>Select status</option>
                            <option value="Processing" {{ old('acquisition-status', $record->acquisition_status) == 'Processing' ? 'selected' : '' }}>Processing</option>
                            <option value="Available" {{ old('acquisition-status', $record->acquisition_status) == 'Available' ? 'selected' : '' }}>Available</option>
                            <option value="Pending Review" {{ old('acquisition-status', $record->acquisition_status) == 'Pending Review' ? 'selected' : '' }}>Pending Review</option>
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
                    <label for="table-of-contents" class="block text-sm font-medium leading-6 text-gray-900">Table of Contents</label>
                    <div class="mt-2">
                                <textarea
                                    id="table-of-contents"
                                    name="table-of-contents"
                                    rows="4"
                                    placeholder="Enter table of contents"
                                    class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    @error('table-of-contents') ring-red-500 focus:ring-red-500 @enderror
                                >{{ old('table-of-contents', $record->book->table_of_contents) }}</textarea>
                        @error('table-of-contents')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
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
                                >{{ old('summary-abstract', $record->book->summary_abstract) }}</textarea>
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
                                >{{ old('additional-notes', $record->additional_notes) }}</textarea>
                        @error('additional-notes')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6 py-8 flex items-center justify-between">
            <button type="submit" form="delete-form" class="text-sm font-semibold leading-6 text-red-900">Delete</button>
            <div class="flex gap-x-6">
                <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold
                    text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2
                    focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update Patron</button>
            </div>
        </div>
    </form>

    <form id="delete-form" action="{{ route('books.destroy', $record) }}" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>
</x-layouts.records>

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
