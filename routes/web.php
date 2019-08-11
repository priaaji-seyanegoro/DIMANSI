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
//	Controller admin
Route::group(['middleware'=>'auth','checkRole:admin'],function(){
    //siswa
    Route::get('/siswa', 'SiswaController@index');
    Route::post('/siswa/create','SiswaController@create');
    Route::get('/siswa/{id}/edit','SiswaController@edit');
    Route::post('/siswa/{id}/update','SiswaController@update');
    Route::get('/siswa/{id}/delete','SiswaController@delete');
    Route::get('/siswa/{id}/profile','SiswaController@profile');
    Route::post('/siswa/{id}/addnilai', 'SiswaController@addnilai');
    Route::get('/siswa/{id}/{idmapel}/deletenilai','SiswaController@deletenilai');
    
    //guru
    Route::get('/guru','GuruController@index');
    Route::post('/guru/create','GuruController@create');
    Route::get('/guru/{id}/edit','GuruController@edit');
    Route::post('/guru/{id}/update','GuruController@update');
    Route::get('/guru/{id}/delete','GuruController@delete');

    //categorys
    Route::resource('category','CategoryController');
    //konten
    


});
//Controller admin,siswa,guru
Route::group(['middleware'=>'auth','checkRole:admin,siswa,guru'],function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/siswa', 'SiswaController@index');
});
//	Controller Siswa
Route::get('profile','SiswaController@myprofile');


Route::get('/logout','AuthController@logout');
