<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TransactionController;
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

Route::get('/', [CategoryController::class, 'index']);
Route::get('/categories/create', [CategoryController::class, 'create'])->middleware('auth');
Route::post('/categories', [CategoryController::class, 'store']);


Route::get('/transactions/create', [TransactionController::class, 'index']);
Route::post('/transactions', [TransactionController::class, 'store']);
// Route::delete('/transactions/create{id}', [TransactionController::class, 'destroy']);




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
