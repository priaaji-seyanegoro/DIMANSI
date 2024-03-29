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
	if(Auth::user()){
		$kontens = DB::table('kontens')->paginate(8);	
		return view('home',compact('kontens'));
	}
    return view('welcome');
});
Route::get('/daftar',function(){
	return view('navbar');
});

Route::get('/cobakonten' , function(){
	$kontens = App\Konten::where('category_id', '=' , 4 )->get();
	
	return view ('cobakonten',compact('kontens'));
})->name('coba.konten');

Route::get('/cobashow/{slug?}' , function($slug = null){
	$konten = App\Konten::where('slug', '=' , $slug )->first();
	// dd($konten);
	return view('cobashow',compact('konten'));
	
})->name('coba.show');

Route::get('/games' , function(){
	if(Auth::user()){
	$kontens = App\Konten::where('category_id', '=' , 3 )->get();
	
	return view ('siswa.game',compact('kontens'));
	}
	return view('welcome');
})->name('siswa.game');

Route::get('/gameshow/{slug?}' , function($slug = null){
	if(Auth::user()){
	$konten = App\Konten::where('slug', '=' , $slug )->first();
	// dd($konten);
	return view('siswa.gameshow',compact('konten'));
}
	return view('welcome');
	
})->name('game.show');

Route::get('/video' , function(){
if(Auth::user()){
	$kontens = App\Konten::where('category_id', '=' , 2 )->get();
	
	return view ('siswa.video',compact('kontens'));
}
	return view ('welcome');
})->name('siswa.video');

Route::get('/videoshow/{slug?}' , function($slug = null){
	if(Auth::user()){
	$konten = App\Konten::where('slug', '=' , $slug )->first();
	// dd($konten);
	return view('siswa.videoshow',compact('konten'));
}
	return view('welcome');	
})->name('video.show');

Auth::routes();

//	Controller admin
Route::group(['middleware'=>'auth','checkRole:admin'],function(){
	Route::get('/siswa', 'SiswaController@index');
	Route::post('/siswa/create','SiswaController@create');
	Route::get('/siswa/{siswa}/edit','SiswaController@edit');
	Route::post('/siswa/{siswa}/update','SiswaController@update');
	Route::get('/siswa/{siswa}/delete','SiswaController@delete');
	Route::get('/siswa/{siswa}/profile','SiswaController@profile');
	Route::post('/siswa/{id}/addnilai', 'SiswaController@addnilai');
	Route::get('/siswa/{id}/nilaisiswa','SiswaController@nilaisiswa');
	Route::get('/siswa/{id}/{idmapel}/deletenilai','SiswaController@deletenilai');

	Route::get('/guru','GuruController@index');
	Route::post('/guru/create','GuruController@create');
	Route::get('/guru/{guru}/edit','GuruController@edit');
	Route::post('/guru/{guru}/update','GuruController@update');
	Route::get('/guru/{guru}/delete','GuruController@delete');

	//categorys
	Route::resource('category','CategoryController');

	//konten
	Route::resource('konten','KontenController');
	//Kuis
	Route::get('/kuis','KuisController@index');
	Route::post('/kuis/create','KuisController@create');
	Route::get('/show/{ujian}','KuisController@show');
	Route::get('/kuis/{ujian}/delete','KuisController@delete');
});


//Controller admin,siswa,guru
Route::group(['middleware'=>'auth','checkRole:admin,siswa,guru,murid'],function(){
	Route::get('/home', 'HomeController@index')->name('home');
	//siswa
	Route::get('/siswa/{id}/nilaisiswa','SiswaController@nilaisiswa');
	Route::get('/profilesiswa', 'ProfileController@profilesiswa')->middleware();
	Route::get('/editsiswa/{siswa}','ProfileController@editsiswa')->middleware();
	Route::post('/updatesiswa/{siswa}','ProfileController@updatesiswa');

	// Guru
	Route::get('/myprofile', 'ProfileController@profileguru');
	Route::get('/guru/{guru}','ProfileController@editguru');
	Route::post('/updateguru/{guru}','ProfileController@updateguru');

	//paswword
	Route::get('/changePassword','Auth\AuthController@change')->name('change');
	Route::put('/changePassword','Auth\AuthController@updatePassword')->name('password.update');

});


Route::get('/logout','AuthController@logout');
