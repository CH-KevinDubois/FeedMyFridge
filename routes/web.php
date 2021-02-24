<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Model\FridgesController;
use App\Http\Controllers\model\ProductsController;

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

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/fridges/allproducts{search?}', [FridgesController::class, 'allproducts'])->middleware('auth')->name('fridges.allproducts');
Route::get('/fridges/searchproduct', [FridgesController::class, 'searchproduct'])->middleware('auth')->name('fridges.searchproduct');
Route::resource('/fridges', FridgesController::class)->middleware('auth');

Route::resource('fridges/{fridge}/products', ProductsController::class);

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index']);
