<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ProductNotification;
use App\Models\User;
use Illuminate\Support\Facades\Auth;



class ProductController extends Controller
{
    public function index()
    {

        $products = Product::orderBy('id','desc')->get();

        return view('backend.product.index',['products'=>$products]);
    }

    public function create()
    {
        return view('backend.product.add');
    }

    // Add Category
   public function addProduct(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'sku' => 'required',
            'description' => 'required',    
            'price' => 'required',
            'discount' => 'required',
            'meta_title' => 'required',
            'meta_keywords' => 'required',
            'meta_description' => 'required',
            'short_description' => 'required',
            'cat_id' => 'required',
            'quantity'=>'rquired',
            'child_cat_id' => 'required',
           
            'brand_id'=>'required'
            
           
        ]);
        if($validator->fails()){
            return response()->json(['status'=>'fail','msg'=>$validator->errors()->all()]);
        }
        $slug = Str::slug($request->name, '-');
        $products = new Product();
        $products->name = $request->name;
        $products->slug = $slug;
        $products->status = 0;
        $products->brand_id = $request->brand_id;
        $products->cat_id = $request->cat_id;
        $products->child_cat_id = $request->child_cat_id;
        $products->meta_title = $request->meta_title;
        $products->meta_keywords = $request->meta_keywords;
        $products->meta_description = $request->meta_description;
        $products->short_description = $request->short_description;
        $products->stock_quantity = $request->stock_quantity;
        $products->sku = $request->sku;
        $products->description = $request->description;
        $products->price = $request->price;
        $products->discount = $request->discount;
        $products->discounted_price = ($request->price-(($request->price*$request->discount)/100));
        $products->image=$request->image;
        if($products->save())
        {
            // $us = User::where('type',3)->get();
            // $noti=Product::where('id',$products->id)->first();
            // Notification::send($us ,new ProductNotification($noti));

            return response()->json([
                'status' => 'success',
                'msg' => 'Product has been Added Successfully'
            ],200);
        }else{
            return response()->json([
                'status' => 'fail',
                'msg' => 'Something Went Wrong'
            ],200);
        }
    }

    public function editProduct($id)
    {
        $product = Product::where('id',$id)->first();
        $file = json_decode($product->image);
        if(!empty($product)){
            return view('backend.product.edit',['products'=>$product,'files'=>$file]);
        }else{
            return '404';
        }
    }

    public function updateProduct(Request $request)
    {
        $slug = Str::slug($request->name, '-');
        $products = Product::find($request->id);
        $products->name = $request->name;
        $products->slug = $slug;
        $products->status = 0;
        $products->brand_id = $request->brand_id;
        $products->cat_id = $request->cat_id;
        $products->child_cat_id = $request->child_cat_id;
        $products->meta_title = $request->meta_title;
        $products->meta_keywords = $request->meta_keywords;
        $products->meta_description = $request->meta_description;
        $products->short_description = $request->short_description;
        $products->stock_quantity = $request->stock_quantity;
        $products->sku = $request->sku;
        $products->description = $request->description;
        $products->price = $request->price;
        $products->discount = $request->discount;
        $products->discounted_price = ($request->price-(($request->price*$request->discount)/100));
        
        if($request->image) {
            $products->image=$request->image;

        }
        if($products->save())
        {
            return response()->json([
                'status' => 'success',
                'msg' => 'Product has been Updates Successfully'
            ],200);
        }else{
            return response()->json([
                'status' => 'fail',
                'msg' => 'Something Went Wrong'
            ],200);
        }
    }

    public function deleteProduct($id)
    {
        $products = Product::find($id);
        $products->delete();
        if($products){
            return response()->json(['status'=>'success','msg'=>'Product is Deleted']);
        }
        else{
            return response()->json(['status'=>'fail','msg'=>'failed to delete Product']);
        }
    }
    
    public function singleProduct(Request $request){
        $products=Product::with('rel_pro')->where('slug',$request->product)->first();
        if($products){

            return view('backend.product.product-detail',['products'=>$products]);
        }else{
            return view('backend.product.product-detail',['products'=>'']);
        }

    }



}