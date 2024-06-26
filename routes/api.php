<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DataController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

Route::middleware(['auth:api'])->group(function() {
    Route::get('category', [DataController::class, 'category']);
    Route::get('cafe', [DataController::class, 'cafe']);
    Route::get('menu/{cafe_id}', [DataController::class, 'menu']);

    Route::get('review-cafe/{cafe_id}', [DataController::class, 'getReview']);
    Route::post('review-cafe/{cafe_id}', [DataController::class, 'review']);
});
