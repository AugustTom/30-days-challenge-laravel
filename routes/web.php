<?php

use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
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
//    return 'hello';
//});


Route::get('/', [PagesController::class, 'index']);

Route::get('/about', [PagesController::class, 'about']);

Route::get('posts/create', [PostsController::class, 'create']);

Route::post('posts/create', [PostsController::class, 'store']);

Route::get('posts/{id}/edit', [PostsController::class, 'edit']);

Route::put('posts/{id}/edit', [PostsController::class, 'update']);

Route::delete('posts/{id}/edit', [PostsController::class, 'destroy']);
//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
