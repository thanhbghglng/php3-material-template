<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\UserController;


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

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	// Route::get('category', function () {
	// 	return view('pages.category');
	// })->name('category');
	Route::prefix('category')->name('category.')->group(function () {
		Route::get('/',[CategoryController::class,'index'])->name('index');
		Route::get('/create',[CategoryController::class,'create'])->name('create');
		Route::post('/store',[CategoryController::class,'store'])->name('store');
		Route::get('/edit/{id}',[CategoryController::class,'edit'])->name('edit');
		Route::put('/update/{id}',[CategoryController::class,'update'])->name('update');

		Route::delete('/delete/{id}',[CategoryController::class,'delete'])->name('delete');
	});
	Route::prefix('product')->name('product.')->group(function () {
		Route::get('/',[ProductController::class,'index'])->name('index');
		Route::get('/create',[ProductController::class,'create'])->name('create');
		Route::get('/edit/{id}',[ProductController::class,'edit'])->name('edit');
		Route::delete('/delete/{id}',[ProductController::class,'delete'])->name('delete');

	});

	Route::prefix('users')->name('users.')->group(function(){
		Route::get('/',[UserController::class,'index'])->name('index');
		Route::get('/create',[UserController::class,'create'])->name('create');
		Route::post('/store',[UserController::class,'store'])->name('store');
		Route::get('edit/{id}',[UserController::class,'edit'])->name('edit');
		Route::put('update/{id}',[UserController::class,'update'])->name('update');
		Route::delete('delete/{id}',[UserController::class,'delete'])->name('delete');
	});
	
	
	
});


