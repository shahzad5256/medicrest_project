<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




Route::group(['middleware' => ['web']], function () {

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
route::view('/register', 'auth.register');
Route::get('login', [AuthController::class, 'loginForm'])->name('login');
Route::get('/user/verification/{id}', [AuthController::class, 'verificationPage']);
Route::get('forgot/password', function () {
    return view('frontend/auth/forgot-password');
});
Route::get('reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::get('auth/google', [AuthController::class, 'redirectToGoogle'])->name('google-auth');


Route::post('send-otp', [AuthController::class, 'sendOtp'])->name('sendOtp');

##admin dashboard##

Route::view('admin/dashboard','backend.dashboard');


// Category
Route::get('category', [CategoryController::class, 'index'])->name('category');
Route::get('category/create', [CategoryController::class, 'create'])->name('category.create');
Route::get('category/edit/{id}', [CategoryController::class, 'editCategory']);

//Brands

// Category
Route::get('brands', [BrandController::class, 'index'])->name('category');
Route::get('brand/create', [BrandController::class, 'create'])->name('brand.create');
Route::get('brand/edit/{id}', [BrandController::class, 'editBrand']);

// Product
Route::get('product', [ProductController::class, 'index'])->name('product');
Route::get('product/create', [ProductController::class, 'create'])->name('product.create');
Route::get('product/edit/{id}', [ProductController::class, 'editProduct']);
Route::get('/view-product/{product}', [App\Http\Controllers\ProductController::class, 'singleProduct']);
// Product
Route::post('category/{id}/child', [CategoryController::class, 'getChildByParentID']);

});