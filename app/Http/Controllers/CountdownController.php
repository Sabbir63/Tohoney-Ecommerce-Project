<?php

namespace App\Http\Controllers;

use App\Models\Countdown;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CountdownController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
      $countdown = Countdown::all();
        return view('Countdown/coundown',compact('countdown'));
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
    public function store(Request $request)
    {
        Countdown::create($request->except('_token') + [
          'created_at' => Carbon::now()
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Countdown  $countdown
     * @return \Illuminate\Http\Response
     */
    public function show(Countdown $countdown)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Countdown  $countdown
     * @return \Illuminate\Http\Response
     */
    public function edit(Countdown $countdown)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Countdown  $countdown
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Countdown $countdown)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Countdown  $countdown
     * @return \Illuminate\Http\Response
     */
    public function destroy(Countdown $countdown)
    {
        //
    }
}
