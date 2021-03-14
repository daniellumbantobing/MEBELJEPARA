<?php

use Illuminate\Support\Facades\Route;
use App\Produk;
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

    $produk = Produk::latest()->take(6)->get();
    return view('dashboard.index', compact(['produk']));
});
Route::get('/login', 'AuthController@login')->name('login');
Route::get('/logout', 'LogoutController@logout')->name('login');
Route::get('/register', 'RegisterController@register');
Route::post('/postregister', 'RegisterController@postregister');
Route::post('/postlogin', 'AuthController@postlogin');
Route::get('/produk/{id}/detail', 'ProductController@detail');
Route::get('/detail/produk', 'ProductController@detail');
Route::post('/add-cart/{id}', 'ProductController@addtocart');
Route::get('/cart', 'ProductController@cart');
Route::get('/cart/{id}/delete', 'ProductController@delete');
Route::get('/cari/produk', 'ProductController@cari');

Route::group(['middleware' => ['auth', 'checkRole:admin']], function () {

    Route::get('/home/admin', function () {
        return view('admin.home');
    });


    // Produk
    Route::get('/cretate/produk', 'ProductController@index');
    Route::post('/addproduk', 'ProductController@createproduk');
    Route::get('/produk/{id}/hapus', 'ProductController@hapus');
    Route::post('/produk/{produk}/update', 'ProductController@update');

    //user
    Route::get('/userlist', 'UserController@index');
    Route::get('/user/{user}/hapus', 'UserController@destroy');
    Route::get('/pemesananproduk', 'ProductController@listOrder');
    Route::get('/conf/{id}', 'ProductController@konfirmasipemesanan');
    Route::get('/conf1/{id}', 'ProductController@konfirmasipemesanan1');
    Route::get('/detpro/{id}', 'ProductController@detpro');
    Route::get('/files/download/{gambar}', 'ProductController@download');
});

Route::group(['middleware' => ['auth', 'checkRole:user']], function () {
    Route::get('/profil', 'UserController@profil');
    Route::post('/update/{user}/profil', 'UserController@update');
    Route::get('/pay', 'ProductController@pembayaran');
    Route::post('/checkout', 'ProductController@checkout');
    Route::get('/konfirm/{id}', 'ProductController@konfirm');
    Route::post('/bukti', 'ProductController@bukti');
    Route::get('/terimakasih/{id}', 'ProductController@terimakasih');
});