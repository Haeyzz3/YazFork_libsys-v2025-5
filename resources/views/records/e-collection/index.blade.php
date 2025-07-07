<x-layouts.app :title="__('Manage Patrons')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">

        <div class="px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-base font-semibold leading-6 text-gray-900">Manage Records</h1>
                    <p class="mt-2 text-sm text-gray-700">A list of all bibliographic records in your system, including title, author, classification, and other details.</p>
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
                <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none flex justify-end gap-2">
                    <a href="{{ route('patrons.create') }}">
                        <button type="button" class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold
                         text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2
                         focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            Add record
                        </button>
                    </a>
                </div>
                <div class="hidden sm:block">
                    <div class="border-b border-gray-200">
                        <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                            {{-- Add Book Tab --}}
                            <a href="{{ route('books.index') }}"
                               class="group inline-flex items-center border-b-2 {{ request()->routeIs('books.index') ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} px-1 py-4 text-sm font-medium">
                                <svg class="-ml-0.5 mr-2 h-5 w-5 {{ request()->routeIs('books.create') ? 'text-indigo-500' : 'text-gray-400 group-hover:text-gray-500' }}" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path d="M10 8a3 3 0 100-6 3 3 0 000 6zM3.465 14.493a1.23 1.23 0 00.41 1.412A9.957 9.957 0 0010 18c2.31 0 4.438-.784 6.131-2.1.43-.333.604-.903.408-1.41a7.002 7.002 0 00-13.074.003z" />
                                </svg>
                                <span>Books</span>
                            </a>

                            <a href="{{ route('e-collections.index') }}"
                               class="group inline-flex items-center border-b-2 {{ request()->routeIs('e-collections.index') ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} px-1 py-4 text-sm font-medium">
                                <svg class="-ml-0.5 mr-2 h-5 w-5 {{ request()->routeIs('books.create') ? 'text-indigo-500' : 'text-gray-400 group-hover:text-gray-500' }}" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path d="M10 8a3 3 0 100-6 3 3 0 000 6zM3.465 14.493a1.23 1.23 0 00.41 1.412A9.957 9.957 0 0010 18c2.31 0 4.438-.784 6.131-2.1.43-.333.604-.903.408-1.41a7.002 7.002 0 00-13.074.003z" />
                                </svg>
                                <span>E-collections</span>
                            </a>

                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
