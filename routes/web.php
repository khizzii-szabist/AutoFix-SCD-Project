<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;

use App\Models\Product;

Route::get('/', function () {
    $products = Product::take(3)->get();
    return view('home', compact('products'));
})->name('home');

Route::get('/services', function () {
    return view('services');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/cart', function () {
    return view('cart');
})->name('cart');

Route::get('/book', function () {
    $service = request('service');
    return view('book', compact('service'));
})->name('book');

Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');

Route::post('/checkout', function () {
    return redirect()->route('thankyou');
})->name('checkout.submit');

Route::get('/thankyou', function () {
    return view('thankyou');
})->name('thankyou');

Route::get('/parts', [ProductController::class, 'frontend']);
Route::get('/product/{id}', [ProductController::class, 'showDetail'])->name('product.detail');

Route::middleware('auth')->group(function () {
    Route::resource('products', ProductController::class);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
