<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Counter;
use App\Livewire\LoginForm;
use App\Livewire\Home;
use App\Livewire\Menus;
use App\Livewire\RegistrationForm;
use App\Livewire\Auth\Login;
use App\Http\Controllers\Auth\LoginController;
use App\Livewire\PaymentGatewaySettings;
use App\Livewire\StudentList;
use App\Http\Middleware\RedirectIfNotAdmin;
use App\Livewire\RegistrationSuccess;
use App\Livewire\PrintStudentCard;

Route::get('/login', Login::class)->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth', RedirectIfNotAdmin::class])->group(function () {
    Route::get('/dashboard', Home::class);
    Route::get('/counter', Counter::class);
    Route::get('/menus', Menus::class);
    Route::get('/payment-gateway-settings', PaymentGatewaySettings::class);
    Route::get('/students', StudentList::class);
});

Route::get('/registration-success', RegistrationSuccess::class)->name('registration.success');
Route::get('/profile/student/print/{id}', PrintStudentCard::class)->name('student.print');

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', RegistrationForm::class);
