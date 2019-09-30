<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ujian;
use App\User;
use App\Siswa;
use App\Konten;

class KuisController extends Controller
{
    public function index(Request $Request){
    	
    	return view('siswa.video',['data'=>$data]);
    }
   
}
