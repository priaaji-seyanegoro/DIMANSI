<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Guru;
use App\User;
use App\Siswa;

class GuruController extends Controller
{
     public function index (request $request){
    	$data_guru = \App\guru::all();
    	return view('guru.guru',['data_guru'=>$data_guru]);
    }
     public function create(Request $request)
    {
    	$user = new\App\User;
      	$user->role ='guru';
      	$user->name = $request->nama_depan;
      	$user->email = $request->email;
      	$user->password = bcrypt('rahasia');
      	$user->remember_token = str_random(60);
      	$user->save();

      	$request->request->add(['user_id'=> $user->id ]);
    	$siswa = \App\guru::create($request->all());
    	return redirect('/guru')-> with('sukses','Data Berhasil Diinput');
   	}
   	public function edit(Guru $guru){
   		return view('guru.edit',['guru' => $guru ]);
   	}
   	public function update(Request $request,Guru $guru)
    {
   		$guru->update($request->all());
   		$guru = \App\guru::find($id);
   		$guru->update($request->all());
   		
   		
   		return redirect('/guru')->with('sukses','Data Berhasil Diupdate');
   	}
   	public function delete(Guru $guru){
   		$guru-> delete();
   		return redirect('/guru')->with('sukses','Data Berhasil dihapus');
	}
  
}
