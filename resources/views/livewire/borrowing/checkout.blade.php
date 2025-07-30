<div>

    <x-flash-messenger/>

    <!-- Header -->
    <div class="relative bg-gradient-to-r from-red-900 via-red-700 to-green-700 text-center py-6 mb-4 rounded-lg shadow-lg">
        <h1 class="text-xl font-bold text-white tracking-tight">Borrow a Book</h1>
    </div>

    <!-- Checkout Form -->
    <div class="w-full max-w-7xl mx-auto">

        <div class="flex justify-center py-4">
            <div class="w-full max-w-6xl grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Main Form -->
                <div class=" border border-gray-200 rounded-xl shadow-lg p-6">
                    <h2 class="text-xl font-bold text-gray-800 mb-6">Borrow a Book</h2>

                    <!-- Borrow Type -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-900 mb-2">Borrow Type</label>
                        <div class="flex gap-4">
                            <label class="flex items-center space-x-2 cursor-pointer">
                                <input
                                    type="radio"
                                    name="borrowType"
                                    value="inside"
                                    wire:model="borrowType"
                                    class="w-4 h-4 text-red-600 focus:ring-red-500 border-gray-300 rounded-full transition duration-200"
                                    checked
                                >
                                <span class="text-sm text-gray-700 font-medium">Inside Library</span>
                            </label>
                            <label class="flex items-center space-x-2 cursor-pointer">
                                <input
                                    type="radio"
                                    name="borrowType"
                                    value="outside"
                                    wire:model="borrowType"
                                    class="w-4 h-4 text-red-600 focus:ring-red-500 border-gray-300 rounded-full transition duration-200"
                                >
                                <span class="text-sm text-gray-700 font-medium">Take Home</span>
                            </label>
                        </div>
                    </div>
                    <!-- Accession Number -->
                    <div class="mb-6">
                        <label for="search_ac" class="block text-sm font-medium text-gray-700 mb-2">Book Accession Number</label>
                        <div class="grid grid-cols-6 gap-2">
                            <input
                                type="text"
                                id="search_ac"
                                wire:model.blur="search_ac"
                                class="col-span-3 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-800 focus:border-transparent"
                                placeholder="Enter accession number"
                            >
                            <button
                                wire:click="findAcc"
                                class="col-span-2 flex items-center justify-center gap-2 px-4 py-2 bg-red-800 text-white rounded-lg hover:bg-red-900 transition duration-200"
                            >
                                <flux:icon name="magnifying-glass"></flux:icon>
                                <span>Find Book</span>
                            </button>
                            <button
                                wire:click="scanAcc"
                                class="col-span-1 flex items-center justify-center gap-2 px-4 py-2 bg-red-800 text-white rounded-lg hover:bg-red-900 transition duration-200"
                            >
                                <flux:icon name="qr-code"></flux:icon>
                            </button>
                        </div>
                    </div>

                    <!-- Book Search -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Or Search Books</label>
                        <input
                            type="text"
                            wire:model.live="search"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-800 focus:border-transparent"
                            placeholder="Search by, title, or author..."
                        >
                        <div class="mt-2 bg-white border border-gray-200 rounded-lg max-h-48 overflow-y-auto">
                            @if ($records->isEmpty())
                                <p class="p-4 text-gray-500 text-sm">No books found.</p>
                            @else
                                <ul>
                                    @foreach ($records as $record)
                                        <li
                                            wire:click="selectBook({{ $record->id }})"
                                            class="p-4 hover:bg-gray-50 cursor-pointer border-b border-gray-100 last:border-b-0"
                                        >
                                            <h3 class="text-md font-semibold text-gray-800">{{ $record->title }}</h3>
                                            <div class="flex justify-between text-sm text-gray-600">
                                                <p>Accession: {{ $record->accession_number }}</p>
                                                <p>Authors: {{ implode(', ', $record->book->authors) }}</p>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Book Details -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-xl font-bold text-gray-800">Book Details</h2>
                        <button wire:click="clearSelection" class="flex gap-2 text-gray-500 hover:text-gray-700">
                            <flux:icon name="backspace"></flux:icon>
                            Clear
                        </button>
                    </div>

                    @if ($selectedBook)
                        <div class="grid md:grid-cols-2 gap-6">
                            <div class="flex justify-center">
                                <div class="w-full max-w-xs h-64 bg-gray-100 rounded-lg flex items-center justify-center">
                                    @if ($selectedBook['cover_image'] && \Illuminate\Support\Facades\Storage::exists('public/' . ltrim($selectedBook['cover_image'], '/')))
                                        <img src="{{ asset('storage/' . ltrim($selectedBook['cover_image'], '/')) }}" alt="Cover of {{ $selectedBook['title'] ?? 'Book' }}" class="w-full h-full object-cover rounded-lg">
                                    @endif
                                </div>
                            </div>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700">Title:</label>
                                    <p class="text-gray-900">{{ $selectedBook['title'] }}</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700">Author:</label>
                                    <p class="text-gray-900">{{ implode(', ', $selectedBook['authors']) }}</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700">Accession Number:</label>
                                    <p class="text-gray-900">{{ $selectedBook['accession_number'] }}</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700">Status:</label>
                                    <span class="inline-block px-3 py-1 rounded-full text-sm bg-green-100 text-green-800">
                                {{ $selectedBook['status'] ?? 'Available' }}
                            </span>
                                </div>
                            </div>
                        </div>
                        <div class="mt-6 flex justify-end">
                            <button wire:click="borrowBook" class="flex items-center gap-2 px-4 py-2 bg-red-800 text-white rounded-lg hover:bg-red-900 transition duration-200">
                                <i class="ti ti-book-2"></i>
                                Borrow Book
                            </button>
                        </div>
                    @else
                        <p class="text-gray-500 text-sm">Select a book to view details.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Loading Overlay -->
    <div
        class="fixed inset-0 bg-gray-800/75 backdrop-blur-sm flex items-center justify-center z-45 hidden"
    >
        <div class="flex flex-col items-center justify-center min-h-screen">
            <svg
                class="animate-spin h-10 w-10 text-red-900"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
            >
                <circle
                    class="opacity-25"
                    cx="12"
                    cy="12"
                    r="10"
                    stroke="currentColor"
                    stroke-width="4"
                ></circle>
                <path
                    class="opacity-75"
                    fill="currentColor"
                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
                ></path>
            </svg>
            <span class="mt-2 text-white text-lg">Processing checkout, please wait...</span>
        </div>
    </div>

    <x-compact-modal entangle="showScanModal">
        <div class="p-6">
            <!-- Video Feed -->
            <div class="relative w-full max-w-md mx-auto" x-data="{ videoVisible: false }" x-init="setTimeout(() => videoVisible = true, 100)" x-show="videoVisible" x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100">
                <video id="videoFeed" class="w-full rounded-lg" autoplay></video>
                <canvas id="canvas" class="hidden"></canvas>
            </div>

            <!-- QR Code Scanning Instructions -->
            <div class="mt-4 text-center" x-data="{ textVisible: false }" x-init="setTimeout(() => textVisible = true, 300)" x-show="textVisible" x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 -translate-x-4" x-transition:enter-end="opacity-100 translate-x-0">
                <h3 class="text-lg font-semibold text-gray-800">Scan QR Code</h3>
                <p class="mt-2 text-sm text-gray-600">
                    Position the QR code within the camera frame to scan it. Ensure good lighting and a steady hand for best results.
                </p>
            </div>

            <!-- Scanned Result -->
            <div class="mt-4" x-data="{ resultVisible: false }" x-init="setTimeout(() => resultVisible = true, 500)" x-show="resultVisible" x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 -¡ª¡¿ translate-x-4" x-transition:enter-end="opacity-100 translate-x-0">
                <p class="text-sm text-gray-600">Result: <span id="qrResult" class="font-medium">{{ $qrCodeResult ?? 'No QR code detected' }}</span></p>
            </div>
        </div>
    </x-compact-modal>

    <x-compact-modal entangle="showBorrowModal">
        hi
    </x-compact-modal>
</div>

<!-- JavaScript for QR Code Scanning -->
<script src="https://cdn.jsdelivr.net/npm/jsqr@1.4.0/dist/jsQR.min.js"></script>
<script>
    document.addEventListener('livewire:initialized', function () {
        const video = document.getElementById('videoFeed');
        const canvasElement = document.getElementById('canvas');
        const canvas = canvasElement.getContext('2d');
        let stream = null;

        function startCamera() {
            navigator.mediaDevices.getUserMedia({ video: true })
                .then(function (mediaStream) {
                    stream = mediaStream;
                    video.srcObject = stream;
                    video.oncanplay = function () {
                        video.play();
                        scanQRCode();
                    };
                })
                .catch(function (err) {
                    console.error("Camera access error: ", err);
                    document.getElementById('qrResult').textContent = 'Camera access denied. Please allow camera access and try again.';
                });
        }

        function stopCamera() {
            if (stream) {
                stream.getTracks().forEach(track => track.stop());
                stream = null;
            }
        }

        function scanQRCode() {
            if (!video.srcObject) return;

            canvasElement.width = video.videoWidth;
            canvasElement.height = video.videoHeight;
            canvas.drawImage(video, 0, 0, canvasElement.width, canvasElement.height);
            const imageData = canvas.getImageData(0, 0, canvasElement.width, canvasElement.height);
            const code = jsQR(imageData.data, imageData.width, imageData.height);

            if (code) {
                // Update the input field with the scanned QR code data
                document.getElementById('search_ac').value = code.data;
                // Update the Livewire model
                @this.set('search_ac', code.data);
                // Optionally update the qrResult element if still needed
                stopCamera();
                // close the modal here
                @this.set('showScanModal', false);
            } else {
                requestAnimationFrame(scanQRCode);
            }
        }

        Livewire.first().$watch('showScanModal', function (value) {
            if (value) {
                startCamera();
            } else {
                stopCamera();
            }
        });

        // Cleanup on component destroy
        window.addEventListener('beforeunload', stopCamera);
    });
</script>
