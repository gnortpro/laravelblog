<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::post('login', 'API\UserController@login');
// Route::post('register', 'API\UserController@register');
Route::post('/register', 'AuthController@register');
Route::post('/login', 'AuthController@login');
Route::post('/logout', 'AuthController@logout');

Route::group(['prefix' => 'post'], function () {
    Route::post('submitPost', 'PostController@submitPost');
    Route::post('editPost', 'PostController@editPost');
    Route::post('previewPost', 'PostController@previewPost');
    Route::post('action', 'PostController@actionPost');
});
Route::group(['middleware' => 'auth:api'], function () {
    Route::post('details', 'API\UserController@details');
});
