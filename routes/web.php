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
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/payment', 'PymentController@index')->name('payment');
Route::resource('/user', 'UserController');
Route::resource('/produk', 'ProdukController');
Route::resource('/transaksi', 'TransaksiController');
Route::get('/transaksi/batal/{id}', 'TransaksiController@batal')->name('transaksiBatal');
Route::get('/transaksi/confirm/{id}', 'TransaksiController@confirm')->name('transaksiConfirm');
Route::get('/transaksi/kirim/{id}', 'TransaksiController@kirim')->name('transaksiKirim');
Route::get('/transaksi/selesai/{id}', 'TransaksiController@selesai')->name('transaksiSelesai');
Route::resource('/kategori', 'KategoriController');
