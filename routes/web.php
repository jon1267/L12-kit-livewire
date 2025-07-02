<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

/*Route::middleware(['auth', 'verified'])->group(function () {
    Volt::route('posts', 'posts.index')->name('posts.index');
    Volt::route('posts/create', 'posts.create')->name('posts.create');
    Volt::route('posts/{post}/edit', 'posts.edit')->name('posts.edit');
});*/

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/posts', \App\Livewire\Posts\PostIndex::class)->name('posts.index');
    Route::get('/posts/create', \App\Livewire\Posts\PostCreate::class)->name('posts.create');
    Route::get('/posts/{post}/edit', \App\Livewire\Posts\PostEdit::class)->name('posts.edit');
});

require __DIR__.'/auth.php';
