<?php

use Illuminate\Support\Facades\Route;

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

use App\Models\Image;



use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index', 'index')->name('home');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/config', [App\Http\Controllers\UserController::class, 'config'])->name('config');
Route::post('/user/update', [App\Http\Controllers\UserController::class, 'update'])->name('update');
Route::get('/user/avatar/{filename}', [App\Http\Controllers\UserController::class, 'getImagen'])->name('getImagen');
Route::get('/crear-imagen', [App\Http\Controllers\ImageController::class, 'create'])->name('image.create');
Route::post('/image/save', [App\Http\Controllers\ImageController::class, 'save'])->name('image.save');
Route::get('/image/file/{filename}', [App\Http\Controllers\ImageController::class, 'getImage'])->name('getIamge');
Route::get('/image/{id}', [App\Http\Controllers\ImageController::class, 'detail'])->name('detail');
