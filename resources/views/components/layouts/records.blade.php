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
                    <select id="tabs" name="tabs" class="block w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                        <option>My Account</option>
                        <option>Company</option>
                        <option selected>Team Members</option>
                        <option>Billing</option>
                    </select>
                </div>
                <div class="hidden sm:block">
                    <div class="border-b border-gray-200">
                        <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                            {{-- Add Book Tab --}}
                            <a href="{{ route('books.index') }}"
                               class="group inline-flex items-center border-b-2 {{ request()->routeIs(['records','books.*']) ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} px-1 py-4 text-sm font-medium">
                                <svg class="-ml-0.5 mr-2 h-5 w-5 {{ request()->routeIs('books.create') ? 'text-indigo-500' : 'text-gray-400 group-hover:text-gray-500' }}" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path d="M10 8a3 3 0 100-6 3 3 0 000 6zM3.465 14.493a1.23 1.23 0 00.41 1.412A9.957 9.957 0 0010 18c2.31 0 4.438-.784 6.131-2.1.43-.333.604-.903.408-1.41a7.002 7.002 0 00-13.074.003z" />
                                </svg>
                                <span>Books</span>
                            </a>

                            <a href="{{ route('digital.index') }}"
                               class="group inline-flex items-center border-b-2 {{ request()->routeIs(['digital.*']) ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} px-1 py-4 text-sm font-medium">
                                <svg class="-ml-0.5 mr-2 h-5 w-5 {{ request()->routeIs('digital.*') ? 'text-indigo-500' : 'text-gray-400 group-hover:text-gray-500' }}" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path d="M10 8a3 3 0 100-6 3 3 0 000 6zM3.465 14.493a1.23 1.23 0 00.41 1.412A9.957 9.957 0 0010 18c2.31 0 4.438-.784 6.131-2.1.43-.333.604-.903.408-1.41a7.002 7.002 0 00-13.074.003z" />
                                </svg>
                                <span>Digital Resources</span>
                            </a>

                            <a href="{{ route('periodicals.index') }}"
                               class="group inline-flex items-center border-b-2 {{ request()->routeIs(['periodicals.*']) ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} px-1 py-4 text-sm font-medium">
                                <svg class="-ml-0.5 mr-2 h-5 w-5 {{ request()->routeIs('periodicals.*') ? 'text-indigo-500' : 'text-gray-400 group-hover:text-gray-500' }}" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path d="M10 8a3 3 0 100-6 3 3 0 000 6zM3.465 14.493a1.23 1.23 0 00.41 1.412A9.957 9.957 0 0010 18c2.31 0 4.438-.784 6.131-2.1.43-.333.604-.903.408-1.41a7.002 7.002 0 00-13.074.003z" />
                                </svg>
                                <span>Periodicals/Magazines</span>
                            </a>

                            <a href="{{ route('thesis.index') }}"
                               class="group inline-flex items-center border-b-2 {{ request()->routeIs(['thesis.*']) ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} px-1 py-4 text-sm font-medium">
                                <svg class="-ml-0.5 mr-2 h-5 w-5 {{ request()->routeIs('thesis.*') ? 'text-indigo-500' : 'text-gray-400 group-hover:text-gray-500' }}" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path d="M10 8a3 3 0 100-6 3 3 0 000 6zM3.465 14.493a1.23 1.23 0 00.41 1.412A9.957 9.957 0 0010 18c2.31 0 4.438-.784 6.131-2.1.43-.333.604-.903.408-1.41a7.002 7.002 0 00-13.074.003z" />
                                </svg>
                                <span>Thesis/Dissertations</span>
                            </a>

                        </nav>
                    </div>
                </div>
            </div>

            <div class="py-8">
                {{ $slot }}
            </div>

        </div>

    </div>
</x-layouts.app>
