<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Counter;
use App\Livewire\LoginForm;
use App\Livewire\Home;


Route::get('/', LoginForm::class);

Route::get('/dashboard', Home::class);

Route::get('/counter', Counter::class);

Route::get('/welcome', function () {
    return view('welcome');
});
