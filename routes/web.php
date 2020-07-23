<?php

use App\Http\Controllers\HomeController;
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
    return view('index');
});

Auth::routes();

Route::group(['middleware' => ['web', 'auth', 'role:admin']], function () {
    Route::get('/admin', 'HomeController@index')->name('home');

    //profil
    Route::get('/profil', 'VillageController@index')->name('profil');

    //pengurus-desa
    Route::get('/pengurus-desa', 'VillageAdministratorController@index')->name('pengurus-desa');
    Route::get('/b/pengurus-desa', 'VillageAdministratorController@create')->name('buat.pengurus-desa');
    Route::get('/e/pengurus-desa', 'VillageAdministratorController@edit')->name('edit.pengurus-desa');

    //akun
    Route::get('/akun', 'VillagerController@index')->name('akun');
    Route::get('/e/akun', 'VillagerController@edit')->name('edit.akun');

    //form
    Route::get('/form', 'FormController@index')->name('form');
    Route::get('/b/form', 'FormController@create')->name('buat.form');
    Route::get('/e/form', 'FormController@edit')->name('edit.form');

    //surat
    Route::get('/surat', 'LetterController@index')->name('surat');
    Route::get('/b/surat', 'LetterController@create')->name('buat.surat');
    Route::get('/e/surat', 'LetterController@edit')->name('edit.surat');

    //permohonan
    Route::get('/permohonan-surat', 'RequestLetterController@index')->name('permohonan-surat');
    Route::get('/permohonan-surat/sukses', 'RequestLetterController@success')->name('permohonan-surat.sukses');
    Route::get('/permohonan-surat/detail', 'RequestLetterController@show')->name('detail.permohonan-surat');
    Route::get('/b/permohonan-surat', 'RequestLetterController@create')->name('buat.permohonan-surat');
    Route::get('/e/permohonan-surat', 'RequestLetterController@edit')->name('edit.permohonan-surat');
});
