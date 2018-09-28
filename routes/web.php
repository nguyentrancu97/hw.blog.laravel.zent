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



Route::get('index','BlogController@index');

Route::get('blog/{slug}','BlogController@detail');

Route::get('category/{slug}','BlogController@category');

Route::get('tag/{slug}',"BlogController@tag");

Route::get('search','BlogController@search');

Route::get('/',function(){
	return view('welcome');
});

Route::post('upload','BlogController@upload');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('viewPost','PostController@viewPost');
Route::get('getPost','PostController@getAll');
Route::get('dashboard','PostController@dashboard');
Route::get('post/show/{id}','PostController@show')->name('show');
Route::post('update/{id}','PostController@update');
Route::post('post/store','PostController@store');
Route::delete('post/delete/{id}','PostController@delete');

Route::get('getCate','CategoryController@getAll');
Route::get('viewCate','CategoryController@viewCate');
Route::get('cate/show/{id}','CategoryController@show');
Route::put('cate/update/{id}','CategoryController@update');
Route::delete('cate/delete/{id}','CategoryController@delete');
Route::post('cate/store','CategoryController@store');

Route::get('viewTag','TagController@viewTag');
Route::get('getTag','TagController@getTag');
Route::post('tag/store','TagController@store');
Route::delete('tag/delete/{id}','TagController@delete');
Route::get('tag/show/{id}','TagController@show');
Route::put('tag/update/{id}','TagController@update');











