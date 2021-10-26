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
    return view('auth/login');
});

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');;


Route::middleware(['auth:sanctum', 'verified'])->get('/test/{id}', 'PostsController@index')->name('test');

Route::middleware(['auth'])->group(function(){

	Route::get('/create-area','AreasController@create')->name('create-area');
	Route::delete('/delete-area','AreasController@destroy')->name('delete-area');

	Route::get('/create-image','ImagesController@create')->name('create-image');
	Route::delete('/delete-image','ImagesController@destroy')->name('delete-image');

	Route::get('/create-text','TextsController@create')->name('create-text');
	Route::delete('/delete-text','TextsController@destroy')->name('delete-text');

	Route::get('/perfil/{id}','PostsController@perfil')->name('perfil');

	Route::get('find', 'SearchController@find');

	Route::post('/post','PostsController@store')->name('post');
	Route::get('/create-post','PostsController@create')->name('create-post');
	Route::delete('/delete-post','PostsController@destroy')->name('delete-post');
	
	Route::post('/postLikes','PostLikesController@store')->name('like');
	Route::delete('/postLikes','PostLikesController@destroy')->name('like');

	Route::get('/users','UserController@index')->name('users');
	Route::post('/users','UserController@edit')->name('users');
	Route::get('/users-info/{user}','UserController@get');
	Route::put('/users','UserController@update');
	Route::delete('/users','UserController@destroy')->name('users');
});