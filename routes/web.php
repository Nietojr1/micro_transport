<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\CardBrandController;

Route::view('/', 'welcome');
Route::view('users', 'users');
Route::view('vehicle', 'vehicle');


Auth::routes(['verify' => true]);
Route::view('/verify', 'auth.verify');

Route::get('home',                  [HomeController::class, 'index'])->name('home')->middleware('verified');

Route::get('getAllUsers',           [UserController::class, 'allUsers']);
Route::get('userById/{id}',         [UserController::class, 'userById']);
Route::get('userByRole/{id}',       [UserController::class, 'allUserByRole']);
Route::post('userNew',              [UserController::class, 'postUserNew']);

Route::get('getAllRoles',           [RoleController::class, 'allRoles']);
Route::get('role/{id}',             [RoleController::class, 'roleById']);

Route::get('allVehicle',            [VehicleController::class, 'allVehicles']);
Route::get('vehicleByPlate/{id}',   [VehicleController::class, 'vehicleByPlate']);
Route::post('vehicleNew',           [VehicleController::class, 'vehicleNew']);


Route::get('getAllBrand',           [CardBrandController::class, 'allBrand']);



