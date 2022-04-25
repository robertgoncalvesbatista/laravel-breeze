<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\VotationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view("welcome");
});

Route::middleware(['auth'])->group(function () {
    // Route dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Route users
    Route::get('/user', [UserController::class, "index"])->name('user.index');
    Route::post('/user', [UserController::class, "store"])->name('user.store');
    Route::get('/user/create', [UserController::class, "create"])->name('user.create');
    Route::put('/user/{id}', [UserController::class, "update"])->name('user.update');
    Route::get('/user/{id}/edit', [UserController::class, "edit"])->name('user.edit');
    Route::delete('/user/{id}', [UserController::class, "destroy"])->name('user.destroy');

    // Route votation
    Route::get('/votation', [VotationController::class, "index"])->name('votation.index');
    Route::post('/votation', [VotationController::class, "store"])->name('votation.store');
    Route::get('/votation/create', [VotationController::class, "create"])->name('votation.create');
    Route::put('/votation/{id}', [VotationController::class, "update"])->name('votation.update');
    Route::get('/votation/{id}/edit', [VotationController::class, "edit"])->name('votation.edit');
    Route::delete('/votation/{id}', [VotationController::class, "destroy"])->name('votation.destroy');
});

require __DIR__ . '/auth.php';
