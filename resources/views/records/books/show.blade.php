<x-layouts.records heading-title="View Book Details">
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
                <dt class="text-sm font-medium leading-6 text-gray-900">Author/Authors</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700">
                    @if (is_array($record->book->authors))
                        {{ implode(', ', $record->book->authors) }}
                    @else
                        {{ $record->book->authors ?? 'Not specified' }}
                    @endif
                </dd>
            </div>
            <div class="px-4 py-3">
                <dt class="text-sm font-medium leading-6 text-gray-900">Editors</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700">{{ $record->book->editor ?? 'Not specified' }}</dd>
            </div>
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
                <dd class="mt-1 text-sm leading-6 text-gray-700">{{ $record->book->publication_place }}</dd>
            </div>
            <div class="px-4 py-3">
                <dt class="text-sm font-medium leading-6 text-gray-900">ISBN</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700">{{ $record->book->isbn }}</dd>
            </div>
        </dl>

        <div class="px-4 sm:px-0">
            <h3 class="text-base font-semibold leading-7 text-gray-900">Classification & Location</h3>
        </div>

        <dl class="grid grid-cols-1 sm:grid-cols-3">
            <div class="px-4 py-3">
                <dt class="text-sm font-medium leading-6 text-gray-900">DDC Classification</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700">{{ $record->book->ddcClassification->name }}</dd>
            </div>
            <div class="px-4 py-3">
                <dt class="text-sm font-medium leading-6 text-gray-900">Call Number</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700">{{ $record->book->call_number }}</dd>
            </div>
            <div class="px-4 py-3">
                <dt class="text-sm font-medium leading-6 text-gray-900">Location</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700">{{ $record->book->physicalLocation->name }}</dd>
            </div>
        </dl>

        <div class="px-4 sm:px-0">
            <h3 class="text-base font-semibold leading-7 text-gray-900">Physical Description</h3>
        </div>

        <dl class="grid grid-cols-1 sm:grid-cols-3">
            <div class="px-4 py-3">
                <dt class="text-sm font-medium leading-6 text-gray-900">Edition</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700">{{ $record->book->edition ?? 'Not specified' }}</dd>
            </div>
            <div class="px-4 py-3">
                <dt class="text-sm font-medium leading-6 text-gray-900">Cover Type</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700">{{ $record->book->coverType->name }}</dd>
            </div>
            <div class="px-4 py-3 flex items-center gap-x-3">
                <dt class="text-sm font-medium leading-6 text-gray-900">Book Cover</dt>
                @if($record->book->cover_image)
                    <img src="{{ asset('storage/' . $record->book->cover_image) }}"
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
            <h3 class="text-base font-semibold leading-7 text-gray-900">Administrative Information</h3>
        </div>

        <dl class="grid grid-cols-1 sm:grid-cols-3">
            <div class="px-4 py-3">
                <dt class="text-sm font-medium leading-6 text-gray-900">Date Received</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700">{{ $record->date_received }}</dd>
            </div>
            <div class="px-4 py-3">
                <dt class="text-sm font-medium leading-6 text-gray-900">Source</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700">{{ $record->book->source->name }}</dd>
            </div>
            <div class="px-4 py-3">
                <dt class="text-sm font-medium leading-6 text-gray-900">Purchase Amount</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700">{{ $record->book->purchase_amount ? '₱' . number_format($record->book->purchase_amount, 2) : 'Not specified' }}</dd>
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

        <div class="mt-4 px-4 sm:px-0">
            <h3 class="text-base font-semibold leading-7 text-gray-900">Additional Information</h3>
        </div>

        <dl class="grid grid-cols-3">
            @if($record->book->table_of_contents)
                <div class="px-4 py-3">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Table of Contents</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 whitespace-pre-line">{{ $record->book->table_of_contents }}</dd>
                </div>
            @endif
        </dl>

        <div class="mt-4 flex justify-end px-4">
            <a href="{{ route('books.edit', $record) }}">
                <button type="button" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold
                        text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2
                        focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Edit Book</button>
            </a>
        </div>
    </div>
</x-layouts.records>
