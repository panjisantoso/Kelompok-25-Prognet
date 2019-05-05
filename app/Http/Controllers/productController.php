<?php

namespace App\Http\Controllers;

use DB;
use App\Product;
use App\CategoryDetail;
use App\Categories;
use App\ProductImage;
use Illuminate\Http\Request;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        // $products = DB::table('product_category_details')
        // ->join('products','product_category_details.product_id','=','products.id')
        // ->join('product_categories','product_category_details.category_id','=','product_categories.id')
        // ->get();
        // $category = DB::table('product_category_details')
        // ->join('products','product_category_details.product_id','=','products.id')
        // ->join('product_categories','product_category_details.category_id','=','product_categories.id')
        // ->select('product_categories.category_name')
        // ->where('product_category_details.product_id','1')
        // ->value('product_category_details.product_id');
      $products = Product::get();
        return view("product.list", compact("products",'detail'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("product.form-add");
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

        $produks = new Product;
        $produks->product_name = $request->product_name;
        $produks->price = $request->price;
        $produks->description = $request->description;
        $produks->product_rate = 0;
        $produks->created_at = date('Y-m-d H:i:s');
        $produks->updated_at = date('Y-m-d H:i:s');
        $produks->stock = $request->stock;
        $produks->weight = $request->weight;
        $produks->save();

        $products = Product::get();
        return view("product.list", compact("products"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cariTabel(Request $request){
        $section = 'field';
        
    }
    public function show($id)
    {
        $products = Product::get();
        $productid = Product::find($id);
        // $detail = CategoryDetail::where('product_category_details.product_id',$id)->get();
        $detail = DB::table('product_category_details')
        ->join('products','product_category_details.product_id','=','products.id')
        ->join('product_categories','product_category_details.category_id','=','product_categories.id')
        ->where('product_category_details.product_id',$id)
        ->get();
        $productImages = ProductImage::where('product_images.product_id',$id)->get();
        return view("product.list", compact('detail','products','productid','productImages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Product::find($id);
        return view("product.form-edit", compact("products"));
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
        $produks = Product::find($id);
        $produks->product_name = $request->product_name;
        $produks->price = $request->price;
        $produks->description = $request->description;
        // $produks->product_rate = $request->product_rate;
        $produks->updated_at = date('Y-m-d H:i:s');
        $produks->stock = $request->stock;
        $produks->weight = $request->weight;
        $produks->save();

        return redirect("/admin/product");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Product::find($id);
        $products->status_aktif = 0;
        $products->save();
        return redirect("/admin/product")->with("alert-success", "Berhasil menonaktifkan product");
    }
    public function aktif($id)
    {
        $products = Product::find($id);
        $products->status_aktif = 1;
        $products->save();
        return redirect("/admin/product")->with("alert-success", "Berhasil Mengaktifkan product");
    }
}
