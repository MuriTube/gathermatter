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
use App\Http\Controllers\HomeController;
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('verified');
// Hier Seiten routes anpassen

use App\Http\Controllers\AdminController;
// Für Adminpanel um userroles anzupassen
Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/{user}', [AdminController::class, 'show'])->name('admin.show');
    Route::patch('/admin/{user}', [AdminController::class, 'update'])->name('admin.update');
    Route::delete('/admin/{user}', [AdminController::class, 'destroy'])->name('admin.destroy');
    Route::put('/admin/show/{user}', [AdminController::class, 'updateProfile'])->name('admin.updateProfile');
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
Route::get('/search', [EventController::class, 'search']);
use App\Http\Controllers\TicketController;

Route::group(['middleware' => ['auth', 'adminOrOrganizer']], function () {
Route::get('/tickets/create/{event}', [TicketController::class, 'create'])->name('tickets.create');
Route::get('/tickets/{ticket}/edit', [TicketController::class, 'edit'])->name('tickets.edit');
Route::put('/tickets/{ticket}', [TicketController::class, 'update'])->name('tickets.update');
Route::delete('/tickets/{ticket}', [TicketController::class, 'destroy'])->name('tickets.destroy');
});
Route::get('/tickets', [TicketController::class, 'index'])->name('tickets.index');
Route::post('/tickets/store/{event}', [TicketController::class, 'store'])->name('tickets.store');


use App\Http\Controllers\ProfileController;

Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::put('/profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');

use App\Http\Controllers\Auth\ForgotPasswordController;

Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentController;

Route::group(['middleware' => 'auth'], function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{ticket}', [CartController::class, 'add'])->name('cart.add');
    Route::put('/cart/update/{cartItem}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/delete/{cartItem}', [CartController::class, 'delete'])->name('cart.delete');
    Route::get('/payment/initiate', [PaymentController::class, 'initiate'])->name('payment.initiate');
});




use App\Http\Controllers\PayPalController;
Route::get('paypal/success', [PayPalController::class, 'successTransaction'])->name('paypal.success');
Route::get('paypal/cancel', [PayPalController::class, 'cancelTransaction'])->name('paypal.cancel');
Route::get('paypal/checkout', [App\Http\Controllers\PayPalController::class, 'handlePayment'])->name('paypal.checkout');



use App\Http\Controllers\Auth\VerificationController;

Route::get('/email/verify', [VerificationController::class, 'show'])->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
Route::post('/email/resend', [VerificationController::class, 'resend'])->name('verification.resend');


// Nicht in Verwendung
// Route::get('/tickets/{ticket}', [TicketController::class, 'show'])->name('tickets.show');
