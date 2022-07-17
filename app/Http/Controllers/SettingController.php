<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller{
  public function __construct(){
      $this->middleware('auth');
      $this->middleware('checkrole');
  }
  
  function setting (){
    $settings = Setting::all();
    return view('setings/setings',compact('settings'));
  }
}
