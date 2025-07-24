<x-layouts.app :title="__( $attributes->get('heading-title') ?? $headingTitle )">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">

        <div class="px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-base font-semibold leading-6 text-gray-900">{{ $attributes->get('heading-title') ?? $headingTitle }}</h1>
                </div>
            </div>

            <div>
                <div class="sm:hidden">
                    <label for="tabs" class="sr-only">Select a tab</label>
                    <!-- Use an "onChange" listener to redirect the user to the selected tab URL. -->
                    <select id="tabs" name="tabs" class="block w-full rounded-md border-gray-300 focus:border-red-900 focus:ring-red-900">
                        <option>My Account</option>
                        <option>Company</option>
                        <option selected>Team Members</option>
                        <option>Billing</option>
                    </select>
                </div>
                <div class="hidden sm:block">
                    <div class="border-b border-gray-200 flex justify-between">
                        <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                            {{-- Add Book Tab --}}
                            <a href="{{ route('books.index') }}"
                               class="group inline-flex gap-2 items-center border-b-2 {{ request()->routeIs(['records','books.*']) ? 'border-red-900 text-rose-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} px-1 py-4 text-sm font-medium">
                                <flux:icon.book-open />
                                <span>Books</span>
                            </a>

                            <a href="{{ route('digital.index') }}"
                               class="group inline-flex gap-2 items-center border-b-2 {{ request()->routeIs(['digital.*']) ? 'border-red-900 text-rose-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} px-1 py-4 text-sm font-medium">
                                <flux:icon.play-pause />
                                <span>Multimedia Collection</span>
                            </a>

                            <a href="{{ route('periodicals.index') }}"
                               class="group inline-flex gap-2 items-center border-b-2 {{ request()->routeIs(['periodicals.*']) ? 'border-red-900 text-rose-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} px-1 py-4 text-sm font-medium">
                                <flux:icon name="newspaper" />
                                <span>Periodicals/Magazines</span>
                            </a>

                            <a href="{{ route('thesis.index') }}"
                               class="group inline-flex gap-2 items-center border-b-2 {{ request()->routeIs(['thesis.*']) ? 'border-red-900 text-rose-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} px-1 py-4 text-sm font-medium">
                                <flux:icon name="book" />
                                <span>Thesis/Dissertations</span>
                            </a>

                        </nav>
                        <a href="{{ route('options.index') }}"
                           class="group inline-flex gap-2 items-center border-b-2 {{ request()->routeIs(['options.*']) ? 'border-red-900 text-rose-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} px-1 py-4 text-sm font-medium">
                            <flux:icon name="adjustments-horizontal" />
                            <span>Options</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="py-8">
                {{ $slot }}
            </div>

        </div>

    </div>
</x-layouts.app>
