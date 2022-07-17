<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addtocart extends Model
{
    use HasFactory;
    protected $guarded = [];
    // relation
    function relationtoproduct(){
      return $this->hasOne(Product::class, 'id','product_id');
    }
}
