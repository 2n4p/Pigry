<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\WeightController;

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
Route::get('/', function () { return view('welcome'); });

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/register/step1', [RegisterController::class, 'step1'])->name('register.step1');
Route::post('/register/step1', [RegisterController::class, 'keep']);

Route::get('/register/step2', [RegisterController::class, 'step2'])->name('register.step2');
Route::post('/register/step2', [RegisterController::class, 'create']);

Route::middleware('auth')->group(function () {
    Route::get('/weight_logs', [WeightController::class, 'index'])->name('weight.index');
    Route::get('/weight_logs/search', [WeightController::class, 'search'])->name('weight.search');
    Route::get('/weight_logs/create', [WeightController::class, 'create'])->name('weight.create');
    Route::post('/weight_logs/create', [WeightController::class, 'store'])->name('weight.store');
    Route::get('/weight_logs/goal_setting', [WeightController::class, 'goal'])->name('weight.goal');
    Route::post('/weight_logs/goal_setting', [WeightController::class, 'change'])->name('weight.change');
    Route::get('/weight_logs/{weight_log}', [WeightController::class, 'show'])->name('weight.show');
    Route::put('/weight_logs/{weight_log}', [WeightController::class, 'update'])->name('weight.update');
    Route::delete('/weight_logs/{weight_log}', [WeightController::class, 'destroy'])->name('weight.destroy');
});
