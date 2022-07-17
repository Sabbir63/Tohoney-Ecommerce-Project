<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    function relationtoaddtocart(){
      return $this->hasOne(Product::class, 'id','product_id');
    }
}
