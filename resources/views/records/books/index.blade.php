<x-layouts.records heading-title="Manage Books">
    <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none flex justify-end gap-2">
        <div class="flex gap-4 w-full sm:w-auto">
            <!-- Search bar -->
            <div class="flex-1 sm:flex-none">
                <input type="text" name="search" id="search" placeholder="Search by title..."
                       class="block w-full sm:w-64 rounded-md border-0 py-2 px-3 text-gray-900
                       shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400
                       focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                       value="{{ request('search') }}"
                       hx-get="{{ route('books.index') }}"
                       hx-trigger="input changed delay:500ms"
                       hx-target="#books-table"
                       hx-swap="innerHTML">
            </div>
            <!-- Filter dropdown -->
            <div>
                <select name="acquisition_status" id="acquisition_status"
                        class="block w-full sm:w-48 rounded-md border-0 py-2 px-3 text-gray-900
                        shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset
                        focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        hx-get="{{ route('books.index') }}"
                        hx-trigger="change"
                        hx-target="#books-table"
                        hx-swap="innerHTML">
                    <option value="">All Statuses</option>
                    <option value="Available" {{ request('acquisition_status') == 'Available' ? 'selected' : '' }}>Available</option>
                    <option value="On Loan" {{ request('acquisition_status') == 'On Loan' ? 'selected' : '' }}>On Loan</option>
                    <option value="Reserved" {{ request('acquisition_status') == 'Reserved' ? 'selected' : '' }}>Reserved</option>
                </select>
            </div>
            <a href="{{ route('books.create') }}">
                <button type="button" class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold
                           text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2
                           focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Add book
                </button>
            </a>
        </div>
    </div>
    <div id="books-table" class="mt-8 flow-root">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle">
                <table class="min-w-full divide-y divide-gray-300">
                    <thead>
                    <tr>
                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6 lg:pl-8">Accession no.</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Title</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">DDC classification</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Acquisition Status</th>
                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6 lg:pr-8">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                    @foreach($records as $record)
                        <tr>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8">{{ $record->accession_number }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $record->title }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $record->ddc_classification }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $record->acquisition_status }}</td>
                            <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6 lg:pr-8">
                                <a href="{{ route('books.show', $record) }}" class="text-indigo-600 hover:text-indigo-900">View all details</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Render pagination links -->
    <div class="py-8">
        {{ $records->links() }}
    </div>
</x-layouts.records>
