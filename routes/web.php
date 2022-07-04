<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\ProductImagesController;

// Route::get('/', function () {
//     return view('frontend.index');
// });

Route::get('/',[HomeController::class,'index'])->name('frontend.index');
//Cart
Route::get('product/cart',[HomeController::class,'cart'])->name('product.cart')->middleware('auth');
Route::post('product/add-to-cart',[HomeController::class,'addToCart'])->name('product.add_to_cart');
Route::get('/product/{slug}',[HomeController::class,'productDetails'])->name('product_details');
Route::get('/product/{cat_slug}/{subcat_slug}',[HomeController::class,'subcategoryDetails'])->name('subcategory_details');

Route::post('/product/store-review',[HomeController::class,'productReview'])->name('product.store_review');
Route::delete('/product/delete-product-review/{id}',[HomeController::class,'deleteProductReview'])->name('product.review_destroy');
Route::post('/product/review-reply',[HomeController::class,'reviewReply'])->name('product.review_reply');
Route::delete('/product/delete-product-review-reply/{id}',[HomeController::class,'deleteProductReviewReply'])->name('product.review_reply_destroy');

Route::post('/cart/coupon-apply',[HomeController::class, 'couponApply'])->name('cart.coupon_code');

//Cart Delete from database using ajax
Route::post('/product/cart/cart_delete',[HomeController::class,'cartDelete'])->name('product.cart_delete');
Route::post('/product/cart/cart_update',[HomeController::class,'cartUpdate'])->name('product.cart_update');






Route::middleware(['web','auth','is_admin'])->prefix('backend/')->group(function () {

//Export Category
Route::get('category/export/', [CategoryController::class, 'export'])->name('category.export');

//Import Category
Route::get('category/import-excel/', [CategoryController::class, 'exportExcel'])->name('category.import_excel');


//Menu
Route::get('menu', [MenuController::class, 'index'])->name('menu.index');
Route::get('menu/create',[MenuController::class, 'create'])->name('menu.create');
Route::post('menu',[MenuController::class,'store'])->name('menu.store');
Route::get('menu/{id}',[MenuController::class,'show'])->name('menu.show');
Route::get('menu/{id}/edit',[MenuController::class,'edit'])->name('menu.edit');
Route::put('menu/{id}/update',[MenuController::class,'update'])->name('menu.update');
Route::delete('menu/{id}/destroy',[MenuController::class,'destroy'])->name('menu.destroy');


//Category
Route::get('category', [CategoryController::class, 'index'])->name('category.index');
Route::get('category/create',[CategoryController::class, 'create'])->name('category.create');
Route::post('category',[CategoryController::class,'store'])->name('category.store');
Route::get('category/{id}',[CategoryController::class,'show'])->name('category.show');
Route::get('category/{id}/edit',[CategoryController::class,'edit'])->name('category.edit');
Route::put('category/{id}/update',[CategoryController::class,'update'])->name('category.update');
Route::delete('category/{id}/destroy',[CategoryController::class,'destroy'])->name('category.destroy');


//Excel Download Subcategory
Route::get('sub-category/export/', [SubCategoryController::class, 'export'])->name('sub_category.export');

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


//Coupon
Route::get('coupon', [CouponController::class, 'index'])->name('coupon.index');
Route::get('coupon/create',[CouponController::class, 'create'])->name('coupon.create');
Route::post('coupon',[CouponController::class,'store'])->name('coupon.store');
Route::get('coupon/{id}',[CouponController::class,'show'])->name('coupon.show');
Route::get('coupon/{id}/edit',[CouponController::class,'edit'])->name('coupon.edit');
Route::put('coupon/{id}/update',[CouponController::class,'update'])->name('coupon.update');
Route::delete('coupon/{id}/destroy',[CouponController::class,'destroy'])->name('coupon.destroy');

//Product Multiple Images
Route::get('product-images', [ProductImagesController::class, 'index'])->name('product_images.index');
Route::get('product-images/create',[ProductImagesController::class, 'create'])->name('product_images.create');
Route::post('product-images',[ProductImagesController::class,'store'])->name('product_images.store');
Route::get('product-images/{id}',[ProductImagesController::class,'show'])->name('product_images.show');
Route::get('product-images/{id}/edit',[ProductImagesController::class,'edit'])->name('product_images.edit');
Route::put('product-images/{id}/update',[ProductImagesController::class,'update'])->name('product_images.update');
Route::delete('product-images/{id}/destroy',[ProductImagesController::class,'destroy'])->name('product_images.destroy');

//Tags
Route::get('tags', [TagController::class, 'index'])->name('tags.index');
Route::get('tags/create',[TagController::class, 'create'])->name('tags.create');
Route::post('tags',[TagController::class,'store'])->name('tags.store');
Route::get('tags/{id}',[TagController::class,'show'])->name('tags.show');
Route::get('tags/{id}/edit',[TagController::class,'edit'])->name('tags.edit');
Route::put('tags/{id}/update',[TagController::class,'update'])->name('tags.update');
Route::delete('tags/{id}/destroy',[TagController::class,'destroy'])->name('tags.destroy');

//Attributes/trash
Route::get('attributes/trash',[AttributeController::class,'trash'])->name('attributes.trash');
Route::get('attributes/restore/{id}',[AttributeController::class,'restore'])->name('attributes.restore');
Route::delete('attributes/force_delete/{id}',[AttributeController::class,'forceDelete'])->name('attributes.force_delete');

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

//User Profile
Route::get('user-profile/create',[UserProfileController::class, 'create'])->name('user_profile.create');
Route::post('user-profile/update-basic-info',[UserProfileController::class,'updateBasicInfo'])->name('user_profile.update_basic_info');
Route::post('user-profile/update-password',[UserProfileController::class,'updatePassword'])->name('user_profile.update_password');

//Admin
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});


Auth::routes();


