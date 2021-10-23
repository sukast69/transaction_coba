<?php

use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('/home');
// });

// Route::get('/', [TransactionController::class, 'index']);
Route::get('/', [TransactionController::class, 'index']);
Route::get('/edit/{id_pengguna}', [TransactionController::class, 'edit']);
Route::post('/update/{id_pengguna}', [TransactionController::class, 'update'])->name('update');
Route::get('/delete/{id_pengguna}', [TransactionController::class, 'deleteData'])->name('deleteData');
Route::post('/', [TransactionController::class, 'insert'])->name('insert');

// Route::post('/', [TransactionController::class, 'jalur'])->name('jalur');