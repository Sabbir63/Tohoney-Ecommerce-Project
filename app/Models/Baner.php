<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Baner extends Model{
    use HasFactory;
    protected $fillable = ['banner_title','banner_description','banner_button_link','banner_image'];
    // protected $guarded = [];
}
