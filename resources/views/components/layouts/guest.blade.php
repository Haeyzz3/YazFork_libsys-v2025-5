
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title >@yield('title', config('app.name'))</title >

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" >

    <!-- Preload critical CSS to prevent FOUC -->
    <link rel="preload" href="{{ Vite::asset('resources/css/app.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="{{ Vite::asset('resources/css/app.css') }}"></noscript>

    <!-- Critical inline CSS to prevent FOUC -->
    <style>
        /* Prevent FOUC by hiding body initially */
        body {
            visibility: hidden;
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
        }

        body.loaded {
            visibility: visible;
            opacity: 1;
        }

        /* Ensure logo doesn't appear oversized during load */
        .logo, [class*="logo"], img[alt*="logo" i] {
            max-width: 200px;
            height: auto;
        }

        /* Basic layout to prevent flash */
        .hero-section, section[class*="hero"] {
            min-height: 45vh;
        }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body>
    @yield('content')

    @livewireScripts

    <!-- Script to show body once everything is loaded -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add a small delay to ensure all critical resources are loaded
            setTimeout(function() {
                document.body.classList.add('loaded');
            }, 100);
        });

        // Fallback: show content after 2 seconds max to prevent infinite hiding
        window.addEventListener('load', function() {
            setTimeout(function() {
                if (!document.body.classList.contains('loaded')) {
                    document.body.classList.add('loaded');
                }
            }, 100);
        });
    </script>
</body>
</html>
