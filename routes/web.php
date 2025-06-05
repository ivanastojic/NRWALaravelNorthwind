<?php

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
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

// Početna stranica
Route::get('/', function () {
    return view('welcome');
});

// Autentikacija
Auth::routes();

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class,'login']);

// Rute dostupne gostima (neprijavljenim korisnicima)
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

// Rute za sve prijavljene korisnike (npr. role: user, editor, admin)
Route::middleware(['auth', 'role:admin,user,editor'])->group(function () {
    Route::get('/suppliers', [SupplierController::class, 'index'])->name('suppliers.index');
    Route::get('/shippers', [ShipperController::class, 'index'])->name('shippers.index');
    Route::get('/regions', [RegionController::class, 'index'])->name('regions.index');
    Route::get('/territories', [TerritoryController::class, 'index'])->name('territories.index');
    Route::get('/customerdemographics', [CustomerdemographicController::class, 'index'])->name('customerdemographics.index');
    Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
    Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
});

// Rute za role user i admin — stvaranje
Route::middleware(['auth', 'role:user,admin'])->group(function () {
    // Categories
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');

    // Products
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');

    // Suppliers
    Route::get('/suppliers/create', [SupplierController::class, 'create'])->name('suppliers.create');
    Route::post('/suppliers/store', [SupplierController::class, 'store'])->name('suppliers.store');

    // Shippers
    Route::get('/shippers/create', [ShipperController::class, 'create'])->name('shippers.create');
    Route::post('/shippers/store', [ShipperController::class, 'store'])->name('shippers.store');

    // Regions
    Route::get('/regions/create', [RegionController::class, 'create'])->name('regions.create');
    Route::post('/regions/store', [RegionController::class, 'store'])->name('regions.store');

    // Territories
    Route::get('/territories/create', [TerritoryController::class, 'create'])->name('territories.create');
    Route::post('/territories/store', [TerritoryController::class, 'store'])->name('territories.store');

    // Customer demographics
    Route::get('/customerdemographics/create', [CustomerdemographicController::class, 'create'])->name('customerdemographics.create');
    Route::post('/customerdemographics/store', [CustomerdemographicController::class, 'store'])->name('customerdemographics.store');

    // Customers
    Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create');
    Route::post('/customers/store', [CustomerController::class, 'store'])->name('customers.store');

    // Employees
    Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
    Route::post('/employees/store', [EmployeeController::class, 'store'])->name('employees.store');

    // Orders
    Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
    Route::post('/orders/store', [OrderController::class, 'store'])->name('orders.store');
});

// Rute za role editor i admin — uređivanje
Route::middleware(['auth', 'role:editor,admin'])->group(function () {
    Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');

    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
    
    Route::get('/suppliers/{id}/edit', [SupplierController::class, 'edit'])->name('suppliers.edit');
    Route::put('/suppliers/{id}', [SupplierController::class, 'update'])->name('suppliers.update');

    Route::get('/shippers/{id}/edit', [ShipperController::class, 'edit'])->name('shippers.edit');
    Route::put('/shippers/{id}', [ShipperController::class, 'update'])->name('shippers.update');

    Route::get('/regions/{id}/edit', [RegionController::class, 'edit'])->name('regions.edit');
    Route::put('/regions/{id}', [RegionController::class, 'update'])->name('regions.update');

    Route::get('/territories/{id}/edit', [TerritoryController::class, 'edit'])->name('territories.edit');
    Route::put('/territories/{id}', [TerritoryController::class, 'update'])->name('territories.update');

    Route::get('/customerdemographics/{id}/edit', [CustomerdemographicController::class, 'edit'])->name('customerdemographics.edit');
    Route::put('/customerdemographics/{id}', [CustomerdemographicController::class, 'update'])->name('customerdemographics.update');

    Route::get('/customers/{id}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
    Route::put('/customers/{id}', [CustomerController::class, 'update'])->name('customers.update');

    Route::get('/employees/{id}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
    Route::put('/employees/{id}', [EmployeeController::class, 'update'])->name('employees.update');

    Route::get('/orders/{id}/edit', [OrderController::class, 'edit'])->name('orders.edit');
    Route::put('/orders/{id}', [OrderController::class, 'update'])->name('orders.update');
});

// Rute samo za admin - brisanje i dodatne funkcije
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
    Route::delete('/suppliers/{id}', [SupplierController::class, 'destroy'])->name('suppliers.destroy');
    Route::delete('/shippers/{id}', [ShipperController::class, 'destroy'])->name('shippers.destroy');
    Route::delete('/regions/{id}', [RegionController::class, 'destroy'])->name('regions.destroy');
    Route::delete('/territories/{id}', [TerritoryController::class, 'destroy'])->name('territories.destroy');
    Route::delete('/customerdemographics/{id}', [CustomerdemographicController::class, 'destroy'])->name('customerdemographics.destroy');
    Route::delete('/customers/{id}', [CustomerController::class, 'destroy'])->name('customers.destroy');
    Route::delete('/employees/{id}', [EmployeeController::class, 'destroy'])->name('employees.destroy');
    Route::delete('/orders/{id}', [OrderController::class, 'destroy'])->name('orders.destroy');
});




