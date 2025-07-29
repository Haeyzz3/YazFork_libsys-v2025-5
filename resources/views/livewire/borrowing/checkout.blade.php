<div>
    <!-- Header -->
    <div class="relative bg-gradient-to-r from-red-900 via-red-700 to-green-700 text-center py-6 mb-4 rounded-lg shadow-lg">
        <h1 class="text-xl font-bold text-white tracking-tight">Check-Out a Book</h1>
    </div>

    <!-- Checkout Form -->
    <div class="w-full max-w-7xl mx-auto">

        <div class="flex-1 flex justify-center items-center px-4 py-8">
            <div class="flex flex-col lg:flex-row gap-8 max-w-6xl w-full">
                <!-- Main Form -->
                <div class="flex-1 max-w-2xl">
                    <div class="bg-white rounded-xl shadow-2xl p-8">
                        <div class="text-center mb-8">
                            <div class="bg-yellow-500 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                                <i class="ti ti-book text-red-800 text-2xl"></i>
                            </div>
                            <h1 class="text-3xl font-bold text-red-800 mb-2">Library Borrowing System</h1>
                            <p class="text-gray-600">Scan or search for books to borrow or return</p>
                        </div>

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
                            <div class="mt-2 p-3 bg-yellow-50 border border-yellow-200 rounded-lg">
                                <p class="text-sm text-yellow-800">
                                    <i class="ti ti-alert-triangle mr-1"></i>
                                    Books borrowed outside have a 7-day return period with penalties for late returns.
                                </p>
                            </div>
                        </div>

                        <!-- Accession Number -->
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Book Accession Number</label>
                            <div class="flex gap-2">
                                <input type="text"
                                       class="flex-1 px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-800 focus:border-transparent"
                                       placeholder="Enter or scan accession number">
                                <button class="px-4 py-3 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition duration-200">
                                    <i class="ti ti-qrcode"></i>
                                </button>
                                <button class="px-6 py-3 bg-red-800 text-white rounded-lg hover:bg-red-900 transition duration-200">
                                    Find Book
                                </button>
                            </div>
                        </div>

                        <!-- Book Search -->
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Or Search Books</label>
                            <input type="text"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-800 focus:border-transparent"
                                   placeholder="Search by title or author...">

                            <!-- Sample Search Results -->
                            <div class="mt-2 bg-white border border-gray-200 rounded-lg shadow-lg max-h-48 overflow-y-auto">
                                <div class="p-3 hover:bg-gray-50 cursor-pointer border-b border-gray-100">
                                    <p class="font-semibold text-gray-900">Sample Book Title</p>
                                    <p class="text-sm text-gray-600">Sample Author</p>
                                    <p class="text-xs text-gray-500">Accession: ACC001</p>
                                </div>
                                <div class="p-3 hover:bg-gray-50 cursor-pointer border-b border-gray-100">
                                    <p class="font-semibold text-gray-900">Another Book Title</p>
                                    <p class="text-sm text-gray-600">Another Author</p>
                                    <p class="text-xs text-gray-500">Accession: ACC002</p>
                                </div>
                                <div class="p-3 hover:bg-gray-50 cursor-pointer">
                                    <p class="font-semibold text-gray-900">Third Book Example</p>
                                    <p class="text-sm text-gray-600">Third Author</p>
                                    <p class="text-xs text-gray-500">Accession: ACC003</p>
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
                            <button class="text-gray-500 hover:text-gray-700">
                                <i class="ti ti-x text-xl"></i>
                            </button>
                        </div>
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <div class="w-full max-w-xs mx-auto h-64 bg-gray-200 rounded-lg flex items-center justify-center">
                                    <i class="ti ti-book text-gray-400 text-4xl"></i>
                                </div>
                            </div>
                            <div class="space-y-4">
                                <div>
                                    <label class="font-semibold text-gray-700">Title:</label>
                                    <p class="text-gray-900">Introduction to Computer Science</p>
                                </div>
                                <div>
                                    <label class="font-semibold text-gray-700">Author:</label>
                                    <p class="text-gray-900">Dr. Maria Santos</p>
                                </div>
                                <div>
                                    <label class="font-semibold text-gray-700">Accession Number:</label>
                                    <p class="text-gray-900">CS2024001</p>
                                </div>
                                <div>
                                    <label class="font-semibold text-gray-700">Status:</label>
                                    <span class="inline-block px-3 py-1 rounded-full text-sm bg-green-100 text-green-800">Available</span>
                                </div>
                            </div>
                        </div>
                        <div class="mt-8 flex justify-end">
                            <button class="px-6 py-3 bg-red-800 text-white rounded-lg hover:bg-red-900 transition duration-200">
                                <i class="ti ti-book-2 mr-2"></i>Borrow Book
                            </button>
                        </div>
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
