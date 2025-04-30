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
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('categories', CategoryController::class);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::resource('products', ProductController::class);
Route::resource('suppliers', SupplierController::class);
Route::resource('shippers', ShipperController::class);
Route::resource('regions', RegionController::class);
Route::resource('territories', TerritoryController::class);
Route::resource('customerdemographics', CustomerdemographicController::class);
Route::put('/customerdemographics/{CustomerTypeID}', [CustomerDemographicController::class, 'update'])->name('customerdemographics.update');
Route::resource('customers', CustomerController::class);
Route::resource('employees', EmployeeController::class);
Route::resource('orders', OrderController::class);
Route::post('/customers/{customerId}/add-demographics', [CustomerController::class, 'addDemographicsToCustomer'])->name('customers.addDemographics');

Auth::routes();

