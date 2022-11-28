<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('welcome');
    });
    //surat
    Route::get('surat', 'SuratController@index');
    Route::get('surat/tambah', 'SuratController@create');
    Route::post('surat/save', 'SuratController@save');
    Route::get('surat/hapus/{id}', 'SuratController@delete');
    Route::get('surat/edit/{id}', 'SuratController@edit');
    Route::post('surat/update', 'SuratController@update');
    Route::get('surat/detail/{id}', 'SuratController@view');
    //kategori
    Route::get('klasifikasi', 'KategoriController@index');
    Route::get('klasifikasi/tambah', 'KategoriController@tambah');
    Route::get('kategori/hapus/{id}', 'KategoriController@delete');
    Route::get('klasifikasi/edit/{id}', 'KategoriController@edit');
    Route::post('kategori/save', 'KategoriController@save');
    Route::post('kategori/update', 'KategoriController@update');
    //kabinet
    Route::get('kabinet', 'KabinetController@index');
    Route::get('kabinet/tambah', 'KabinetController@tambah');
    Route::get('kabinet/edit/{id}', 'KabinetController@edit'); 
    Route::get('kabinet/hapus/{id}', 'KabinetController@delete');
    Route::post('kabinet/save', 'KabinetController@save');
    Route::post('kabinet/update', 'KabinetController@update');
    //user
    Route::get('user', 'UserController@index');
    Route::get('user/tambah', 'UserController@tambah');
    Route::get('user/delete/{id}', 'UserController@delete');
    Route::get('user/edit/{id}', 'UserController@edit');
    Route::post('user/store', 'UserController@store');
    Route::post('user/update', 'UserController@update');

    Route::get('exportExcel', 'ExportExcelController@export');
    Route::get('laporan' , 'ExportExcelController@index');


    Route::get('data-surat-masuk' , 'SuratMasukController@index');
    Route::get('surat-masuk/hapus/{id}' , 'SuratMasukController@hapus');
    Route::get('data-surat-masuk/view/{id}' , 'SuratMasukController@view');
    Route::get('download/file/{id}' , 'SuratMasukController@download');
    Route::get('edit-surat-masuk/{id}' , 'SuratMasukController@edit');
    Route::post('save-surat-masuk' , 'SuratMasukController@save');
    Route::post('update-surat-masuk' , 'SuratMasukController@update');
    
    Route::get('data-surat-keluar' , 'SuratKeluarController@index');
    Route::get('surat-keluar/hapus/{id}' , 'SuratKeluarController@delete');
    Route::get('data-surat-keluar/view/{id}' , 'SuratKeluarController@view');
    Route::post('save-surat-keluar' , 'SuratKeluarController@save');
    Route::get('surat-keluar/download/file/{id}' , 'SuratKeluarController@download');
    Route::get('edit-surat-keluar/{id}' , 'SuratKeluarController@edit');
    Route::post('update-surat-keluar' , 'SuratKeluarController@update');

    //jenissurat
    Route::get('jenis_surat' , 'JenisSuratController@index');
    Route::get('jenis_surat/hapus/{id}' , 'JenisSuratController@delete');
    Route::post('jenis_surat/save' , 'JenisSuratController@save');
    Route::post('jenis_surat/update' , 'JenisSuratController@update');

    //
    Route::get('laporan-surat-masuk' , 'ExportExcelController@suratmasuk');
    Route::get('laporan-surat-keluar' , 'ExportExcelController@suratkeluar');
    Route::get('export-surat-masuk' , 'ExportExcelController@exportSuratMasuk');
    Route::get('export-surat-keluar' , 'ExportExcelController@exportSuratKeluar');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/log-out', 'HomeController@logout');
