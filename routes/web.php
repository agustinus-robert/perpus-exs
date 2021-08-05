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

Route::get('/', 'front\home@index');
Route::get('/buku-index','buku\BukuController@index');
Route::get('/getDaftarBuku','buku\BukuController@getDaftarBuku')->name('bk');
Route::get('/getLaporBuku','buku\BukuController@getLaporanBuku')->name('lb');

Route::get('/index_pengunjung','pengunjung\PengujungController@index');
Route::get('/tambah_pengunjung','pengunjung\PengujungController@tambah');
Route::get('/getDaftarPengunjung','pengunjung\PengujungController@getDaftarPengunjung')->name('pb');

Route::get('/index_peminjaman','peminjaman\PinjamController@index');
Route::get('/transaksi_peminjaman','peminjaman\PinjamController@transaksi_pemijaman')->name('tb');
Route::get('/get_pinjam_pengunjung/{id}','peminjaman\PinjamController@get_pinjam_pengunjung');
Route::get('/daftar_trans_pinjam','peminjaman\PinjamController@get_daftar_pending')->name('tp');
Route::get('/proses_peminjaman/{id}','peminjaman\PinjamController@proses_pending_peminjaman');

Route::get('/index_pengembalian','Pengembalian\PengembalianController@index');
Route::get('/daftar_trans_kembali','Pengembalian\PengembalianController@trans_pengembalian')->name('dp');
Route::get('/proses_kembali/{id}','Pengembalian\PengembalianController@proses_pengembalian');


Route::get('/buku-add','buku\BukuController@tambah');
Route::get('/delete_buku/{id}','buku\BukuController@hapus');
Route::get('/qty_buku','buku\BukuController@tambah_qty_buku');

Route::get('/get_edit_buku/{id}','buku\BukuController@edit');
Route::get('/pengunjung');

Route::get('/denda-index','denda\DendaController@index');
Route::get('/transaksi-denda','denda\DendaController@daftar_trans_denda')->name('td');
Route::get('/proses_denda/{id}','denda\DendaController@denda_proses');