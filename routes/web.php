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

Route::get('/contact','WebController@contact');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', 'PostsController@index')->name('dashboard');

Route::middleware(['auth'])->group(function(){

	Route::get('/comments','CommentsController@create')->name('comments');

	Route::get('/perfil/{id}','PostsController@perfil')->name('perfil');

	Route::get('find', 'SearchController@find');

	Route::post('/post','PostsController@store')->name('post');
	Route::delete('/post','PostsController@destroy')->name('post');
	
	Route::post('/postLikes','PostLikesController@store')->name('like');
	Route::delete('/postLikes','PostLikesController@destroy')->name('like');

	Route::get('/moviesOld','MovieController@index')->name('movies');
	Route::get('/movies-info/{movie}','MovieController@get')->name('movies');
	Route::post('/movies','MovieController@store')->name('movies');
	Route::put('/movies/{movie}','MovieController@update');
	Route::delete('/movies','MovieController@destroy')->name('movies');

	Route::get('/categories','CategoryController@index')->name('categories');
	Route::put('/categories','CategoryController@update')->name('categories');
	Route::post('/categories','CategoryController@store')->name('categories');
	Route::delete('/categories','CategoryController@destroy')->name('categories');

	Route::get('/loans','LoanController@index')->name('loans');
	Route::get('/loans-info/{loan}','LoanController@get');
	Route::post('/loans','LoanController@store')->name('loans');
	//Route::delete('loans/{id}', 'LoanController@destroy');
	Route::put('/loans','LoanController@update');

	Route::get('/users','UserController@index')->name('users');
	Route::post('/users','UserController@edit')->name('users');
	Route::get('/users-info/{user}','UserController@get');
	Route::put('/users','UserController@update');
	Route::delete('/users','UserController@destroy')->name('users');

});