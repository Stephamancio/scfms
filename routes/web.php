<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\CashierController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IngredientController;

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

Route::get('/', function () {
    return view('welcome');
});



Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Admin Routes
    Route::middleware(['auth', 'role:1'])->group(function () {
        Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.home');
    });

    // Manager Routes
    Route::middleware(['auth', 'role:2'])->group(function () {
    Route::get('/manager/dashboard', [ManagerController::class, 'index'])->name('manager.home');
    Route::get('/manager/foods/index', [ManagerController::class, 'foodsIndex'])->name('manager.foods.index');
    Route::get('/manager/foods/create', [ManagerController::class, 'create'])->name('manager.foods.create'); // Define the route for creating a new product
    Route::post('/manager/foods', [ManagerController::class, 'store'])->name('manager.foods.store'); // Define the route for storing a new product
    Route::get('/manager/foods/{product}/edit', [ManagerController::class, 'edit'])->name('manager.foods.edit'); // Define the route for editing a product
    Route::put('/manager/foods/{product}', [ManagerController::class, 'update'])->name('manager.foods.update'); // Define the route for updating a product
    Route::delete('/manager/foods/{product}', [ManagerController::class, 'destroy'])->name('manager.foods.destroy'); // Define the route for deleting a product
});

    // Cashier Routes
    Route::middleware(['auth', 'role:3'])->group(function () {
        Route::get('/cashier/dashboard', [CashierController::class, 'index'])->name('cashier.home');
    });

    // Parent Routes
    Route::middleware(['auth', 'role:4'])->group(function () {
        Route::get('/parent/dashboard', [ParentController::class, 'index'])->name('parent.home');
    });

// Authentication Routes
Route::middleware('guest')->group(function () {
    // Register
    Route::get('register', [AuthController::class, 'register'])->name('register');
    Route::post('register', [AuthController::class, 'registerSave'])->name('register.save');

    // Login
    Route::get('login', [AuthController::class, 'login'])->name('login');

    Route::post('login', [AuthController::class, 'loginAction'])->name('login.action');
});

// Logout
Route::middleware('auth')->group(function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});

//Routes for IngredientController
Route::get('/ingredients', [IngredientController::class, 'index'])->name('ingredients.index');
Route::get('/ingredients/create', [IngredientController::class, 'create'])->name('ingredients.create');
Route::post('/ingredients/store', [IngredientController::class, 'store'])->name('ingredients.store');
Route::get('/ingredients/{ingredient}/edit', [IngredientController::class, 'edit'])->name('ingredients.edit');
Route::put('/ingredients/{ingredient}/update', [IngredientController::class, 'update'])->name('ingredients.update');
Route::delete('/ingredients/{ingredient}/destroy', [IngredientController::class, 'destroy'])->name('ingredients.destroy');
