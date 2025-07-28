<div>
    @if ($showModal)
        <!-- Modal Backdrop (Click outside to close) -->
        <div
            class="fixed inset-0 bg-black/70 z-50 flex items-center justify-center p-4"
            wire:click="close"
        >
            <!-- Modal Container (Prevents click propagation) -->
            <div
                class="bg-white rounded-xl shadow-2xl max-w-3xl w-full overflow-hidden relative"
                wire:click.stop
            >
                <!-- Close Button (Inside container, top-right corner) -->
                <button
                    wire:click="close"
                    class="absolute top-4 right-4 z-20 p-2 rounded-full bg-white/90 hover:bg-gray-100 transition shadow-sm border border-gray-200"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>

                <!-- Book Content Grid -->
                <div class="grid md:grid-cols-3 gap-0">
                    <!-- Book Cover (Left Column) -->
                    <div class="md:col-span-1 bg-gray-50 flex items-center justify-center p-8">
                        <img
                            src="{{ $book['image'] ?? 'https://via.placeholder.com/300x450?text=No+Cover' }}"
                            alt="{{ $book['title'] ?? 'Book Cover' }}"
                            class="w-full h-auto max-h-[400px] object-contain rounded-lg shadow-sm"
                        >
                    </div>

                    <!-- Book Details (Right Column) -->
                    <div class="md:col-span-2 p-8">
                        <!-- Title -->
                        <h1 class="text-3xl font-bold text-gray-900 mb-2">
                            {{ $book['title'] ?? 'Untitled Book' }}
                        </h1>

                        <!-- Author -->
                        <p class="text-lg text-gray-600 mb-6">
                            by <span class="font-medium text-usepmaroon">{{ $book['author'] ?? 'Unknown Author' }}</span>
                        </p>

                        <!-- Status Badge -->
                        <div class="mb-6">
                            <span class="px-3 py-1.5 rounded-full text-sm font-medium
                                @if(($book['status'] ?? '') === 'available') bg-green-100 text-green-800
                                @elseif(($book['status'] ?? '') === 'checked-out') bg-red-100 text-red-800
                                @else bg-gray-100 text-gray-800 @endif">
                                {{ ucfirst($book['status'] ?? 'unknown') }}
                            </span>
                        </div>

                        <!-- Description -->
                        <div class="prose max-w-none text-gray-700 border-t pt-6">
                            <p class="whitespace-pre-line">{{ $book['description'] ?? 'No description available.' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
