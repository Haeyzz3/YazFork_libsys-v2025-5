@if(session()->has('success'))
    <div
        x-data="{ show: true }"
        x-show="show"
        x-init="setTimeout(() => show = false, 5000)"
        class="fixed top-4 w-lg right-4 bg-green-700 text-white p-4 rounded shadow-lg">
        <span>{{ session('success') }}</span>
        <button @click="show = false" class="ml-4 text-white hover:text-gray-200">×</button>
    </div>
@endif

@if(session()->has('error'))
    <div
        x-data="{ show: true}"
        x-show="show"
        x-init="setTimeout( () => show = false, 5000 )"
        class="fixed top-4 w-lg right-4 bg-red-700 text-white p-4 rounded shadow-lg">
        <span>{{ session('error') }}</span>
        <button @click="show = false" class="ml-4 text-white hover:text-gray-200">×</button>
    </div>
@endif
