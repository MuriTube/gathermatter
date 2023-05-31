<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

 Route::get('/', function () {
    return view('index');
 });

// Erstellt für aboutus page
Route::get('/aboutus', function () {
    return view('sites.about-us');
})->name('aboutus');

// Erstellt für contact page
Route::get('/contact', function () {
    return view('sites.contact');
})->name('contact');

// Erstellt für imprint page
Route::get('/imprint', function () {
    return view('sites.imprint');
})->name('imprint');

// Erstellt für portfolio page
Route::get('/portfolio', function () {
    return view('sites.portfolio');
})->name('portfolio');

// Erstellt für privacypolicy page
Route::get('/privacypolicy', function () {
    return view('sites.privacypolicy');
})->name('privacypolicy');

// Erstellt für terms page
Route::get('/terms', function () {
    return view('sites.terms');
})->name('terms');

Auth::routes();

Route::get('/', [App\Http\Controllers\IndexController::class, 'index'])->name('index');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Hier Seiten routes anpassen
Route::get('/events', [App\Http\Controllers\EventViewController::class, 'index'])->name('events');
