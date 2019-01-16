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

Route::post('/absensi/save', 'WebcamController@save');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('form/pemasukan', 'LaporanKeuanganController@indexpemasukan')->name('addpemasukan');
Route::get('form/pemasukan/add', 'LaporanKeuanganController@addpemasukan')->name('addpemasukan');
Route::post('form/pemasukan/save', 'LaporanKeuanganController@savepemasukan')->name('savepemasukan');
Route::get('form/pemasukan/edit/{id}', 'LaporanKeuanganController@editpemasukan')->name('editpemasukan');
Route::post('form/pemasukan/update', 'LaporanKeuanganController@updatepemasukan')->name('updatepemasukan');
Route::get('form/pemasukan/delete/{id}', 'LaporanKeuanganController@deletepemasukan')->name('deletepemasukan');
Route::get('form/pemasukan/pdf','LaporanKeuanganController@pdf');
Route::get('form/pemasukan/downloadExcel/{type}','LaporanKeuanganController@downloadExcel');

Route::get('form/pengeluaran', 'LaporanKeuanganController@indexpengeluaran')->name('addpengeluaran');
Route::get('form/pengeluaran/add', 'LaporanKeuanganController@addpengeluaran')->name('addpengeluaran');
Route::post('form/pengeluaran/save', 'LaporanKeuanganController@savepengeluaran')->name('savepengeluaran');
Route::get('form/pengeluaran/edit/{id}', 'LaporanKeuanganController@editpengeluaran')->name('editpengeluaran');
Route::post('form/pengeluaran/update', 'LaporanKeuanganController@updatepengeluaran')->name('updatepengeluaran');
Route::get('form/pengeluaran/delete/{id}', 'LaporanKeuanganController@deletepengeluaran')->name('deletepengeluaran');
Route::get('form/pengeluaran/pdf','LaporanKeuanganController@pdf1');
Route::get('form/pengeluaran/downloadExcel/{type}','LaporanKeuanganController@downloadExcel1');

Route::get('form/uploadfile', 'UploadFileController@index')->name('adduploadfile');
Route::get('form/uploadfile/add', 'UploadFileController@add')->name('adduploadfile');
Route::post('form/uploadfile/save', 'UploadFileController@save')->name('saveuploadfile');
Route::get('form/uploadfile/edit/{id}', 'UploadFileController@edit')->name('edituploadfile');
Route::post('form/uploadfile/update', 'UploadFileController@update')->name('updateuploadfile');
Route::get('form/uploadfile/delete/{id}', 'UploadFileController@delete')->name('deleteuploadfile');
Route::get('form/uploadfile/download/{file}', 'UploadFileController@download')->name('downloaduploadfile');
Route::get('form/uploadfile/pdf','UploadFileController@pdf');
Route::get('form/uploadfile/downloadExcel/{type}','UploadFileController@downloadExcel');

Route::get('cekabsensi', 'UploadFileController@index')->name('adduploadfile');
Route::get('cekabsensi/add', 'UploadFileController@add')->name('adduploadfile');
Route::post('cekabsensi/save', 'UploadFileController@save')->name('saveuploadfile');
Route::get('cekabsensi/delete/{id}', 'UploadFileController@delete')->name('updateuploadfile');

Route::get('form/cekabsensi', 'CekAbsensiController@index');
Route::get('cekabsensi/add', 'CekAbsensiController@add');
Route::post('cekabsensi/save', 'CekAbsensiController@save');
Route::get('form/cekabsensi/delete/{id}', 'CekAbsensiController@delete');

Route::get('form/karyawan', 'KaryawanController@index')->name('add');
Route::get('form/karyawan/add', 'KaryawanController@add')->name('add');
Route::post('form/karyawan/save', 'KaryawanController@save')->name('save');
Route::get('form/karyawan/edit/{id}', 'KaryawanController@edit')->name('edit');
Route::post('form/karyawan/update', 'KaryawanController@update')->name('update');
Route::get('form/karyawan/delete/{id}', 'KaryawanController@delete')->name('delete');

