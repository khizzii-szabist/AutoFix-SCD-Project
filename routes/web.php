<?php


use Illuminate\Support\Facades\Route;

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


Route::get('/book', function () {
    $service = request('service');
    return view('book', compact('service'));
})->name('book');
