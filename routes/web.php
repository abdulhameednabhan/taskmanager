<?php

use Illuminate\Support\Facades\Route;
use App\Models\ListingPage;
use App\Http\Controllers\PageController;


Route::get('/', function () {
    $page = ListingPage::first(); // 

    return view("themes.{$page->theme}.index", ['page' => $page]);
    
});
Route::get('/{slug}', [PageController::class, 'show']);