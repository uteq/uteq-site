<?php

use App\Http\Controllers\JuridischController;
use App\Http\Controllers\SubprocessorController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.home')->name('home');
Route::view('/werkwijze', 'pages.werkwijze')->name('werkwijze');
Route::view('/projecten', 'pages.projecten')->name('projecten');
Route::view('/over', 'pages.over')->name('over');
Route::view('/contact', 'pages.contact')->name('contact');
Route::view('/partners', 'pages.partners')->name('partners');
Route::view('/vacatures', 'pages.vacatures')->name('vacatures');
Route::view('/vacature/full-stack-medior-developer', 'pages.vacature-developer')->name('vacature.developer');

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

Route::get('/juridisch', [JuridischController::class, 'index'])->name('juridisch.index');
Route::get('/juridisch/subverwerkers', [SubprocessorController::class, 'index'])
    ->name('juridisch.subverwerkers');
Route::get('/juridisch/subverwerkers/rss', [SubprocessorController::class, 'rss'])
    ->name('juridisch.subverwerkers.rss');
Route::get('/juridisch/subverwerkers/bevestigen/{token}', [SubprocessorController::class, 'confirm'])
    ->where('token', '[A-Za-z0-9]+')
    ->name('juridisch.subverwerkers.confirm');
Route::get('/juridisch/subverwerkers/afmelden/{token}', [SubprocessorController::class, 'unsubscribe'])
    ->where('token', '[A-Za-z0-9]+')
    ->name('juridisch.subverwerkers.unsubscribe');
Route::get('/juridisch/{slug}', [JuridischController::class, 'show'])
    ->where('slug', '[a-z0-9-]+')
    ->name('juridisch.show');
Route::get('/privacy', [JuridischController::class, 'privacy'])->name('privacy');
