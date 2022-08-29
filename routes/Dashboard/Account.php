<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/account', function () {
    return Inertia::render('Dashboard/DashboardAccount');
})->name('account');


Route::post('/updateUser/{id}', [\App\Http\Controllers\UserController::class, 'update_user'])->name('update_user');
