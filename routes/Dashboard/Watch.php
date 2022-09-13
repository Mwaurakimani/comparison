<?php


use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/Phones', function () {
    $phones = \App\Models\Phone::all();

    return Inertia::render('Dashboard/DashboardPhones',[
        'phones' => $phones
    ]);
})->name('phones');

Route::get('/Phones/{Phone}', function (\Illuminate\Http\Request $request, $Phone) {

    $Phone = \App\Models\Phone::find($Phone);

    return Inertia::render('Dashboard/DashboardCreatePhones',[
        'phone' => $Phone
    ]);

})->name('edit_phone');

Route::get('/Phones/create', function () {
    return Inertia::render('Dashboard/DashboardCreatePhones');
})->name('create_phone');

Route::post('/Phones/create', [\App\Http\Controllers\PhoneController::class,'add_phone'])->name('add_phone');

Route::post('/Phones/update/{Phone}', [\App\Http\Controllers\PhoneController::class,'update_phone'])->name('update_phone');

Route::post('/Phones/search', [\App\Http\Controllers\PhoneController::class,'fetch_phone'])->name('fetch_phone');

Route::post('/Phones/select', [\App\Http\Controllers\PhoneController::class,'phone_selected'])->name('phone_selected');


