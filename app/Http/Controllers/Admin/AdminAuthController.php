<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
      public function login(){
        return view('admin.admin-login.login');
      }
      public function login_check(Request $request){
        $this -> validate($request,[
          'email' => 'required|email',
          'password' => 'required',
        ]);
        if (Auth::guard('Admin') -> attempt(['email' => $request -> email,'password' => $request -> password])) {
          return redirect() -> route('dashboard');
        }else{
          return back() -> with('danger','Password or Email');
        }
      }
      public function logout(){
        Auth::guard('Admin') -> logout();
        return redirect() -> route('login') -> with('success','You are Logout');
      }
}
