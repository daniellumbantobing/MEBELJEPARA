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
Route::get('/logout', 'LogoutController@logout')->name('logout');
Route::get('/register', 'RegisterController@register');
Route::post('/postregister', 'RegisterController@postregister');
Route::post('/postlogin', 'AuthController@postlogin');
Route::get('/produk/{id}/detail', 'ProductController@detail');
Route::get('/detail/produk', 'ProductController@detail');
Route::post('/add-cart/{id}', 'ProductController@addtocart');
Route::get('/cart', 'ProductController@cart');
Route::get('/cart/{id}/delete', 'ProductController@delete');
Route::get('/cari/produk', 'ProductController@cari');
Route::get('/forgotpass', 'UserController@forgot');
Route::post('/forgot_pass', 'UserController@password');


Route::group(['middleware' => ['auth', 'checkRole:admin']], function () {
    Route::get('/home/admin', function () {
        return view('admin.home');
    });
    // Produk
    Route::get('/cretate/produk', 'ProductController@index');
    Route::post('/addproduk', 'ProductController@createproduk');
    Route::get('/produk/{id}/hapus', 'ProductController@hapus');
    Route::post('/produk/{produk}/update', 'ProductController@update');
    //Kategori
    Route::get('/kategori', 'KategoriController@index');
    Route::post('/addkategori', 'KategoriController@createkategori');
    Route::get('/kategori/{id}/hapus', 'KategoriController@hapus');
    Route::post('/kategori/{kategori}/update', 'KategoriController@update');

    //user
    Route::get('/userlist', 'UserController@index');
    Route::get('/user/{user}/hapus', 'UserController@destroy');

    //pesanan biasa
    Route::get('/pemesananproduk', 'ProductController@listOrder');
    Route::get('/conf/{id}', 'ProductController@konfirmasipemesanan');
    Route::get('/conf1/{id}', 'ProductController@konfirmasipemesanan1');
    Route::get('/detpro/{id}', 'ProductController@detpro');
    Route::get('/files/download/{gambar}', 'ProductController@download');

    //pesanan tempaan
    Route::get('/pesanantempaan', 'TempaanController@pesanan');
    Route::get('/dettempaan/{id}', 'TempaanController@dettempaan');
    Route::post('/biaya/{id}/tempaan', 'TempaanController@buatbiaya');
    Route::get('/konftemp/{id}', 'TempaanController@konfirmasitempaan');
    Route::get('/konftempbtl/{id}', 'TempaanController@batalkonfirmasi');
});

Route::group(['middleware' => ['auth', 'checkRole:user']], function () {
    //profile
    Route::get('/profil', 'UserController@profil');
    Route::post('/update/{user}/profil', 'UserController@update');

    //Pemesanan biasa
    Route::get('/pay', 'ProductController@pembayaran');
    Route::post('/checkout', 'ProductController@checkout');
    Route::get('/konfirm/{id}', 'ProductController@konfirm');
    Route::post('/bukti', 'ProductController@bukti');
    Route::get('/terimakasih/{id}', 'ProductController@terimakasih');
    Route::get('/pemesanan', 'ProductController@listpes');

    //notfikasi
    Route::get('delete/{id}/notif', 'NotifikasiController@hapus');

    //Tempaan
    Route::get('/tempahan', 'TempaanController@index');
    Route::post('/create/tempaan ', 'TempaanController@create');
    Route::get('/viewtempaan/{id} ', 'TempaanController@viewtempaan');
    Route::post('/tempaan/{id}/update', 'TempaanController@update');
    Route::get('/konfirm/{id}/tempaan', 'TempaanController@pembayaran');
    Route::post('/checkouttempaan/{id}', 'TempaanController@checkouttempaan');
    Route::get('/konfirmtempaan/{id}/', 'TempaanController@konfirmtempaan');
    Route::post('/buktitempaan', 'TempaanController@buktitempaan');
});