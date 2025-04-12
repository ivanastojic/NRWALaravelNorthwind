<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ShipperController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\TerritoryController;
use App\Http\Controllers\CustomerdemographicController;
use App\Http\Controllers\CustomerController;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('categories', CategoryController::class);
Route::get('categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::resource('products', ProductController::class);
Route::resource('suppliers', SupplierController::class);
Route::resource('shippers', ShipperController::class);
Route::resource('regions', RegionController::class);
Route::resource('territories', TerritoryController::class);
Route::resource('customerdemographics', CustomerdemographicController::class);
Route::resource('customers', CustomerController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
