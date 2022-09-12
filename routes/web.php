<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
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

// Route::get('/', function () {
//     return view('frontend.index');
// });
// Route::get('/category', function () {
//     return view('frontend.category');
// });

Auth::routes();



//admin panel

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function(){
    Route::get('/dashboard', function(){
        return view('backend.index');
    });

    Route::resource('category', CategoryController::class);
});



Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/category', [App\Http\Controllers\HomeController::class, 'category']);
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about']);
Route::get('/single', [App\Http\Controllers\HomeController::class, 'single']);
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact']);
