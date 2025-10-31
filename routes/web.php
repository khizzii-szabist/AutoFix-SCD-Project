<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;


Route::get('/', function () {
    return view('home');
});

Route::get('/services', function () {
    return view('services');
});

Route::get('/parts', function () {
    return view('parts');
});

Route::get('/contact', function () {
    return view('contact');
});


Route::get('/cart', function () {
    $items = request('items', []);
    $prices = request('prices', []);
    return view('cart', compact('items', 'prices'));
})->name('cart');



Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
Route::post('/checkout', [CartController::class, 'placeOrder'])->name('checkout.submit');




Route::get('/book', function () {
    $service = request('service');
    return view('book', compact('service'));
})->name('book');



Route::get('/battery', function () {
    return view('battery');
});
