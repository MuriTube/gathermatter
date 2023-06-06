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

use App\Http\Controllers\AdminController;
// Für Adminpanel um userroles anzupassen
Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/{user}', [AdminController::class, 'show'])->name('admin.show');
    Route::patch('/admin/{user}', [AdminController::class, 'update'])->name('admin.update');
    Route::delete('/admin/{user}', [AdminController::class, 'destroy'])->name('admin.destroy');
});

use App\Http\Controllers\EventController;

// Für Eventorganisierung um Userroles anzupassen
Route::group(['middleware' => ['auth', 'adminOrOrganizer']], function () {
    Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
    Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update');
    Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');
});
Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::post('/events', [EventController::class, 'store'])->name('events.store');
Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');

use App\Http\Controllers\TicketController;

Route::group(['middleware' => ['auth', 'adminOrOrganizer']], function () {
Route::get('/tickets/create/{event}', [TicketController::class, 'create'])->name('tickets.create');
Route::get('/tickets/{ticket}/edit', [TicketController::class, 'edit'])->name('tickets.edit');
Route::put('/tickets/{ticket}', [TicketController::class, 'update'])->name('tickets.update');
Route::delete('/tickets/{ticket}', [TicketController::class, 'destroy'])->name('tickets.destroy');
});
Route::get('/tickets', [TicketController::class, 'index'])->name('tickets.index');
Route::post('/tickets/store/{event}', [TicketController::class, 'store'])->name('tickets.store');

Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.index');
Route::get('/profile/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
Route::put('/profile/update-password', [App\Http\Controllers\ProfileController::class, 'updatePassword'])->name('profile.updatePassword');


// Nicht in Verwendung
// Route::get('/tickets/{ticket}', [TicketController::class, 'show'])->name('tickets.show');