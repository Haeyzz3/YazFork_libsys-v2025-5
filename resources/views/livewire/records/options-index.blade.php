<div class="flex h-full w-full flex-1 flex-col rounded-xl">

    <x-flash-messenger/>

    <!-- Tab Navigation -->
    <div class="hidden sm:block">
        <div class="flex justify-center">
            <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                <button
                    wire:click="switchTab('tab1')"
                    class="group inline-flex gap-2 items-center border-b-2 {{ $activeTab === 'tab1' ? 'border-red-900 text-rose-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} px-1 pb-2 text-sm font-medium"
                >
                    <span>DDC</span>
                </button>
                <button
                    wire:click="switchTab('tab2')"
                    class="group inline-flex gap-2 items-center border-b-2 {{ $activeTab === 'tab2' ? 'border-red-900 text-rose-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} px-1 pb-2 text-sm font-medium"
                >
                    <span>Locations</span>
                </button>
                <button
                    wire:click="switchTab('tab3')"
                    class="group inline-flex gap-2 items-center border-b-2 {{ $activeTab === 'tab3' ? 'border-red-900 text-rose-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} px-1 pb-2 text-sm font-medium"
                >
                    <span>Tab 3</span>
                </button>
            </nav>
        </div>
    </div>

    <!-- Tab Content -->
    <div class="py-4">
        @if ($activeTab === 'tab1')
            <div class="mt-6 grid grid-cols-1 gap-2 sm:grid-cols-2 lg:grid-cols-4">
                @forelse($ddc_classes as $ddc)
                    <div class="bg-white flex justify-between shadow-sm rounded-lg p-4 border border-gray-200
                    hover:shadow-md transition-shadow">
                        <div class="">
                            <h2 class="text-lg font-medium text-gray-900">{{ $ddc['name'] }}</h2>
                            <p class="mt-2 text-sm text-gray-600">{{ $ddc['code'] }}</p>
                        </div>
                        <div class="flex flex-col justify-between min-h-full text-gray-500">
                            <!-- Edit Icon -->
                            <a wire:click="openEditModal({{ $ddc['id'] }})" class="hover:text-red-900">
                                <flux:icon name="pencil-square" variant="mini"/>
                            </a>
                            <!-- Delete Icon -->
                            <form action="" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="hover:text-red-900">
                                    <flux:icon name="trash" variant="mini"/>
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p>No record to show</p>
                @endforelse
            </div>
        @elseif ($activeTab === 'tab2')
            <h2 class="text-base font-semibold leading-6 text-gray-900">Content for Tab 2</h2>
            <p class="mt-2 text-sm text-gray-700">This is the content for the second tab. Customize as needed.</p>
        @elseif ($activeTab === 'tab3')
            <h2 class="text-base font-semibold leading-6 text-gray-900">Content for Tab 3</h2>
            <p class="mt-2 text-sm text-gray-700">This is the content for the third tab. Add your content here.</p>
        @endif
    </div>

    <!-- Modal -->
    <div class="fixed inset-0 z-50 overflow-y-auto" x-data="{ open: @entangle('showModal') }" x-show="open" style="display: none;">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="fixed inset-0 bg-gray-500/75 transition-opacity" x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"></div>

            <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full" x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">
                <div class="px-4 py-5 sm:p-6">
                    <h3 class="text-lg font-medium text-gray-900">Edit DDC</h3>
                    <div class="mt-4">
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input wire:model.blur="name" type="text" id="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
                            @error('name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-4">
                            <label for="code" class="block text-sm font-medium text-gray-700">Code</label>
                            <input wire:model.blur="code" type="text" id="code" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
                            @error('code') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="mt-5 sm:mt-6 sm:flex sm:flex-row-reverse">
                        <button wire:click="save" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none sm:ml-3 sm:w-auto sm:text-sm">
                            Save
                        </button>
                        <button wire:click="closeModal" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:mt-0 sm:w-auto sm:text-sm">
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
