<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;

class categoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categories::get();
        return view('category.list',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.form-add');
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

        $categories = new Categories;
        $categories->category_name = $request->category_name;
        $categories->created_at = date('Y-m-d H:i:s');
        $categories->updated_at = date('Y-m-d H:i:s');
        $categories->save();

        return redirect("/admin/categories");
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
        $categories = Categories::find($id);
        return view('category.form-edit',compact('categories'));
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

        $categories = Categories::find($id);
        $categories->category_name = $request->category_name;
        $categories->updated_at = date('Y-m-d H:i:s');
        $categories->save();

        return redirect("/admin/categories");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories = Categories::find($id);
        $categories->status_aktif = 0;
        $categories->save();
        
        return redirect("/admin/categories")->with("alert-success", "Berhasil menonaktifkan categories");
    }
}
