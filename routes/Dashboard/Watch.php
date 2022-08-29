<?php


use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/WatchList', function () {
    $scrapper = new \App\Http\Controllers\Lib\Scraper();
    $watches = \App\Models\watch::where('user_id',\Illuminate\Support\Facades\Auth::user()->id)->get();

    $products = [];

    foreach ($watches as $watch){
        $product_details = $scrapper->scrap_product($watch->product_link);
        $product_details['id'] = $watch->id;

        array_push($products, $product_details);
    }

    return Inertia::render('Dashboard/DashboardWatch',[
        'content' => $products
    ]);
})->name('watch');


Route::post('/addToWatchList',[\App\Http\Controllers\WatchController::class,'add_to_watch'])->name('add_to_watch_list');


Route::post('/removeToWatchList/{id}',[\App\Http\Controllers\WatchController::class,'remove_item_from_watch'])->name('remove_item_from_watch');
