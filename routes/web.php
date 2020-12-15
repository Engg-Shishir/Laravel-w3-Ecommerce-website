<?php

use Illuminate\Support\Facades\Route;
#---====== Include Usabble Controller ======------>
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CuponController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\User\WishlistController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\CheckoutController;



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





##############---====== Admin Login View ======------##############>
##############---====== Admin Login View ======------##############>
Route::get('/admin',[LoginController::class,'showLoginForm'])->name('admin.login');

#---====== Admin Login  ======------>
#-- This route is work using laravel default created route inside `AuthRouteMethods.php`
Route::post('/admin',[LoginController::class,'login']);

#---====== Admin home page  ======------>
Route::get('/admin/home', [AdminController::class, 'index']);

#---====== Admin Logout ======------>
Route::get('/admin/logout',[AdminController::class,'logout'])->name('admin.logout');






###############---====== Admin categorys ======------##############>
###############---====== Admin categorys ======------##############>
Route::get('/admin/categorys',[CategoryController::class,'index'])->name('admin.categorys');

#---====== Category store  ======------>
Route::post('/admin/category_store',[CategoryController::class,'store'])->name('store.category');

#---====== Category Delete ======------>
Route::get('/admin/category/delete/{id}',[CategoryController::class,'delete']);

#---====== Category Edit ======------>
Route::get('/admin/category/edit/{id}',[CategoryController::class,'edit']);

#---====== Category Update  ======------>
Route::post('/admin/category_update',[CategoryController::class,'update'])->name('update.category');

#---====== Manage Category Status ======------>
Route::get('/admin/category/status/{cid}/{status}',[CategoryController::class,'status']);






###############---====== Admin Brand Page======------##############>
###############---====== Admin Brand Page======------##############>
Route::get('/admin/brand',[BrandController::class,'index'])->name('admin.brand');

#---====== Brand Add  ======------>
Route::post('/admin/brand_store',[BrandController::class,'store'])->name('store.brand');

#---====== Brand Delete ======------>
Route::get('/admin/brand/delete/{id}',[BrandController::class,'delete']);

#---====== Brand Edit ======------>
Route::get('/admin/brand/edit/{id}',[BrandController::class,'edit']);

#---====== Brand Update  ======------>
Route::post('/admin/brand_update',[BrandController::class,'update'])->name('update.brand');

#---====== Brand status Manage ======------>
Route::get('/admin/brand/status/{bid}/{status}',[BrandController::class,'status']);






###############---====== Open Product Manage ======------##############>
###############---====== Open Product Manage ======------##############>
Route::get('/admin/product',[ProductController::class,'product_form_show'])->name('product_form_show');

#---====== Store Product  ======------>
Route::post('/admin/store/product',[ProductController::class,'store'])->name('store.product');

#---====== Manage Product ======------>
Route::get('/admin/manage/product',[ProductController::class,'manage'])->name('manage_product');

#---====== Product Delete ======------>
Route::get('/admin/product/delete/{id}',[ProductController::class,'delete']);

#---====== Product Edit ======------>
Route::get('/admin/product/edit/{id}',[ProductController::class,'edit']);

#---====== Product Update ======------>
Route::post('/admin/product/update',[ProductController::class,'update'])->name('update.product');

#---====== Update Product Image ======------>
Route::post('/admin/product/update/image',[ProductController::class,'product_update_image'])->name('update.pimage');

#---====== Product status ======------>
Route::get('/admin/product/status/{pid}/{status}',[ProductController::class,'status']);






###############---====== Admin Cupon manage ======------##############>
###############---====== Admin Cupon manage ======------##############>
Route::get('/admin/cupon',[CuponController::class,'index'])->name('admin.cupon');

#---====== Cupon Add  ======------>
Route::post('/admin/cupon/store',[CuponController::class,'store'])->name('store.cupon');

#---====== Cupon Delete ======------>
Route::get('/admin/cupon/delete/{id}',[CuponController::class,'delete']);

#---====== Cupon Edit ======------>
Route::get('/admin/cupon/edit/{id}',[CuponController::class,'edit']);

#---====== Cupon Update  ======------>
Route::post('/admin/cupon/update',[CuponController::class,'update'])->name('update.cupon');

#---====== Cupon status Manage ======------>
Route::get('/admin/cupon/status/{cid}/{status}',[CuponController::class,'status']);









###############---====== Admin Order manage ======------##############>
###############---====== Admin Order manage ======------##############>
Route::get('/admin/order',[OrderController::class,'index'])->name('admin.order');

#---====== Order View ======------>
Route::get('/admin/order/view/{id}',[OrderController::class,'view']);











###############---====== Frontend ======------##############>
###############---====== Frontend ======------##############>
Route::get('/',[FrontendController::class, 'index'])->name('front.home');











###############---====== User Wishlist & Shopping Cart Manage ======------##############>
###############---====== User Wishlist & Shopping Cart Manage ======------##############>

#---====== Add To wishlist ======------>
Route::get('/user/add/wishlist/{id}',[WishlistController::class,'addToWishList']);

#---====== Add To Cart ======------>
Route::post('/user/add/cart/{id}',[CartController::class,'addToCart']);

#---====== Wishlist page ======------>
Route::get('/user/wishlist',[WishlistController::class,'home']);

#---====== Wishlist Delete ======------>
Route::get('/user/wishlist/remove/{id}',[WishlistController::class,'remove']);



#---====== Cart page ======------>
Route::get('/user/cart',[CartController::class,'home']);

#---====== Cart quantity update ======------>
Route::post('/cart/qty/update/{id}',[CartController::class,'qty_update']);

#---====== Cart remove ======------>
Route::get('/cart/remove/{id}',[CartController::class,'remove']);



#---====== Cupon Applay ======------>
Route::post('/cupon/aplay',[CartController::class,'cupon_aplay']);

#---====== Cupon remove ======------>
Route::get('/cupon/remove',[CartController::class,'cupon_remove']);







###############---====== Checkout Page setup ======------##############>
###############---====== Checkout Page setup ======------##############>

#---====== Checkout home page ======------>
Route::get('/checkout',[CheckoutController::class,'home']);

#---====== Place Order ======------>
Route::post('/place_order',[CheckoutController::class,'place_order'])->name('place_order');

#---====== Order Success ======------>
Route::get('/order/success',[CheckoutController::class,'order_success']);