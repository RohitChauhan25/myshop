<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home2');
});

Route::get('logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Auth::routes();

Route::get('products', [\App\Http\Controllers\ProductController::class, 'index'])->name('products');

Route::middleware('auth')->group(function() {

    // Admin routes
    Route::prefix('admin/')->name('admin.')->group(function() {
        Route::get('dashboard', [\App\Http\Controllers\AdminController::class, 'dashboard'])->name('dashboard');
    });


    // Customer routes

});


// Route::middleware(['auth'])->group(function() {
//     Route::get('dashboard', [])->name('dashboard');
// });