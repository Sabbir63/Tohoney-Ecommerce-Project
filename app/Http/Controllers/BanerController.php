<?php

namespace App\Http\Controllers;

use App\Models\Baner;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;

class BanerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
      $banners = Baner::all();
        return view('banner/banner_index',compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
      $image = $request->file('banner_image');
      $image_name = $image->getClientOriginalName();
      $image_new_name = str::random(5)."-".time().".".$request->banner_image->getClientOriginalExtension();
      Image::make($image)->save(base_path('public/uplods/banners/').$image_new_name);
      // print_r($image_new_name);
        Baner::create($request->except('_token','banner_image') + [
         'banner_image' => $image_new_name
      ]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Baner  $baner
     * @return \Illuminate\Http\Response
     */
    public function show(Baner $baner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Baner  $baner
     * @return \Illuminate\Http\Response
     */
    public function edit(Baner $banner){
        return view('banner/banner_edit',compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Baner  $baner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Baner $banner){
      // echo $index->banner_image;
      if($request->hasFile('banner_new_image')){
      // Delete Image In file..
      $store_file_name = base_path('public/uplods/banners/').Baner::find($banner->id)->banner_image;
        unlink($store_file_name);
        // New Photo Upload..
      $current_image = $request->file('banner_new_image');
      $current_image_name = $request->banner_new_image->getClientOriginalName();
      $new_photo_name = str::random(3)."-".time().".".$request->banner_new_image->getClientOriginalExtension();
      Image::make($current_image)->save(base_path('public/uplods/banners/').$new_photo_name);

      $banner->banner_title = $request->banner_title;
      $banner->banner_description = $request->banner_description;
      $banner->banner_button_link = $request->banner_button_link;
      $banner->banner_image = $new_photo_name;
      $banner->save();
        // echo  $index;
    }
    return back();
  }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Baner  $baner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Baner $index){
        $index->delete();
        return back();
    }
}
