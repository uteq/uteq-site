<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.home')->name('home');
Route::view('/werkwijze', 'pages.werkwijze')->name('werkwijze');
Route::view('/projecten', 'pages.projecten')->name('projecten');
Route::view('/over', 'pages.over')->name('over');
Route::view('/contact', 'pages.contact')->name('contact');
Route::view('/partners', 'pages.partners')->name('partners');

Route::view('/flexlokaal', 'pages.flexlokaal')->name('flexlokaal');

Route::view('/firda', 'pages.firda')->name('firda');

Route::get('/firda/presentatie', function () {
    return response(
        file_get_contents(resource_path('views/pages/firda/presentatie-ai-onderwijs.html')),
        200,
        ['Content-Type' => 'text/html']
    );
})->name('firda.presentatie');

Route::get('/firda/opus-vs-lokaal', function () {
    return response(
        file_get_contents(resource_path('views/pages/firda/opus-vs-lokaal.html')),
        200,
        ['Content-Type' => 'text/html']
    );
})->name('firda.opus-vs-lokaal');
