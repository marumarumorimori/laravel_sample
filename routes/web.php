<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/posts', [PostController::class, 'index']);
// Route::get('/posts', [PostController::class, 'index']);


// Route::resource('comment', CommentController::class);
// Route::get('/show/{id}', [PostController::class, 'show'])->name('show');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/posts', [PostController::class, 'index']);
// Route::resource('comment', CommentController::class);
Route::get('/posts', [PostController::class, 'index']);
Route::get('/show/{id}', [PostController::class, 'show'])->name('show');
Route::get('/create', [PostController::class, 'create'])->name('create');
Route::post('/store', [PostController::class, 'store'])->name('store');
Route::get('edit/{id}', [PostController::class, 'edit'])->name('edit');
Route::post('update/{id}' ,[PostController::class, 'update'])->name('update');
Route::post('destroy/{id}' , [PostController::class, 'destroy'])->name('destroy');
Route::post('/show/{id}' , [PostController::class, 'comment'])->name('comment');

