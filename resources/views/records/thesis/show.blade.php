<x-layouts.records heading-title="View Thesis/Dissertation Details">
    <div class="flex flex-col gap-2 rounded-xl">
        <!-- Basic Information Section -->
        <div class="px-4 sm:px-0">
            <h3 class="text-base font-semibold leading-7 text-gray-900">Basic Information</h3>
        </div>

        <dl class="grid grid-cols-1 sm:grid-cols-3">
            <div class="px-4 py-3">
                <dt class="text-sm font-medium leading-6 text-gray-900">Accession Number</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700">{{ $record->accession_number }}</dd>
            </div>
            <div class="px-4 py-3">
                <dt class="text-sm font-medium leading-6 text-gray-900">Title</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700">{{ $record->title }}</dd>
            </div>
            <div class="px-4 py-3">
                <dt class="text-sm font-medium leading-6 text-gray-900">Researcher/Researchers</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700">{{ $record->thesis->researcher ?? 'Not specified' }}</dd>
            </div>
            <div class="px-4 py-3">
                <dt class="text-sm font-medium leading-6 text-gray-900">Academic Year</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700">{{ $record->thesis->academic_year ?? 'N/A' }}</dd>
            </div>
            <div class="px-4 py-3">
                <dt class="text-sm font-medium leading-6 text-gray-900">Institution/School</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700">{{ $record->thesis->institution ?? 'N/A' }}</dd>
            </div>
            <div class="px-4 py-3">
                <dt class="text-sm font-medium leading-6 text-gray-900">College/Department</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700">{{ $record->thesis->college ?? 'N/A' }}</dd>
            </div>
            <div class="px-4 py-3">
                <dt class="text-sm font-medium leading-6 text-gray-900">Language</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700">{{ $record->language }}</dd>
            </div>
        </dl>

        <div class="px-4 sm:px-0">
            <h3 class="text-base font-semibold leading-7 text-gray-900">Academic Details</h3>
        </div>

        <dl class="grid grid-cols-1 sm:grid-cols-3">
            <div class="px-4 py-3">
                <dt class="text-sm font-medium leading-6 text-gray-900">Adviser</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700">{{ $record->thesis->adviser }}</dd>
            </div>
            <div class="px-4 py-3">
                <dt class="text-sm font-medium leading-6 text-gray-900">Panelist/Committee</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700">{{ $record->thesis->committee }}</dd>
            </div>
            <div class="px-4 py-3">
                <dt class="text-sm font-medium leading-6 text-gray-900">Degree Program</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700">{{ $record->thesis->degree_program }}</dd>
            </div>
            <div class="px-4 py-3">
                <dt class="text-sm font-medium leading-6 text-gray-900">Degree Level</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700">{{ $record->thesis->degree_level }}</dd>
            </div>
        </dl>

        <div class="px-4 sm:px-0">
            <h3 class="text-base font-semibold leading-7 text-gray-900">Classification & Location</h3>
        </div>

        <dl class="grid grid-cols-1 sm:grid-cols-3">
            <div class="px-4 py-3">
                <dt class="text-sm font-medium leading-6 text-gray-900">DDC Classification</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700">{{ $record->ddc_classification }}</dd>
            </div>
            <div class="px-4 py-3">
                <dt class="text-sm font-medium leading-6 text-gray-900">Call Number</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700">{{ $record->call_number }}</dd>
            </div>
            <div class="px-4 py-3">
                <dt class="text-sm font-medium leading-6 text-gray-900">Physical Location</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700">{{ $record->physical_location }}</dd>
            </div>
            <div class="px-4 py-3">
                <dt class="text-sm font-medium leading-6 text-gray-900">Location Symbol</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700">{{ $record->location_symbol }}</dd>
            </div>
        </dl>

        <div class="px-4 sm:px-0">
            <h3 class="text-base font-semibold leading-7 text-gray-900">Physical Description</h3>
        </div>

        <dl class="grid grid-cols-1 sm:grid-cols-3">
            <div class="px-4 py-3">
                <dt class="text-sm font-medium leading-6 text-gray-900">Format</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700">{{ $record->thesis->format }}</dd>
            </div>
            <div class="px-4 py-3">
                <dt class="text-sm font-medium leading-6 text-gray-900">Number of Pages</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700">{{ $record->thesis->format }}</dd>
            </div>
            <div class="px-4 py-3 flex items-center gap-x-3">
                <dt class="text-sm font-medium leading-6 text-gray-900">Abstract Document</dt>
                @if($record->thesis && $record->thesis->abstract_document)
                    <a href="{{ asset('storage/' . $record->thesis->abstract_document) }}" target="_blank"
                       class="text-indigo-600 hover:underline text-sm">
                        View Abstract (PDF)
                    </a>
                @else
                    <div class="h-8 w-8 text-gray-400 flex items-center justify-center">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M12 4v16m8-8H4" />
                        </svg>
                        <span class="ml-2 text-gray-500 text-sm">No document uploaded</span>
                    </div>
                @endif
            </div>
            <div class="px-4 py-3 flex items-center gap-x-3">
                <dt class="text-sm font-medium leading-6 text-gray-900">Full Text</dt>
                @if($record->thesis && $record->thesis->full_text)
                    <a href="{{ asset('storage/' . $record->thesis->full_text) }}" target="_blank"
                       class="text-indigo-600 hover:underline text-sm">
                        View Full Text (PDF)
                    </a>
                @else
                    <div class="h-8 w-8 text-gray-400 flex items-center justify-center">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M12 4v16m8-8H4" />
                        </svg>
                        <span class="ml-2 text-gray-500 text-sm">No document uploaded</span>
                    </div>
                @endif
            </div>

        </dl>

        <div class="px-4 sm:px-0">
            <h3 class="text-base font-semibold leading-7 text-gray-900">Administrative information</h3>
        </div>

        <dl class="grid grid-cols-1 sm:grid-cols-3">
            <div class="px-4 py-3">
                <dt class="text-sm font-medium leading-6 text-gray-900">Date Acquired</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700">{{ $record->date_acquired }}</dd>
            </div>
            <div class="px-4 py-3">
                <dt class="text-sm font-medium leading-6 text-gray-900">Source</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700">{{ $record->source }}</dd>
            </div>
            <div class="px-4 py-3">
                <dt class="text-sm font-medium leading-6 text-gray-900">Purchase Amount</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700">{{ $record->purchase_amount ? '₱' . number_format($record->purchase_amount, 2) : 'Not specified' }}</dd>
            </div>
            <div class="px-4 py-3">
                <dt class="text-sm font-medium leading-6 text-gray-900">Acquisition Status</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700">
                    <span class="inline-flex items-center rounded-md px-2 py-1 text-xs font-medium
                        {{ $record->acquisition_status === 'active' ? 'bg-green-50 text-green-700 ring-1 ring-inset ring-green-600/20' : 'bg-gray-50 text-gray-600 ring-1 ring-inset ring-gray-500/10' }}">
                        {{ ucfirst($record->acquisition_status) }}
                    </span>
                </dd>
            </div>
        </dl>

        @if($record->additional_notes || $record->thesis->abstract_summary || $record->thesis->keywords)
            <div class="mt-4 px-4 sm:px-0">
                <h3 class="text-base font-semibold leading-7 text-gray-900">Content Description</h3>
            </div>

            <dl class="grid grid-cols-2">
                @if($record->thesis->abstract_summary)
                    <div class="px-4 py-3">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Abstract/Summary</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 whitespace-pre-line">{{ $record->thesis->abstract_summary }}</dd>
                    </div>
                @endif
                @if($record->thesis->keywords)
                    <div class="px-4 py-3">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Keywords</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 whitespace-pre-line">{{ $record->thesis->keywords }}</dd>
                    </div>
                @endif
                @if($record->additional_notes)
                    <div class="px-4 py-3">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Additional Notes</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 whitespace-pre-line">{{ $record->additional_notes }}</dd>
                    </div>
                @endif
            </dl>
        @endif

        <div class="mt-4 flex justify-end px-4">
            <a href="{{ route('thesis.edit', $record) }}">
                <button type="button" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold
                        text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2
                        focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Edit Thesis/Dissertation</button>
            </a>
        </div>

    </div>
</x-layouts.records>
