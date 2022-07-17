<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Subcategory;
use Carbon\carbon;
use Image;

class CategoriesController extends Controller{

      public function __construct(){
          $this->middleware('auth');
          $this->middleware('checkrole');
      }

    function index(){
      $categories = Category::all();
      return view('Categories/index',compact('categories'));
    }

    function categoriespost(Request $request){
    $cat_image = $request->file('category_image');
    $image_name = $request->category_image->getClientOriginalName();
    $image_new_name = Str::random(3)."-".time().".".$request->category_image->getClientOriginalExtension();
    Image::make($cat_image)->save(base_path('public/uplods/category_image/').$image_new_name);
      // return view('Categories/index');
      $request->validate([
        'categories_name' => 'required|max:30|min:3|unique:categories,categories_name',
        // 'sub_category_name' => 'required|max:40|min:3|unique:categories,sub_category_name'
      ],[
        'categories_name.required' => 'Name Dao bhai!',
        'categories_name.max' => 'Bhai Etto Boro Name Diso Kno!',
        'categories_name.min' => 'Bhai Etto Chotto Name Diso Kno!'
      ]);


    $category_id = Category::insertGetId([
        'categories_name' => $request->categories_name,
        'category_image' => $image_new_name,
        'created_at' => Carbon::now()
      ]);
      Subcategory::insert([
        'category_id' => $category_id,
        'subcategory_name' => $request->sub_category_name,
        'created_at' => Carbon::now()
      ]);
      return back()->with('category_status','Your Category '.$request->categories_name.' Success Fully Update');
    }
    function categoriesdelete ($category_id){
      if (Category::where('id',$category_id)->exists()) {
        Category::find($category_id)->delete();
      }
      return back()->with('category_delete_status','your categoru name deleted success full!');
    }
    function categoriesalldelete(){
      // Category::truncate(); //For All delete Also Data Base
    Category::whereNull('deleted_at')->delete();
      return back()->with('delate_all_status','Your Delate All SuccessFull!');
    }
    function categoriesedit($category_edit){
      $category_info = Category::find($category_edit);
      return view('Categories/edit',compact('category_info'));
    }
    function categoriespostsedit(Request $request){
      if ($request->categories_name == Category::find($request->categories_id)->categories_name) {
        return back()->with('same_name_error','You Are Note Change Fild!');
      }
      $request->validate([
        'categories_name' => 'required|max:30|min:3|unique:categories,categories_name'
      ],[
        'categories_name.required' => 'Name Dao bhai!',
        'categories_name.max' => 'Bhai Etto Boro Name Diso Kno!',
        'categories_name.min' => 'Bhai Etto Chotto Name Diso Kno!'
      ]);

      unlink(base_path('public/uplods/category_image/').Category::find($request->categories_id)->category_image);
      $image = $request->file('category_new_image');
      $image_name = $request->category_new_image->getClientOriginalName();
      $image_new_name = Str::random(5)."-".time().".".$request->category_new_image->getClientOriginalExtension();
      Image::make($image)->save(base_path('public/uplods/category_image/').$image_new_name);

      Category::find($request->categories_id)->update([
        'categories_name' => $request->categories_name,
        'category_image' => $image_new_name
      ]);
      return redirect('Categories')->with('update_status', 'Your Category Name '.$request->categories_name.' Up Date SuccessFull!');
    }
    //RESYCLE BIN METHOD
    function recyclebin (){
      $trushed = Category::onlyTrashed('deleted_at')->get();
      return view('Categories/resyclebin',compact('trushed'));
    }
    // Restore METHOD
    function restore ($categories_name){
      // print_r($categories_name);
      Category::onlyTrashed()->where('categories_name',$categories_name)->restore();
      return redirect('Categories')->with('restores','Yoyr Restore Success full!');
    }
    // FORCE DELETE METHOD
    function forcedelete ($categories_name){
      // print_r($categories_name);
      Category::onlyTrashed()->where('categories_name',$categories_name)->forceDelete();
      return redirect('Categories')->with('permanent_delete','Your Premanent Delete Success full!');
    }
    // Check Box DELETEMETHOD
    function deletecheckbox (Request $request){
      if ($request->checkbox_id) {
        foreach ($request->checkbox_id as $Checked) {
          Category::find($Checked)->delete();
        }
        return back();
      }else {
        echo "Dao Nai";
      }
    }
    // Check Box METHOD
    function checkbox (Request $request){
      if (isset($request->checkbox_id)) {
      foreach ($request->checkbox_id as $checbox) {
        Category::onlyTrashed()->find($checbox)->restore();
        // echo $checbox;
      }
      return redirect('Categories')->with('Check_restor','Your All restore Success full!');
      }else{
    echo "string";
    }

    }
}
