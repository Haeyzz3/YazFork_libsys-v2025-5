<x-layouts.app :title="__('Manage Patrons')">
    <div class="flex h-full w-full flex-1 flex-col gap-2 rounded-xl">
        <div class="px-4 sm:px-5 lg:px-6">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-base font-semibold leading-6 text-gray-900">Manage Patrons</h1>
                    <p class="mt-1 text-sm text-gray-700">A list of all the patrons in your system including their name, username, email, and role.</p>
                </div>
                <div class="mt-2 sm:ml-12 sm:mt-0 sm:flex-none flex gap-1">
                    <a href="{{ route('patrons.create') }}">
                        <button type="button" class="block rounded-md bg-indigo-600 px-2 py-1.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            Add patron
                        </button>
                    </a>
                </div>
            </div>
            <div class="mt-4 flow-root">
                <div class="-mx-4 -my-1 overflow-x-auto sm:-mx-5 lg:-mx-6">
                    <div class="inline-block min-w-full py-1 align-middle">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead>
                            <tr>
                                <th scope="col" class="py-2 pl-4 pr-2 text-left text-sm font-semibold text-gray-900 sm:pl-5 lg:pl-6">Name</th>
                                <th scope="col" class="px-2 py-2 text-left text-sm font-semibold text-gray-900">Username</th>
                                <th scope="col" class="px-2 py-2 text-left text-sm font-semibold text-gray-900">Email</th>
                                <th scope="col" class="px-2 py-2 text-left text-sm font-semibold text-gray-900">Patron Type</th>
                                <th scope="col" class="relative py-2 pl-2 pr-4 sm:pr-5 lg:pr-6">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                            @foreach($patrons as $patron)
                                <tr>
                                    <td class="whitespace-nowrap py-2 pl-4 pr-2 text-sm font-medium text-gray-900 sm:pl-5 lg:pl-6">{{ $patron->first_name . ' ' . $patron->last_name }}</td>
                                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ $patron->username }}</td>
                                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ $patron->email }}</td>
                                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ $patron->patronDetails->patronType->name }}</td>
                                    <td class="relative whitespace-nowrap py-2 pl-2 pr-4 text-right text-sm font-medium sm:pr-5 lg:pr-6">
                                        <a href="{{ route('patrons.show', $patron) }}" class="text-indigo-600 hover:text-indigo-900">View all details<span class="sr-only">, {{ $patron->first_name }}</span></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="py-4">
                {{ $patrons->links() }}
            </div>
        </div>
    </div>
</x-layouts.app>
