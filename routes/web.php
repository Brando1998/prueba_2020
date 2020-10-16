<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
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

Route::get('/', function (){return view('welcome');})->name('linfo');

Route::match(['get', 'post'], 'productos', [ProductsController::class, 'index'])->name('index');
Route::get('productos/crear', [ProductsController::class, 'create'])->name('create');
Route::post('productos/guardar', [ProductsController::class, 'store'])->name('store');
Route::get('productos/ver/{id}', [ProductsController::class, 'show'])->name('show');
Route::match(['get', 'post'],'productos/{id}/editar', [ProductsController::class, 'edit'])->name('edit');
Route::match(['patch'],'productos/actualizar/{id}', [ProductsController::class, 'update'])->name('update');
Route::any('productos/eliminar/{id}', [ProductsController::class, 'destroy'])->name('destroy');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia\Inertia::render('Dashboard');
})->name('dashboard');
/*
Route::match(['get', 'post'], 'productos', [ProductsController::class, 'index'])->name('index')->middleware('auth');
Route::get('productos/crear', [ProductsController::class, 'create'])->name('create')->middleware('auth');
Route::post('productos/guardar', [ProductsController::class, 'store'])->name('store')->middleware('auth');
Route::get('productos/ver/{id}', [ProductsController::class, 'show'])->name('show')->middleware('auth');
Route::match(['get', 'post'],'productos/{id}/editar', [ProductsController::class, 'edit'])->name('edit')->middleware('auth');
Route::match(['patch'],'productos/actualizar/{id}', [ProductsController::class, 'update'])->name('update')->middleware('auth');
Route::any('productos/eliminar/{id}', [ProductsController::class, 'destroy'])->name('destroy')->middleware('auth');
*/