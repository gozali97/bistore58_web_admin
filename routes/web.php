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
Route::get('/produk/detail/{id}', 'ProdukController@detail')->name('produk.detail');
Route::resource('/transaksi', 'TransaksiController');
Route::resource('/laporan', 'LaporanController');
Route::get('/transaksi/batal/{id}', 'TransaksiController@batal')->name('transaksiBatal');
Route::get('/transaksi/confirm/{id}', 'TransaksiController@confirm')->name('transaksiConfirm');
Route::get('/transaksi/packing/{id}', 'TransaksiController@packing')->name('transaksiPacking');
Route::get('/transaksi/kirim/{id}', 'TransaksiController@kirim')->name('transaksiKirim');
Route::get('/transaksi/selesai/{id}', 'TransaksiController@selesai')->name('transaksiSelesai');
Route::get('/transaksi/details/{id}', 'TransaksiController@details')->name('transaksiDetails');
Route::get('/transaksi/printAll', 'TransaksiController@printAll')->name('allTransaksi');
Route::get('/transaksi/print/{id}', 'TransaksiController@print')->name('printTransaksi');
Route::get('/notif', 'VtwebController@index');
Route::resource('/kategori', 'KategoriController');
Route::get('/payment/payment_submit', 'PymentController@payment_submit');

Route::post('/notif/vt_notif', 'VtwebController@notif')->name('notif');
