<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductImage;
use App\Product;

class productImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
        $file = $request->file('image');
        //save format
        $format = $request->image->extension();
        //save full adress of image
        $patch = $request->image->store('images');

        $name = $file->getClientOriginalName();

        //save on table
        DB::table('pictbl')->insert([
            'orginal_name'=>$name,
            'format'=>$base,
            'patch'=>$patch
        ]);

        return response()
            ->view('pic.pic',compact("patch"));
    }
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
        $test = $request->img;
        return $test;
        date_default_timezone_set('Asia/Kuala_Lumpur');
        $produkImages = new ProductImage;
        $produkImages->product_id = $request->product_id;
        // $produkImages->image_name = $request->image_name;
        $produkImages->created_at = date('Y-m-d H:i:s');
        $produkImages->updated_at = date('Y-m-d H:i:s');
        $produkImages->image_name = $filename;
        $produkImages->save();

        $productImages = ProductImage::get();
        return view("product-image.list", compact("productImages"));
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
        date_default_timezone_set('Asia/Kuala_Lumpur');
        $produkImages = ProductImage::find($id);
        $produkImages->product_id = $request->product_id;
        $produkImages->image_name = $request->image_name;
        $produkImages->updated_at = date('Y-m-d H:i:s');
        $produkImages->save();

        return redirect('/admin/product-images');
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
