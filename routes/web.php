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

Route::get('/', function () {
    return view('clients.index');
});

Route::get('/umum', 'Client\RequestLetterController@general')->name('surat-umum');
Route::get('/kk', 'Client\RequestLetterController@kk')->name('buat.kk');
Auth::routes();

Route::group(['middleware' => ['web', 'auth', 'role:user']], function () {
    Route::get('/umum/{id}', 'Client\RequestLetterController@detail_general')->name('detail.surat');
    Route::post('/umum/{id}', 'Client\RequestLetterController@store_general_letter')->name('buat.permohonan-surat');
    Route::delete('/umum/{id}', 'Client\RequestLetterController@delete_general_letter')->name('hapus.permohonan-surat');

    Route::get('/ktp', 'Client\RequestLetterController@ktp')->name('buat.ktp');
    Route::post('/ktp', 'Client\RequestLetterController@store_ktp')->name('simpan.ktp');
    Route::delete('/ktp/{id}', 'Client\RequestLetterController@delete_ktp')->name('hapus.ktp');

    Route::get('/kk/baru', 'Client\RequestLetterController@kk_baru')->name('buat.kk.baru');
    Route::get('/kk/pisah', 'Client\RequestLetterController@kk_pisah')->name('buat.kk.pisah');
    Route::post('/kk', 'Client\RequestLetterController@store_kk')->name('simpan.kk');
    Route::delete('/kk/{id}', 'Client\RequestLetterController@delete_kk')->name('hapus.kk');

    Route::get('/kk/anggota/{id}', 'Client\RequestLetterController@kk_anggota')->name('buat.anggota.kk');
    Route::post('/kk/anggota/{id}', 'Client\RequestLetterController@store_anggota_kk')->name('simpan.anggota.kk');
    Route::delete('/kk/anggota/d{id}', 'Client\RequestLetterController@delete_anggota_kk')->name('hapus.anggota.kk.saya');

    Route::get('/surat-saya', 'Client\RequestLetterController@myrequest')->name('surat.saya');
    Route::get('/surat-saya/{id}', 'Client\RequestLetterController@detail_myrequest')->name('surat.saya.umum');
    Route::get('/surat-saya/ktp/{id}', 'Client\RequestLetterController@detail_myrequest_ktp')->name('surat.saya.ktp');
    Route::get('/surat-saya/kk/{id}', 'Client\RequestLetterController@detail_myrequest_kk')->name('surat.saya.kk');
    Route::put('/surat-saya/kk/{id}', 'Client\RequestLetterController@update_myrequest_kk')->name('update.kk.saya');

    Route::get('/surat-saya/kk/{id}/anggota/{aid}', 'Client\RequestLetterController@detail_anggota_kk')->name('detail.anggota.kk');
    Route::put('/surat-saya/kk/anggota/{id}', 'Client\RequestLetterController@update_anggota_kk')->name('update.anggota.kk');

    Route::get('/m/profil', 'Client\ProfileController@index')->name('profil.saya');
    Route::put('/m/profil', 'Client\ProfileController@update')->name('update.profil');
    Route::put('/change-password', 'Client\ProfileController@change_password')->name('update.password');
});

Route::group(['middleware' => ['web', 'auth', 'role:admin']], function () {
    Route::get('/admin', 'HomeController@index')->name('home');

    //profil
    Route::get('/profil', 'HomeController@profil')->name('profil');
    Route::put('/profil', 'HomeController@update_profile')->name('ubah.profil');

    //perangkat-desa
    Route::get('/perangkat-desa', 'Admin\VillageAdministratorController@index')->name('perangkat-desa');
    Route::get('/b/perangkat-desa', 'Admin\VillageAdministratorController@create')->name('buat.perangkat-desa');
    Route::get('/perangkat-desa/{id}', 'Admin\VillageAdministratorController@edit')->name('edit.perangkat-desa');
    Route::post('/perangkat-desa', 'Admin\VillageAdministratorController@store')->name('simpan.perangkat-desa');
    Route::put('/perangkat-desa/{id}', 'Admin\VillageAdministratorController@update')->name('ubah.perangkat-desa');
    Route::delete('/md/perangkat-desa', 'Admin\VillageAdministratorController@destroy');

    //akun
    Route::get('/akun', 'Admin\VillagerController@index')->name('akun');
    Route::get('/akun/{id}', 'Admin\VillagerController@edit')->name('edit.akun');
    Route::put('/akun/{id}', 'Admin\VillagerController@update')->name('ubah.akun');
    Route::delete('/md/akun', 'Admin\VillagerController@destroy');

    //form
    Route::get('/form', 'Admin\FormController@index')->name('form');
    Route::get('/b/form', 'Admin\FormController@create')->name('buat.form');
    Route::get('/form/{id}', 'Admin\FormController@edit')->name('edit.form');
    Route::post('/form', 'Admin\FormController@store')->name('simpan.form');
    Route::put('/form/{id}', 'Admin\FormController@update')->name('ubah.form');
    Route::delete('/md/form', 'Admin\FormController@destroy');

    //surat
    Route::get('/surat', 'Admin\LetterController@index')->name('surat');
    Route::get('/b/surat', 'Admin\LetterController@create')->name('buat.surat');
    Route::get('/surat/{id}', 'Admin\LetterController@edit')->name('edit.surat');
    Route::post('/surat', 'Admin\LetterController@store')->name('simpan.surat');
    Route::put('/surat/{id}', 'Admin\LetterController@update')->name('ubah.surat');
    Route::delete('/md/surat', 'Admin\LetterController@destroy');

    //permohonan
    Route::get('/permohonan-surat', 'Admin\RequestLetterController@index')->name('permohonan-surat');
    Route::get('/permohonan-surat/sukses', 'Admin\RequestLetterController@success')->name('permohonan-surat.sukses');
    Route::get('/permohonan-surat/{id}', 'Admin\RequestLetterController@edit')->name('edit.permohonan-surat');
    Route::get('/permohonan-surat/{id}/cetak', 'Admin\RequestLetterController@print')->name('cetak.permohonan-surat');
    Route::put('/permohonan-surat/{id}', 'Admin\RequestLetterController@update')->name('ubah.permohonan-surat');
    Route::delete('/md/permohonan-surat', 'Admin\RequestLetterController@destroy');

    //kk
    Route::get('/blangko-kk', 'Admin\FamilyCardController@index')->name('kk');
    Route::get('/blangko-kk-pisah', 'Admin\FamilyCardController@index_separate')->name('kk.pisah');
    Route::get('/blangko-kk/{id}', 'Admin\FamilyCardController@edit')->name('edit.kk');
    Route::get('/blangko-kk/{id}/cetak', 'Admin\FamilyCardController@print')->name('cetak.kk');
    Route::put('/blangko-kk/{id}', 'Admin\FamilyCardController@update')->name('ubah.kk');
    Route::delete('/md/blangko-kk', 'Admin\FamilyCardController@destroy');

    //anggota kk
    Route::get('/blangko-kk-anggota/{id}', 'Admin\MemberFamilyController@edit')->name('edit.anggota.kk');
    Route::put('/blangko-kk-anggota/{id}', 'Admin\MemberFamilyController@update')->name('ubah.anggota.kk');
    Route::delete('/blangko-kk-anggota/{id}', 'Admin\MemberFamilyController@destroy')->name('hapus.anggota.kk');

    //ktp
    Route::get('/blangko-ktp', 'Admin\KTPController@index')->name('ktp');
    Route::get('/blangko-ktp/{id}', 'Admin\KTPController@edit')->name('edit.ktp');
    Route::get('/blangko-ktp/{id}/cetak', 'Admin\KTPController@print')->name('cetak.ktp');
    Route::post('/reformat-blangko-ktp/', 'Admin\KTPController@reformat')->name('ubah.ktp.format');
    Route::put('/blangko-ktp/{id}', 'Admin\KTPController@update')->name('ubah.ktp');
    Route::delete('/md/blangko-ktp', 'Admin\KTPController@destroy');
});

