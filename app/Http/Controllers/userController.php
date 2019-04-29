<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\User;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function signin(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $Logincheck = user::where(['email' => $email,'password' => $password])->first();
        if($Logincheck){ //apakah user tersebut ada atau tidak
                Session::put("id",$Logincheck->id);
                Session::put("name",$Logincheck->name);
                Session::put("email",$Logincheck->email);
                Session::put("profile_image",$Logincheck->profile_image);
                Session::put("status",$Logincheck->status);
                Session::put("password",$Logincheck->password);
                Session::put('index',TRUE);
                
                return redirect("/index");
                
        }
        else{
            return redirect()->back()->with('alert', 'Username atau Password salah');
        }
    }

    public function logout(Request $request){
        Session::forget('id');
        
        return redirect("/")->with("alert-success","logout berhasil");
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
