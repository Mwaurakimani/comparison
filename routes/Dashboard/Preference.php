<?php


use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/pref', function () {

    $user = \Illuminate\Support\Facades\Auth::user()->id;

    $prefs = \App\Models\Preference::where('user_id',$user)->get();

    return Inertia::render('Dashboard/DashboardPreference',[
        'prefs' => $prefs
    ]);
})->name('preference');



Route::post('/adPref/{id}',[\App\Http\Controllers\PreferenceController::class,'add_preference'])->name('add_sort_option');


