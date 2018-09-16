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




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
