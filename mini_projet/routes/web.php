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
    return view('welcome');
});
Route::get('/', App\Http\Controllers\Controller_Principal::class . '@connecter');
Route::post('/logintraitement', App\Http\Controllers\Controller_Principal::class . '@logintraitement');
Route::post('/ajout_contenu', App\Http\Controllers\Controller_Principal::class . '@ajout')->name('ajout_contenu');
Route::get('/ajout', App\Http\Controllers\Controller_Principal::class . '@aj');
Route::post('ckeditor/image_upload', 'CKEditorController@upload')->name('upload');
Route::get('/front', App\Http\Controllers\Controller_Principal::class . '@data_contenu')->middleware(['gzip', 'cache:60'])->name('front');
Route::post('/search', App\Http\Controllers\Controller_Principal::class . '@search');
Route::get('/RewriteUrl/{id_contenu}', App\Http\Controllers\Controller_Principal::class . '@gen_fiche')->name('voir');
Route::get('/Secteur/{id_secteur}', App\Http\Controllers\Controller_Principal::class . '@gen_sec')->name('secteur');
Route::get('/Domaine/{id_domaine}', App\Http\Controllers\Controller_Principal::class . '@gen_dom')->name('domaine');
Route::post('/update', App\Http\Controllers\Controller_Principal::class . '@update');
Route::get('/delete/{id_contenu}', App\Http\Controllers\Controller_Principal::class . '@delete')->name('delete');
Route::get('/genere_contenu', App\Http\Controllers\Controller_Principal::class . '@genere_contenu');





