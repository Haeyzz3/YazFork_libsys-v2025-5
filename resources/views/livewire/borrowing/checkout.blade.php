<div>
    <!-- Header -->
    <div class="relative bg-gradient-to-r from-red-900 via-red-700 to-green-700 text-center py-6 mb-4 rounded-lg shadow-lg">
        <h1 class="text-xl font-bold text-white tracking-tight">Borrow a Book</h1>
    </div>

    <!-- Checkout Form -->
    <div class="w-full max-w-7xl mx-auto">
        <div class="flex-1 flex justify-center items-center px-4 py-8">
            <div class="flex flex-col lg:flex-row gap-8 max-w-6xl w-full">
                <!-- Main Form -->
                <div class="flex-1 max-w-2xl">
                    <div class="bg-white rounded-xl shadow-2xl p-8">
                        <!-- Borrow Type -->
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Borrow Type</label>
                            <div class="flex space-x-4">
                                <label class="flex items-center">
                                    <input type="radio" name="borrowType" value="inside" class="mr-2" checked>
                                    <span class="text-sm">Inside Library</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="radio" name="borrowType" value="outside" class="mr-2">
                                    <span class="text-sm">Take Home</span>
                                </label>
                            </div>
                        </div>
                        <!-- Accession Number -->
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Book Accession Number</label>
                            <div class="flex gap-2">
                                <button class="px-6 py-3 w-full flex gap-4 justify-center bg-red-800 text-white rounded-lg hover:bg-red-900 transition duration-200">
                                    <flux:icon name="qr-code"></flux:icon>
                                    <span>Scan to Find Book</span>
                                </button>
                            </div>
                        </div>

                        <!-- Book Search -->
                        <div class="mb-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Or Search Books</label>
                                <input
                                    type="text"
                                    wire:model.live="search"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-800 focus:border-transparent"
                                    placeholder="Search by accession, title or author..."
                                >
                                <div class="mt-2 bg-white border border-gray-200 rounded-lg shadow-lg max-h-48 overflow-y-auto">
                                    @if ($records->isEmpty())
                                        <p class="text-gray-500">No books found.</p>
                                    @else
                                        <ul class="">
                                            @foreach ($records as $record)
                                                <li
                                                    wire:click="selectBook({{ $record->id }})"
                                                    class="p-4 bg-white hover:bg-gray-100 hover:cursor-pointer border-b border-gray-200"
                                                >
                                                    <h3 class="text-md font-semibold">{{ $record->title }}</h3>
                                                    <div class="flex justify-between">
                                                        <p class="text-sm text-gray-600">Accession number: {{ $record->accession_number }}</p>
                                                        <p class="text-sm text-gray-600">Authors: {{ implode(', ', $record->book->authors) }}</p>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Book Details -->
                <div class="flex-1 max-w-2xl">
                    <div class="bg-white rounded-xl shadow-2xl p-8">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-2xl font-bold text-red-800">Book Details</h2>
                            <button wire:click="clearSelection" class="text-gray-500 hover:text-gray-700">
                                <i class="ti ti-x text-xl"></i>
                            </button>
                        </div>
                        @if ($selectedBook)
                            <div class="grid md:grid-cols-2 gap-6">
                                <div>
                                    <div class="w-full max-w-xs mx-auto h-64 bg-gray-200 rounded-lg flex items-center justify-center">
                                        <i class="ti ti-book text-gray-400 text-4xl"></i>
                                    </div>
                                </div>
                                <div class="space-y-4">
                                    <div>
                                        <label class="font-semibold text-gray-700">Title:</label>
                                        <p class="text-gray-900">{{ $selectedBook['title'] }}</p>
                                    </div>
                                    <div>
                                        <label class="font-semibold text-gray-700">Author:</label>
                                        <p class="text-gray-900">{{ implode(', ', $selectedBook['authors']) }}</p>
                                    </div>
                                    <div>
                                        <label class="font-semibold text-gray-700">Accession Number:</label>
                                        <p class="text-gray-900">{{ $selectedBook['accession_number'] }}</p>
                                    </div>
                                    <div>
                                        <label class="font-semibold text-gray-700">Status:</label>
                                        <span class="inline-block px-3 py-1 rounded-full text-sm bg-green-100 text-green-800">
                            {{ $selectedBook['status'] ?? 'Available' }}
                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-8 flex justify-end">
                                <button class="px-6 py-3 bg-red-800 text-white rounded-lg hover:bg-red-900 transition duration-200">
                                    <i class="ti ti-book-2 mr-2"></i>Borrow Book
                                </button>
                            </div>
                        @else
                            <p class="text-gray-500">Select a book to view details.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Checkouts Table -->
        <div id="recent-checkouts" class="mt-8 px-8 flow-root">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead>
                        <tr>
                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6 lg:pl-8">Accession No.</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Book Title</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Borrower</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Checkout Date</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Due Date</th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6 lg:pr-8">
                                <span class="sr-only">View</span>
                            </th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                        <!-- Example Data -->
                        <tr class="hover:bg-gray-50 transition duration-150">
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8">A12345</td>
                            <td class="px-3 py-4 text-sm text-gray-600 max-w-md truncate">Sample Book Title</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-600">John Doe</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-600">2025-07-29</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-600">2025-08-12</td>
                            <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6 lg:pr-8">
                                <a href="#" class="text-red-900 hover:text-red-700 transition duration-150">View details</a>
                            </td>
                        </tr>
                        <!-- Placeholder for Empty State -->
                        <tr>
                            <td colspan="6" class="py-4 text-center text-sm text-gray-600">No recent checkouts found.</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Loading Overlay -->
    <div
        class="fixed inset-0 bg-gray-800/75 backdrop-blur-sm flex items-center justify-center z-45 hidden"
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
            <span class="mt-2 text-white text-lg">Processing checkout, please wait...</span>
        </div>
    </div>
</div>
