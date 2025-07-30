@props([
    'entangle'
])

<div class="fixed inset-0 z-45 overflow-y-auto" x-data="{ open: @entangle($entangle) }" x-show="open" style="display: none;">
    <div class="flex items-center justify-center min-h-screen px-4">
        <div class="fixed inset-0 bg-gray-800/50 backdrop-blur-sm transition-opacity"
             x-show="open"
             x-transition:enter="ease-out duration-200"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="ease-in duration-100"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             @click="open = false"></div>

        <div class="bg-white z-46 rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full"
             x-show="open"
             x-transition:enter="ease-out duration-200"
             x-transition:enter-start="opacity-0 scale-95"
             x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="ease-in duration-100"
             x-transition:leave-start="opacity-100 scale-100"
             x-transition:leave-end="opacity-0 scale-95">
            <div class="px-4 py-5 sm:p-6 relative">
                <div class="absolute top-4 right-4">
                    <flux:icon name="x-mark" class="cursor-pointer w-6 h-6 text-gray-600 hover:text-gray-800" @click="open = false"></flux:icon>
                </div>
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
