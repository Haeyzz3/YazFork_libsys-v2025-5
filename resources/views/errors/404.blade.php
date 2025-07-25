<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head')
</head>
<body class="bg-gray-100">
<div class="flex min-h-screen w-full flex-col items-center justify-center gap-6 px-4 sm:px-6 lg:px-8">
    <div class="text-center">
        <h1 class="text-4xl font-bold text-gray-900 sm:text-6xl">404</h1>
        <p class="mt-4 text-lg text-gray-600">Oops! The page you're looking for doesn't exist.</p>
    </div>
    <div class="mt-6">
        <button
            onclick="window.history.back()"
            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-red-900 hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-900"
        >
            <svg class="mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Go Back
        </button>
    </div>
</div>
</body>
</html>
