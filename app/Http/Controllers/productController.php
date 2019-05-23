<?php

namespace App\Http\Controllers;

use DB;
use App\Product;
use App\CategoryDetail;
use App\Categories;
use App\ProductImage;
use Illuminate\Http\Request;
use Carbon\Carbon;
use File;
use App\Notifications\AdminNotification;
use Illuminate\Notifications\Notification;

class productController extends Controller
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
        // $category = DB::table('product_category_details')
        // ->join('products','product_category_details.product_id','=','products.id')
        // ->join('product_categories','product_category_details.category_id','=','product_categories.id')
        // ->select('product_categories.category_name')
        // ->where('product_category_details.product_id','1')
        // ->value('product_category_details.product_id');
        $productImages = ProductImage::get();
        $products = Product::get();
        $discounts = Product::join('discounts','products.id','=','discounts.id_product')->get();
        // $productCategory = CategoryDetail::join('product_categories','product_categories.id','=','product_category_details.category_id');
        // $categoryDetails = CategoryDetail::get();
        return view("product.list", compact('discounts','productsjoin',"products",'productImages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Categories::get();
        return view("product.form-add",compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        auth()->user()->notify(new AdminNotification("dddd"));
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
        
        $get_id_product = Product::select('id')
        ->orderBy('id','DESC')
        ->first();
        foreach($request->category_id as $category){
            $category_details = new CategoryDetail;
            $category_details->product_id = $get_id_product->id;
            $category_details->category_id = $category;
            $category_details->created_at = date('Y-m-d H:i:s');
            $category_details->updated_at = date('Y-m-d H:i:s');
            $category_details->save();
        }
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
                    $image->product_id = $get_id_product->id;
                    $image->image_name=$path;
                    $image->save();
                $i++;    
            }
            
        }

        return redirect('/admin/product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function imageSave(Request $request){
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
                    $image->product_id = $id;
                    $image->image_name=$path;
                    $image->save();
                $i++;    
            }
        }
    }
    public function show($id)
    {
        $productImages = ProductImage::get();
        $products = Product::get();
        $productid = Product::find($id);
        $detail = DB::table('product_category_details')
        ->join('products','product_category_details.product_id','=','products.id')
        ->join('product_categories','product_category_details.category_id','=','product_categories.id')
        ->where('product_category_details.product_id',$id)
        ->get();
        
        $productImages = ProductImage::where('product_images.product_id',$id)->get();
        return view("product.detail", compact('detail','products','productid','productImages','productsjoin','productImages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Categories::get();
        $category_details = CategoryDetail::where('product_category_details.product_id',$id)->get();
        $products = Product::find($id);
        return view("product.form-edit", compact("products",'category','category_details'));
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
        foreach($request->category_id as $category){
            $category_details = CategoryDetail::where('product_id',$id);
            $category_details->delete();
        }

        foreach($request->category_id as $category){
            $category_details = new CategoryDetail;
            $category_details->product_id = $id;
            $category_details->category_id = $category;
            $category_details->created_at = date('Y-m-d H:i:s');
            $category_details->updated_at = date('Y-m-d H:i:s');
            $category_details->save();
        }
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
    public function markReadAdmin(){
        $admin = Admin::find(6);
        
        $admin->unreadNotifications()->update(['read_at' => now()]);
        return response()->json($admin);
    }

}
