<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Setting;
use App\Models\User;
use App\Models\City;
use App\Models\Cartorder;
use App\Models\Addtocart;
use App\Models\Countdown;
use App\Models\Order;
use App\Models\Client;
use App\Models\Baner;
use App\Models\Order_details;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Auth;
use Hash;

class FrontendCpntroller extends Controller{

  function home (){
    $clients = Client::all();
    $countdown = Countdown::all();
    $banners = Baner::all();
    $categories = Category::all();
    $products = Product::latest()->limit(10)->get();
    return view('welcome',compact('products','categories','banners','countdown','clients'));
  }

  function product_details ($product_id){
    $product_category_id = Product::findOrFail($product_id)->category_id;
    $product_info = Product::findOrFail($product_id);
    $related_product = Product::where('category_id',$product_category_id)->where('id','!=',$product_id)->get();
    return view('product/details',compact('product_info','related_product'));
  }
  function product_view ($product_id){
    $product_view = Product::findOrFail($product_id);
    return view('product/view',compact('product_view'));
  }
  function product_wish_list ($product_id){
    $product_wish_list = Product::findOrFail($product_id);
    return view('product/wish_list',compact('product_wish_list'));
  }
  function product_shop(){
    $category = Category::all();
    $products = Product::all();
    return view('product/shop',compact('category','products'));
  }
  function category_shop($category_id){
  $product_shop_list = Product::where('category_id',$category_id)->get();
    return view('product/category_shop',compact('product_shop_list'));
  }
  function update_posts(Request $request){
    // print_r($request->all());
    foreach ($request->except('_token') as $key => $setting) {
    Setting::where('setting_name',$key)->update([
        'setting_value'=> $setting
      ]);
    }
    return back();
  }
  function registration(){
    return view('user_registration');
  }
  function registration_post (Request $request){
    // echo User::where('email',$request->email)->first()->email;
    // if ($request->email == User::where('email',$request->email)->first()->email) {
    //   echo "na mile nai";
    // }else {
    //   echo "okkk milse";
    // }
    // die();
      User::insert([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'role' => 2,
        'created_at' => Carbon::now()
      ]);
      return back();
  }
  function customer_login(){
    return view('customer_login');
  }
  function coustomar_login_post (Request $request){
    if (User::where('email',$request->email)->exists()) {
      $db_pass = User::where('email',$request->email)->first()->password;
        if (Hash::check($request->password,$db_pass)) {
          if (Auth::attempt($request->except('_token'))) {
          return redirect()->intended('/');

        }else {
          return back()->with('customer_login_error','Your Email Or Password Worng!');
        }
    }else {
      return back()->with('customer_login_error','Your Email Address Not Found!');
    }

  }
}

function get_city_list(Request $request){
  $city_list = "";
  foreach (City::where('country_id',$request->country_id)->select('id','name')->get() as $city) {
  $city_list = $city_list." <option value='".$city->id."'>$city->name</option> ";
  }
  echo $city_list;
}

function place_order (Request $request){

  // return $request;
  if ($request->customer_payment == 1) {
        session([
      'session_customer_name' => $request->customer_name,
      'session_customer_email' => $request->customer_email,
      'session_customer_phone' => $request->customer_phone,
      'session_customer_country_id' => $request->customer_country_id,
      'session_customer_city_id' => $request->customer_city_id,
      'session_customer_address' => $request->customer_address,
      'session_customer_postcode' => $request->customer_postcode,
    ]);
    return redirect('online/payment');
  }else {
    $oreder_id =  Cartorder::insertGetId( $request->except('_token') + [
        'user_id' => Auth::id(),
        'payment_status' => 1,
        'discount' => session('session_discount'),
        'subtotal' => session('session_subtottal'),
        'total' => session('session_tottal'),
        'created_at' => Carbon::now()
    ]);
    $addtocart = Addtocart::where('user_ip' , request()->ip())->select('id','product_id','quantity')->get();
  foreach ($addtocart as $cart) {
    Order_details::insert([
      'order_id' => $oreder_id,
      'product_id' => $cart->product_id,
      'quantity' => $cart->quantity,
      'created_at' => Carbon::now()
    ]);
    Product::find( $cart->product_id)->decrement('product_quantity',$cart->quantity);
    Addtocart::find($cart->id)->delete();
}
    return redirect('customer/dashboard');
  }
}

  function customer_dashboard(){
    $oders = Cartorder::all();
    return view('customer/dashboard',compact('oders'));
  }
  function download_pdf ($pdf_id){
    $data = Cartorder::findOrFail($pdf_id);
    $order_details = Order_details::where('order_id',$pdf_id)->get();
  $pdf = PDF::loadView('pdf.invoice', compact('data','order_details'));
  return $pdf->stream('invoice.pdf');
  }


function about_frontend (){
  return view('about');
}
// ========================
// function exampleEasyCheckout(){
//   print_r(Cartorder::all());
//   die();
//     return view('exampleEasycheckout');
// }





}
