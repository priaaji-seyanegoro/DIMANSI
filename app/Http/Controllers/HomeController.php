<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Siswa;
use App\ujian;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $siswa = \App\siswa::all();
        $ujian = \App\ujian::all();
        $kontens = DB::table('kontens')->paginate(8);
        return view('home',compact('kontens'),['siswa'=> $siswa ,'ujian'=>$ujian]);
    }
}
