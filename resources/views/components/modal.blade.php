<div x-data="{ open: @entangle('isModalOpen') }" x-show="open" x-cloak class="fixed inset-0 flex items-center justify-center z-40">
    <div class="bg-white z-30 h-[95vh] w-[80vw] relative overflow-y-auto dark:bg-gray-800 p-6 rounded-lg shadow-lg">
        <button wire:click="closeModal" type="button" class="mt-4 px-4 py-2 absolute right-4 top-4 bg-gray-200 dark:bg-gray-600 rounded">Close</button>
        {{ $slot }}
    </div>
    <div x-on:click="open = false" class="fixed inset-0 bg-black opacity-50"></div>
</div>
