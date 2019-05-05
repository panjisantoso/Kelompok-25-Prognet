<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoryDetail;
use App\Categories;
use App\Product;
use DB;
class productCategoryDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryDetails = DB::table('product_category_details')
        ->join('products','product_category_details.product_id','=', 'products.id')
        ->join('product_categories', 'product_category_details.category_id','=', 'product_categories.id')
        ->orderByRaw('product_category_details.product_id DESC')
        ->get();
        return view('details.list', compact('categoryDetails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::get();
        $categories = Categories::get();
        return view('details.form-add', compact('products','categories'));
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

        $categoryDetails = new CategoryDetail;
        $categoryDetails->product_id = $request->product_id;
        $categoryDetails->category_id = $request->category_id;
        $categoryDetails->created_at = date('Y-m-d H:i:s');
        $categoryDetails->updated_at = date('Y-m-d H:i:s');
        $categoryDetails->save();

        $categoryDetails = CategoryDetail::get();
        return view("details.list", compact("categoryDetails"));
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
        $categoryDetails = CategoryDetail::find($id);
        $products = Product::get();
        $categories = Categories::get();
        return view('details.form-edit', compact('categoryDetails', 'products','categories'));
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
