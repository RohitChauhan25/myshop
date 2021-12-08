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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
  
// Route::get('/Account', function () {
//     return view('account');
// });
Route::group(['middleware'=>['UserAuth']],function(){
    Route::get('/Account', [App\Http\Controllers\UserController::class, 'edit'])->name('Account');

   Route::post('/update', [App\Http\Controllers\UserController::class, 'update'])->name('update');

});