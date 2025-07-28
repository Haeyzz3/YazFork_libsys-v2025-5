<x-layouts.records heading-title="View Book Details">
    <div class="flex flex-col gap-6 rounded-xl bg-gradient-to-br from-slate-50 to-blue-50/30 p-6 shadow-sm">
        <!-- Book Information Section -->
        <div class="rounded-lg border border-blue-100 bg-gradient-to-r from-blue-50/40 to-indigo-50/30 p-6">
            <h3 class="mb-4 flex items-center text-lg font-semibold text-slate-800">
                <svg class="mr-2 h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253z" />
                </svg>
                Book Information
            </h3>
            <dl class="grid grid-cols-1 gap-4 sm:grid-cols-3">
                @if($record->accession_number)
                    <div class="rounded-md bg-white/80 border border-blue-100/50 p-4 shadow-sm hover:shadow-md transition-shadow duration-200">
                        <dt class="text-sm font-medium text-slate-700">Accession Number</dt>
                        <dd class="mt-1 text-sm text-slate-600">{{ $record->accession_number }}</dd>
                    </div>
                @endif

                @if($record->title)
                    <div class="rounded-md bg-white/80 border border-blue-100/50 p-4 shadow-sm hover:shadow-md transition-shadow duration-200">
                        <dt class="text-sm font-medium text-slate-700">Title</dt>
                        <dd class="mt-1 text-sm text-slate-600 font-medium">{{ $record->title }}</dd>
                    </div>
                @endif

                @if($record->book->authors)
                    <div class="rounded-md bg-white/80 border border-blue-100/50 p-4 shadow-sm hover:shadow-md transition-shadow duration-200">
                        <dt class="text-sm font-medium text-slate-700">Author/Authors</dt>
                        <dd class="mt-1 text-sm text-slate-600">
                            @if (is_array($record->book->authors))
                                {{ implode(', ', $record->book->authors) }}
                            @else
                                {{ $record->book->authors ?? 'Not specified' }}
                            @endif
                        </dd>
                    </div>
                @endif

                @if($record->book->editors)
                    <div class="rounded-md bg-white/80 border border-blue-100/50 p-4 shadow-sm hover:shadow-md transition-shadow duration-200">
                        <dt class="text-sm font-medium text-slate-700">Editor/Editors</dt>
                        <dd class="mt-1 text-sm text-slate-600">
                            @if (is_array($record->book->editors))
                                {{ implode(', ', $record->book->editors) }}
                            @else
                                {{ $record->book->editors ?? 'Not specified' }}
                            @endif
                        </dd>
                    </div>
                @endif

                @if($record->book?->publication_year)
                    <div class="rounded-md bg-white/80 border border-blue-100/50 p-4 shadow-sm hover:shadow-md transition-shadow duration-200">
                        <dt class="text-sm font-medium text-slate-700">Publication Year</dt>
                        <dd class="mt-1 text-sm text-slate-600">{{ $record->book?->publication_year ?? 'N/A' }}</dd>
                    </div>
                @endif

                @if($record->book?->publisher)
                    <div class="rounded-md bg-white/80 border border-blue-100/50 p-4 shadow-sm hover:shadow-md transition-shadow duration-200">
                        <dt class="text-sm font-medium text-slate-700">Publisher</dt>
                        <dd class="mt-1 text-sm text-slate-600">{{ $record->book?->publisher ?? 'N/A' }}</dd>
                    </div>
                @endif

                @if($record->book->publication_place)
                    <div class="rounded-md bg-white/80 border border-blue-100/50 p-4 shadow-sm hover:shadow-md transition-shadow duration-200">
                        <dt class="text-sm font-medium text-slate-700">Place of Publication</dt>
                        <dd class="mt-1 text-sm text-slate-600">{{ $record->book->publication_place }}</dd>
                    </div>
                @endif

                @if($record->book->isbn)
                    <div class="rounded-md bg-white/80 border border-blue-100/50 p-4 shadow-sm hover:shadow-md transition-shadow duration-200">
                        <dt class="text-sm font-medium text-slate-700">ISBN</dt>
                        <dd class="mt-1 text-sm text-slate-600 font-mono">{{ $record->book->isbn }}</dd>
                    </div>
                @endif

                @if($record->book->volume)
                    <div class="rounded-md bg-white/80 border border-blue-100/50 p-4 shadow-sm hover:shadow-md transition-shadow duration-200">
                        <dt class="text-sm font-medium text-slate-700">Volume</dt>
                        <dd class="mt-1 text-sm text-slate-600">{{ $record->book->volume }}</dd>
                    </div>
                @endif

                @if($record->book->edition)
                    <div class="rounded-md bg-white/80 border border-blue-100/50 p-4 shadow-sm hover:shadow-md transition-shadow duration-200">
                        <dt class="text-sm font-medium text-slate-700">Edition</dt>
                        <dd class="mt-1 text-sm text-slate-600">{{ $record->book->edition }}</dd>
                    </div>
                @endif
            </dl>
        </div>

        <!-- Classification & Location Section -->
        <div class="rounded-lg border border-emerald-100 bg-gradient-to-r from-emerald-50/40 to-teal-50/30 p-6">
            <h3 class="mb-4 flex items-center text-lg font-semibold text-slate-800">
                <svg class="mr-2 h-5 w-5 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                </svg>
                Classification & Location
            </h3>
            <dl class="grid grid-cols-1 gap-4 sm:grid-cols-3">
                @if($record->book->call_number)
                    <div class="rounded-md bg-white/80 border border-emerald-100/50 p-4 shadow-sm hover:shadow-md transition-shadow duration-200">
                        <dt class="text-sm font-medium text-slate-700">Call Number</dt>
                        <dd class="mt-1 text-sm text-slate-600 font-mono">{{ $record->book->call_number }}</dd>
                    </div>
                @endif

                @if($record->book->ddcClassification?->name)
                    <div class="rounded-md bg-white/80 border border-emerald-100/50 p-4 shadow-sm hover:shadow-md transition-shadow duration-200">
                        <dt class="text-sm font-medium text-slate-700">DDC Classification</dt>
                        <dd class="mt-1 text-sm text-slate-600">{{ $record->book->ddcClassification->name }}</dd>
                    </div>
                @endif

                @if($record->book->lcClassification?->name)
                    <div class="rounded-md bg-white/80 border border-emerald-100/50 p-4 shadow-sm hover:shadow-md transition-shadow duration-200">
                        <dt class="text-sm font-medium text-slate-700">LC Classification</dt>
                        <dd class="mt-1 text-sm text-slate-600">{{ $record->book->lcClassification->name }}</dd>
                    </div>
                @endif

                @if($record->book->physicalLocation?->name)
                    <div class="rounded-md bg-white/80 border border-emerald-100/50 p-4 shadow-sm hover:shadow-md transition-shadow duration-200">
                        <dt class="text-sm font-medium text-slate-700">Location</dt>
                        <dd class="mt-1 text-sm text-slate-600">{{ $record->book->physicalLocation->name }}</dd>
                    </div>
                @endif
            </dl>
        </div>

        <!-- Physical Description Section -->
        <div class="rounded-lg border border-amber-100 bg-gradient-to-r from-amber-50/40 to-orange-50/30 p-6">
            <h3 class="mb-4 flex items-center text-lg font-semibold text-slate-800">
                <svg class="mr-2 h-5 w-5 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                Physical Description
            </h3>
            <dl class="grid grid-cols-1 gap-4 sm:grid-cols-3">
                @if($record->book->coverType?->name)
                    <div class="rounded-md bg-white/80 border border-amber-100/50 p-4 shadow-sm hover:shadow-md transition-shadow duration-200">
                        <dt class="text-sm font-medium text-slate-700">Cover Type</dt>
                        <dd class="mt-1 text-sm text-slate-600">{{ $record->book->coverType->name }}</dd>
                    </div>
                @endif
                <div class="rounded-md bg-white/80 border border-amber-100/50 p-4 shadow-sm hover:shadow-md transition-shadow duration-200">
                    <dt class="text-sm font-medium text-slate-700">Book Cover</dt>
                    <dd class="mt-1">
                        @if($record->book->cover_image)
                            <img src="{{ asset('storage/' . $record->book->cover_image) }}"
                                 alt="Book cover"
                                 class="h-24 w-16 rounded-md object-cover shadow-md transition-transform hover:scale-105 border border-amber-200">
                        @else
                            <div class="h-24 w-16 rounded-md bg-gradient-to-br from-amber-50 to-orange-100 flex items-center justify-center border border-amber-200">
                                <svg class="h-10 w-10 text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253z" />
                                </svg>
                            </div>
                        @endif
                    </dd>
                </div>
            </dl>
        </div>

        <!-- Administrative Information Section -->
        <div class="rounded-lg border border-purple-100 bg-gradient-to-r from-purple-50/40 to-indigo-50/30 p-6">
            <h3 class="mb-4 flex items-center text-lg font-semibold text-slate-800">
                <svg class="mr-2 h-5 w-5 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                Administrative Information
            </h3>
            <dl class="grid grid-cols-1 gap-4 sm:grid-cols-3">
                @if($record->date_received)
                    <div class="rounded-md bg-white/80 border border-purple-100/50 p-4 shadow-sm hover:shadow-md transition-shadow duration-200">
                        <dt class="text-sm font-medium text-slate-700">Date Received</dt>
                        <dd class="mt-1 text-sm text-slate-600">{{ $record->date_received }}</dd>
                    </div>
                @endif

                @if($record->book->ics_number)
                    <div class="rounded-md bg-white/80 border border-purple-100/50 p-4 shadow-sm hover:shadow-md transition-shadow duration-200">
                        <dt class="text-sm font-medium text-slate-700">ICS Number</dt>
                        <dd class="mt-1 text-sm text-slate-600 font-mono">{{ $record->book->ics_number }}</dd>
                    </div>
                @endif

                @if($record->book->ics_date)
                    <div class="rounded-md bg-white/80 border border-purple-100/50 p-4 shadow-sm hover:shadow-md transition-shadow duration-200">
                        <dt class="text-sm font-medium text-slate-700">ICS Date</dt>
                        <dd class="mt-1 text-sm text-slate-600">{{ $record->book->ics_date }}</dd>
                    </div>
                @endif

                @if($record->book->pr_number)
                    <div class="rounded-md bg-white/80 border border-purple-100/50 p-4 shadow-sm hover:shadow-md transition-shadow duration-200">
                        <dt class="text-sm font-medium text-slate-700">PR Number</dt>
                        <dd class="mt-1 text-sm text-slate-600 font-mono">{{ $record->book->pr_number }}</dd>
                    </div>
                @endif

                @if($record->book->pr_date)
                    <div class="rounded-md bg-white/80 border border-purple-100/50 p-4 shadow-sm hover:shadow-md transition-shadow duration-200">
                        <dt class="text-sm font-medium text-slate-700">PR Date</dt>
                        <dd class="mt-1 text-sm text-slate-600">{{ $record->book->pr_date }}</dd>
                    </div>
                @endif

                @if($record->book->po_number)
                    <div class="rounded-md bg-white/80 border border-purple-100/50 p-4 shadow-sm hover:shadow-md transition-shadow duration-200">
                        <dt class="text-sm font-medium text-slate-700">PO Number</dt>
                        <dd class="mt-1 text-sm text-slate-600 font-mono">{{ $record->book->po_number }}</dd>
                    </div>
                @endif

                @if($record->book->po_date)
                    <div class="rounded-md bg-white/80 border border-purple-100/50 p-4 shadow-sm hover:shadow-md transition-shadow duration-200">
                        <dt class="text-sm font-medium text-slate-700">PO Date</dt>
                        <dd class="mt-1 text-sm text-slate-600">{{ $record->book->po_date }}</dd>
                    </div>
                @endif

                @if($record->book->source?->name)
                    <div class="rounded-md bg-white/80 border border-purple-100/50 p-4 shadow-sm hover:shadow-md transition-shadow duration-200">
                        <dt class="text-sm font-medium text-slate-700">Source</dt>
                        <dd class="mt-1 text-sm text-slate-600">{{ $record->book->source->name }}</dd>
                    </div>
                @endif

                <div class="rounded-md bg-white/80 border border-purple-100/50 p-4 shadow-sm hover:shadow-md transition-shadow duration-200">
                    <dt class="text-sm font-medium text-slate-700">Purchase Amount</dt>
                    <dd class="mt-1 text-sm text-slate-600 font-semibold">{{ $record->book->purchase_amount ? '₱' . number_format($record->book->purchase_amount, 2) : 'Not specified' }}</dd>
                </div>

                @if($record->acquisition_status)
                    <div class="rounded-md bg-white/80 border border-purple-100/50 p-4 shadow-sm hover:shadow-md transition-shadow duration-200">
                        <dt class="text-sm font-medium text-slate-700">Acquisition Status</dt>
                        <dd class="mt-1 text-sm text-slate-600">
                            <span class="inline-flex items-center rounded-md px-2 py-1 text-xs font-medium
                                {{ $record->acquisition_status === 'available' ? 'bg-green-100 text-green-800 ring-1 ring-inset ring-green-200' : 'bg-slate-100 text-slate-700 ring-1 ring-inset ring-slate-200' }}">
                                {{ ucfirst($record->acquisition_status) }}
                            </span>
                        </dd>
                    </div>
                @endif

                @if($record->condition)
                    <div class="rounded-md bg-white/80 border border-purple-100/50 p-4 shadow-sm hover:shadow-md transition-shadow duration-200">
                        <dt class="text-sm font-medium text-slate-700">Condition</dt>
                        <dd class="mt-1 text-sm text-slate-600">
                            <span class="inline-flex items-center rounded-md px-2 py-1 text-xs font-medium
                                {{ $record->condition === 'active' ? 'bg-green-100 text-green-800 ring-1 ring-inset ring-green-200' : 'bg-slate-100 text-slate-700 ring-1 ring-inset ring-slate-200' }}">
                                {{ ucfirst($record->condition) }}
                            </span>
                        </dd>
                    </div>
                @endif
            </dl>
        </div>

        <!-- Additional Information Section -->
        <div class="rounded-lg border border-rose-100 bg-gradient-to-r from-rose-50/40 to-pink-50/30 p-6">
            <h3 class="mb-4 flex items-center text-lg font-semibold text-slate-800">
                <svg class="mr-2 h-5 w-5 text-rose-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Additional Information
            </h3>
            <dl class="grid grid-cols-1 gap-4 sm:grid-cols-3">
                @if($record->book->table_of_contents)
                    <div class="rounded-md bg-white/80 border border-rose-100/50 p-4 shadow-sm hover:shadow-md transition-shadow duration-200">
                        <dt class="text-sm font-medium text-slate-700">Table of Contents</dt>
                        <dd class="mt-1 text-sm text-slate-600 whitespace-pre-line">{{ $record->book->table_of_contents }}</dd>
                    </div>
                @endif
                @if($record->subject_headings)
                    <div class="rounded-md bg-white/80 border border-rose-100/50 p-4 shadow-sm hover:shadow-md transition-shadow duration-200">
                        <dt class="text-sm font-medium text-slate-700">Subject Headings</dt>
                        <dd class="mt-1 text-sm text-slate-600">
                            @foreach($record->subject_headings as $subject)
                                <span class="inline-flex items-center rounded-md px-2 py-1 text-xs font-medium bg-rose-100 text-rose-800 ring-1 ring-inset ring-rose-200 mr-1 mb-1">
                                    {{ ucfirst($subject) }}
                                </span>
                            @endforeach
                        </dd>
                    </div>
                @endif
            </dl>
        </div>

        <!-- Action Button -->
        <div class="flex justify-end">
            <a href="{{ route('books.edit', $record) }}">
                <button type="button" class="rounded-md bg-accent px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-accent/80 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-accent transition-colors duration-200">
                    Edit Book
                </button>
            </a>
        </div>
    </div>
</x-layouts.records>
