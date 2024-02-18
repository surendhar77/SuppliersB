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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/show', [App\Http\Controllers\HomeController::class, 'show'])->name('show');
Route::get('/edit/{id}', [App\Http\Controllers\HomeController::class, 'edit'])->name('edit');
Route::post('/store', [App\Http\Controllers\HomeController::class, 'store'])->name('store');
Route::put('/update/{id}', [App\Http\Controllers\HomeController::class, 'update'])->name('update');
Route::delete('/delete/{id}', [App\Http\Controllers\HomeController::class, 'delete'])->name('delete');
Route::post('/state', [App\Http\Controllers\HomeController::class, 'fetchState'])->name('state');
Route::post('/city', [App\Http\Controllers\HomeController::class, 'fetchCity'])->name('city');