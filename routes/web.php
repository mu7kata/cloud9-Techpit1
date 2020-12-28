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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'ReviewController@index')->name('index');
Route::get('/edit/{id}', 'ReviewController@edit')->name('edit');    

Route::get('/show/{id}', 'ReviewController@show')->name('show');

Route::group(['middleware'=>'auth'],function(){
Route::get('/review','ReviewController@create')->name('create');
Route::post('/review/store', 'ReviewController@store')->name('store');
Route::post('/edit/update', 'ReviewController@update')->name('update');  
Route::get('/delete/{id}', 'ReviewController@delete')->name('delete'); 
});
	
