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

Route::get('/{dil?}', 'homepage@index')->name('index');
Route::get('/ajax', 'homepage@indexpost');
Route::post('/ajax', 'homepage@ajaxpost');
Route::get('sil', 'homepage@sil');
Route::post('sil', 'homepage@ajaxsil');
Route::get('/all', 'homepage@ajaxall')->name('allsill');
Route::post('/all', 'homepage@ajaxallsil');