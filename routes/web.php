<?php

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
Auth::routes();
Route::get('logout', 'Auth\LoginController@logout');
// Route::get('/posts', 'PostController@index')->name('posts');
// Route::post('/submitpost', 'PostController@submitPost')->name('submitpost');
Route::middleware('auth')->group(function () {

    // Views
    Route::get('/', 'HomeController@index')->name('home');
    Route::prefix('posts')->group(function () {
        Route::get('/', 'PostController@index')->name('posts');
        Route::get('/{slug?}', 'PostController@index')->name('single-posts');
        // Route::get('/categories', 'PostController@categories')->name('posts-categories');
        // Route::get('/tags', 'PostController@tags')->name('posts-tags');
    });



    // Internal API
    Route::group(['prefix' => 'post'], function () {
        Route::post('submitPost', 'PostController@submitPost');
        Route::post('editPost', 'PostController@editPost');
        Route::post('previewPost', 'PostController@previewPost');
        Route::post('action', 'PostController@actionPost');
    });
});
