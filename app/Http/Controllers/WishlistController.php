<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Models\Product;
use Carbon\Carbon;

class WishlistController extends Controller{

    public function wishlist($product_id){
      if (Wishlist::where('product_id',$product_id)->where('user_ip',request()->ip())->exists()) {
      Wishlist::where('product_id',$product_id)->where('user_ip',request()->ip())->increment('quantity',1);
      }else {
        Wishlist::insert([
        'product_id' => $product_id,
        'quantity' => 1,
        'user_ip' => request()->ip(),
          'created_at' => Carbon::now()
        ]);
      }
      return back();
    }

    public function wishlist_delete($wishlist_id){
      Wishlist::find($wishlist_id)->delete();
      return back();
      }
}
