<?php

namespace App\Http\Controllers;
use App\User;
use Auth;
use Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function logout(){
		Auth::logout();
		return redirect('/');
	}
	
	 public function __construct()
    {
        $this->middleware('auth');
    } 
    public function change()
    {
        return view('auth.gantipassword');
    }
      public function changePassword(Request $request){
        $this->validate($request,[
        	'oldpassword'=> 'required',
        	'password'=> 'required|min:6|confirmed',

        ]);

        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->oldpassword,$hashedPassword)){
        	$user = User::find(Auth::id());
        	$user->password = Hash::make($request->password);
        	$user->save();

        	return redirect('auth.gantipassword')->with('succes');
        }

    }
}
