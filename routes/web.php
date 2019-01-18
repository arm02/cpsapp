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

Route::get('/', 'WebcamController@welcome');
Route::post('/absensi/save', 'WebcamController@save');


Auth::routes();


Route::group(['prefix' => 'admin'] , function(){
	Route::group(['middleware' => 'admin'], function(){
		Route::get('/', 'AdminController@indexadmin');
		Route::get('/operator', 'AdminController@indexoperator');
		Route::get('/super', 'AdminController@indexsuper');
		Route::get('/dataadmin', 'AdminController@dataadmin');
		Route::get('/dataadmin/add', 'AdminController@addadmin');
		Route::post('/dataadmin/save', 'AdminController@saveadmin');
		Route::get('/dataadmin/edit/{id}','AdminController@editadmin');
		Route::get('/dataadmin/updateadmin/{id}','AdminController@updateadmin');
		Route::get('/dataadmin/updateadmin2/{id}','AdminController@updateadmin2');
		Route::get('/dataadmin/delete/{id}','AdminController@deleteadmin');
		Route::get('/dataoperator', 'AdminController@dataoperator');
		Route::get('/dataoperator/add', 'AdminController@addoperator');
		Route::post('/dataoperator/save', 'AdminController@saveoperator');
		Route::get('/dataoperator/edit/{id}','AdminController@editoperator');
		Route::get('/dataoperator/updateoperator/{id}','AdminController@updateoperator');
		Route::get('/dataoperator/updateoperator2/{id}','AdminController@updateoperator2');
		Route::get('/dataoperator/delete/{id}','AdminController@deleteoperator');
		Route::get('/datasuper', 'AdminController@datasuper');
		Route::get('/datasuper/add', 'AdminController@addsuper');
		Route::post('/datasuper/save', 'AdminController@savesuper');
		Route::get('/datasuper/edit/{id}','AdminController@editsuper');
		Route::get('/datasuper/updatesuper/{id}','AdminController@updatesuper');
		Route::get('/datasuper/updatesuper2/{id}','AdminController@updatesuper2');
		Route::get('/datasuper/delete/{id}','AdminController@deletesuper');
		Route::get('form/pemasukan', 'LaporanKeuanganController@indexpemasukan')->name('addpemasukan');
		Route::get('form/pemasukan/add', 'LaporanKeuanganController@addpemasukan')->name('addpemasukan');
		Route::post('form/pemasukan/save', 'LaporanKeuanganController@savepemasukan')->name('savepemasukan');
		Route::get('form/pemasukan/edit/{id}', 'LaporanKeuanganController@editpemasukan')->name('editpemasukan');
		Route::post('form/pemasukan/update', 'LaporanKeuanganController@updatepemasukan')->name('updatepemasukan');
		Route::get('form/pemasukan/delete/{id}', 'LaporanKeuanganController@deletepemasukan')->name('deletepemasukan');
		// START PDF ROUTE PEMASUKKAN
		Route::get('form/pemasukan/pdf','LaporanKeuanganController@pdf');
		Route::get('form/pemasukan/downloadExcel/{type}','LaporanKeuanganController@downloadExcel');
		Route::get('form/pemasukan/pdfid/{id}','LaporanKeuanganController@pdfid');
		Route::get('form/pemasukan/downloadExcelid/{id}','LaporanKeuanganController@downloadExcelid');
		// END PDF ROUTE PEMASUKKAN
		Route::get('form/pengeluaran', 'LaporanKeuanganController@indexpengeluaran')->name('addpengeluaran');
		Route::get('form/pengeluaran/add', 'LaporanKeuanganController@addpengeluaran')->name('addpengeluaran');
		Route::post('form/pengeluaran/save', 'LaporanKeuanganController@savepengeluaran')->name('savepengeluaran');
		Route::get('form/pengeluaran/edit/{id}', 'LaporanKeuanganController@editpengeluaran')->name('editpengeluaran');
		Route::post('form/pengeluaran/update', 'LaporanKeuanganController@updatepengeluaran')->name('updatepengeluaran');
		Route::get('form/pengeluaran/delete/{id}', 'LaporanKeuanganController@deletepengeluaran')->name('deletepengeluaran');
		// START ROUTE PDF PENGELUARAN
		Route::get('form/pengeluaran/downloadExcel1/{type}','LaporanKeuanganController@downloadExcel1');
		Route::get('form/pengeluaran/pdf1','LaporanKeuanganController@pdf1');
		Route::get('form/pengeluaran/downloadExcelid1/{id}','LaporanKeuanganController@downloadExcelid1');
		Route::get('form/pengeluaran/pdfid1/{id}','LaporanKeuanganController@pdfid1');
		// END PDF ROUTE PENGELUARAN
		Route::get('form/uploadfile', 'UploadFileController@index')->name('adduploadfile');
		Route::get('form/uploadfile/add', 'UploadFileController@add')->name('adduploadfile');
		Route::post('form/uploadfile/save', 'UploadFileController@save')->name('saveuploadfile');
		Route::get('form/uploadfile/edit/{id}', 'UploadFileController@edit')->name('edituploadfile');
		Route::post('form/uploadfile/update', 'UploadFileController@update')->name('updateuploadfile');
		Route::get('form/uploadfile/delete/{id}', 'UploadFileController@delete')->name('deleteuploadfile');
		Route::get('form/uploadfile/download/{file}', 'UploadFileController@download')->name('downloaduploadfile');
		// START ROUTE PDF CEK ABSENSI
		Route::get('form/cekabsensi/pdf','CekAbsensiController@pdf');
		Route::get('form/cekabsensi/downloadExcel/{type}','CekAbsensiController@downloadExcel');
		Route::get('form/cekabsensi/pdfid/{id}','CekAbsensiController@pdfid');
		Route::get('form/cekabsensi/downloadExcelid/{id}','CekAbsensiController@downloadExcelid');
		// END ROUTE PDF CEK ABSENSI
		Route::get('cekabsensi', 'CekAbsensiController@index')->name('index');
		Route::get('cekabsensi/delete/{id}', 'CekAbsensiController@delete')->name('delete');
		Route::get('form/karyawan', 'KaryawanController@index');
		Route::get('form/karyawan/add', 'KaryawanController@add');
		Route::post('form/karyawan/save', 'KaryawanController@save');
		Route::get('form/karyawan/edit/{id}', 'KaryawanController@edit');
		Route::post('form/karyawan/update', 'KaryawanController@update');
		Route::get('form/karyawan/delete/{id}', 'KaryawanController@delete');
		// START ROUTE PDF KARYAWAN
		Route::get('form/karyawan/pdfid/{id}','KaryawanController@pdfid');
		Route::get('form/karyawan/downloadExcelid/{id}','KaryawanController@downloadExcelid');
		Route::get('form/karyawan/pdf','KaryawanController@pdf');
		Route::get('form/karyawan/downloadExcel/{type}','KaryawanController@downloadExcel');
		// END ROUTE KARYAWAN PDF
	});
});

Route::group(['prefix' => ''] , function() {
	Route::group(['middleware' => 'super'] , function() {
		Route::get('super', 'AdminController@indexsuper');
		Route::get('form/pemasukan', 'LaporanKeuanganController@indexpemasukan')->name('addpemasukan');
		Route::get('form/pemasukan/add', 'LaporanKeuanganController@addpemasukan')->name('addpemasukan');
		Route::post('form/pemasukan/save', 'LaporanKeuanganController@savepemasukan')->name('savepemasukan');
		Route::get('form/pemasukan/edit/{id}', 'LaporanKeuanganController@editpemasukan')->name('editpemasukan');
		Route::post('form/pemasukan/update', 'LaporanKeuanganController@updatepemasukan')->name('updatepemasukan');
		Route::get('form/pemasukan/delete/{id}', 'LaporanKeuanganController@deletepemasukan')->name('deletepemasukan');

		Route::get('form/pengeluaran', 'LaporanKeuanganController@indexpengeluaran')->name('addpengeluaran');
		Route::get('form/pengeluaran/add', 'LaporanKeuanganController@addpengeluaran')->name('addpengeluaran');
		Route::post('form/pengeluaran/save', 'LaporanKeuanganController@savepengeluaran')->name('savepengeluaran');
		Route::get('form/pengeluaran/edit/{id}', 'LaporanKeuanganController@editpengeluaran')->name('editpengeluaran');
		Route::post('form/pengeluaran/update', 'LaporanKeuanganController@updatepengeluaran')->name('updatepengeluaran');
		Route::get('form/pengeluaran/delete/{id}', 'LaporanKeuanganController@deletepengeluaran')->name('deletepengeluaran');
		Route::get('form/karyawan', 'KaryawanController@index');
		Route::get('form/karyawan/add', 'KaryawanController@add');
		Route::post('form/karyawan/save', 'KaryawanController@save');
		Route::get('form/karyawan/edit/{id}', 'KaryawanController@edit');
		Route::post('form/karyawan/update', 'KaryawanController@update');
		Route::get('form/karyawan/delete/{id}', 'KaryawanController@delete');
	});
});

Route::group(['prefix' => ''] , function() {
	Route::group(['middleware' => 'operator'] , function() {
		Route::get('operator', 'AdminController@indexoperator');
		Route::get('form/uploadfile', 'UploadFileController@index')->name('adduploadfile');
		Route::get('form/uploadfile/add', 'UploadFileController@add')->name('adduploadfile');
		Route::post('form/uploadfile/save', 'UploadFileController@save')->name('saveuploadfile');
		Route::get('form/uploadfile/edit/{id}', 'UploadFileController@edit')->name('edituploadfile');
		Route::post('form/uploadfile/update', 'UploadFileController@update')->name('updateuploadfile');
		Route::get('form/uploadfile/delete/{id}', 'UploadFileController@delete')->name('deleteuploadfile');
		Route::get('form/uploadfile/download/{file}', 'UploadFileController@download')->name('downloaduploadfile');

		Route::get('cekabsensi', 'CekAbsensiController@index')->name('index');
		Route::get('cekabsensi/delete/{id}', 'CekAbsensiController@delete')->name('delete');
	});
});