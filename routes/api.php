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

Route::delete('/posts/{post}','Api\PostsController@destroy')->middleware('auth:api');
Route::get('/posts','Api\PostsController@index')->middleware('auth:api');
// Route::get('/posts/create','PostController@create')->name('posts.create');
Route::post('/posts','Api\PostsController@store')->middleware('auth:api');
// Route::get('/posts/{post}/edit','Api/PostController@edit')->name('posts.edit');
Route::put('/posts/{post}','Api\PostsController@update')->middleware('auth:api'); 
Route::get('/posts/{post}','Api\PostsController@show')->middleware('auth:api');

