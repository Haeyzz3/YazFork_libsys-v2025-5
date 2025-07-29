<div>
    <!-- Header -->
    <div class="relative bg-gradient-to-r from-red-900 via-red-700 to-green-700 text-center py-6 mb-4 rounded-lg shadow-lg">
        <h1 class="text-xl font-bold text-white tracking-tight">Check-Out a Book</h1>
    </div>

    <!-- Checkout Form -->
    <div class="w-full max-w-7xl mx-auto">
        <div class="mt-6 flex flex-col gap-4">
            <div class="relative flex flex-col sm:flex-row items-center gap-3 w-full sm:w-auto">
                <input
                    type="text"
                    placeholder="Enter Accession No. or Book Title"
                    class="block w-full sm:w-96 rounded-full border-0 py-3 px-5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-200 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-red-700 transition-all duration-200 ease-in-out bg-white/90 backdrop-blur-sm sm:text-sm sm:leading-6"
                    aria-label="Book accession number or title"
                >
                <flux:icon name="magnifying-glass" class="absolute right-3 top-3 text-gray-500 hover:text-red-700 transition duration-200" />
            </div>
            <div class="relative flex flex-col sm:flex-row items-center gap-3 w-full sm:w-auto">
                <input
                    type="text"
                    placeholder="Enter Borrower Name or ID"
                    class="block w-full sm:w-96 rounded-full border-0 py-3 px-5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-200 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-red-700 transition-all duration-200 ease-in-out bg-white/90 backdrop-blur-sm sm:text-sm sm:leading-6"
                    aria-label="Borrower name or ID"
                >
                <flux:icon name="magnifying-glass" class="absolute right-3 top-3 text-gray-500 hover:text-red-700 transition duration-200" />
            </div>
            <button
                type="button"
                class="relative inline-flex items-center rounded-full bg-red-900 px-8 py-3 text-base font-semibold text-white shadow-md hover:bg-red-800 hover:scale-105 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-900 transition-all duration-200 ease-in-out transform"
                aria-label="Submit checkout"
            >
                <span class="relative z-10">Submit Checkout</span>
                <div class="absolute inset-0 bg-gradient-to-r from-red-700 to-red-900 opacity-50 rounded-full"></div>
            </button>
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
