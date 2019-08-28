<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Siswa;
use App\Guru;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    } 
    public function change()
    {
        return view('auth.gantipassword');
    }
    public function updatePassword(Request $request){
       $this->validate($request,[
            'oldpassword'=>'required',
            'password'=>'required|confirmed'
       ]);

       $hashedPassword = Auth::user()->password;
       if(Hash::check($request->oldpassword,$hashedPassword)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('auth.gantipassword')->with('succesMsg',"Password is changed Succesfully");
        }else
        return redirect()->back()->with('errorMsg',"current password is invalid");
       }
}
