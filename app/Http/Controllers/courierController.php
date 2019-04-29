<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Courier;

class courierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $couriers  = Courier::get();
        return view('courier.list',compact('couriers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('courier.form-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        date_default_timezone_set('Asia/Kuala_Lumpur');
        $bulan = date("m");
        $tahun = date("Y");
        $tanggal_sekarang = date_create("now");

        $couriers = new Courier;
        $couriers->courier = $request->courier;
        $couriers->created_at = date('Y-m-d H:i:s');
        $couriers->updated_at = date('Y-m-d H:i:s');
        $couriers->save();

        return redirect("/admin/couriers");
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
        $couriers = Courier::find($id);
        return view('courier.form-edit',compact('couriers'));
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
        date_default_timezone_set('Asia/Kuala_Lumpur');
        $bulan = date("m");
        $tahun = date("Y");
        $tanggal_sekarang = date_create("now");

        $couriers = Courier::find($id);
        $couriers->courier = $request->courier;
        
        $couriers->updated_at = date('Y-m-d H:i:s');
        $couriers->save();
        return redirect('/admin/couriers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $couriers = Courier::find($id);
        $couriers->delete();
        return redirect('/admin/couriers');
    }
}
