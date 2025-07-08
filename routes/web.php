<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ECollectionController;
use App\Http\Controllers\PatronController;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')->name('dashboard');

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
    Route::get('records/books', [BookController::class, 'index'])->name('books.index');
    Route::get('records/books/create', [BookController::class, 'create'])->name('books.create');
    Route::post('records/books', [BookController::class, 'store'])->name('books.store');
    Route::get('records/books/{record}', [BookController::class, 'show'])->name('books.show');
    Route::get('records/books/{record}/edit', [BookController::class, 'edit'])->name('books.edit');
    Route::put('records/books/{record}', [BookController::class, 'update'])->name('books.update');
    Route::get('records/e-collections', [ECollectionController::class, 'index'])->name('e-collections.index');
});

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__.'/auth.php';
