<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryApiController; 
use App\Http\Controllers\RegionApiController;
use App\Http\Controllers\ShipperApiController;


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/categories', [CategoryApiController::class, 'index']);
Route::get('/categories/{id}', [CategoryApiController::class, 'show']);
Route::post('/categories', [CategoryApiController::class, 'store']);
Route::put('/categories/{id}', [CategoryApiController::class, 'update']);
Route::delete('/categories/{id}', [CategoryApiController::class, 'destroy']);

Route::get('/regions', [RegionApiController::class, 'index']);
Route::get('/regions/{id}', [RegionApiController::class, 'show']);
Route::post('/regions', [RegionApiController::class, 'store']);
Route::put('/regions/{id}', [RegionApiController::class, 'update']);
Route::delete('/regions/{id}', [RegionApiController::class, 'destroy']);

Route::apiResource('shippers', ShipperApiController::class);
Route::get('/shippers/{id}', [ShipperApiController::class, 'show']);
Route::post('/shippers', [ShipperApiController::class, 'store']);
Route::put('/shippers/{id}', [ShipperApiController::class, 'update']);
Route::delete('/shippers/{id}', [ShipperApiController::class, 'destroy']);
