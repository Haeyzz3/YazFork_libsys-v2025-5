<x-layouts.records heading-title="View Periodical/Magazine Details">
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
                <dt class="text-sm font-medium leading-6 text-gray-900">Primary Author/Editor</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700">{{ $record->periodical->primary_author ?? 'Not specified' }}</dd>
            </div>
            <div class="px-4 py-3">
                <dt class="text-sm font-medium leading-6 text-gray-900">Publication Year</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700">{{ $record->periodical->publication_year ?? 'N/A' }}</dd>
            </div>
            <div class="px-4 py-3">
                <dt class="text-sm font-medium leading-6 text-gray-900">Publisher</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700">{{ $record->periodical->publisher ?? 'N/A' }}</dd>
            </div>
            <div class="px-4 py-3">
                <dt class="text-sm font-medium leading-6 text-gray-900">Language</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700">{{ $record->language }}</dd>
            </div>
        </dl>

        <div class="px-4 sm:px-0">
            <h3 class="text-base font-semibold leading-7 text-gray-900">Publication Details</h3>
        </div>

        <dl class="grid grid-cols-1 sm:grid-cols-3">
            <div class="px-4 py-3">
                <dt class="text-sm font-medium leading-6 text-gray-900">Volume Number</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700">{{ $record->periodical->volume_number }}</dd>
            </div>
            <div class="px-4 py-3">
                <dt class="text-sm font-medium leading-6 text-gray-900">Issue Number</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700">{{ $record->periodical->issue_number }}</dd>
            </div>
            <div class="px-4 py-3">
                <dt class="text-sm font-medium leading-6 text-gray-900">Publication Date</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700">{{ $record->periodical->publication_date }}</dd>
            </div>
            <div class="px-4 py-3">
                <dt class="text-sm font-medium leading-6 text-gray-900">ISSN</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700">{{ $record->periodical->issn ?? 'Not specified' }}</dd>
            </div><div class="px-4 py-3">
                <dt class="text-sm font-medium leading-6 text-gray-900">Frequency</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700">{{ $record->periodical->frequency }}</dd>
            </div>
        </dl>

        <div class="px-4 sm:px-0">
            <h3 class="text-base font-semibold leading-7 text-gray-900">Publication Details</h3>
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
                <dd class="mt-1 text-sm leading-6 text-gray-700">{{ $record->periodical->format }}</dd>
            </div>
            <div class="px-4 py-3">
                <dt class="text-sm font-medium leading-6 text-gray-900">Format</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700">{{ $record->periodical->format }}</dd>
            </div>
            <div class="px-4 py-3 flex items-center gap-x-3">
                <dt class="text-sm font-medium leading-6 text-gray-900">Cover/Sample Image</dt>
                @if($record->periodical->cover_sample_image)
                    <img src="{{ asset('storage/' . $record->periodical->cover_sample_image) }}"
                         alt="Book cover"
                         class="h-16 w-12 object-cover rounded-md shadow-sm">
                @else
                    <div class="h-16 w-12 bg-gray-100 rounded-md flex items-center justify-center">
                        <svg class="h-8 w-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253z" />
                        </svg>
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

        @if($record->additional_notes || $record->periodical->summary_contents)
            <div class="mt-4 px-4 sm:px-0">
                <h3 class="text-base font-semibold leading-7 text-gray-900">Content Description</h3>
            </div>

            <dl class="grid grid-cols-2">
                @if($record->periodical->summary_contents)
                    <div class="px-4 py-3">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Summary/Contents</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 whitespace-pre-line">{{ $record->periodical->summary_contents }}</dd>
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
            <a href="{{ route('periodicals.edit', $record) }}">
                <button type="button" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold
                        text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2
                        focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Edit Periodical/Magazine</button>
            </a>
        </div>

    </div>
</x-layouts.records>
