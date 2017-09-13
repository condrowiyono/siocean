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

Auth::routes();

Route::get('/home', 'HomeController@index');

//KELOMPOK SISWA
Route::group(['prefix' => 'siswa', 'middleware' => ['siswa'] ], function(){
	Route::get('/', 'siswa@index');
	Route::resource('paketsiswa', 'paketsiswa');
	Route::get('/edit', 'siswa@edit');
	Route::patch('/update', 'siswa@update');
	Route::get('/nilai', 'siswa@nilai');
	Route::get('/pdf', 'siswa@loadPDF');

  
});

//KELOMPOK PENGAJAR
Route::group(['prefix' => 'pengajar', 'middleware' => ['pengajar'] ], function(){
	Route::get('/', 'pengajar@index');
	Route::resource('paket', 'paket');
	Route::resource('nilai', 'nilai');
	Route::get('nilai/create/{paket_id}', 'nilai@createbyid');
	Route::post('nilai/store/{paket_id}', 'nilai@storebyid');
	Route::get('/edit', 'pengajar@edit');
	Route::patch('/update', 'pengajar@update');
});

//KELOMPOK PETUGAS
Route::group(['prefix' => 'petugas', 'middleware' => ['petugas'] ], function(){
	Route::get('/', 'petugas@index');
	Route::resource('kegiatan', 'kegiatan');
	Route::resource('cashflow', 'cashflow');
	Route::get('/edit', 'petugas@edit');
	Route::patch('/update', 'petugas@update');
  
});