<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::orderBy('id','DESC')->get();
        return view('backend.brands.index',['brands'=>$brands]);
    }

    public function create()
    {
        
        return view('backend.brands.add');
    }

    // Add Category
    public function addBrand(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
   
        ]);
        if($validator->fails()){
            return response()->json(['status'=>'fail','msg'=>$validator->errors()->all()]);
        }
        $brands = new Brand();
        $brands->name = $request->name;
        $brands->image = $request->image;
  

        if($brands->save())
        {
            return response()->json([
                'status' => 'success',
                'msg' => 'brand Added Successfully'
            ],200);
        }else{
            return response()->json([
                'status' => 'fail',
                'msg' => 'Something Went Wrong'
            ],200);
        }
    }

    // Edit brands
    public function editBrand($id)
    {
        $brands = Brand::where('id',$id)->first();
        
        if(!empty($brands)){
            return view('backend.brands.edit',['brands'=>$brands]);
        }
    }

    // Update brand
    public function updateBrand(Request $request)
    {
        $brands = Brand::find($request->id);
        $brands->name = $request->name;
        $brands->image = $request->image;

        if($brands->save())
        {
            return response()->json([
                'status' => 'success',
                'msg' => 'brands has been Updated Successfully'
            ],200);
        }else{
            return response()->json([
                'status' => 'fail',
                'msg' => 'Something went wrong'
            ],200);
        }
    }

    // delete Category
    public function deleteBrand($id)
    {
        $brand = Brand::find($id);
       
        if ($brand) {
            $brand->delete();
            return response()->json(['status' => 'success', 'msg' => 'Brand deleted successfully']);
        } else {
            return response()->json(['status' => 'fail', 'msg' => 'Failed to delete brand']);
        }
    }
    
    }



  

