<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VotationController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
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

Route::get('/', [HomeController::class, "index"]);

Route::middleware(['auth'])->group(function () {
    // Route dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Route::group(["middleware" => "role:Administrador|role:Moderador"], function () {
        // Route users
        Route::get('/user', [UserController::class, "index"])
            ->name('user.index');
        Route::post('/user', [UserController::class, "store"])
            ->name('user.store');
        Route::get('/user/create', [UserController::class, "create"])
            ->name('user.create');
        Route::put('/user/{id}', [UserController::class, "update"])
            ->name('user.update');
        Route::get('/user/{id}/edit', [UserController::class, "edit"])
            ->name('user.edit');
        Route::delete('/user/{id}', [UserController::class, "destroy"])
            ->name('user.destroy');

        // Route roles
        Route::get('/role', [RoleController::class, "index"])
            ->name('role.index');
        Route::post('/role', [RoleController::class, "store"])
            ->name('role.store');
        Route::get('/role/create', [RoleController::class, "create"])
            ->name('role.create');
        Route::get('/role/{id}/show', [RoleController::class, "show"])
            ->name('role.show');
        Route::put('/role/{id}', [RoleController::class, "update"])
            ->name('role.update');
        Route::get('/role/{id}/edit', [RoleController::class, "edit"])
            ->name('role.edit');
        Route::delete('/role/{id}', [RoleController::class, "destroy"])
            ->name('role.destroy');

        // Route permissions
        Route::get('/permission', [PermissionController::class, "index"])
            ->name('permission.index');
        Route::post('/permission', [PermissionController::class, "store"])
            ->name('permission.store');
        Route::get('/permission/create', [PermissionController::class, "create"])
            ->name('permission.create');
        Route::get('/permission/{id}/show', [PermissionController::class, "show"])
            ->name('permission.show');
        Route::put('/permission/{id}', [PermissionController::class, "update"])
            ->name('permission.update');
        Route::get('/permission/{id}/edit', [PermissionController::class, "edit"])
            ->name('permission.edit');
        Route::delete('/permission/{id}', [PermissionController::class, "destroy"])
            ->name('permission.destroy');
    // });

    // Route votations
    Route::get('/votation', [VotationController::class, "index"])
        ->name('votation.index');
    Route::post('/votation', [VotationController::class, "store"])
        ->name('votation.store');
    Route::get('/votation/create', [VotationController::class, "create"])
        ->name('votation.create');
    Route::put('/votation/{id}', [VotationController::class, "update"])
        ->name('votation.update');
    Route::get('/votation/{id}/edit', [VotationController::class, "edit"])
        ->name('votation.edit');
    Route::delete('/votation/{id}', [VotationController::class, "destroy"])
        ->name('votation.destroy');
});

require __DIR__ . '/auth.php';
