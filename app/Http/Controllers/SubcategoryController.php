<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use Carbon\Carbon;

class SubcategoryController extends Controller{
  public function __construct(){
      $this->middleware('auth');
      $this->middleware('checkrole');
  }
    function subcategory (){
      $category = Category::all();
      $subcategories = Subcategory::all();
      return view('subcategory/index',compact('category','subcategories'));
    }
    // submit posts
    function subcategory_post (Request $request){
        print_r($request->all());
        Subcategory::insert([
          'category_id' => $request->category_id,
          'subcategory_name' => $request->subcategory_name,
          'created_at' => Carbon::now()
        ]);
        return back();

    }


    function subcategory_edit ($category_id){
      $sub_edit = Subcategory::find($category_id);
      return view('subcategory/edit',compact('sub_edit'));
    }

    function subcategory_update(Request $request,$ssubcategory_id){
          Subcategory::find($ssubcategory_id)->update([
        'subcategory_name' => $request->subcategory_name
      ]);
      return back();
    }
    function subcategory_delete ($ssubcategory_id){
      Subcategory::find($ssubcategory_id)->delete();
      return back();
    }

}
