<?php

use Illuminate\Support\Facades\Route;

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

Route::view('/', 'pages.home')->name('home');
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
