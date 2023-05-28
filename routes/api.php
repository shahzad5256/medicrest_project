<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TicketController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login',[AuthController::class,'login']);

// Category
Route::post('/add/category',[CategoryController::class,'addCategory']);
Route::post('/update/category',[CategoryController::class,'updateCategory']);
Route::delete('/delete/category/{id}',[CategoryController::class,'deleteCategory']);
Route::get('cat/{id}',[CategoryController::class,'dependentCategory']);

//brands
Route::post('/add/brand',[BrandController::class,'addBrand']);
Route::post('/update/brand',[BrandController::class,'updateBrand']);
Route::delete('/delete/brand/{id}',[BrandController::class,'deleteBrand']);

// Product
Route::post('/add/product',[ProductController::class,'addProduct']);
Route::post('/update/product',[ProductController::class,'updateProduct']);
Route::delete('/delete/product/{id}',[ProductController::class,'deleteProduct']);


//dropzone
Route::post('upload/files',[TicketController::class,'uploadFiles']);
Route::delete('delete/files',[TicketController::class,'DeleteFiles']);