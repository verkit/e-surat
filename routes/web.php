<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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
    return view('index');
});

Route::get('/test', 'RequestLetterController@testview');
Route::get('/testprint', 'RequestLetterController@print');
Route::post('/test', 'RequestLetterController@testpost');

Auth::routes();

Route::group(['middleware' => ['web', 'auth', 'role:admin']], function () {
    Route::get('/admin', 'HomeController@index')->name('home');

    //profil
    Route::get('/profil', 'HomeController@profil')->name('profil');
    Route::put('/profil', 'HomeController@update_profile')->name('update.profil');

    //perangkat-desa
    Route::get('/perangkat-desa', 'VillageAdministratorController@index')->name('perangkat-desa');
    Route::get('/b/perangkat-desa', 'VillageAdministratorController@create')->name('buat.perangkat-desa');
    Route::get('/perangkat-desa/{id}', 'VillageAdministratorController@edit')->name('edit.perangkat-desa');
    Route::post('/perangkat-desa', 'VillageAdministratorController@store')->name('simpan.perangkat-desa');
    Route::put('/perangkat-desa/{id}', 'VillageAdministratorController@update')->name('ubah.perangkat-desa');
    Route::delete('/md/perangkat-desa', 'VillageAdministratorController@destroy');

    //akun
    Route::get('/akun', 'VillagerController@index')->name('akun');
    Route::get('/akun/{id}', 'VillagerController@edit')->name('edit.akun');
    Route::put('/akun/{id}', 'VillagerController@update')->name('update.akun');
    Route::delete('/md/akun', 'VillagerController@destroy');

    //form
    Route::get('/form', 'FormController@index')->name('form');
    Route::get('/b/form', 'FormController@create')->name('buat.form');
    Route::get('/form/{id}', 'FormController@edit')->name('edit.form');
    Route::post('/form', 'FormController@store')->name('simpan.form');
    Route::put('/form/{id}', 'FormController@update')->name('ubah.form');
    Route::delete('/md/form', 'FormController@destroy');

    //surat
    Route::get('/surat', 'LetterController@index')->name('surat');
    Route::get('/b/surat', 'LetterController@create')->name('buat.surat');
    Route::get('/surat/{id}', 'LetterController@edit')->name('edit.surat');
    Route::post('/surat', 'LetterController@store')->name('simpan.surat');
    Route::put('/surat/{id}', 'LetterController@update')->name('ubah.surat');
    Route::delete('/md/surat', 'LetterController@destroy');

    //permohonan
    Route::get('/permohonan-surat', 'RequestLetterController@index')->name('permohonan-surat');
    Route::get('/permohonan-surat/sukses', 'RequestLetterController@success')->name('permohonan-surat.sukses');
    Route::get('/b/permohonan-surat', 'RequestLetterController@create')->name('buat.permohonan-surat');
    Route::get('/permohonan-surat/{id}', 'RequestLetterController@edit')->name('edit.permohonan-surat');
    Route::get('/permohonan-surat/{id}/cetak', 'RequestLetterController@print')->name('cetak.permohonan-surat');
    Route::put('/permohonan-surat/{id}', 'RequestLetterController@update')->name('ubah.permohonan-surat');
    Route::delete('/md/permohonan-surat', 'RequestLetterController@destroy');
});
