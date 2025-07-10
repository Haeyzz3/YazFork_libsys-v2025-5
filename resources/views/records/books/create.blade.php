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
                    <label for="author" class="block text-sm font-medium leading-6 text-gray-900">Author <span class="text-red-600">*</span></label>
                    <div class="mt-2">
                        <input
                            id="author"
                            name="author"
                            type="text"
                            placeholder="Enter primary author"
                            class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            value="{{ old('author') }}"
                            required
                            @error('author') ring-red-500 focus:ring-red-500 @enderror
                        >
                        @error('author')
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

        <!-- Additional Authors & Contributors section — add px-2 similarly -->

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
                    <label for="physical-location" class="block text-sm font-medium leading-6 text-gray-900">Physical Location</label>
                    <div class="mt-2">
                        <select
                            id="physical-location"
                            name="physical-location"
                            class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm
                   ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600
                   sm:text-sm sm:leading-6"
                            onchange="updateLocationSymbol()"
                        >
                            <option value="" disabled selected>Select physical location</option>
                            <option value="Circulation" {{ old('physical-location') == 'Circulation' ? 'selected' : '' }}>Circulation</option>
                            <option value="Fiction" {{ old('physical-location') == 'Fiction' ? 'selected' : '' }}>Fiction</option>
                            <option value="Filipiniana" {{ old('physical-location') == 'Filipiniana' ? 'selected' : '' }}>Filipiniana</option>
                            <option value="General References" {{ old('physical-location') == 'General References' ? 'selected' : '' }}>General References</option>
                            <option value="Graduate School" {{ old('physical-location') == 'Graduate School' ? 'selected' : '' }}>Graduate School</option>
                            <option value="Reserve" {{ old('physical-location') == 'Reserve' ? 'selected' : '' }}>Reserve</option>
                            <option value="PCAARRD" {{ old('physical-location') == 'PCAARRD' ? 'selected' : '' }}>PCAARRD</option>
                            <option value="Vertical Files" {{ old('physical-location') == 'Vertical Files' ? 'selected' : '' }}>Vertical Files</option>
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
                            class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm
                   ring-1 ring-inset ring-gray-300 placeholder:text-gray-400
                   focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            value="{{ old('location-symbol') }}"
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
                            class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm
                           ring-1 ring-inset ring-gray-300 placeholder:text-gray-400
                           focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            value="{{ old('edition') }}"
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
                            class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm
                           ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600
                           sm:text-sm sm:leading-6"
                        >
                            <option value="" disabled selected>Select cover type</option>
                            <option value="Hardcover" {{ old('cover-type') == 'Hardcover' ? 'selected' : '' }}>Hardcover</option>
                            <option value="Paperback" {{ old('cover-type') == 'Paperback' ? 'selected' : '' }}>Paperback</option>
                            <option value="Spiral-bound" {{ old('cover-type') == 'Spiral-bound' ? 'selected' : '' }}>Spiral-bound</option>
                            <option value="Other" {{ old('cover-type') == 'Other' ? 'selected' : '' }}>Other</option>
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
                            class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm
                           ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600
                           sm:text-sm sm:leading-6"
                        >
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
                    <label for="table-of-contents" class="block text-sm font-medium leading-6 text-gray-900">Table of Contents</label>
                    <div class="mt-2">
                                <textarea
                                    id="table-of-contents"
                                    name="table-of-contents"
                                    rows="4"
                                    placeholder="Enter table of contents"
                                    class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    @error('table-of-contents') ring-red-500 focus:ring-red-500 @enderror
                                >{{ old('table-of-contents') }}</textarea>
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
