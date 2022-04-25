<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;


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

Route::get('/test', function () {
    return view('backend.test');
});

Route::get('test', [TestController::class, 'index'])->name('test.index');
Route::get('test/create',[TestController::class, 'create'])->name('test.create');
Route::post('test',[TestController::class,'store'])->name('test.store');
Route::get('test/{id}/show',[TestController::class,'show'])->name('test.show');
Route::get('test/{id}/edit',[TestController::class,'edit'])->name('test.edit');
Route::put('test/{id}/update',[TestController::class,'update'])->name('test.update');
Route::delete('test/{id}/destroy',[TestController::class,'destroy'])->name('test.destroy');




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
