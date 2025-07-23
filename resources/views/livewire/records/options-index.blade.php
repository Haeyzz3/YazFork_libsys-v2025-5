<nav class="-mb-px flex space-x-8" aria-label="Tabs">
    {{-- Add Book Tab --}}
    <a href="{{ route('books.index') }}"
       class="group inline-flex gap-1.5 items-center border-b-2 {{ request()->routeIs(['records','books.*']) ? 'border-red-900 text-rose-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} px-0.5 py-3 text-sm font-medium">
        <span>Books</span>
    </a>

    <a href="{{ route('digital.index') }}"
       class="group inline-flex gap-1.5 items-center border-b-2 {{ request()->routeIs(['digital.*']) ? 'border-red-900 text-rose-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} px-0.5 py-3 text-sm font-medium">
        <span>Multimedia Collection</span>
    </a>

    <a href="{{ route('periodicals.index') }}"
       class="group inline-flex gap-1.5 items-center border-b-2 {{ request()->routeIs(['periodicals.*']) ? 'border-red-900 text-rose-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} px-0.5 py-3 text-sm font-medium">
        <span>Periodicals/Magazines</span>
    </a>

    <a href="{{ route('thesis.index') }}"
       class="group inline-flex gap-1.5 items-center border-b-2 {{ request()->routeIs(['thesis.*']) ? 'border-red-900 text-rose-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} px-0.5 py-3 text-sm font-medium">
        <span>Thesis/Dissertations</span>
    </a>
</nav>
