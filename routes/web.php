<?php

use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', WelcomeController::class)->middleware('guest');


Route::middleware('auth')->controller(ProfileController::class)->prefix('/profile/edit')->name('profile.')->group(function () {
    Route::get('/', 'edit')->name('edit');
    Route::patch('info', 'updateInformation')->name('update.info');
    Route::patch('avatar', 'updateAvatar')->name('update.avatar');
    Route::get('avatar', 'selectAvatar')->name('select.avatar');
    Route::delete('edit', 'destroy')->name('destroy');
});



Route::middleware(['auth', 'verified'])->group(function () {

    Route::controller(FeedController::class)->group(function () {
        Route::get('/feed', [FeedController::class, 'feed'])->name('feed');
        Route::get('/popular', [FeedController::class, 'popular'])->name('popular');
    });

    Route::resource('posts', PostController::class)->except(['index']);

    Route::post('posts/{post}/comments', [CommentController::class, 'store'])->name('posts.comments.store');

    Route::resource('posts.likes', LikeController::class)->scoped()->only(['store', 'destroy']);

    Route::controller(ProfileController::class)->prefix('profile/{user}')->name('profile.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('following', 'following')->name('following');
        Route::get('followers', 'followers')->name('followers');
    });

    Route::controller(FollowController::class)->group(function () {
        Route::post('/follow/{user}', 'follow')->name('follow');
        Route::post('/unfollow/{user}', 'unfollow')->name('unfollow');
    });


    Route::get('search', [SearchController::class, 'index'])->name('search');
});



require __DIR__ . '/auth.php';














