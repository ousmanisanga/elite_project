<?php

use App\Http\Controllers\HeaderController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NavbarController;
use App\Http\Controllers\ProgrammeController;
use App\Http\Middleware\CheckRoleMiddleware;
use App\Models\Programme;

// Routes publiques
Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Routes protégées par authentification et rôle
Route::middleware(['auth', 'check-role'])->group(function () {
    Route::controller(UserController::class)->group(function () {
        Route::get('/users', 'index')->name('users.index');
        Route::get('/users/create', 'create');
        Route::get('/users/{id}', 'show');
        Route::get('/users/{id}/edit', 'edit');


        Route::post('/users', 'store');
        Route::patch('/users/{id}', 'update');
        Route::delete('/users/{id}', 'destroy');
    });


    Route::controller(NavbarController::class)->group(function () {
        Route::get('/navbars', 'index')->name('navbars.index');
        Route::get('/navbars/create', 'create');
        Route::get('/navbars/{id}', 'show');
        Route::get('/navbars/{id}/edit', 'edit');


        Route::post('/navbars', 'store');
        Route::patch('/navbars/{id}', 'update');
        Route::delete('/navbars/{id}', 'destroy');
    });

    Route::controller(ProgrammeController::class)->group(function () {
        Route::get('/programmes', 'index')->name('programmes.index');
        Route::get('/programmes/create', 'create');
        Route::get('/programmes/{id}', 'show');
        Route::get('/programmes/{id}/edit', 'edit');


        Route::post('/programmes', 'store');
        Route::patch('/programmes/{id}', 'update');
        Route::delete('/programmes/{id}', 'destroy');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
