<x-layouts.records heading-title="Edit Periodical/Magazine Record">
    <form action="{{ route('periodicals.update', $record) }}" method="POST">
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
                            value="{{ $record->accession_number ?? old('accession-number') }}"
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
                            value="{{ $record->title ?? old('title') }}"
                            required
                            @error('title') ring-red-500 focus:ring-red-500 @enderror
                        >
                        @error('title')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="sm:col-span-1">
                    <label for="primary-author" class="block text-sm font-medium leading-6 text-gray-900">Primary Author/Editor</label>
                    <div class="mt-2">
                        <input
                            id="primary-author"
                            name="primary-author"
                            type="text"
                            placeholder="Enter primary author"
                            class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            value="{{ $record->periodical->primary_author ?? old('primary-author') }}"
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
                            value="{{ $record->periodical->publication_year ?? old('publication-year') }}"
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
                            placeholder="Enter publisher/producer"
                            class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            value="{{ $record->periodical->publisher ?? old('publisher') }}"
                            required
                            @error('publisher') ring-red-500 focus:ring-red-500 @enderror
                        >
                        @error('publisher')
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
                            <option value="English" {{ $record->language == 'English' ? 'selected' : '' }}>English</option>
                            <option value="Spanish" {{ $record->language == 'Spanish' ? 'selected' : '' }}>Spanish</option>
                            <option value="French" {{ $record->language == 'French' ? 'selected' : '' }}>French</option>
                            <option value="German" {{ $record->language == 'German' ? 'selected' : '' }}>German</option>
                            <option value="Chinese" {{ $record->language == 'Chinese' ? 'selected' : '' }}>Chinese</option>
                            <option value="Other" {{ $record->language == 'Other' ? 'selected' : '' }}>Other</option>
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
                <h2 class="text-base font-semibold leading-7 text-gray-900">Publication Details</h2>
            </div>
            <div class="grid max-w-6xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-3">
                <div class="sm:col-span-1">
                    <label for="volume-number" class="block text-sm font-medium leading-6 text-gray-900">Volume Number</label>
                    <div class="mt-2">
                        <input
                            id="volume-number"
                            name="volume-number"
                            type="text"
                            placeholder="Enter volume number"
                            class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            value="{{ $record->periodical->volume_number ?? old('volume-number') }}"
                            @error('volume-number') ring-red-500 focus:ring-red-500 @enderror
                        >
                        @error('volume-number')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="sm:col-span-1">
                    <label for="issue-number" class="block text-sm font-medium leading-6 text-gray-900">Issue Number</label>
                    <div class="mt-2">
                        <input
                            id="issue-number"
                            name="issue-number"
                            type="text"
                            placeholder="Enter issue number"
                            class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            value="{{ $record->periodical->issue_number ?? old('issue-number') }}"
                            @error('issue-number') ring-red-500 focus:ring-red-500 @enderror
                        >
                        @error('issue-number')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="sm:col-span-1">
                    <label for="publication-date" class="block text-sm font-medium leading-6 text-gray-900">Publication Date</label>
                    <div class="mt-2">
                        <input
                            id="publication-date"
                            name="publication-date"
                            type="date"
                            class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            value="{{ $record->periodical->publication_date ?? old('publication-date') }}"
                            @error('publication-date') ring-red-500 focus:ring-red-500 @enderror
                        >
                        @error('publication-date')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="sm:col-span-1">
                    <label for="issn" class="block text-sm font-medium leading-6 text-gray-900">ISSN</label>
                    <div class="mt-2">
                        <input
                            id="issn"
                            name="issn"
                            type="text"
                            placeholder="Enter ISSN"
                            class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            value="{{ $record->periodical->issn ?? old('issn') }}"
                            @error('issn') ring-red-500 focus:ring-red-500 @enderror
                        >
                        @error('issn')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="sm:col-span-1">
                    <label for="frequency" class="block text-sm font-medium leading-6 text-gray-900">Frequency</label>
                    <div class="mt-2">
                        <select
                            id="frequency"
                            name="frequency"
                            class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            @error('frequency') ring-red-500 focus:ring-red-500 @enderror
                        >
                            <option value="">Select frequency</option>
                            <option value="Daily" {{ $record->periodical->frequency == 'Daily' ? 'selected' : '' }}>Daily</option>
                            <option value="Weekly" {{ $record->periodical->frequency == 'Weekly' ? 'selected' : '' }}>Weekly</option>
                            <option value="Monthly" {{ $record->periodical->frequency == 'Monthly' ? 'selected' : '' }}>Monthly</option>
                            <option value="Quarterly" {{ $record->periodical->frequency == 'Quarterly' ? 'selected' : '' }}>Quarterly</option>
                            <option value="Annual" {{ $record->periodical->frequency == 'Annually' ? 'selected' : '' }}>Annually</option>
                            <option value="Irregular" {{ $record->periodical->frequency == 'Irregular' ? 'selected' : '' }}>Irregular</option>
                        </select>
                        @error('frequency')
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
                        >
                            <option value="" disabled>Select DDC classification</option>
                            <option value="Applied Science" {{ $record->ddc_classification == 'Applied Science' ? 'selected' : '' }}>Applied Science</option>
                            <option value="Arts" {{ $record->ddc_classification == 'Arts' ? 'selected' : '' }}>Arts</option>
                            <option value="Fiction" {{ $record->ddc_classification == 'Fiction' ? 'selected' : '' }}>Fiction</option>
                            <option value="General Works" {{ $record->ddc_classification == 'General Works' ? 'selected' : '' }}>General Works</option>
                            <option value="History" {{ $record->ddc_classification == 'History' ? 'selected' : '' }}>History</option>
                            <option value="Language" {{ $record->ddc_classification == 'Language' ? 'selected' : '' }}>Language</option>
                            <option value="Literature" {{ $record->ddc_classification == 'Literature' ? 'selected' : '' }}>Literature</option>
                            <option value="Philosophy" {{ $record->ddc_classification == 'Philosophy' ? 'selected' : '' }}>Philosophy</option>
                            <option value="Pure Science" {{ $record->ddc_classification == 'Pure Science' ? 'selected' : '' }}>Pure Science</option>
                            <option value="Religion" {{ $record->ddc_classification == 'Religion' ? 'selected' : '' }}>Religion</option>
                            <option value="Social Science" {{ $record->ddc_classification == 'Social Science' ? 'selected' : '' }}>Social Science</option>
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
                            value="{{ $record->call_number ?? old('call-number') }}"
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
                        >
                            <option value="" disabled>Select physical location</option>
                            <option value="Circulation" {{ $record->physical_location == 'Circulation' ? 'selected' : '' }}>Circulation</option>
                            <option value="Fiction" {{ $record->physical_location == 'Fiction' ? 'selected' : '' }}>Fiction</option>
                            <option value="Filipiniana" {{ $record->physical_location == 'Filipiniana' ? 'selected' : '' }}>Filipiniana</option>
                            <option value="General References" {{ $record->physical_location == 'General References' ? 'selected' : '' }}>General References</option>
                            <option value="Graduate School" {{ $record->physical_location == 'Graduate School' ? 'selected' : '' }}>Graduate School</option>
                            <option value="Reserve" {{ $record->physical_location == 'Reserve' ? 'selected' : '' }}>Reserve</option>
                            <option value="PCAARRD" {{ $record->physical_location == 'PCAARRD' ? 'selected' : '' }}>PCAARRD</option>
                            <option value="Vertical Files" {{ $record->physical_location == 'Vertical Files' ? 'selected' : '' }}>Vertical Files</option>
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
                            value="{{ $record->location_symbol ?? old('location-symbol') }}"
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
                    <label for="format" class="block text-sm font-medium leading-6 text-gray-900">Format</label>
                    <div class="mt-2">
                        <select
                            id="format"
                            name="format"
                            class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            @error('format') ring-red-500 focus:ring-red-500 @enderror
                        >
                            <option value="">Select format</option>
                            <option value="Print" {{ $record->periodical->format == 'Print' ? 'selected' : '' }}>Print</option>
                            <option value="Microfilm" {{ $record->periodical->format == 'Microfilm' ? 'selected' : '' }}>Microfilm</option>
                            <option value="Digital" {{ $record->periodical->format == 'Digital' ? 'selected' : '' }}>Digital</option>
                            <option value="Bound Volume" {{ $record->periodical->format == 'Bound Volume' ? 'selected' : '' }}>Bound Volume</option>
                        </select>
                        @error('format')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="sm:col-span-1">
                    <label for="cover-sample-image" class="block text-sm font-medium leading-6 text-gray-900">Cover/Sample Image</label>
                    <div class="mt-2">
                        <input
                            id="cover-sample-image"
                            name="cover-sample-image"
                            type="file"
                            accept=".jpg,.jpeg,.png,.pdf"
                            class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        >
                        @error('cover-sample-image')
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
                            value="{{ $record->date_acquired ?? old('date-acquired', date('Y-m-d')) }}"
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
                            <option value="">Select source</option>
                            <option value="Purchase" {{ $record->source == 'Purchase' ? 'selected' : '' }}>Purchase</option>
                            <option value="Donation" {{ $record->source == 'Donation' ? 'selected' : '' }}>Donation</option>
                            <option value="Exchange" {{ $record->source == 'Exchange' ? 'selected' : '' }}>Exchange</option>
                            <option value="Government Depository" {{ $record->source == 'Government Depository' ? 'selected' : '' }}>Government Depository</option>
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
                            value="{{ $record->purchase_amount ?? old('purchase-amount') }}"
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
                            <option value="">Select status</option>
                            <option value="Processing" {{ $record->acquisition_status == 'Processing' ? 'selected' : '' }}>Processing</option>
                            <option value="Available" {{ $record->acquisition_status == 'Available' ? 'selected' : '' }}>Available</option>
                            <option value="Pending Review" {{ $record->acquisition_status == 'Pending Review' ? 'selected' : '' }}>Pending Review</option>
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
                    <label for="summary-contents" class="block text-sm font-medium leading-6 text-gray-900">Summary/Contents</label>
                    <div class="mt-2">
                        <textarea
                            id="summary-contents"
                            name="summary-contents"
                            rows="4"
                            placeholder="Enter summary or abstract"
                            class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            @error('summary-contents') ring-red-500 focus:ring-red-500 @enderror
                        >{{ $record->periodical->summary_contents ?? old('summary-contents') }}</textarea>
                        @error('summary-contents')
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
                        >{{ $record->additional_notes ?? old('additional-notes') }}</textarea>
                        @error('additional-notes')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6 py-8 flex items-center justify-end gap-x-6">
            <a href="{{ route('periodicals.show', $record) }}">
                <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
            </a>
            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update Record</button>
        </div>
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
