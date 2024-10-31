<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\MakananController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'guest'], function () {
  Route::get('/register', [AuthenticateController::class, 'register'])->name('register');
  Route::post('/register', [AuthenticateController::class, 'registerPost'])->name('register');
  Route::get('/login', [AuthenticateController::class, 'login'])->name('login');
  Route::post('/login', [AuthenticateController::class, 'loginPost'])->name('login');
});
Route::group(['middleware' => 'auth'], function () {
  Route::resource('makanan', MakananController::class);

});

// Route::post('/login', [AuthenticatedSessionController::class, 'store']);

