@extends('layouts.dashboard_sidebar')

@section('content')
@section('setings')
  active
@endsection
@section('breadcrumb')
<nav class="breadcrumb sl-breadcrumb">
  <!-- <a class="breadcrumb-item" href="index.html">Starlight</a>-->
  <a class="breadcrumb-item" href="{{route('home')}}">Dashboard</a>
  <span class="breadcrumb-item active">Settings</span>
</nav>
@endsection
<div class="container">
  <div class="row">
    <div class="col-8 m-auto">
      <div class="card text-white">
        <div class="card-header bg-success">Settings</div>
          <div class="card-body bg-success">
            <form action="{{url('update/posts')}}" method="POST">
              @csrf
              @foreach($settings as $setting)
                <div class="form-group">
                  <label for="exampleInputEmail1">{{$setting->setting_name}}</label>
                  <input type="text" class="form-control" value="{{$setting->setting_value}}" id="exampleInputEmail1" name="{{$setting->setting_name}}">
                </div>
                @endforeach
                <div class="text-center mt-2">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
          </div>
        </div>

    </div>
  </div>
</div>
@endsection
