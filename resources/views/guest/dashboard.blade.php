@extends('components.layouts.guest')

@section('title', 'Guest Dashboard')

<livewire:guest-header />

@section('content')
    <section class="hero-section relative min-h-[45vh] flex flex-col items-center justify-center mb-8 bg-hero">
        <div class="absolute inset-0 bg-black/50"></div>

        <div class="relative z-10 text-center text-white">
            <h1 class="text-3xl font-bold">USeP Campus Library</h1>
            <p class="text-lg mt-2">Tagum-Mabini</p>
        </div>

        <x-search-bar-dropdown />
    </section>

    <!-- Collection Cards -->
    <div class="main-content">
        @livewire('collection-cards')
    </div>

    <!-- Books Section -->
    <div class="main-content">
        @livewire('book-collection')
    </div>

@endsection
