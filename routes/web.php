<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	// Route::get('category', function () {
	// 	return view('pages.category');
	// })->name('category');
	Route::prefix('category')->name('category.')->group(function () {
		Route::get('/',[CategoryController::class,'index'])->name('index');
		Route::delete('/delete/{id}',[CategoryController::class,'delete'])->name('delete');
	});
	Route::prefix('product')->name('product.')->group(function () {
		Route::get('/',[ProductController::class,'index'])->name('index');

	});
	
	
	
});


