<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use DB;

class CategoryController extends Controller
{
    public function index()
    {
    	return view('admin.category.index');
    }

    public function store(Request $request)
    {
    	  $this->validate($request, [
           'category_name' =>'required|unique:categories',
           'category_des' =>'required',


       ]);
    	$cat = new Category();
		$cat->category_name = $request->category_name;
		$cat->category_des = $request->category_des;
		$cat->save();
    	return redirect('/admin/category')->with('msg','ক্যাটাগরি সফলভাবে এড হয়েছে  ');


    }

    public function edit(Request $request)
    {
    	 $cate_id =$request->cate_id;
    	 $category =Category::find($cate_id);

    	return response()->json($category);
    }

    public function update(Request $request)
    {

     $this->validate($request, [
           'category_name' =>'required',
           'category_des' =>'required',


       ]);
    	$category =Category::find($request->id);
    	$category->category_name = $request->category_name;
		$category->category_des = $request->category_des;
		$category->save();
    	return redirect('/admin/category')->with('msg','ক্যাটাগরি সফলভাবে এড হয়েছে  ');


    }

    public function delete($id)
    {
      $category =Category::find($id);
      $category->delete();
        return redirect()->back()->with('msg','Delete information successfully');
    }
}
