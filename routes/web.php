<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PostController;
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

    //tag start//
    Route::get('/tag/create', [TagController::class, 'create'])->name('tag.create');
    Route::get('/tag/index', [TagController::class, 'index'])->name('tag.index');
    Route::post('/tag/store', [TagController::class, 'store'])->name('tag.store');
    Route::get('/tag/edit/{id}', [TagController::class, 'edit'])->name('tag.edit');
    Route::post('/tag/update/{id}', [TagController::class, 'update'])->name('tag.update');
    Route::get('/tag/destroy/{id}', [TagController::class, 'destroy'])->name('tag.destroy');
    //tag end

    //post start
    Route::resource('post', PostController::class);
});



Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/category', [App\Http\Controllers\HomeController::class, 'category']);
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about']);
Route::get('/single', [App\Http\Controllers\HomeController::class, 'single']);
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact']);
