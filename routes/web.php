<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\SubCategoryController;


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

Route::middleware(['web','auth'])->group(function () {

//Category
Route::get('category', [CategoryController::class, 'index'])->name('category.index');
Route::get('category/create',[CategoryController::class, 'create'])->name('category.create');
Route::post('category',[CategoryController::class,'store'])->name('category.store');
Route::get('category/{id}',[CategoryController::class,'show'])->name('category.show');
Route::get('category/{id}/edit',[CategoryController::class,'edit'])->name('category.edit');
Route::put('category/{id}/update',[CategoryController::class,'update'])->name('category.update');
Route::delete('category/{id}/destroy',[CategoryController::class,'destroy'])->name('category.destroy');

//SubCategory
Route::get('sub-category', [SubCategoryController::class, 'index'])->name('sub_category.index');
Route::get('sub-category/create',[SubCategoryController::class, 'create'])->name('sub_category.create');
Route::post('sub-category',[SubCategoryController::class,'store'])->name('sub_category.store');
Route::get('sub-category/{id}',[SubCategoryController::class,'show'])->name('sub_category.show');
Route::get('sub-category/{id}/edit',[SubCategoryController::class,'edit'])->name('sub_category.edit');
Route::put('sub-category/{id}/update',[SubCategoryController::class,'update'])->name('sub_category.update');
Route::delete('sub-category/{id}/destroy',[SubCategoryController::class,'destroy'])->name('sub_category.destroy');

//Products
Route::get('products', [ProductsController::class, 'index'])->name('products.index');
Route::get('products/create',[ProductsController::class, 'create'])->name('products.create');
Route::post('products',[ProductsController::class,'store'])->name('products.store');
Route::get('products/{id}',[ProductsController::class,'show'])->name('products.show');
Route::get('products/{id}/edit',[ProductsController::class,'edit'])->name('products.edit');
Route::put('products/{id}/update',[ProductsController::class,'update'])->name('products.update');
Route::delete('products/{id}/destroy',[ProductsController::class,'destroy'])->name('products.destroy');

//Get Sub Category
Route::post('products/get',[ProductsController::class,'getSubCategory'])->name('products.get_sub_category');

//Tags
Route::get('tags', [TagController::class, 'index'])->name('tags.index');
Route::get('tags/create',[TagController::class, 'create'])->name('tags.create');
Route::post('tags',[TagController::class,'store'])->name('tags.store');
Route::get('tags/{id}',[TagController::class,'show'])->name('tags.show');
Route::get('tags/{id}/edit',[TagController::class,'edit'])->name('tags.edit');
Route::put('tags/{id}/update',[TagController::class,'update'])->name('tags.update');
Route::delete('tags/{id}/destroy',[TagController::class,'destroy'])->name('tags.destroy');

//Attributes
Route::get('attributes', [AttributeController::class, 'index'])->name('attributes.index');
Route::get('attributes/create',[AttributeController::class, 'create'])->name('attributes.create');
Route::post('attributes',[AttributeController::class,'store'])->name('attributes.store');
Route::get('attributes/{id}',[AttributeController::class,'show'])->name('attributes.show');
Route::get('attributes/{id}/edit',[AttributeController::class,'edit'])->name('attributes.edit');
Route::put('attributes/{id}/update',[AttributeController::class,'update'])->name('attributes.update');
Route::delete('attributes/{id}/destroy',[AttributeController::class,'destroy'])->name('attributes.destroy');

//Settings

Route::get('setting/create',[SettingController::class, 'create'])->name('setting.create');
Route::post('setting',[SettingController::class,'store'])->name('setting.store');
Route::get('setting/{id}/edit',[SettingController::class,'edit'])->name('setting.edit');
Route::put('setting/{id}/update',[SettingController::class,'update'])->name('setting.update');

});




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
