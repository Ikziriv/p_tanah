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
// Auth
Auth::routes();
// Home

Route::group(['middleware' => 'auth'], function(){
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/get/cond_a', 'HomeController@getCond_a');
Route::get('/home/get/cond_b', 'HomeController@getCond_b');
	// User
	Route::resource('user', 'UserController');
	Route::get('/user/create/', 'UserController@create')->name('user-create');
	Route::post('/user/simpan/', 'UserController@store')->name('simpan-user');
	Route::get('/user/{id}/edit', 'UserController@edit')->name('user-edit');
	Route::put('/user/update/{id}', 'UserController@update')->name('edit-user');
    Route::get('user/settings/{id}', 'UserController@settings');
    Route::post('user/profile/update/{id}', 'UserController@updateProfile')->name('profile-update');
    Route::post('user/settings/update/{id}', 'UserController@updateAccount')->name('setting-update');
	Route::delete('user/hapus/{id}', 'UserController@destroy')->name('hapus-user');
	// Module Group
	$backendRole = "\App\Modules\Backend\Role\Http\Controllers\RoleController";
		Route::get('/role', "{$backendRole}@index")->name('role-index');
		Route::get('/role/create', "{$backendRole}@create")->name('role-create');

	$backendPenjual = "\App\Modules\Backend\Penjual\Http\Controllers\PenjualController";
		Route::get('/penjual', "{$backendPenjual}@index")->name('penjual-index');
		Route::post('/penjual/simpan', "{$backendPenjual}@store")->name('simpan-penjual');
		Route::put('/penjual/update/{id}', "{$backendPenjual}@update")->name('edit-penjual');
		Route::delete('/penjual/hapus/{id}', "{$backendPenjual}@destroy")->name('hapus-penjual');

	$backendDesa = "\App\Modules\Backend\Desa\Http\Controllers\DesaController";
		Route::get('/desa', "{$backendDesa}@index")->name('desa-index');
		Route::post('/desa/simpan', "{$backendDesa}@store")->name('simpan-desa');
		Route::put('/desa/update/{id}', "{$backendDesa}@update")->name('edit-desa');
		Route::delete('/desa/hapus/{id}', "{$backendDesa}@destroy")->name('hapus-desa');

	$backendSppt = "\App\Modules\Backend\SPPT\Http\Controllers\SPPTController";
		Route::get('/sppt', "{$backendSppt}@index")->name('sppt-index');
		Route::post('/sppt/simpan', "{$backendSppt}@store")->name('simpan-sppt');
		Route::put('/sppt/update/{id}', "{$backendSppt}@update")->name('edit-sppt');
		Route::delete('/sppt/hapus/{id}', "{$backendSppt}@destroy")->name('hapus-sppt');

	$backendBlok = "\App\Modules\Backend\Blok\Http\Controllers\BlokController";
		Route::get('/blok', "{$backendBlok}@index")->name('blok-index');
		Route::post('/blok/simpan', "{$backendBlok}@store")->name('simpan-blok');
		Route::put('/blok/update/{id}', "{$backendBlok}@update")->name('edit-blok');
		Route::delete('/blok/hapus/{id}', "{$backendBlok}@destroy")->name('hapus-blok');

	// $backendBerkas = "\App\Modules\Backend\Berkas\Http\Controllers\BerkasController";
	// 	Route::get('/berkas', "{$backendBerkas}@index")->name('berkas-index');
	// 	Route::post('/berkas/simpan', "{$backendBerkas}@store")->name('berkas-create');
	// 	Route::put('/berkas/update/{id}', "{$backendBerkas}@update")->name('edit-berkas');
	// 	Route::delete('/berkas/hapus/{id}', "{$backendBerkas}@destroy")->name('hapus-berkas');

	$backendStat = "\App\Modules\Backend\Status\Http\Controllers\StatusController";
		Route::get('/status', "{$backendStat}@index")->name('stat-index');
		Route::post('/status/simpan', "{$backendStat}@store")->name('simpan-stat');
		Route::put('/status/update/{id}', "{$backendStat}@update")->name('edit-stat');
		Route::delete('/status/hapus/{id}', "{$backendStat}@destroy")->name('hapus-stat');

	$backendHarga = "\App\Modules\Backend\HargaTanah\Http\Controllers\HargaTanahController";
		Route::get('/harga', "{$backendHarga}@index")->name('harga-index');
		Route::get('/harga/create/', "{$backendHarga}@create")->name('harga-create');
		Route::post('/harga/simpan/', "{$backendHarga}@store")->name('simpan-harga');
		Route::get('/harga/{id}/edit', "{$backendHarga}@edit")->name('harga-edit');
		Route::put('/harga/update/{id}', "{$backendHarga}@update")->name('edit-harga');
		Route::post('/harga/status/', "{$backendHarga}@update_status")->name('edit-harga-status');
		Route::post('/harga/aktif/', "{$backendHarga}@is_active")->name('edit-aktifasi');
		Route::delete('/harga/hapus/{id}', "{$backendHarga}@destroy")->name('hapus-harga');

	$backendTanah = "\App\Modules\Backend\Tanah\Http\Controllers\TanahController";
		Route::get('/tanah', "{$backendTanah}@index")->name('tanah-index');
		Route::get('/tanah/create/', "{$backendTanah}@create_tanah")->name('tanah-create');
		Route::get('/tanah/detail/{id}', "{$backendTanah}@show")->name('tanah-detail');
		Route::get('/tanah/cetak/{id}', "{$backendTanah}@show_cetak")->name('tanah-cetak');
		Route::get('/tanah/unggah/{id}', "{$backendTanah}@show_berkas")->name('tanah-unggah');
		Route::get('/tanah/edit/{id}', "{$backendTanah}@edit")->name('tanah-edit');
		Route::get('/tanah/editdoc/{id}', "{$backendTanah}@edit_doc")->name('tanah-edit-doc');
		Route::get('/tanah/edit/foto_berkas/{id}', "{$backendTanah}@edit_foto_berkas")->name('edit-foto-berkas');
		// POST
		Route::post('tanah/tanahsimpan', "{$backendTanah}@store")->name('simpan-tanah');
		Route::post('/tanah/berkas-image/{id}', "{$backendTanah}@berkas_images")->name('image-berkas-tanah');
		// Route::post('tanah/tanahubah', "{$backendTanah}@update")->name('ubah-tanah');
		// PUT
		Route::put('/tanah/tanahedit/{id}', "{$backendTanah}@update_data")->name('edit-tanah');
		Route::put('tanah/tanaheditdoc/{id}', "{$backendTanah}@update_doc")->name('edit-doc-tanah');
		Route::put('tanah/update/foto_berkas/{id}', "{$backendTanah}@update_foto_berkas")->name('edit-berkas-tanah');
		// Destroy
		Route::delete('tanahhapus/{id}', "{$backendTanah}@destroy")->name('hapus-tanah');
		Route::delete('tanah/unggah/berkashapus/{id}', "{$backendTanah}@destroy_images")->name('hapus-berkas-img');

	$backendMasterBerkas = "\App\Modules\Backend\MasterBerkas\Http\Controllers\MasterBerkasController";
		Route::get('/master/berkas', "{$backendMasterBerkas}@index")->name('master-berkas-index');
		Route::get('/master/berkas/create/', "{$backendMasterBerkas}@create")->name('master-berkas-create');
		Route::get('/master/berkas/detail/{id}', "{$backendMasterBerkas}@show")->name('master-berkas-show');
		Route::get('/master/berkas/print/{id}', "{$backendMasterBerkas}@show_print")->name('master-berkas-print');
		Route::post('/master/berkas/simpan', "{$backendMasterBerkas}@store")->name('simpan-master-berkas');
		Route::get('/master/berkas/{id}/edit', "{$backendMasterBerkas}@edit")->name('master-berkas-edit');
		Route::put('/master/berkas/update/{id}', "{$backendMasterBerkas}@update")->name('update-master-berkas');
		Route::post('/master/berkas/status/', "{$backendMasterBerkas}@update_status")->name('edit-master-berkas-status');
		Route::delete('/master/berkas/hapus/{id}', "{$backendMasterBerkas}@destroy")->name('hapus-master-berkas');

	$backendRuangDiskusi = "\App\Modules\Backend\RuangDiskusi\Http\Controllers\RuangDiskusiController";
		Route::get('/ruang/diskusi', "{$backendRuangDiskusi}@index")->name('ruang-diskusi-index');
		Route::post('/ruang/diskusi/simpan', "{$backendRuangDiskusi}@store")->name('simpan-diskusi');
		Route::put('/ruang/diskusi/update/{id}', "{$backendRuangDiskusi}@update")->name('edit-diskusi');
		Route::delete('/ruang/diskusi/hapus/{id}', "{$backendRuangDiskusi}@destroy")->name('hapus-diskusi');

});
