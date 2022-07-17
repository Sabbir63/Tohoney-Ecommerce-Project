<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
      $clients = Client::all();
        return view('customer/comment',compact('clients'));
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
      $image = $request->file('client_image');
      $image_name = $request->file('client_image')->getClientOriginalName();
      $image_new_name = Str::random(5).time().".". $request->file('client_image')->getClientOriginalExtension();
      Image::make($image)->save(base_path('public/uplods/customar_image/').$image_new_name);

      Client::create($request->except('_token','client_image') + [
        'client_image' => $image_new_name
      ]);
    return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client){
        return view('customer/edit',compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client){
      unlink(base_path('public/uplods/customar_image/').Client::find($client->id)->client_image);
      $image = $request->file('client_image');
      $image_name = $request->file('client_image')->getClientOriginalName();
      $image_new_name = Str::random(3).time().".". $request->file('client_image')->getClientOriginalExtension();
      Image::make($image)->save(base_path('public/uplods/customar_image/').$image_new_name);

        $client->client_comment = $request->client_comment;
        $client->client_name = $request->client_name;
        $client->client_position = $request->client_position;
        $client->client_position = $request->client_position;
        $client->client_image = $image_new_name;
        $client->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return back();
    }
}
