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


Route::get('/login','AuthController@login')->name('login');
Route::get('/logout','LogoutController@logout')->name('login');
Route::get('/register','RegisterController@register');
Route::post('/postregister','RegisterController@postregister');
Route::post('/postlogin','AuthController@postlogin');

Route::group(['middleware' => ['auth','checkRole:admin']], function(){
    Route::get('/home/admin', function () {
        return view('admin.home');
    });
    // Produk
    Route::get('/cretate/produk','ProductController@index');
    Route::post('/addproduk','ProductController@createproduk');
    Route::get('/produk/{id}/hapus','ProductController@hapus');
    Route::post('/produk/{produk}/update','ProductController@update');
});

Route::group(['middleware' => ['auth','checkRole:user']], function(){
    Route::get('/user', function () {
        return view('user.home');
    })->name('user');
});
