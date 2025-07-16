<div>
    <div class="flex justify-between items-center w-full sm:w-auto">
        <!-- Search bar -->
        <div class="flex-1 sm:flex-none">
            <input
                type="text"
                wire:model.live="search"
                placeholder="acc no., title, ddc class, author"
                class="block w-full sm:w-64 rounded-md border-0 py-2 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
            >
        </div>
        <a href="{{ route('periodicals.create') }}">
            <button
                type="button"
                class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
            >
                Add periodical/magazine
            </button>
        </a>
    </div>

    <div id="books-table" class="mt-8 flow-root">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle">
                <table class="min-w-full divide-y divide-gray-300">
                    <thead>
                    <tr>
                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6 lg:pl-8">Title</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">DDC classification</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Publisher</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Acquisition Status</th>
                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6 lg:pr-8">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                    @forelse($records as $record)
                        <tr>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8">{{ $record->title }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-600">{{ $record->ddc_classification }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-600">{{ $record->periodical->publisher ?? 'Not specified' }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-600">{{ $record->acquisition_status }}</td>
                            <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6 lg:pr-8">
                                <a href="{{ route('books.show', $record) }}" class="text-indigo-600 hover:text-indigo-900">View all details</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-4 text-center text-sm text-gray-600">No records found.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Pagination -->
    <div class="py-8">
        {{ $records->links() }}
    </div>
</div>
