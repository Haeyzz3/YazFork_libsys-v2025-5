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
            <div class="mt-6 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
                <div wire:click="openAddDdcModal()" class="bg-white flex gap-4 justify-center items-center shadow-sm rounded-lg p-4 border font-bold text-gray-700
                 border-gray-200
                    hover:shadow-md hover:border-accent-content transition-shadow transition-border">
                    <div>Add DDC Class</div>
                    <flux:icon name="plus" variant="mini"/>
                </div>
                @forelse($ddc_classes as $ddc)
                    <div class="bg-white flex justify-between shadow-sm rounded-lg p-4 border border-gray-200
                    hover:shadow-md hover:border-accent-content transition-shadow transition-border">
                        <div class="">
                            <h2 class="text-md font-medium text-gray-900">{{ $ddc['name'] }}</h2>
                            <p class="mt-2 text-sm text-gray-600">{{ $ddc['code'] }}</p>
                        </div>
                        <div class="flex flex-col justify-between min-h-full text-gray-500">
                            <!-- Edit Icon -->
                            <a wire:click="openEditDdcModal({{ $ddc['id'] }})" class="hover:text-red-900">
                                <flux:icon name="pencil-square" variant="mini"/>
                            </a>
                            <!-- Delete Icon -->
                            <a wire:click="openDeleteDdcModal({{ $ddc['id'] }})" class="hover:text-red-900">
                                <flux:icon name="trash" variant="mini"/>
                            </a>
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
    <x-compact-modal entangle="showEditModal">
        <h3 class="text-lg font-medium text-gray-900">Edit DDC</h3>
        <div class="mt-4 grid gap-y-6">
            <x-form-input
                name="name"
                label="Name"
                placeholder="Enter name"
                type="text"
                required
                :value="old('name', '')"
            />
            <x-form-input
                name="code"
                label="Code"
                placeholder="Enter code"
                type="text"
                required
                :value="old('code', '')"
            />
        </div>
        <div class="mt-5 sm:mt-6 sm:flex sm:flex-row-reverse">
            <button wire:click="updateDdc" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent shadow-sm px-4 py-2 bg-accent text-base font-medium text-white hover:bg-accent-content focus:outline-none sm:ml-3 sm:w-auto sm:text-sm">
                Save
            </button>
            <button wire:click="closeEditModal" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-100 focus:outline-none sm:mt-0 sm:w-auto sm:text-sm">
                Cancel
            </button>
        </div>
    </x-compact-modal>

    <x-compact-modal entangle="showDeleteDdcModal">
        <div class="px-4 py-5 sm:p-6">
            <h3 class="text-lg font-medium text-gray-900">Delete DDC</h3>
            <p class="mt-2 text-sm text-gray-600">Are you sure you want to delete <span class="font-bold">{{ $ddcName }} classification</span>? This action cannot be undone.</p>
        </div>
        <div class="mt-5 sm:mt-6 sm:flex sm:flex-row-reverse">
            <button wire:click="deleteDdc({{ $ddcId }})" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none sm:ml-3 sm:w-auto sm:text-sm">
                Delete
            </button>
            <button wire:click="closeDeleteModal" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-100 focus:outline-none sm:mt-0 sm:w-auto sm:text-sm">
                Cancel
            </button>
        </div>
    </x-compact-modal>

    <x-compact-modal entangle="showAddDdcModal">
        <h3 class="text-lg font-medium text-gray-900">Add DDC</h3>
        <div class="mt-4 grid gap-y-6">
            <x-form-input
                name="ddcName"
                label="Name"
                placeholder="Enter name"
                type="text"
                required
                :value="old('ddcName', '')"
            />
            <x-form-input
                name="ddcCode"
                label="Code"
                placeholder="Enter code"
                type="text"
                required
                :value="old('ddcCode', '')"
            />
        </div>
        <div class="mt-5 sm:mt-6 sm:flex sm:flex-row-reverse">
            <button wire:click="saveDdc" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent shadow-sm px-4 py-2 bg-accent text-base font-medium text-white hover:bg-accent-content focus:outline-none sm:ml-3 sm:w-auto sm:text-sm">
                Save
            </button>
            <button wire:click="closeEditModal" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-100 focus:outline-none sm:mt-0 sm:w-auto sm:text-sm">
                Cancel
            </button>
        </div>
    </x-compact-modal>
</div>
