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

Route::get('/', function () {
    return view('main');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/posts', 'PostController@index')->name('posts');
Route::get('/post/create', 'PostController@create')->name('post.create');
Route::post('/post', 'PostController@store')->name('post.store');
Route::get('/post/{id}', 'PostController@show')->name('post.show');
Route::get('/post/edit/{id}', 'PostController@edit')->name('post.edit');
Route::put('/post/{id}', 'PostController@update')->name('post.update');
Route::get('/post/delete/{id}', 'PostController@delete')->name('post.delete');
Route::post('/post/{id}/comment/create', 'CommentController@store')->name('comment.store');
Route::get('/comment/{comment_id}/edit', 'CommentController@edit')->name('comment.edit');
Route::put('/comment/{comment_id}', 'CommentController@update')->name('comment.update');
Route::get('/comment/{comment_id}/destroy', 'CommentController@destroy')->name('comment.delete');
