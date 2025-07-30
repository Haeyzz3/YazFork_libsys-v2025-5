<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center text-usepmaroon mb-12">Book Collection</h2>

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6 px-4">
            @foreach($books as $book)
                <div
                    wire:click="showBookDetails({{ $book['id'] }})"
                    class="book-card bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 relative group cursor-pointer"
                    wire:loading.class="opacity-50"
                    wire:target="showBookDetails({{ $book['id'] }})"
                >
                    <div class="relative pb-[150%] overflow-hidden">
                        <img src="{{ $book['image'] }}"
                             alt="Book Cover"
                             class="absolute h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                             loading="lazy">
                        <div class="absolute inset-0 flex items-end p-4">
                            <h3 class="text-usepmaroon font-semibold text-lg transition-all duration-300 group-hover:bg-[#fbeaea] group-hover:text-[#800000] group-hover:shadow-md px-2 py-1 rounded">
                                {{ $book['title'] }}
                            </h3>
                        </div>
                    </div>
                    <div class="p-3">
                        <p class="text-sm text-gray-600 truncate">{{ $book['author'] }}</p>
                        <div class="flex justify-between items-center mt-2">
                            @if($book['status'] === 'available')
                                <span class="text-xs font-medium px-2 py-1 bg-green-100 text-green-800 rounded-full">Available</span>
                            @elseif($book['status'] === 'checked-out')
                                <span class="text-xs font-medium px-2 py-1 bg-red-100 text-red-800 rounded-full">Checked Out</span>
                            @else
                                <span class="text-xs font-medium px-2 py-1 bg-yellow-100 text-yellow-800 rounded-full">Reserved</span>
                            @endif
                            <span class="text-xs text-gray-600 font-bold bg-gray-100 px-2 py-1 rounded-full">{{ $book['publication_year'] }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="flex justify-center mt-12">
            {{ $books->links() }}
        </div>
    </div>

    <!-- Integrated Modal -->
    @if($showModal && $selectedBook)
        <div
            class="fixed inset-0 bg-black/70 backdrop-blur-sm z-50 flex items-center justify-center p-4"
            wire:click="closeModal"
        >
            <div
                class="bg-white rounded-xl shadow-2xl max-w-3xl w-full overflow-hidden relative"
                wire:click.stop
            >
                <button
                    wire:click="closeModal"
                    class="absolute top-4 right-4 z-20 p-2 rounded-full bg-white/90 hover:bg-gray-100 transition shadow-sm border border-gray-200"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>

                <div class="grid md:grid-cols-3 gap-0">
                    <div class="md:col-span-1 bg-gray-900 flex items-center justify-center p-6">
                        <img
                            src="{{ $selectedBook['image'] }}"
                            alt="{{ $selectedBook['title'] }}"
                            class="w-full h-auto max-h-[400px] object-contain rounded-lg shadow-sm"
                        >
                    </div>

                    <div class="md:col-span-2 p-8">
                        <h1 class="text-3xl font-bold text-gray-900 mb-2">
                            {{ $selectedBook['title'] }}
                        </h1>

                        <p class="text-lg text-gray-600 mb-6">
                            by <span class="font-medium text-usepmaroon">{{ $selectedBook['author'] }}</span>
                        </p>

                        <div class="mb-6 space-y-2">
                            <span class="px-3 py-1.5 rounded-full text-sm font-medium
                                @if($selectedBook['status'] === 'available') bg-green-100 text-green-800
                                @elseif($selectedBook['status'] === 'checked-out') bg-red-100 text-red-800
                                @else bg-gray-100 text-gray-800 @endif">
                                {{ ucfirst($selectedBook['status']) }}
                            </span>


                            <div class="text-sm text-gray-600 space-y-1 mt-4">
                                <div class="grid grid-cols-[auto_1fr] gap-x-4 gap-y-1">
                                    <span class="font-semibold">Publisher</span>
                                    <span>: {{ $selectedBook['publisher'] }}</span>

                                    <span class="font-semibold">Year Published</span>
                                    <span>: {{ $selectedBook['publication_year'] }}</span>

                                    <span class="font-semibold">Pages</span>
                                    <span>: {{ $selectedBook['pages'] }}</span>

                                    <span class="font-semibold">ISBN</span>
                                    <span>: {{ $selectedBook['isbn'] }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="prose max-w-none text-gray-700 border-t pt-6">
                            <p class="whitespace-pre-line">{{ $selectedBook['description'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</section>
