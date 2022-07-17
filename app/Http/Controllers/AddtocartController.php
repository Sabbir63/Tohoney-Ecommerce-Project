<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Addtocart;
use App\Models\Product;
use App\Models\Coupon;
use App\Models\Country;
use App\Models\City;
use Carbon\Carbon;

class AddtocartController extends Controller{
  // public function __construct(){
  //     $this->middleware('auth');
  // }

  function addtocart(Request $request,$details_id){
    if(Product::find($details_id)->product_quantity < $request->quantity){
      return back()->with('quantity_error',"bhai etto product amar kase nai");
    }else{
      if (Addtocart::where('product_id',$details_id)->where('user_ip',request()->ip())->exists()) {
        Addtocart::where('product_id',$details_id)->where('user_ip',request()->ip())->increment('quantity',$request->quantity);
      }else {
        Addtocart::insert([
          'product_id' => $details_id,
          'quantity' => $request->quantity,
          'user_ip' => request()->ip(),
          'created_at' => Carbon::now()
        ]);
      }
    }
    return back();
  }

  // DELETE CART
  function cartdelete($cart_id){
    Addtocart::find($cart_id)->delete();
    return back();
  }
  // Add to cart
  function cart($coupon_name = ""){
    $coupon_amout = 0;
  if ($coupon_name == "") {
    $coupon_amout = 0;
  }else{
        if (Coupon::where('coupon_name',$coupon_name)->exists()) {
          if (Carbon::now()->format('Y-m-d') > Coupon::where('coupon_name',$coupon_name)->first()->expire_date) {
              return back()->with('Date_expired','Your Coupon Date Expired!');
            }else {
              if (Coupon::where('coupon_name',$coupon_name)->first()->user_limit > 0) {
                  $coupon_amout = Coupon::where('coupon_name',$coupon_name)->first()->coupon_amout;
                }else {
                  return back()->with('Limit','Your Coupon Limit Finished!');
                }
              }
           }else {
             return back()->with('Invalid','Invalid Coupon Code!');
         }
      }
    //      echo
    // die();
    $discount = $coupon_amout;
    $coupon_name_to_show_value = $coupon_name;
    $carts = Addtocart::where('user_ip' , request()->ip())->get();
    return view('cart',compact('carts','discount','coupon_name_to_show_value'));
  }



  function cart_update(Request $request){
    foreach ($request->quantity as $product_id => $quantity_value) {
          if (Product::find(Addtocart::find($product_id)->product_id)->product_quantity >= $quantity_value) {
              Addtocart::find($product_id)->update([
                'quantity' => $quantity_value
              ]);
          }
      return back();
        }
  }

  function checkout (){
    $ad = Addtocart::all();
    $countries =  Country::select('id','name')->get();
    $cities =  City::select('id','name')->get();
    return view('checkout',compact('countries','cities','ad'));
  }


}
