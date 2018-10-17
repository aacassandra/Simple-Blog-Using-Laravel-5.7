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

//Route::get('/home', 'HomeController@home')->name('home');
Route::get('/home', 'PostController@home')->name('home');
Route::get('/post', 'PostController@index')->name('post.index');
Route::middleware('auth')->group(function(){
  Route::get('/post/create', 'PostController@create')->name('post.create');
  Route::post('/post/create', 'PostController@store')->name('post.store');
  //name dibuat untuk mengambil url slug dan mengambil data untuk di halaman html
  //contoh: <form action="{{ route('post.store') }}" method="post">

  //1. Style 1: update data menggunakan id yang dituju
  //Route::get('/post/{id}/edit', 'PostController@edit')->name('post.edit');
  //Route::patch('/post/{id}/edit', 'PostController@update')->name('post.update');

  //2. Style 2: menggunakan model binding by Laravel Future
  //step 1. syncronize pertama antar form dengan routes
  Route::post('/post/{post}/edit', 'PostController@edit')->name('post.edit');
  //step 2. sebagai penangkap variable yg berjalan di url /post/{post}/edit (karena patch hanya support untuk get)
  Route::get('/post/{post}/edit', 'PostController@edit')->name('post.edit');
  //step 3. baru mulai proses updating
  Route::patch('/post/{post}/edit', 'PostController@update')->name('post.update');
  //[Tambahan dari saya]

  Route::delete('/post/{post}/delete', 'PostController@destroy')->name('post.destroy');
  //Delete with Ajax Style
  Route::get('/post/delex', 'PostController@destrox')->name('post.destrox');

  //Untuk comment posts
  Route::post('/post/{post}/comment', 'PostCommentController@store')->name('post.comment.store');

  //[Tambahan dari saya]
  Route::post('/post/{post}/comment/{comment}/edit', 'PostCommentController@edit')->name('post.comment.edit');
  Route::get('/post/{post}/comment/{comment}/edit', 'PostCommentController@edit')->name('post.comment.edit');
  Route::patch('/post/{post}/comment/{comment}/edit', 'PostCommentController@update')->name('post.comment.update');
  Route::delete('/post/{post}/{comment}/delete', 'PostCommentController@destroy')->name('post.comment.destroy');
  Route::get('/post/comment/delete', 'PostCommentController@destrox')->name('post.comment.destrox');
});

//untuk show detail posting
Route::get('/post/{post}', 'PostController@show')->name('post.show');
