<?php

namespace App\Http\Controllers;

use DB;
use App\Product;
use App\CategoryDetail;
use App\Categories;
use App\ProductImage;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Review;
use App\Discount;
use File;

class shopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productsjoin = DB::table('product_category_details')
        ->join('products','product_category_details.product_id','=','products.id')
        ->join('product_categories','product_category_details.category_id','=','product_categories.id')
        ->get();
        $productImages = ProductImage::get();
        $products = Product::get();
        $categories = Categories::get();
        $discounts = Product::join('discounts','products.id','=','discounts.id_product')->get();
        return view('shop',compact('productsjoin','productImages','products','discounts','categories'));
    }
    
    public function filter(Request $request){
        $productsjoin = DB::table('product_category_details')
        ->join('products','product_category_details.product_id','=','products.id')
        ->join('product_categories','product_category_details.category_id','=','product_categories.id')
        ->where('category_id', $request->category_id)
        ->get();
        $productImages = ProductImage::get();
        $products = Product::get();
        $categories = Categories::get();
        $discounts = Product::join('discounts','products.id','=','discounts.id_product')->get();
        return view('shop',compact('productsjoin','productImages','products','discounts','categories'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $detail_product=Product::select('products.id', 'product_name','product_rate','description','stock','price','image_name','product_category_details.category_id')
        	->join('product_images','products.id','=','product_images.product_id')
        	->join('product_category_details','products.id','=','product_category_details.product_id')
        	->groupBy('products.id')->where('products.id',$id)
        	->get()->first();
        $imagesGalleries=ProductImage::where('product_id',$id)->get();
        $dis = Discount::where('id_product',$id)->where('start','<=',CARBON::NOW())->where('end','>=',CARBON::NOW())->get()->first();
        $review = Review::join('users','product_reviews.user_id','=','users.id')->where('product_id',$id)->orderBy('product_reviews.created_at','desc')->get();
        
        $productImages = ProductImage::get();
        $products = Product::get();
        $productid = Product::find($id);
        $detail = DB::table('product_category_details')
        ->join('products','product_category_details.product_id','=','products.id')
        ->join('product_categories','product_category_details.category_id','=','product_categories.id')
        ->where('product_category_details.product_id',$id)
        ->get();
        
        $productImages = ProductImage::where('product_images.product_id',$id)->get();
        
        return view("shopdetail", compact('detail_product','imagesGalleries','dis','review','detail','products','productid','productImages','productImages'));
  
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
