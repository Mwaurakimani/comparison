<?php


use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/search', function () {

    $user = \Illuminate\Support\Facades\Auth::user()->id;

    $searches = \App\Models\Search::where('user_id',$user)->get();

    return Inertia::render('Dashboard/DashboardSearch',[
        'searches' => $searches
    ]);
})->name('search');
