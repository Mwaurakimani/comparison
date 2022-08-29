<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/ViewProduct',function (){
    return Inertia::render('Home/ViewProduct');
})->name("view_product");




Route::get('/test',function (){
    return Inertia::render('test');
})->name("test");


Route::post('/scrapper',[\App\Http\Controllers\ScrapperController::class,'scrapper'])->name('scrapper_controller');





Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    require "Dashboard/Dashboard.php";
    require "Dashboard/Account.php";
    require "Dashboard/Search.php";
    require "Dashboard/Watch.php";
    require "Dashboard/Preference.php";
});
