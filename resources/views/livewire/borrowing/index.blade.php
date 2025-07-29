<div>
    <x-flash-messenger/>

    <div class="flex justify-between items-center w-full sm:w-auto">
        <!-- Search bar -->
        <div class="flex items-center gap-3 sm:flex-none">
            <input
                type="text"
                wire:model.live="search"
                placeholder="Search by borrower, book title, or accession no."
                class="block w-full sm:w-80 rounded-md border-0 py-2 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-red-700 transition duration-150 ease-in-out sm:text-sm sm:leading-6"
                aria-label="Search borrowing records"
            >
            <flux:icon name="magnifying-glass" class="text-gray-500 hover:text-red-700 transition duration-150" />
        </div>
        <div class="flex gap-2">
            <a href="">
                <button
                    type="button"
                    class="block rounded-md bg-red-900 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-red-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-900"
                >
                    Check-Out
                </button>
            </a>
            <a href="">
                <button
                    type="button"
                    class="block rounded-md bg-red-900 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-red-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-900"
                >
                    Check-In
                </button>
            </a>
        </div>
    </div>

    <div id="borrowing-table" class="mt-8 flow-root">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle">
                <table class="min-w-full divide-y divide-gray-300">
                    <thead>
                    <tr>
                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6 lg:pl-8">Accession No.</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Book Title</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Borrower</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Borrow Date</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Due Date</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Status</th>
                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6 lg:pr-8">
                            <span class="sr-only">View</span>
                        </th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                    @forelse($borrowings as $borrowing)
                        <tr>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8">{{ $borrowing['accession_number'] }}</td>
                            <td class="px-3 py-4 text-sm text-gray-600 max-w-md truncate">{{ $borrowing['book']['title'] }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-600">{{ $borrowing['borrower']['name'] }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-600">{{ $borrowing['borrow_date'] }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-600">{{ $borrowing['due_date'] }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-600">{{ $borrowing['status'] }}</td>
                            <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6 lg:pr-8">
                                <a href="#" class="text-red-900 hover:text-indigo-900">View details</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-4 text-center text-sm text-gray-600">No borrowing records found.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Loading Overlay -->
    <div
        wire:loading
        class="fixed inset-0 bg-gray-800/75 backdrop-blur-sm flex items-center justify-center z-45"
    >
        <div class="flex flex-col items-center justify-center min-h-screen">
            <svg
                class="animate-spin h-10 w-10 text-red-900"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
            >
                <circle
                    class="opacity-25"
                    cx="12"
                    cy="12"
                    r="10"
                    stroke="currentColor"
                    stroke-width="4"
                ></circle>
                <path
                    class="opacity-75"
                    fill="currentColor"
                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
                ></path>
            </svg>
            <span class="mt-2 text-white text-lg">Loading borrowing records, please wait...</span>
        </div>
    </div>
</div>
