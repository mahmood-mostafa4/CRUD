<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', [PostController::class, 'index']);

Route::get('/posts', [PostController::class, 'index'])->name('index');

Route::get('/posts/create', [PostController::class, 'create'])->name('create');

Route::post('/posts', [PostController::class, 'store'])->name('store');

Route::get('/posts/{post}', [PostController::class, 'show'])->name('show');

Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('edit');

Route::put('/posts/{post}', [PostController::class, 'update'])->name('update');

Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('destroy');
