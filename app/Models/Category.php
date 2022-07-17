<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model{
    use HasFactory;

     use SoftDeletes;
    protected $fillable = ['categories_name','sub_category_name','category_image'];

    
}
