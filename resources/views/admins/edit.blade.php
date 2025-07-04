<x-layouts.app :title="__('Edit Admin')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <!--
          This example requires some changes to your config:

          ```
          // tailwind.config.js
          module.exports = {
            // ...
            plugins: [
              // ...
              require('@tailwindcss/forms'),
            ],
          }
          ```
        -->
        <form action="{{ route('admins.update', $admin) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="space-y-12">

                <div class="grid grid-cols-1 gap-x-8 gap-y-10 border-b border-gray-900/10 pb-12 md:grid-cols-3">
                    <div>
                        <h2 class="text-base font-semibold leading-7 text-gray-900">Add Admin</h2>
                        <p class="mt-1 text-sm leading-6 text-gray-600">Create a new administrator account with login credentials.</p>
                    </div>

                    <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 md:col-span-2">

                        <div class="sm:col-span-3">
                            <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">First name</label>
                            <div class="mt-2">
                                <input
                                    value="{{ old('first-name', $admin->first_name) }}"
                                    id="first-name"
                                    name="first-name"
                                    type="text"
                                    autocomplete="given-name"
                                    placeholder="Enter your first name"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    required
                                    @error('first-name') ring-red-500 focus:ring-red-500 @enderror
                                >
                                @error('first-name')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Last name</label>
                            <div class="mt-2">
                                <input
                                    value="{{ old('last-name', $admin->last_name) }}"
                                    id="last-name"
                                    name="last-name"
                                    type="text"
                                    autocomplete="family-name"
                                    placeholder="Enter your last name"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    required
                                    @error('last-name') ring-red-500 focus:ring-red-500 @enderror
                                >
                                @error('last-name')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="middle-name" class="block text-sm font-medium leading-6 text-gray-900">Middle Name</label>
                            <div class="mt-2">
                                <input
                                    value="{{ old('middle-name', $admin->middle_name) }}"
                                    id="middle-name"
                                    name="middle-name"
                                    type="text"
                                    autocomplete="additional-name"
                                    placeholder="Enter your middle name"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    @error('middle-name') ring-red-500 focus:ring-red-500 @enderror
                                >
                                @error('middle-name')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="birth-date" class="block text-sm font-medium leading-6 text-gray-900">Birth Date</label>
                            <div class="mt-2">
                                <input
                                    value="{{ old('birth_date', $admin->birth_date) }}"
                                    id="birth-date"
                                    name="birth-date"
                                    type="date"
                                    autocomplete="bday"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    required
                                    @error('birth-date') ring-red-500 focus:ring-red-500 @enderror
                                >
                                @error('birth-date')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Username</label>
                            <div class="mt-2">
                                <input
                                    value="{{ old('username', $admin->username) }}"
                                    id="username"
                                    name="username"
                                    type="text"
                                    autocomplete="username"
                                    placeholder="Enter your username"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    required
                                    @error('username') ring-red-500 focus:ring-red-500 @enderror
                                >
                                @error('username')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-span-3">
                            <label for="photo" class="block text-sm font-medium leading-6 text-gray-900">Photo</label>
                            <div class="mt-2 flex items-center gap-x-3">
                                <svg class="h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" clip-rule="evenodd" />
                                </svg>
                                <button type="button" class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Change</button>
                            </div>
                        </div>

                        <div class="sm:col-span-4">
                            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
                            <div class="mt-2">
                                <input
                                    value="{{ old('email', $admin->email) }}"
                                    id="email"
                                    name="email"
                                    type="email"
                                    autocomplete="email"
                                    placeholder="Enter your email address"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    required
                                    @error('email') ring-red-500 focus:ring-red-500 @enderror
                                >
                                @error('email')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-between">
                <button form="delete-form" type="submit" class="text-sm font-semibold leading-6 text-red-900">Delete</button>
                <div class="flex gap-x-6">
                    <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold
                    text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2
                    focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update Admin</button>
                </div>
            </div>
        </form>

        <form id="delete-form" action="{{ route('admins.destroy', $admin) }}" method="POST" style="display: none;">
            @csrf
            @method('DELETE')
        </form>
    </div>
</x-layouts.app>
