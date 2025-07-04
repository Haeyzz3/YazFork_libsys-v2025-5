<x-layouts.app :title="__('Admin Details')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div>
            <div class="px-4 sm:px-0">
                <h3 class="text-base font-semibold leading-7 text-gray-900">User Information</h3>
                <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500">Personal details of {{ $patron->first_name }}</p>
            </div>
            <div class="mt-6">
                <dl class="grid grid-cols-1 sm:grid-cols-2">
                    <div class="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">First name</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">{{ $patron->first_name }}</dd>
                    </div>
                    <div class="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Last name</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">{{ $patron->last_name }}</dd>
                    </div>
                    <div class="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Middle name</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">{{ $patron->middle_name }}</dd>
                    </div>
                    <div class="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Birth date</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">{{ $patron->birth_date }}</dd>
                    </div>
                    <div class="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Username</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">{{ $patron->username }}</dd>
                    </div>
                    <div class="py-6 sm:col-span-1 sm:px-0">
                        <label for="photo" class="block text-sm font-medium leading-6 text-gray-900">Profile Image</label>
                        <div class="mt-2 flex items-center gap-x-3">
                            <svg class="h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                    <div class="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Email</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">{{ $patron->email }}</dd>
                    </div>
                    <div class="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Contact Number</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">{{ $patron->contact_number ?? 'Not provided' }}</dd>
                    </div>
                </dl>
            </div>

            <div class="mt-6 border-t px-4 pt-6 sm:px-0">
                <h3 class="text-base font-semibold leading-7 text-gray-900">Patron Information</h3>
                <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500">Personal details of {{ $patron->first_name }}</p>
            </div>

            <div class="mt-6">
                <dl class="grid grid-cols-1 sm:grid-cols-2">
                    <div class="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Patron Type</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">{{ $patron->patronDetails->patronType->name }}</dd>
                    </div>
                    <div class="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Student ID</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">{{ $patron->patronDetails->student_id }}</dd>
                    </div>
                    <div class="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Library ID</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">{{ $patron->patronDetails->library_id }}</dd>
                    </div>
                    <div class="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Sex</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">{{ $patron->patronDetails->sex }}</dd>
                    </div>
                    <div class="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Program</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">{{ $patron->patronDetails->program->name }}</dd>
                    </div>
                    <div class="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Office</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">{{ $patron->patronDetails->office->name }}</dd>
                    </div>
                </dl>
            </div>
            <div class="mt-6 flex items-center justify-end gap-x-6">
                <a href="{{ route('patrons.edit', $patron) }}">
                    <button type="button" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold
                            text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2focus-visible:outline-offset-2
                            focus-visible:outline-indigo-600">Edit Details</button>
                </a>
            </div>
        </div>
    </div>
</x-layouts.app>
