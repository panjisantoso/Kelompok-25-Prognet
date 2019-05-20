<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Discount;
use App\Product;
class discountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discounts = Discount::get();
        $products = Product::join('discounts','products.id','=','discounts.id_product')->get();
        return view('discount.list',compact('discounts','products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::get();
        return view('discount.form-add',compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $discounts = new Discount;
        $discounts->id_product = $request->id_product;
        $discounts->percentage = $request->percentage;
        $discounts->start = $request->start;
        $discounts->end = $request->end;
        $discounts->created_at = date('Y-m-d H:i:s');
        $discounts->updated_at = date('Y-m-d H:i:s');
        $discounts->save();

        return redirect('/admin/discounts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Product::get();
        $discounts = Discount::find($id);
        return view('discount.form-edit',compact('discounts','products'));
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
        $discounts = Discount::find($id);
        $discounts->id_product = $request->id_product;
        $discounts->percentage = $request->percentage;
        $discounts->start = $request->start;
        $discounts->end = $request->end;
        $discounts->created_at = date('Y-m-d H:i:s');
        $discounts->updated_at = date('Y-m-d H:i:s');
        $discounts->save();

        return redirect('/admin/discounts');
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
