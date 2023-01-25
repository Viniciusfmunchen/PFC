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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::middleware('auth')->group(function (){
    Route::resource('genders', \App\Http\Controllers\GenderController::class);
    Route::resource('works', \App\Http\Controllers\WorkController::class);
    Route::resource('characters', \App\Http\Controllers\CharacterController::class);
    Route::post('/post/store', [\App\Http\Controllers\PostController::class, 'store'])->name('post.store');
    Route::post('/comments/store', [\App\Http\Controllers\CommentController::class, 'store'])->name('comment.store');
    Route::get('/posts/show/{id}', [\App\Http\Controllers\PostController::class, 'show'])->name('posts.show');
});

Auth::routes();
Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');



