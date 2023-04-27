<?php

use App\Http\Controllers\HeaderController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NavbarController;
use App\Http\Middleware\CheckRoleMiddleware;


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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



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








Route::middleware(['auth','check-role'])->group(function () {
    Route::controller(UserController::class)->group(function () {

        Route::get('/users', 'index')->name('users.index');
        Route::get('/users/create', 'create');
        Route::get('/users/{id}', 'show');
        Route::get('/users/{id}/edit', 'edit');


        Route::post('/users', 'store');
        Route::patch('/users/{id}', 'update');
        Route::delete('/users/{id}', 'destroy');
    });

    Route::controller(NavbarController::class)->group( function() {
        Route::get('/navbars', 'index')->name('navbars.index');
            Route::get('/navbars/create', 'create');
            Route::get('/navbars/{id}', 'show');
            Route::get('/navbars/{id}/edit', 'edit');


            Route::post('/navbars', 'store');
            Route::patch('/navbars/{id}', 'update');
            Route::delete('/navbars/{id}', 'destroy');
    });

    Route::controller(SousNavBarController::class)->group( function() {
        Route::get('/sousnavbars', 'index')->name('sousnavbars.index');
            Route::get('/sousnavbars/create', 'create');
            Route::get('/sousnavbars/{id}', 'show');
            Route::get('/sousnavbars/{id}/edit', 'edit');


            Route::post('/sousnavbars', 'store');
            Route::patch('/sousnavbars/{id}', 'update');
            Route::delete('/navbars/{id}', 'destroy');
    });

    Route::controller(FooterController::class)->group( function() {
        Route::get('/footers', 'index')->name('sousnavbars.index');
            Route::get('/footers/create', 'create');
            Route::get('/footers/{id}', 'show');
            Route::get('/footers/{id}/edit', 'edit');


            Route::post('/footers', 'store');
            Route::patch('/footers/{id}', 'update');
            Route::delete('/footers/{id}', 'destroy');
    });

    Route::controller(HeaderController::class)->group( function() {
        Route::get('/headers', 'index')->name('headers.index');
            Route::get('/headers/create', 'create');
            Route::get('/headers/{id}', 'show');
            Route::get('/headers/{id}/edit', 'edit');


            Route::post('/headers', 'store');
            Route::patch('/headers/{id}', 'update');
            Route::delete('/headers/{id}', 'destroy');
    });

});
