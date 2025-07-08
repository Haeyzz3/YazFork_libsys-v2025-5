<x-layouts.records heading-title="Manage Digital Records">
    <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none flex justify-end gap-2">
        <a href="{{ route('digital.create') }}">
            <button type="button" class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold
                         text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2
                         focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Add electronic record
            </button>
        </a>
    </div>
    <div class="mt-8 flow-root">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle">
                <table class="min-w-full divide-y divide-gray-300">
                    <thead>
                    <tr>
                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6 lg:pl-8">Accession no.</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Title</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">DDC classification</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Acquisition Status</th>
                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6 lg:pr-8">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">

                    @foreach($records as $record)
                        <tr>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8">{{ $record->accession_number }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $record->title }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $record->ddc_classification }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $record->acquisition_status }}</td>
                            <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6 lg:pr-8">
                                <a href="{{ route('digital.show', $record) }}" class="text-indigo-600 hover:text-indigo-900">View all details</a>
                            </td>
                        </tr>
                    @endforeach

                    <!-- More people... -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Render pagination links -->
    <div class="py-8">
        {{ $records->links() }}
    </div>

</x-layouts.records>

