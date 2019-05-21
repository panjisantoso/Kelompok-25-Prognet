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
      // validate the data
      $this->validate($request, [
        'name'          => 'required',
        'username'         => 'required',
        'password'      => 'required'
      ]);
      // store in the database
      $admins = new Admin;
      $admins->name = $request->name;
      $admins->username = $request->username;
      $admins->phone = $request->phone;
      $admins->password=bcrypt($request->password);
      $admins->save();
      return redirect('/login/admin');
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
     $remember = $request->remember;
    
    $loginadmin = Auth::guard('admin')->attempt(['username'=> $username, 'password'=> $password],$remember);
        // return response()->json($loginadmin);
     if($loginadmin){
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