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
Route::resource('/to-do-list','TodoController');
Route::put('/to-do-list/{to_do_list}/complete', 'TodoController@complete');
Route::get('/to-do-list/{to_do_list}/share', 'TodoController@share')->name('share');
Route::put('/to-do-list/{to_do_list}/share', 'TodoController@postshare');
