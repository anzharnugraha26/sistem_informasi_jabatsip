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
    Route::get('kategori', 'KategoriController@index');
    Route::get('kategori/tambah', 'KategoriController@tambah');
    Route::get('kategori/hapus/{id}', 'KategoriController@delete');
    Route::get('kategori/edit/{id}', 'KategoriController@edit');
    Route::post('kategori/save', 'KategoriController@save');
    Route::post('kategori/update', 'KategoriController@update');
    //kabinet
    Route::get('kabinet', 'KabinetController@index');
    Route::get('kabinet/tambah', 'KabinetController@tambah');
    Route::get('kabinet/hapus/{id}', 'KabinetController@delete');
    Route::post('kabinet/save', 'KabinetController@save');
    //user
    Route::get('user', 'UserController@index');
    Route::get('user/tambah', 'UserController@tambah');
    Route::post('user/store', 'UserController@store');

    Route::get('exportExcel', 'ExportExcelController@export');
    Route::get('laporan' , 'ExportExcelController@index');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
