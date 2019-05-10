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

Route::get('home', function () {
    return view('home');
});
Route::get('param','ParamController@showparam');

Route::get('home','HomeController@index');


Route::get('dangnhap','UserController@getLogin');
Route::post('dangnhap','UserController@postLogin');
Route::get('register','UserController@getregister');
Route::post('register','UserController@postregister');
Route::get('logout','UserController@getLogout');
Route::get('profile/{id}','UserController@getProfile');
Route::get('edit/{id}','UserController@getEdit');
Route::post('edit/{id}','UserController@postEdit');
Route::get('forgot','UserController@getForgot');

Route::group(['prefix' => 'admin'], function() {
    Route::group(['prefix' => 'user'], function() {
        Route::get('list_user',['as'=>'list_user','uses'=>'UserController@getList']);
        Route::get('add_user',['as'=>'add_user','uses'=>'UserController@getAddUser']);
        Route::post('add_user',['as'=>'add_user','uses'=>'UserController@postAddUser']);
        Route::get('edit_user/{id}','UserController@getEditUser');
        Route::post('edit_user/{id}','UserController@postEditUser');
        Route::get('delete_user/{id}','UserController@DeleteUser');
    });
    Route::group(['prefix' => 'loaisp'], function() {
        Route::get('list_loaisp','LoaiSPController@getList');
        Route::get('add_loaisp','LoaiSPController@getAddLoaiSP');
        Route::post('add_loaisp','LoaiSPController@postAddLoaiSP');
        Route::get('edit_loaisp/{id}','LoaiSPController@getEditLoaiSP');
        Route::post('edit_loaisp/{id}','LoaiSPController@postEditLoaiSP');
        Route::get('delete_loaisp/{id}','LoaiSPController@DeleteLoaiSP');
    });
    Route::group(['prefix' => 'sanpham'], function() {
        Route::get('list_sanpham','SanPhamController@getList');
        Route::get('add_sanpham','SanPhamController@getAddSanPham');
        Route::post('add_sanpham','SanPhamController@postAddSanPham');
        Route::get('edit_sanpham/{id}','SanPhamController@getEditSanPham');
        Route::post('edit_sanpham/{id}','SanPhamController@postEditSanPham');
        Route::get('delete_sanpham/{id}','SanPhamController@DeleteSanPham');
    });

});