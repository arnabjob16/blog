<?php

use App\Http\Controllers\PostController;
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

Route::get('/', [PostController::class, 'list'])->name('post_list');
Route::get('/add-post', [PostController::class, 'add'])->name('add_post');
Route::post('/post-submit', [PostController::class, 'postSubmit'])->name('post_submit');
Route::post('/add-comment', [PostController::class, 'addComment'])->name('add_comment');
