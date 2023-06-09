<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\TrainingController;
use App\Models\Exercise;
use App\Models\Plan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(AuthController::class)->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/', 'index')->name('login');
        Route::post('/', 'login');
    });

    Route::middleware('auth')->group(function () {
        Route::post('/logout', 'logout')->name('logout');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource(plural_from_model(Exercise::class), ExerciseController::class)->except('show');
    Route::resource(plural_from_model(Training::class), TrainingController::class)->except('show');
    Route::resource(plural_from_model(Plan::class), PlanController::class)->except('show');
});
