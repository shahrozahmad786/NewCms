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


// POst Controller
Route::resource('/post','PostController');

Route::get('/trashed_post','PostController@trashed')->name('trashed_post.index');


Route::put('/restore-post/{post}','PostController@restore')->name('restore-post');


// Category Controller

Route::resource('/category','CategoryController');
