<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeControler;
use App\Http\Controllers\PostController;

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

Route::get('/', [HomeControler::class, 'index'])->name('user.index');
Route::get('/create', [HomeControler::class, 'create'])->name('user.create');
Route::post('/store', [HomeControler::class, 'store'])->name('user.store');
Route::get('/edit/{id}', [HomeControler::class, 'edit'])->name('user.edit');
Route::post('/update/{id}', [HomeControler::class, 'update'])->name('user.update');
Route::delete('/delete/{id}', [HomeControler::class, 'delete'])->name('user.delete');

Route::resource('posts', PostController::class);