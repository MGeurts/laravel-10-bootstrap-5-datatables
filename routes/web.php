<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::middleware('auth')->group(function () {
    // Frontend routes
    Route::prefix('frontend')->as('frontend.')->group(function () {
        // Nothing here yet
    });

    // Backend routes
    Route::prefix('backend')->as('backend.')->group(function () {
        // General routines
        Route::controller(App\Http\Controllers\Backend\GeneralController::class)->group(function () {
            Route::post('/general/setValueDB', 'setValueDB')->name('general.setValueDB');
            Route::post('/general/setValueSession', 'setValueSession')->name('general.setValueSession');
            Route::get('/general/getDatatablesHelp', 'getDatatablesHelp')->name('general.getDatatablesHelp');
        });
        /* ---------------------------------------- */
        // Developer
        Route::controller(App\Http\Controllers\Backend\DeveloperController::class)->group(function () {
            Route::get('/developer/impressum', 'impressum')->name('developer.impressum');
            Route::get('/developer/session', 'session')->name('developer.session');
        });
        /* ---------------------------------------- */
        // Users
        Route::controller(App\Http\Controllers\Backend\UserController::class)->group(function () {
            Route::delete('/users/massDestroy', 'massDestroy')->name('users.massDestroy');
            Route::resource('/users', App\Http\Controllers\Backend\UserController::class)->except(['show', 'destroy']);
        });
        /* ---------------------------------------- */
        // Customers
        Route::controller(App\Http\Controllers\Backend\CustomerController::class)->group(function () {
            Route::delete('/customers/massDestroy', 'massDestroy')->name('customers.massDestroy');
            Route::resource('/customers', App\Http\Controllers\Backend\CustomerController::class)->except(['destroy']);
        });
    });
});
