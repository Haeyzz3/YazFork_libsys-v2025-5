    <div class="flex h-full w-full flex-1 flex-col rounded-xl">
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
                        <div class="bg-white shadow-sm rounded-lg p-4 border border-gray-200 hover:shadow-md transition-shadow">
                            <h2 class="text-lg font-medium text-gray-900">{{ $ddc['name'] }}</h2>
                            <p class="mt-2 text-sm text-gray-600">{{ $ddc['code'] }}</p>
                        </div>
                    @empty
                        No record to show
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
    </div>
