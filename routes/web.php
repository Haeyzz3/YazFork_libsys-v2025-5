<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\DigitalResourceController;
use App\Http\Controllers\GuestLibraryController;
use App\Http\Controllers\PatronController;
use App\Http\Controllers\PeriodicalController;
use App\Http\Controllers\ThesisController;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;

Route::get('/', [GuestLibraryController::class, 'index'])->name('guest.dashboard');

Route::view('dashboard', 'dashboard')->name('dashboard')
    ->middleware(['auth', 'permission:manage_admins', 'permission:manage_patrons']);

Route::middleware(['auth', 'verified', 'permission:manage_admins'])->group(function () {
    Route::get('admins', [AdminController::class, 'index'])->name('admins.index');
    Route::get('admins/create', [AdminController::class, 'create'])->name('admins.create');
    Route::post('admins', [AdminController::class, 'store'])->name('admins.store');
    Route::get('admins/{admin}', [AdminController::class, 'show'])->name('admins.show');
    Route::get('admins/{admin}/edit', [AdminController::class, 'edit'])->name('admins.edit');
    Route::put('admins/{admin}', [AdminController::class, 'update'])->name('admins.update');
    Route::delete('admins/{admin}', [AdminController::class, 'destroy'])->name('admins.destroy');
});

Route::middleware(['auth', 'verified', 'permission:manage_patrons'])->group(function () {
    Route::get('patrons', [PatronController::class, 'index'])->name('patrons.index');
    Route::get('patrons/create', [PatronController::class, 'create'])->name('patrons.create');
    Route::post('patrons', [PatronController::class, 'store'])->name('patrons.store');
    Route::get('patrons/{patron}', [PatronController::class, 'show'])->name('patrons.show');
    Route::get('patrons/{patron}/edit', [PatronController::class, 'edit'])->name('patrons.edit');
    Route::put('patrons/{patron}', [PatronController::class, 'update'])->name('patrons.update');
    Route::delete('patrons/{patron}', [PatronController::class, 'destroy'])->name('patrons.destroy');
});

Route::middleware(['auth', 'verified', 'permission:manage_records'])->group(function () {
    // books
    Route::get('records/books', \App\Livewire\Records\BooksIndex::class)->name('books.index');
    Route::get('records/books/create', \App\Livewire\Records\BooksCreate::class)->name('books.create');
    Route::get('records/books/{record}', [BookController::class, 'show'])->name('books.show');
    Route::get('records/books/{record}/edit', [BookController::class, 'edit'])->name('books.edit');
    Route::put('records/books/{record}', [BookController::class, 'update'])->name('books.update');
    Route::delete('records/books/{record}', [BookController::class, 'destroy'])->name('books.destroy');
    // e-collections
    Route::get('records/digital', \App\Livewire\Records\DigitalIndex::class)->name('digital.index');
    Route::get('records/digital/create', \App\Livewire\Records\DigitalCreate::class)->name('digital.create');
    Route::post('records/digital', [DigitalResourceController::class, 'store'])->name('digital.store');
    Route::get('records/digital/{record}', [DigitalResourceController::class, 'show'])->name('digital.show');
    Route::get('records/digital/{record}/edit', [DigitalResourceController::class, 'edit'])->name('digital.edit');
    Route::put('records/digital/{record}', [DigitalResourceController::class, 'update'])->name('digital.update');
    Route::delete('records/digital/{record}', [DigitalResourceController::class, 'destroy'])->name('digital.destroy');
    // periodicals
    Route::get('records/periodicals', \App\Livewire\Records\PeriodicalIndex::class)->name('periodicals.index');
    Route::get('records/periodicals/create', \App\Livewire\Records\PeriodicalCreate::class)->name('periodicals.create');
    Route::post('records/periodicals/', [PeriodicalController::class, 'store'])->name('periodicals.store');
    Route::get('records/periodicals/{record}', [PeriodicalController::class, 'show'])->name('periodicals.show');
    Route::get('records/periodicals/{record}/edit', [PeriodicalController::class, 'edit'])->name('periodicals.edit');
    Route::put('records/periodicals/{record}', [PeriodicalController::class, 'update'])->name('periodicals.update');
    Route::delete('records/periodicals/{record}', [PeriodicalController::class, 'destroy'])->name('periodicals.destroy');
    // thesis
    Route::get('records/thesis', \App\Livewire\Records\ThesisIndex::class)->name('thesis.index');
    Route::get('records/thesis/create', \App\Livewire\Records\ThesisCreate::class)->name('thesis.create');
    Route::post('records/thesis', [ThesisController::class, 'store'])->name('thesis.store');
    Route::get('records/thesis/{record}', [ThesisController::class, 'show'])->name('thesis.show');
    Route::get('records/thesis/{record}/edit', [ThesisController::class, 'edit'])->name('thesis.edit');
    Route::put('records/thesis/{record}/', [ThesisController::class, 'update'])->name('thesis.update');
    Route::delete('records/thesis/{record}/', [ThesisController::class, 'destroy'])->name('thesis.destroy');

    // options
    Route::get('records/options', \App\Livewire\Records\OptionsIndex::class)->name('options.index');

});

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__.'/auth.php';
