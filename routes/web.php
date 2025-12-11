<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('pages.dashboard');
    })->name('dashboard');

    Route::get('/productos', function () {
        return view('pages.productos');
    })->name('productos');

    Route::get('/movimientos', function () {
        return view('pages.movimientos');
    })->name('movimientos');
});
