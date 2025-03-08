<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\WebhookController;

Route::post('/webhook/midtrans', [WebhookController::class, 'handle'])
    ->name('api.webhook.midtrans');
