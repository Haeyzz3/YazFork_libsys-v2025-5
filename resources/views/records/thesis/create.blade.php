<x-layouts.records heading-title="Add Thesis/Dissertation Records">
    <form action="{{ route('thesis.store') }}" method="POST">
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
                <div class="sm:col-span-2">
                    <label for="researchers" class="block text-sm font-medium leading-6 text-gray-900">Researchers</label>
                    <div class="mt-2">
                        <input
                            id="researchers"
                            name="researchers"
                            type="text"
                            placeholder="Enter researchers (separate multiple researchers with commas)"
                            class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            value="{{ old('researchers') }}"
                            @error('researchers') ring-red-500 focus:ring-red-500 @enderror
                        >
                        @error('researchers')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="sm:col-span-1">
                    <label for="academic-year" class="block text-sm font-medium leading-6 text-gray-900">Academic Year</label>
                    <div class="mt-2">
                        <input
                            id="academic-year"
                            name="academic-year"
                            type="number"
                            placeholder="Enter publication year"
                            class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            value="{{ old('academic-year') }}"
                            required
                            @error('academic-year') ring-red-500 focus:ring-red-500 @enderror
                        >
                        @error('academic-year')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="sm:col-span-1">
                    <label for="institution" class="block text-sm font-medium leading-6 text-gray-900">Institution/School</label>
                    <div class="mt-2">
                        <input
                            id="institution"
                            name="institution"
                            type="text"
                            placeholder="Enter institution/school"
                            class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            value="{{ old('institution') }}"
                            required
                            @error('institution') ring-red-500 focus:ring-red-500 @enderror
                        >
                        @error('institution')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="sm:col-span-1">
                    <label for="college" class="block text-sm font-medium leading-6 text-gray-900">College</label>
                    <div class="mt-2">
                        <input
                            id="college"
                            name="college"
                            type="text"
                            placeholder="Enter college/school"
                            class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            value="{{ old('college') }}"
                            required
                            @error('college') ring-red-500 focus:ring-red-500 @enderror
                        >
                        @error('college')
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
                <h2 class="text-base font-semibold leading-7 text-gray-900">Academic Details</h2>
            </div>
            <div class="grid max-w-6xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-3">
                <div class="sm:col-span-1">
                    <label for="adviser" class="block text-sm font-medium leading-6 text-gray-900">Adviser</label>
                    <div class="mt-2">
                        <input
                            id="adviser"
                            name="adviser"
                            type="text"
                            placeholder="Enter adviser"
                            class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            value="{{ old('adviser') }}"
                            @error('adviser') ring-red-500 focus:ring-red-500 @enderror
                        >
                        @error('adviser')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label for="panelist" class="block text-sm font-medium leading-6 text-gray-900">Panelist</label>
                    <div class="mt-2">
                        <input
                            id="panelist"
                            name="panelist"
                            type="text"
                            placeholder="Enter panelist (separate multiple panelist with commas)"
                            class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            value="{{ old('panelist') }}"
                            @error('panelist') ring-red-500 focus:ring-red-500 @enderror
                        >
                        @error('panelist')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="sm:col-span-1">
                    <label for="degree-program" class="block text-sm font-medium leading-6 text-gray-900">
                        Degree Program
                    </label>
                    <div class="mt-2">
                        <select
                            id="degree-program"
                            name="degree-program"
                            class="block w-full rounded-md border-0 py-2 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm"
                            required
                        >
                            <option value="" disabled {{ old('degree-program') ? '' : 'selected' }}>Select a degree program</option>
                            <option value="BSCS" {{ old('degree-program') == 'BSCS' ? 'selected' : '' }}>BSCS</option>
                            <option value="BSIT" {{ old('degree-program') == 'BSIT' ? 'selected' : '' }}>BSIT</option>
                            <option value="BSEd" {{ old('degree-program') == 'BSEd' ? 'selected' : '' }}>BSEd</option>
                            <option value="BA" {{ old('degree-program') == 'BA' ? 'selected' : '' }}>BA</option>
                            <option value="MA" {{ old('degree-program') == 'MA' ? 'selected' : '' }}>MA</option>
                            <option value="PhD" {{ old('degree-program') == 'PhD' ? 'selected' : '' }}>PhD</option>
                            <option value="Other" {{ old('degree-program') == 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                        @error('degree-program')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="sm:col-span-1">
                    <label for="degree-level" class="block text-sm font-medium leading-6 text-gray-900">
                        Degree Level
                    </label>
                    <div class="mt-2">
                        <select
                            id="degree-level"
                            name="degree-level"
                            class="block w-full rounded-md border-0 py-2 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm"
                            required
                        >
                            <option value="" disabled {{ old('degree-level') ? '' : 'selected' }}>Select degree level</option>
                            <option value="Bachelor's Thesis" {{ old('degree-level') == "Bachelor's Thesis" ? 'selected' : '' }}>Bachelor's Thesis</option>
                            <option value="Master's Thesis" {{ old('degree-level') == "Master's Thesis" ? 'selected' : '' }}>Master's Thesis</option>
                            <option value="Doctoral Dissertation" {{ old('degree-level') == "Doctoral Dissertation" ? 'selected' : '' }}>Doctoral Dissertation</option>
                        </select>
                        @error('degree-level')
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
                    <label for="format" class="block text-sm font-medium leading-6 text-gray-900">Format</label>
                    <div class="mt-2">
                        <select
                            id="format"
                            name="format"
                            class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            @error('format') ring-red-500 focus:ring-red-500 @enderror
                        >
                            <option value="">Select format</option>
                            <option value="Print" {{ old('format') == 'Print' ? 'selected' : '' }}>Print</option>
                            <option value="Microfilm" {{ old('format') == 'Microfilm' ? 'selected' : '' }}>Microfilm</option>
                            <option value="Digital" {{ old('format') == 'Digital' ? 'selected' : '' }}>Digital</option>
                            <option value="Bound Volume" {{ old('format') == 'Bound Volume' ? 'selected' : '' }}>Bound Volume</option>
                        </select>
                        @error('format')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="sm:col-span-1">
                    <label for="number-of-pages" class="block text-sm font-medium leading-6 text-gray-900">
                        Number of Pages
                    </label>
                    <div class="mt-2">
                        <input
                            id="number-of-pages"
                            name="number-of-pages"
                            type="number"
                            min="1"
                            placeholder="Enter number of pages"
                            value="{{ old('number-of-pages') }}"
                            class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm
                               ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600
                               sm:text-sm sm:leading-6"
                            required
                        >
                        @error('number-of-pages')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="sm:col-span-1">
                    <label for="abstract-document" class="block text-sm font-medium leading-6 text-gray-900">
                        Abstract Document
                    </label>
                    <div class="mt-2">
                        <input
                            id="abstract-document"
                            name="abstract-document"
                            type="file"
                            accept=".pdf"
                            class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm
                   ring-1 ring-inset ring-gray-300 placeholder:text-gray-400
                   focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        >
                        @error('abstract-document')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="sm:col-span-1">
                    <label for="full-text" class="block text-sm font-medium leading-6 text-gray-900">
                        Full Text
                    </label>
                    <div class="mt-2">
                        <input
                            id="full-text"
                            name="full-text"
                            type="file"
                            accept=".pdf"
                            class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm
                   ring-1 ring-inset ring-gray-300 placeholder:text-gray-400
                   focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        >
                        @error('full-text')
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
                    <label for="abstract-summary" class="block text-sm font-medium leading-6 text-gray-900">
                        Abstract/Summary
                    </label>
                    <div class="mt-2">
                        <textarea
                            id="abstract-summary"
                            name="abstract-summary"
                            rows="4"
                            placeholder="Enter abstract or summary"
                            class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm
                                   ring-1 ring-inset ring-gray-300 placeholder:text-gray-400
                                   focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        >{{ old('abstract-summary') }}</textarea>
                        @error('abstract-summary')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="sm:col-span-1">
                    <label for="keywords" class="block text-sm font-medium leading-6 text-gray-900">
                        Keywords
                    </label>
                    <div class="mt-2">
                        <textarea
                            id="keywords"
                            name="keywords"
                            rows="4"
                            placeholder="Enter keywords"
                            class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm
                                   ring-1 ring-inset ring-gray-300 placeholder:text-gray-400
                                   focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        >{{ old('keywords') }}</textarea>
                        @error('keywords')
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

        <div class="mt-6 py-8 flex items-center justify-end gap-x-6">
            <a href="{{ route('digital.index') }}">
                <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
            </a>
            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add Book</button>
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
