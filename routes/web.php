<?php

use Illuminate\Support\Facades\Route;
#---====== Include Usabble Controller ======------>
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\CategoryController;


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


#---====== Admin Login View ======------>
Route::get('/admin',[LoginController::class,'showLoginForm'])->name('admin.login');

#---====== Admin Login  ======------>
#-- This route is work using laravel default created route inside `AuthRouteMethods.php`
Route::post('/admin',[LoginController::class,'login']);

#---====== Admin home page  ======------>
Route::get('/admin/home', [AdminController::class, 'index']);

#---====== Admin Logout ======------>
Route::get('/admin/logout',[AdminController::class,'logout'])->name('admin.logout');

#---====== Admin categorys ======------>
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
