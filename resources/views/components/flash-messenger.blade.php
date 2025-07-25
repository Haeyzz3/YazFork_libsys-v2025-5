@if(session()->has('success'))
    <div
        x-data="{ show: true }"
        x-show="show"
        x-init="setTimeout(() => show = false, 100000)"
        class="fixed z-50 top-4 right-4 bg-green-700 opacity-80 text-white p-4 rounded shadow-lg">
        <span>{{ session('success') }}</span>
        <button @click="show = false" class="ml-4 text-white hover:text-gray-200">×</button>
    </div>
@endif

@if(session()->has('error'))
    <div
        x-data="{ show: true}"
        x-show="show"
        x-init="setTimeout( () => show = false, 100000 )"
        class="fixed z-50 top-4 w-md right-4 bg-red-700 opacity-80 text-white p-4 rounded shadow-lg">
        <span>{{ session('error') }}</span>
        <button @click="show = false" class="ml-4 text-white hover:text-gray-200">×</button>
    </div>
@endif

@if(session('import_errors'))
    <div
        x-data="{ show: true}"
        x-show="show"
        x-init="setTimeout( () => show = false, 100000 )"
        class="fixed z-50 top-4 w-md right-4 bg-yellow-600 opacity-80 text-white p-4 rounded shadow-lg">
        <div>
            <strong>Import Errors:</strong>
            <ul class="mt-2 ml-4">
                @foreach(session('import_errors') as $error)
                    <li class="list-disc">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <button @click="show = false" class="ml-4 text-white hover:text-gray-200">×</button>
    </div>
@endif
