<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductImage;
use App\Product;
use Carbon\Carbon;
use File;
class productImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $productImages = ProductImage::get();
        return view('product-image.list', compact('productImages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = Product::get();
        return view('product-image.form-add', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        if($request->hasfile('image'))
        {
            $current_timestamp = Carbon::now()->timestamp;
            $i = 1;
            foreach($request->file('image') as $file)
            {
                
                    $name=$file->getClientOriginalName();
                    $path = 'files/'. $name;
                    if(File::exists($path)) {
                        $name = $current_timestamp.$file->getClientOriginalName();
                        $path = 'files/'. $name;
                    }
                    
                    $file->move(public_path().'/files/', $name);

                    $image = new ProductImage;
                    $image->product_id = $request->product_id;
                    $image->image_name=$path;
                    $image->save();
                $i++;    
            }
            
        }

        $productImages = ProductImage::get();
        return view("product-image.list", compact("productImages"))->with("alert-success", "Berhasil Menambahkan Data Gambar");
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
        $product = Product::get();
        $productImages = ProductImage::find($id);
        return view("product-image.form-edit", compact("productImages", 'product'));
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
        
        if($request->hasfile('image'))
        {
            
            $current_timestamp = Carbon::now()->timestamp;
            $i = 1;
            foreach($request->file('image') as $file)
            {
                    $name=$file->getClientOriginalName();
                    $path = 'files/'. $name;
                    if(File::exists($path)) {
                        $name = $current_timestamp.$file->getClientOriginalName();
                        $path = 'files/'. $name;
                    }
                    
                    $file->move(public_path().'/files/', $name);

                    $image = ProductImage::find($id);
                    $image->product_id = $request->product_id;
                    $image->image_name=$path;
                    $image->save();
                $i++;    
            }
        }

        return redirect('/admin/product-images')->with("alert-success", "Berhasil Mengubah Data Gambar");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productImages = ProductImage::find($id);
        $productImages->delete();
        return redirect('/admin/product-images')->with("alert-success", "Berhasil Menghapus Data Gambar");
   
    }
}
