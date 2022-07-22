<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserMessages;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Multiple_photo;
use App\Models\User_form;
use Carbon\Carbon;
use Image;
use Auth;

class ProductController extends Controller{
  // public function __construct(){
  //     $this->middleware('auth');
  //     $this->middleware('checkrole');
  // }
  // Product INDEX METHOD
  function index(){
    $product = Product::All();
    $category = Category::all();
    $subcategory = Subcategory::all();
    return view('product/index',compact('product','category','subcategory'));
  }
  // Category Data

  function Product_post(Request $request){
    if($request->hasFile('product_image')){
  $product_new_name = $request->product_name."-".time().".".$request->product_image->getClientOriginalExtension();
  $original_name = $request->product_image->getClientOriginalName();
  $product_image = $request->file('product_image');
  Image::make($product_image)->save(base_path('public/uplods/products_image/').$product_new_name);
}
    $request->validate([
      'product_name' => 'required',
      'product_price' => 'required',
      'product_quantity' => 'required',
      'product_short_description' => 'required',
      'product_long_description' => 'required',
      'product_alart_quamtity' => 'required'
    ],[

      'product_name.required' => 'Please Insert Name Fild!',
      'product_price.required' => 'Please Insert Price Fild',
      'product_quantity.required' => 'Please Insert Quantity Fild',
      'product_short_description.required' => 'Please Insert Description Fild',
      'product_long_description.required' => 'Please Insert Description Fild',
      'product_alart_quamtity.required' => 'Please Insert alart  Fild'
    ]);
    $product_id = Product::insertGetId([
      'product_name' => $request->product_name,
      'category_id' => $request->category_id,
      'subcategory_id' => $request->subcategory_id,
      'product_price' => $request->product_price,
      'user_id' => Auth::id(),
      'product_quantity' => $request->product_quantity,
      'product_short_description' => $request->product_short_description,
      'product_long_description' => $request->product_long_description,
      'product_alart_quamtity' => $request->product_alart_quamtity,
      'product_image' => $product_new_name,
      'created_at' => Carbon::now()
    ]);

    if($request->hasFile('thumble_image')){
    foreach ($request->file('thumble_image') as $single_thumble) {
      $multiple_new_name = Str::random(5)."-".time().".".$single_thumble->getClientOriginalExtension();
      $multiple_image_name = $single_thumble;
      Image::make($multiple_image_name)->save(base_path('public/uplods/thumble_photo/').$multiple_new_name);
       Multiple_photo::insert([
         'product_id'=> $product_id,
         'thumble_image' =>$multiple_new_name,
         'created_at' => Carbon::now()
       ]);
    }
    }
    return back()->with('Product_post_status','Your Product Update Successfull');
  }
  function product_edit($product_id){
    $product = Product::find($product_id);
    $category = Category::all();
    // $categories = Category::all();
    return view('product/edit',compact('product','category'));
  }

  function product_post_edit (Request $request, $product_id){
    // print_r($request->product_id);
    // die();
    // print_r($product_id);
    // print_r($request->all());
    if($request->hasFile('new_photo')){
      // delete photo
    $store_file_name = base_path('public/uplods/products_image/').Product::find($product_id)->product_image;
      unlink($store_file_name);
      // Update new Photo
      $photo_new_name = $request->product_name."-".Str::random(2)."-".time().".".$request->new_photo->getClientOriginalExtension();
      // print_r($request->new_photo->getClientOriginalExtension());
      $photo_name = $request->new_photo->getClientOriginalName();
      $photo = $request->file('new_photo');
      Image::make($photo)->save(base_path('public/uplods/products_image/').$photo_new_name);

      Product::find($product_id)->update([
        'product_name' => $request->product_name,
        'product_price' => $request->product_price,
        'product_quantity' => $request->product_quantity,
        'product_short_description' => $request->product_short_description,
        'product_long_description' => $request->product_long_description,
        'product_image' => $photo_new_name,
        'product_alart_quamtity' => $request->product_alart_quamtity,
      ]);
      return redirect('product')->with('edit_post_status','Yor Edited Update Successfull!');
    }

  }

  function product_delete($product_id){
  // echo Product::all();
  Product::find($product_id)->delete();
  return back()->with('product_delete','Your Product Deleted!');
  }
  function product_resyclebin (){
    $delete = Product::onlyTrashed('deleted_at')->get();
    return view('product/recylebin',compact('delete'));
  }
  function product_restore ($product_id){
    Product::onlyTrashed()->where('id',$product_id)->restore();
    return redirect('product')->with('restore','your Product Restore Successfull!');
  }
  function product_forcedelete  ($product_id){
    Product::onlyTrashed()->where('id',$product_id)->forceDelete();
    return redirect('product')->with('permanent_delete','Your Premanent Delete Success full!');
  }
  function product_all_restore  (Request $request){
    if (isset($request->product_id)) {
      foreach ($request->product_id as $id) {
        Product::onlyTrashed()->where('id',$id)->restore();
      }
      return redirect('product')->with('all_restore','Your All Retore Success full');
    }else{
      return redirect('product/resyclebin')->with('error','Please Mark The Check Box');
    }
  }
  function product_contact(){
    return view('product/contact');
  }
  function contuct_post(Request $request){
    // print_r($request->user_msg);
    $request->validate([
      'user_name' => 'required',
      'email' => 'required',
      'user_subject' => 'required',
      'user_msg' => 'required',
    ],[

      'user_name.required' => 'Please Insert Name Fild!',
      'email.required' => 'Please Insert your Mail Adderss!',
      'user_subject.required' => 'Please Insert Subject Fild',
      'user_msg.required' => 'Please Insert Massage Fild',
    ]);
    User_form::insert([
      'user_name' => $request->user_name,
      'email' => $request->email,
      'user_subject' => $request->user_subject,
      'user_msg' => $request->user_msg,
      'created_at' => Carbon::now()
    ]);
    Mail::to($request->email)->send(new UserMessages($request->user_msg));
    return back()->with('contact_post','Your Message Submited');
  }




}
