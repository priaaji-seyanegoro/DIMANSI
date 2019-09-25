<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ujian;
use App\User;
use App\Siswa;

class KuisController extends Controller
{
    public function index(Request $Request){
    	$data = \App\ujian::all();
    	return view('siswa.kuis',['data'=>$data]);
    }
    public function create(Request $request){
    	$kuis = \App\ujian::create($request->all());
    	return redirect('/kuis')-> with('sukses','Data Berhasil Diinput');
    }
    public function show(ujian $ujian){
        return view('siswa.showkuis',['ujian' => $ujian ]);
    }
}
