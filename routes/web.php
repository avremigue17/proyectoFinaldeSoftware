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
    return view('welcome');
});

Route::get('/contact','WebController@contact');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth'])->group(function(){


	Route::get('/movies','MovieController@index')->name('movies');
	Route::get('/movies-info/{movie}','MovieController@get')->name('movies');
	Route::post('/movies','MovieController@store')->name('movies');
	Route::put('/movies/{movie}','MovieController@update');

	Route::get('/categories','CategoryController@index')->name('categories');
	Route::put('/categories','CategoryController@update')->name('categories');
	Route::post('/categories','CategoryController@store')->name('categories');
	Route::delete('/categories','CategoryController@destroy')->name('categories');

	Route::get('/loans','LoanController@index')->name('loans');
	Route::get('/loans-info/{loan}','LoanController@get');
	Route::post('/loans','LoanController@store')->name('loans');
	//Route::delete('loans/{id}', 'LoanController@destroy');
	Route::put('/loans','LoanController@update');

});