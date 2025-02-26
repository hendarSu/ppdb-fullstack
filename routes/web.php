<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Counter;
use App\Livewire\LoginForm;
use App\Livewire\Home;
use App\Livewire\Menus;
use App\Livewire\RegistrationForm;
use App\Livewire\Auth\Login;
use App\Http\Controllers\Auth\LoginController;

Route::get('/login', Login::class)->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', Home::class);
    Route::get('/counter', Counter::class);
    Route::get('menus', Menus::class);
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', RegistrationForm::class);
