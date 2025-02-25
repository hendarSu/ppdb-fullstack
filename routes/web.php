<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Counter;
use App\Livewire\LoginForm;
use App\Livewire\Home;
use App\Livewire\Menus;
use App\Livewire\RegistrationForm;

Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', Home::class);

Route::get('/counter', Counter::class);

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('menus', Menus::class);

Route::get('/', RegistrationForm::class);
