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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/post', 'PostController@index')->name('post.index');
Route::get('/post/create', 'PostController@create')->name('post.create');
Route::post('/post/create', 'PostController@store')->name('post.store');
//name dibuat untuk mengambil url slug dan mengambil data untuk di halaman html
//contoh: <form action="{{ route('post.store') }}" method="post">

//1. Style 1: update data menggunakan id yang dituju
//Route::get('/post/{id}/edit', 'PostController@edit')->name('post.edit');
//Route::patch('/post/{id}/edit', 'PostController@update')->name('post.update');

//2. Style 2: menggunakan model binding by Laravel Future
Route::get('/post/{post}/edit', 'PostController@edit')->name('post.edit');
Route::patch('/post/{post}/edit', 'PostController@update')->name('post.update');
//[Tambahan dari saya]
Route::post('/post/{post}/edit', 'PostController@edit_onButton')->name('post.edit_onButton');

Route::delete('/post/{post}/delete', 'PostController@destroy')->name('post.destroy');

//untuk show detail posting
Route::get('/post/{post}', 'PostController@show')->name('post.show');

//Untuk comment posts
Route::post('/post/{post}/comment', 'PostCommentController@store')->name('post.comment.store');

//[Tambahan dari saya]
Route::post('/post/{post}/{comment}/edit', 'PostCommentController@edit_onButton')->name('post.comment.edit_onButton');
Route::patch('/post/{post}/{comment}/edit', 'PostCommentController@update')->name('post.comment.update');
Route::delete('/post/{post}/{comment}/delete', 'PostCommentController@destroy')->name('post.comment.destroy');
