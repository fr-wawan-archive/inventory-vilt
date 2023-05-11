<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StockController;
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


// Route::get('/',function () {
//     return Inertia::render('Public/Index',[
//         'products' => Product::all()
//     ]);
// });
Route::get('/', [IndexController::class, 'index'])->name('index.index');
Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard.index')->middleware('auth');


Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');
Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'store'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/stock', [StockController::class, 'index'])->name('stock.index');
Route::get('/stock/{id}/add', [StockController::class, 'create']);
Route::put('/stock/{id}/update',[StockController::class,'update']);


Route::resource('suppliers',SupplierController::class)->middleware('auth');
Route::resource('categories',CategoryController::class)->middleware('auth');
Route::resource('products',ProductController::class)->middleware('auth');