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

Route::get('/', 'Front\HomeController@index')->name('home');

Route::get('quotes', 'Front\QuoteController@index')->name('quote.index');

Route::get('quotes/{slug}', 'Front\QuoteController@show')->name('quote.show');


// writer
Route::get('writers', 'Front\WriterController@index')->name('writer.index');


//topics
Route::get('topics', 'Front\TopicController@index')->name('topic.index');

Route::get('topics/{slug}', 'Front\TopicController@show')->name('topic.show');

//Route::get('login', 'Front/Auth/LoginController@showForm')->name('login');



Route::prefix('black')->group(function () {

	Route::get('login', 'Back\Auth\LoginController@showForm')->name('admin.login');

	Route::post('login', 'Back\Auth\LoginController@login')->name('admin.login.submit');

	Route::post('logout', 'Back\Auth\LoginController@logout')->name('admin.logout');

	Route::get('/', 'Back\HomeController@index')->name('admin.dashboard');

	Route::resource('category', 'Back\CategoryController', ['names' => 'admin.category']);

	Route::resource('author', 'Back\AuthorController', ['names' => 'admin.author']);

	Route::resource('quote', 'Back\QuoteController', ['names' => 'admin.quote']);

});
