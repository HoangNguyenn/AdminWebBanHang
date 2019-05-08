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
Route::get('home','HomeController@index')->name('home');
Route::get('testhome','HomeController@test')->name('testhome');


Route::get('dangnhap','AdminController@getLogin');
Route::post('dangnhap','AdminController@postLogin');

Route::get('logout','AdminController@logout');