<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Models\Service;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Register API routes for your application. These routes are loaded by the
| RouteServiceProvider and are assigned to the "api" middleware group.
|
*/

// Public User Info (Authenticated)
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ServiceController;

// --- Product & Service API Endpoints ---
// Namespaced with 'api.' to avoid collision with Web routes.
Route::apiResource('products', ProductController::class)->names('api.products');
Route::apiResource('services', ServiceController::class)->names('api.services');
