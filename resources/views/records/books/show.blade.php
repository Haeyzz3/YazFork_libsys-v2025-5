<x-layouts.records>
    <div class="flex flex-col gap-2 rounded-xl">
        <div class="px-4 sm:px-0">
            <h3 class="text-base font-semibold leading-7 text-gray-900">Book Information</h3>
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
                <dt class="text-sm font-medium leading-6 text-gray-900">Primary Author</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700">{{ $record->book->primary_author ?? 'Not specified' }}</dd>
            </div>
            <div class="px-4 py-3">
                <dt class="text-sm font-medium leading-6 text-gray-900">Additional Authors</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700">{{ $record->book->additional_authors ?? 'None' }}</dd>
            </div>
            <div class="px-4 py-3">
                <dt class="text-sm font-medium leading-6 text-gray-900">Editor</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700">{{ $record->book->editor ?? 'Not specified' }}</dd>
            </div>
            <div class="px-4 py-3">
                <dt class="text-sm font-medium leading-6 text-gray-900">Language</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700">{{ $record->language }}</dd>
            </div>
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
            <div class="px-4 py-3">
                <dt class="text-sm font-medium leading-6 text-gray-900">Additional Notes</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700">{{ $record->additional_notes ?? 'None' }}</dd>
            </div>
        </dl>

        <div class="mt-4 px-4 sm:px-0">
            <h3 class="text-base font-semibold leading-7 text-gray-900">Publication Details</h3>
        </div>

        <dl class="grid grid-cols-1 sm:grid-cols-3">
            <div class="px-4 py-3">
                <dt class="text-sm font-medium leading-6 text-gray-900">Publication Year</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700">{{ $record->book?->publication_year ?? 'N/A' }}</dd>
            </div>
            <div class="px-4 py-3">
                <dt class="text-sm font-medium leading-6 text-gray-900">Publisher</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700">{{ $record->book?->publisher ?? 'N/A' }}</dd>
            </div>
            <div class="px-4 py-3">
                <dt class="text-sm font-medium leading-6 text-gray-900">Place of Publication</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700">{{ $record->book->place_of_publication }}</dd>
            </div>
            <div class="px-4 py-3">
                <dt class="text-sm font-medium leading-6 text-gray-900">ISBN/ISSN</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700">{{ $record->book->isbn_issn }}</dd>
            </div>
            <div class="px-4 py-3">
                <dt class="text-sm font-medium leading-6 text-gray-900">Series Title</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700">{{ $record->book->series_title ?? 'Not part of a series' }}</dd>
            </div>
            <div class="px-4 py-3">
                <dt class="text-sm font-medium leading-6 text-gray-900">Edition</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700">{{ $record->book->edition ?? 'Not specified' }}</dd>
            </div>
            <div class="px-4 py-3">
                <dt class="text-sm font-medium leading-6 text-gray-900">Cover Type</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700">{{ $record->book->cover_type }}</dd>
            </div>
            <div class="px-4 py-3 flex items-center gap-x-3">
                <dt class="text-sm font-medium leading-6 text-gray-900">Book Cover</dt>
                @if($record->book->book_cover_image)
                    <img src="{{ asset('storage/' . $record->book->book_cover_image) }}"
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

        @if($record->book->table_of_contents || $record->book->summary_abstract)
            <div class="mt-4 px-4 sm:px-0">
                <h3 class="text-base font-semibold leading-7 text-gray-900">Additional Information</h3>
            </div>

            <dl class="grid grid-cols-1">
                @if($record->book->table_of_contents)
                    <div class="px-4 py-3">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Table of Contents</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 whitespace-pre-line">{{ $record->book->table_of_contents }}</dd>
                    </div>
                @endif
                @if($record->book->summary_abstract)
                    <div class="px-4 py-3">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Summary/Abstract</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 whitespace-pre-line">{{ $record->book->summary_abstract }}</dd>
                    </div>
                @endif
            </dl>
        @endif

        <div class="mt-4 flex justify-end px-4">
            <a href="{{ route('books.edit', $record) }}">
                <button type="button" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold
                        text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2
                        focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Edit Book</button>
            </a>
        </div>
    </div>
</x-layouts.records>
