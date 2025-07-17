<div>

    <x-flash-messenger/>

    <div class="flex justify-between items-center w-full sm:w-auto">
        <!-- Search bar -->
        <div class="flex-1 sm:flex-none">
            <input
                type="text"
                wire:model.live="search"
                placeholder="acc no., title, ddc class, author, year"
                class="block w-full sm:w-74 rounded-md border-0 py-2 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
            >
        </div>
        <div class="flex gap-2">
            <a href="{{ route('books.create') }}">
                <button
                    type="button"
                    class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                >
                    Add book
                </button>
            </a>
            <button
                wire:click="openModal"
                type="button"
                class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
            >
                Import Books
            </button>
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
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">DDC/LC Classification</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Author</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Year of Publication</th>
                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6 lg:pr-8">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                    @forelse($records as $record)
                        <tr>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8">{{ $record->accession_number }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-600">{{ $record->title }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-600">{{ $record->ddc_classification ?? $record->lc_classification }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-600">{{ $record->book->author ?? 'Not specified' }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-600">{{ $record->book->publication_year ?? 'Not specified' }}</td>
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

    <x-modal>
        hi I'm in the modal
        <br>

        diri mo mag import ug books
        <br>
        naay modal diri kay i orient sa tika na dapat csv then ang mga columns nimo is dapat ing-ani ug format
        <form wire:submit.prevent="submit" enctype="multipart/form-data">

            <div class="mt-2">
                <input
                    type="file"
                    name="import_csv"
                    wire:model.live="import_csv"
                    accept=".csv"
                    required
                >
                @error('import_csv')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                <button
                    type="submit"
                    class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                >
                    <span wire:loading wire:target="submit">Importing...</span>
                    <span wire:loading.remove wire:target="submit">Proceed Import</span>
                </button>
            </div>
        </form>

    </x-modal>
</div>
