@extends('components.layouts.guest')

@section('title', 'Guest Dashboard')

<livewire:guest-header />

@section('content')
    <section class="relative min-h-[45vh] flex flex-col items-center justify-center mb-8 bg-hero">
        <div class="absolute inset-0 bg-black/50"></div>

        <div class="relative z-10 text-center text-white">
            <h1 class="text-3xl font-bold">USeP Campus Library</h1>
            <p class="text-lg mt-2">Tagum-Mabini</p>
        </div>

        <x-search-bar-dropdown />
    </section>

    <!-- Collection Cards -->
    @livewire('collection-cards')

    <!-- Books Section -->
    @livewire('book-collection')

    <!-- Card Modal -->
    @livewire('book-modal')


{{--    <h1 class="text-2xl font-bold mb-4" >Browse Books</h1 >--}}
{{--    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6" >--}}
{{--        @foreach ($books as $book)--}}
{{--            <x-book-card :book="$book" />--}}
{{--        @endforeach--}}
{{--    </div >--}}

@endsection
