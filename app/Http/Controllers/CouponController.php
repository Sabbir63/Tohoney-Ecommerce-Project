<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller{
  public function __construct(){
      $this->middleware('auth');
      $this->middleware('checkrole');
  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
      $coupons = Coupon::all();
        return view('coupon/coupon',compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
      // $request->validate([
      // //   'coupon_amout' => 'required|max:99|min:3|coupon_amout',
      // //   // 'sub_category_name' => 'required|max:40|min:3|unique:categories,sub_category_name'
      // // ],[
      // //   'coupon_amout.required' => 'Your discount Only 99!'
      // // ]);
        Coupon::create($request->except('_token'));
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function show(Coupon $coupon)
    {
        // echo "show";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit(Coupon $coupon){
        return view('coupon/edit',compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coupon $coupon){

          $coupon->coupon_name = $request->coupon_name;
          $coupon->coupon_amout = $request->coupon_amout;
          $coupon->expire_date = $request->expire_date;
          $coupon->user_limit = $request->user_limit;
            $coupon->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon $coupon){
        $coupon->delete();
        return back();
    }
}
