<?php

use App\Http\Controllers\Admin\CafeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\ProfileController;
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
    return view('pages.landingPage');
})->middleware('redirectIfAuth');

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('cafe', CafeController::class);
    Route::resource('category', CategoryController::class);

    Route::get('/menu/{id}', [MenuController::class, 'index'])->name('menu-index');
    Route::get('/menu/create/{id}', [MenuController::class, 'create'])->name('menu-create');
    Route::post('/menu/store', [MenuController::class, 'store'])->name('menu-store');
    Route::get('/menu/edit/{id}', [MenuController::class, 'edit'])->name('menu-edit');
    Route::put('/menu/update/{id}', [MenuController::class, 'update'])->name('menu-update');
    Route::delete('/menu/delete/{id}', [MenuController::class, 'destroy'])->name('menu-destroy');

    Route::get('get-cafe', [CafeController::class, 'getData'])->name('cafeData');
    Route::get('get-category', [CategoryController::class, 'getData'])->name('categoryData');
    Route::get('/menu/data/{cafe_id}', [MenuController::class, 'getData'])->name('menuData');
});

require __DIR__.'/auth.php';
