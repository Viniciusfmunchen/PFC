<?php

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


    Route::get('/search', [\App\Http\Controllers\SearchController::class, 'search'])->name('search');
    Route::middleware('auth')->group(function(){
        Route::resource('genders', \App\Http\Controllers\GenderController::class);
        Route::post('work/gender/create', [\App\Http\Controllers\GenderController::class, 'createGenderFromWork'])->name('work.gender');

        Route::resource('works', \App\Http\Controllers\WorkController::class);

        Route::resource('characters', \App\Http\Controllers\CharacterController::class);
        Route::post('work/character/create', [\App\Http\Controllers\CharacterController::class, 'createCharacterFromWork'])->name('work.character');

        Route::resource('posts', App\Http\Controllers\PostController::class);

        Route::post('/comments/store', [\App\Http\Controllers\CommentController::class, 'store'])->name('comment.store');

        Route::get('/home/{username}', [\App\Http\Controllers\HomeController::class, 'show'])->name('home');
        Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

        Route::put('/update/{user}', [\App\Http\Controllers\UserController::class, 'update'])->name('user.update');
        Route::get('/follow', [\App\Http\Controllers\FollowerController::class, 'follow'])->name('follow');

        Route::get('/search/tags', [\App\Http\Controllers\SearchController::class, 'searchTags'])->name('search.tags');

    });

    Auth::routes(['search' => false]);



