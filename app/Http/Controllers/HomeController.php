<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cashondelevery;
use App\Models\Order_details;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        $user = User::latest()->paginate(3);
        $order_details = Order_details::latest()->paginate(5);
        return view('home',compact('user','order_details'));
    }

    public function cash_on_delevery(){
      $cash_on_deleverys = Cashondelevery::latest()->get();
      return view('cash',compact('cash_on_deleverys'));
    }
}
