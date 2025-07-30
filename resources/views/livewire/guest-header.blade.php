<nav class="bg-white shadow-md sticky top-0 z-50">
    <div class="w-full px-4 py-3 flex justify-between items-center">

        <!-- Far Left - Usep Logo -->
        <a
{{--            href="{{ url('/student-logger') }}"--}}
            href="{{ route('guest.dashboard') }}"
            class="text-2xl font-bold text-usepmaroon hover:text-usepmaroon/80 transition flex items-center hover:bg-usepmaroon/10 px-4 py-2 rounded-md border border-transparent hover:border-usepmaroon/30"
        >
            <img
                src="{{ Vite::asset('resources/images/usepLogo.svg') }}"
                alt=""
                class="h-8 mr-2"
            >
            Usep Library
        </a >

        <!-- Far Right - Login Button -->
        @if (Route::has('login'))
            <nav class="flex items-center justify-end gap-4" >
                @auth
                    <a
                        href="{{ route('dashboard') }}"
                        class="px-4 py-2 border border-usepmaroon text-usepmaroon rounded-md hover:bg-usepmaroon/10 transition flex items-center shadow-sm hover:shadow-md hover:bg-usepmaroon/20"
                    >
                        <i class="fas fa-sign-in-alt mr-2"></i>
                        <span class="hidden md:inline">Dashboard</span>
                    </a>
                @else
                    <a
                        {{--            onclick="openLoginModal()"--}}
                        href="{{ route('login') }}"
                        class="px-4 py-2 border border-usepmaroon text-usepmaroon rounded-md hover:bg-usepmaroon/10 transition flex items-center shadow-sm hover:shadow-md hover:bg-usepmaroon/20"
                    >
                        <i class="fas fa-sign-in-alt mr-2"></i>
                        <span class="hidden md:inline">Login</span>
                    </a>
                @endauth
            </nav >
        @endif
    </div>
</nav>
