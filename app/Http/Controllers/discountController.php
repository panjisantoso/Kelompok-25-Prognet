<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Discount;
use App\Product;
class discountController extends Controller
{

    public function index()
    {
        $discounts = Discount::get();
        $products = Product::join('discounts','products.id','=','discounts.id_product')->get();
        return view('discount.list',compact('discounts','products'));
    }

    public function create()
    {
        $products = Product::get();
        return view('discount.form-add',compact('products'));
    }

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

    public function show($id)
    {
        
    }

    public function edit($id)
    {
        $products = Product::get();
        $discounts = Discount::find($id);
        return view('discount.form-edit',compact('discounts','products'));
    }

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

    public function destroy($id)
    {
        $discounts = Discount::find($id);
        $discounts->delete();
        return redirect('/admin/discounts');
    }
}
