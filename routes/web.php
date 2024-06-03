<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\TransactionsController;

Route::get('/', [ApplicationController::class, 'home'])->name('home');

Route::prefix('transaction')->group(function () {
    Route::get('add', [TransactionsController::class, 'viewAdd'])->name('transaction.viewDdd');
    Route::post('add', [TransactionsController::class, 'add'])->name('transaction.add');
    Route::prefix('{transactionID}')->group(function () {
        Route::get('edit', [TransactionsController::class, 'viewEdit'])->name('transaction.viewEdit');
        Route::post('edit', [TransactionsController::class, 'edit'])->name('transaction.edit');
        Route::get('delete', [TransactionsController::class, 'delete'])->name('transaction.delete');
    });
});

Route::prefix('auth')->group(function () {
    Route::get('login', [AuthController::class, 'showLogin'])->name('auth.login');
    Route::post('login', [AuthController::class, 'login'])->name('auth.authenticate');
    Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');
    Route::get('register', [AuthController::class, 'showRegister'])->name('auth.showRegister');
    Route::post('register', [AuthController::class, 'register'])->name('auth.register');
});
