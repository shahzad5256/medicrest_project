<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id','DESC')->get();
        return view('backend.category.index',['categories'=>$categories]);
    }

    public function create()
    {
        $parent_cats=Category::where('is_parent',1)->orderBy('name','DESC')->get();
        return view('backend.category.add',['parent_cats'=>$parent_cats]);
    }

    // Add Category
    public function addCategory(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'is_parent' => 'sometimes|in:1',
            'parent_id' => 'nullable|exists:categories,id'
        ]);
        if($validator->fails()){
            return response()->json(['status'=>'fail','msg'=>$validator->errors()->all()]);
        }
        $categories = new Category();
        $categories->name = $request->name;
        $categories->is_parent = $request->is_parent;
        $categories->parent_id = $request->parent_id;
      

        $categories['is_parent']=$request->input('is_parent',0);

        if($categories->save())
        {
            return response()->json([
                'status' => 'success',
                'msg' => 'Category has been Added Successfully'
            ],200);
        }else{
            return response()->json([
                'status' => 'fail',
                'msg' => 'Something Went Wrong'
            ],200);
        }
    }

    // Edit Category
    public function editCategory($id)
    {
        $categories = Category::where('id',$id)->first();
        $parent_cats=Category::where('is_parent',1)->orderBy('name','DESC')->get();
        if(!empty($categories)){
            return view('backend.category.edit',['categories'=>$categories,'parent_cats'=>$parent_cats]);
        }else{
            return 'helo';
        }
    }

    // Update Category
    public function updateCategory(Request $request)
    {
        $categories = Category::find($request->id);
        $categories->name = $request->name;
        $categories->is_parent = $request->is_parent;
        $categories->parent_id = $request->parent_id;
        $categories->updated_by = Auth::user()->id;
        if($request->is_parent===1){
            $categories['parent_id']=null;
        }
        $categories['is_parent']=$request->input('is_parent',0);

        if($categories->save())
        {
            return response()->json([
                'status' => 'success',
                'msg' => 'Category has been Updated Successfully'
            ],200);
        }else{
            return response()->json([
                'status' => 'fail',
                'msg' => 'Something went wrong'
            ],200);
        }
    }

    // delete Category
    public function deleteCategory($id)
    {
        $categories = Category::find($id);
        $child_cat_id = Category::where('parent_id',$id)->pluck('id');
        if($categories){
            $status=$categories->delete();
            if($status){
            if(count($child_cat_id)>0){
                Category::shiftChild($child_cat_id);
            }
            return response()->json(['status'=>'success','msg'=>'Class is Deleted']);
        }
        else{
            return response()->json(['status'=>'fail','msg'=>'failed to delete Class']);
        }
        }
    }

    public function getChildByParentID(Request $request,$id)
    {
        $categories=Category::find($request->id);
        if($categories){
            $child_id=Category::getChildByParentID($request->id);
            if(count($child_id)<=0){
                return response()->json(['status'=>false,'data'=>null,'msg'=>'']);
            }
            return response()->json(['status'=>true,'data'=>$child_id,'msg'=>'']);
        }
        else{
            return response()->json(['status'=>false,'data'=>null,'msg'=>'Category not Found']);
        }
    }

  
}
