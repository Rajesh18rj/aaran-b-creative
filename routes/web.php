<?php

use Illuminate\Support\Facades\Route;

Route::get('/', App\Livewire\Web\Home\Index::class)->name('home');
Route::get('/about', App\Livewire\Web\Home\About::class)->name('about');
Route::get('/contact', App\Livewire\Web\Home\Contact::class)->name('contact');
Route::get('/blog', App\Livewire\Web\Home\Blog::class)->name('blog');
Route::get('/service', App\Livewire\Web\Home\Service::class)->name('service');
Route::get('/info', App\Livewire\Web\Home\Info::class)->name('info');


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {

    Route::get('/dashboard', App\Livewire\Web\Dashboard\Index::class)->name('dashboard');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {


    Route::get('/register-member', App\Livewire\Network\Auth\Register::class)->name('register-member');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {

    Route::get('/elements', App\Livewire\Utilities\UiElements\Index::class)->name('elements');
    Route::get('/icons', App\Livewire\Utilities\Icon\Index::class)->name('icons');
    Route::get('/test', App\Livewire\Test\Index::class)->name('test');
    Route::get('/tree', App\Livewire\Network\Tree\Index::class)->name('tree');
});

