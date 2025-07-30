<section class="py-16 bg-white" >
    <div class="container mx-auto px-4" >
        <h2 class="text-3xl font-bold text-center text-usepmaroon mb-12" >Book Collection</h2 >

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6 px-4" >
            @foreach($books as $index => $book)
                <div
                    wire:click="showBookDetails({{ $index }})"
                    class="book-card bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 relative group cursor-pointer"
                >
                    <div class="relative pb-[150%] overflow-hidden" >
                        <img src="{{ $book['image'] }}"
                             alt="Book Cover"
                             class="absolute h-full w-full object-cover transition-transform duration-500 group-hover:scale-105" >
                        <div class="absolute inset-0 flex items-end p-4" >
                            <h3 class="text-usepmaroon font-semibold text-lg transition-all duration-300 group-hover:bg-[#fbeaea] group-hover:text-[#800000] group-hover:shadow-md px-2 py-1 rounded" >
                                {{ $book['title'] }}
                            </h3 >
                        </div >
                    </div >
                    <div class="p-3" >
                        <p class="text-sm text-gray-600 truncate" >{{ $book['author'] }}</p >
                        <div class="flex justify-between items-center mt-2" >
                            @if($book['status'] === 'available')
                                <span class="text-xs font-medium px-2 py-1 bg-green-100 text-green-800 rounded-full" >Available</span >
                            @elseif($book['status'] === 'checked-out')
                                <span class="text-xs font-medium px-2 py-1 bg-red-100 text-red-800 rounded-full" >Checked Out</span >
                            @else
                                <span class="text-xs font-medium px-2 py-1 bg-yellow-100 text-yellow-800 rounded-full" >Reserved</span >
                            @endif
                            <span
                                class="text-xs text-gray-600 font-bold bg-gray-100 px-2 py-1 rounded-full" >{{ $book['publication_year'] }}</span >
                        </div >
                    </div >
                </div >
            @endforeach
        </div >

        <div class="flex justify-center mt-12" >
            {{ $books->links() }}
        </div >
    </div >
</section >
