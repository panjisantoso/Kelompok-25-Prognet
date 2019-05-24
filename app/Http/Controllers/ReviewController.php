<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Review;
use App\Product;
use DB;
use App\Quotation;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    
    public function store(Request $request)
    {

        
        $jumlah = count($request->product_id);
        
        for ($i=0; $i< $jumlah ; $i++) {
            $review = new Review; 
            $review->product_id = $request->product_id[$i];
            $review->user_id = Auth::id();
            $review->rate = $request->rating[$i];
            $review->content = $request->review[$i];
            $review->save();

            $jum=Review::where('product_id',$request->product_id[$i])->count();
            $sum=Review::select(DB::raw('SUM(rate) as sum'))->where('product_id',$request->product_id[$i])->first();
            
            $hasil=$sum->sum/$jum;
            
            $product = Product::where('id',$request->product_id[$i])->get()->first();
            $product->product_rate = (int)$hasil;
            
            $product->save();

        }

        return redirect()->back();
    }

}