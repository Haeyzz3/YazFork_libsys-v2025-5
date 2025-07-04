<x-layouts.app :title="__('Create Patron')">
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
        <form action="{{ route('patrons.store') }}" method="POST">
            @csrf
            <div class="space-y-12">

                <div class="grid grid-cols-1 gap-x-8 gap-y-10 border-b border-gray-900/10 pb-12 md:grid-cols-3">
                    <div>
                        <h2 class="text-base font-semibold leading-7 text-gray-900">Add Patron</h2>
                        <p class="mt-1 text-sm leading-6 text-gray-600">Create a new patron account with login credentials.</p>
                    </div>

                    <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 md:col-span-2">

                        <div class="sm:col-span-3">
                            <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">First name</label>
                            <div class="mt-2">
                                <input
                                    id="first-name"
                                    name="first-name"
                                    type="text"
                                    autocomplete="given-name"
                                    placeholder="Enter your first name"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    value="{{ old('first-name') }}"
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
                                    id="last-name"
                                    name="last-name"
                                    type="text"
                                    autocomplete="family-name"
                                    placeholder="Enter your last name"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    value="{{ old('last-name') }}"
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
                                    id="middle-name"
                                    name="middle-name"
                                    type="text"
                                    autocomplete="additional-name"
                                    placeholder="Enter your middle name"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    value="{{ old('middle-name') }}"
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
                                    id="birth-date"
                                    name="birth-date"
                                    type="date"
                                    autocomplete="bday"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    value="{{ old('birth-date') }}"
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
                                    id="username"
                                    name="username"
                                    type="text"
                                    autocomplete="username"
                                    placeholder="Enter your username"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    value="{{ old('username') }}"
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

                        <div class="sm:col-span-3">
                            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
                            <div class="mt-2">
                                <input
                                    id="email"
                                    name="email"
                                    type="email"
                                    autocomplete="email"
                                    placeholder="Enter your email address"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    value="{{ old('email') }}"
                                    required
                                    @error('email') ring-red-500 focus:ring-red-500 @enderror
                                >
                                @error('email')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="contact-number" class="block text-sm font-medium leading-6 text-gray-900">Contact Number</label>
                            <div class="mt-2">
                                <input
                                    id="contact-number"
                                    name="contact-number"
                                    type="tel"
                                    autocomplete="tel"
                                    placeholder="Enter your contact number"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    value="{{ old('contact-number') }}"
                                    @error('contact-number') ring-red-500 focus:ring-red-500 @enderror
                                >
                                @error('contact-number')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                            <div class="mt-2">
                                <input
                                    id="password"
                                    name="password"
                                    type="password"
                                    autocomplete="new-password"
                                    placeholder="Enter your password"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    required
                                    @error('password') ring-red-500 focus:ring-red-500 @enderror
                                >
                                @error('password')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="password-confirmation" class="block text-sm font-medium leading-6 text-gray-900">Confirm Password</label>
                            <div class="mt-2">
                                <input
                                    id="password-confirmation"
                                    name="password_confirmation"
                                    type="password"
                                    autocomplete="new-password"
                                    placeholder="Confirm your password"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    required
                                    @error('password_confirmation') ring-red-500 focus:ring-red-500 @enderror
                                >
                                @error('password_confirmation')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-x-8 gap-y-10 border-b border-gray-900/10 pb-12 md:grid-cols-3">
                    <div>
                        <h2 class="text-base font-semibold leading-7 text-gray-900">Patron Details</h2>
                        <p class="mt-1 text-sm leading-6 text-gray-600">Please provide your current contact information below.</p>
                    </div>

                    <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 md:col-span-2">
                        <div class="sm:col-span-3">
                            <label for="patron-type" class="block text-sm font-medium leading-6 text-gray-900">Patron Type</label>
                            <div class="mt-2">
                                <select
                                    id="patron-type"
                                    name="patron-type-id"
                                    autocomplete="off"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    @error('patron-type-id') ring-red-500 focus:ring-red-500 @enderror
                                >
                                    <option value="" disabled selected>Select patron type</option>
                                    @foreach($patron_types as $patron_type)
                                        <option value="{{ $patron_type->id }}" {{ old('patron-type-id') === $patron_type->id ? 'selected' : '' }}>
                                            {{ $patron_type->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('patron-type-id')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="student-id" class="block text-sm font-medium leading-6 text-gray-900">Student ID</label>
                            <div class="mt-2">
                                <input
                                    id="student-id"
                                    name="student-id"
                                    type="text"
                                    autocomplete="off"
                                    placeholder="Enter your school ID"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    value="{{ old('student-id') }}"
                                    @error('student-id') ring-red-500 focus:ring-red-500 @enderror
                                >
                                @error('student-id')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="library-id" class="block text-sm font-medium leading-6 text-gray-900">Library ID</label>
                            <div class="mt-2">
                                <input
                                    id="library-id"
                                    name="library-id"
                                    type="text"
                                    autocomplete="off"
                                    placeholder="Enter your library ID"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    value="{{ old('library-id') }}"
                                    @error('library-id') ring-red-500 focus:ring-red-500 @enderror
                                >
                                @error('library-id')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="sex" class="block text-sm font-medium leading-6 text-gray-900">Sex</label>
                            <div class="mt-2">
                                <select
                                    id="sex"
                                    name="sex"
                                    autocomplete="off"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    @error('sex') ring-red-500 focus:ring-red-500 @enderror
                                >
                                    <option value="" disabled selected>Select your sex</option>
                                    <option value="male" {{ old('sex') == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ old('sex') == 'female' ? 'selected' : '' }}>Female</option>
                                </select>
                                @error('sex')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="program" class="block text-sm font-medium leading-6 text-gray-900">Program</label>
                            <div class="mt-2">
                                <select
                                    id="program"
                                    name="program-id"
                                    autocomplete="off"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    @error('program-id') ring-red-500 focus:ring-red-500 @enderror
                                >
                                    <option value="" disabled selected>Select your program</option>
                                    @foreach($programs as $program)
                                        <option value="{{ $program->id }}" {{ old('program-id') === $program->id ? 'selected' : '' }}>
                                            {{ $program->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('program-id')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="major" class="block text-sm font-medium leading-6 text-gray-900">Major</label>
                            <div class="mt-2">
                                <select
                                    id="major"
                                    name="major-id"
                                    autocomplete="off"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    @error('major-id') ring-red-500 focus:ring-red-500 @enderror
                                >
                                    <option value="" disabled selected>Select your major</option>
                                    @foreach($majors as $major)
                                        <option value="{{ $major->id }}" {{ old('major-id') === $major->id ? 'selected' : '' }}>
                                            {{ $major->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('major-id')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="office" class="block text-sm font-medium leading-6 text-gray-900">Office</label>
                            <div class="mt-2">
                                <select
                                    id="office"
                                    name="office-id"
                                    autocomplete="off"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 @error('office-id') ring-red-500 focus:ring-red-500 @enderror"
                                >
                                    <option value="" disabled selected>Select your office</option>
                                    @foreach($offices as $office)
                                        <option value="{{ $office->id }}" {{ old('office-id') == $office->id ? 'selected' : '' }}>
                                            {{ $office->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('office-id')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold
                text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2
                focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add Patron</button>
            </div>
        </form>
    </div>
</x-layouts.app>
