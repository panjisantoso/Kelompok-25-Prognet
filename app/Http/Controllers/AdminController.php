<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Auth;

class AdminController extends Controller
{

    public function dashboard(){
      return view('dashboard1');
    }
    public function create()
    {
        return view('admin.register');
    }

    public function registerAdmin(Request $request)
    {
      $this->validate($request, [
       'email'=> 'required|unique:users|email|max:255',
       'name'=>  'required',
       'password'=> 'required|min:6|confirmed',
       'profile_image'=>'required',
       'phone'=>'required',
       'username'=>'required'

    ]); 


     Admin::create([
          'name'=>$request->name,
          'email'=>$request->email,
          'password'=>bcrypt($request->password),
          'phone'=>$request->phone,
          'username'=>$request->username
    ]);
      return redirect()->intended('/home/admin');
    }

    public function loginAdmin()
    {
        return view('admin.login');
    }

    public function adminAuth(Request $request)
   {
      $this->validate($request, [
          'username'=>'required',
          'password'=>'required'
      ]);
     $username = $request->username;
     $password = $request->password;
    //  $remember = $request->remember_token;

     if(Auth::guard('admin')->attempt(['username'=> $username, 'password'=> $password])){
       return redirect()->intended('/admin/dashboard');
      } else {
         return redirect()->back()->with('alert', 'Invalid Email or Password');
      }
    }

  public function home()
  {
    return view('admin');
  }

  public function logout()
  {
    Auth::guard('admin')->logout();

    return redirect('/login/admin'); 
  }

}