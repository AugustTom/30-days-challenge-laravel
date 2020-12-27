<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\UserController;
use App\Providers\CommentCreated;
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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get("/",[PagesController::class,'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get("/",[PagesController::class,'index']);

Route::get('/about', [PagesController::class, 'about']);

Route::get('posts/create', [PostsController::class, 'create'])->middleware('auth');

Route::post('posts/create', [PostsController::class, 'store'])->middleware('auth');

Route::get('posts/{id}/edit', [PostsController::class, 'edit'])->middleware('auth');

Route::get('posts/{id}', [PostsController::class, 'show'])->middleware('auth');

Route::post('posts/{id}', [CommentController::class, 'apiStore'])->
name('api.comments.store')->middleware('auth');

Route::put('posts/{id}', [CommentController::class, 'apiUpdate'])->
name('api.comments.update')->middleware('auth');

Route::delete('posts/{id}', [CommentController::class, 'apiDelete'])->
name('api.comments.destroy')->middleware('auth');

Route::put('posts/{id}/edit', [PostsController::class, 'update'])->middleware('auth');

Route::delete('posts/{id}/edit', [PostsController::class, 'destroy'])->middleware('auth');

Route::put('dashboard', [UserController::class, 'update'])->middleware('auth');

Route::get('users', [UserController::class, 'index'])->name('register.admin')->middleware('auth');

Route::delete('users{id?}', [UserController::class, 'destroy'])->name('register.admin')->middleware('auth');
Route::put('users{id?}', [UserController::class, 'changeRights'])->name('register.admin')->middleware('auth');


//Route::get('/', 'CommentController@index')->middleware('auth');
//
//Route::post('/', 'CommentController@store')->middleware('auth');
