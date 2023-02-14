<?php

use App\Http\Controllers\SearchController;
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
    Route::get('/', function(){
        return view('search');
    });

    Route::get('api/search', [\App\Http\Controllers\SearchController::class, 'search'])->name('api.search');
    Route::get('/search', [\App\Http\Controllers\SearchController::class, 'index'])->name('search.index');
    Route::get('/search/{search}', [\App\Http\Controllers\SearchController::class, 'expand'])->name('search.expand');

    Route::middleware('auth')->group(function(){
        Route::resource('genders', \App\Http\Controllers\GenderController::class);
        Route::post('work/gender/create', [\App\Http\Controllers\GenderController::class, 'createGenderFromWork'])->name('work.gender');

        Route::resource('works', \App\Http\Controllers\WorkController::class);

        Route::resource('characters', \App\Http\Controllers\CharacterController::class);
        Route::post('work/character/create', [\App\Http\Controllers\CharacterController::class, 'createCharacterFromWork'])->name('work.character');

        Route::resource('posts', App\Http\Controllers\PostController::class);
        route::post('/post/like/{post}', [\App\Http\Controllers\LikeController::class, 'likePost'])->name('post.like');

        Route::post('/comments/store', [\App\Http\Controllers\CommentController::class, 'store'])->name('comment.store');

        Route::get('/profile/{username}', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.user');
        Route::get('/profile', [\App\Http\Controllers\ProfileController::class, 'index'])->name('profile');

        Route::put('/update/{user}', [\App\Http\Controllers\UserController::class, 'update'])->name('user.update');
        Route::get('/follow', [\App\Http\Controllers\FollowerController::class, 'follow'])->name('follow');

        Route::get('/search/tags', [\App\Http\Controllers\SearchController::class, 'searchTags'])->name('search.tags');

        Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
    });

    Auth::routes(['api.search' => false, 'search.index' => false, 'search.expand' => false, 'characters' => false]);



