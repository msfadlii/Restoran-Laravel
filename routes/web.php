<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

require __DIR__.'/auth.php';
