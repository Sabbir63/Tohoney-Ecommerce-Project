<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model{
    use HasFactory;
    protected $fillable = ['client_comment','client_name','client_position','client_image'];
}
