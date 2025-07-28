<!DOCTYPE html>
<html lang="en" >
<head >
    <meta charset="utf-8" >
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" >
    <meta http-equiv="X-UA-Compatible" content="ie=edge" >

    <title >@yield('title', config('app.name'))</title >

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" >
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head >
<body class="bg-gray-50 font-sans" >

    <main >
        @yield('content')
    </main >

    @include('components.footer')

    @livewireScripts
</body >
</html >
