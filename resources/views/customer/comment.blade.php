@extends('layouts.dashboard_sidebar')

@section('content')
@section('Customer')
  active
@endsection
@section('breadcrumb')
<nav class="breadcrumb sl-breadcrumb">
  <!-- <a class="breadcrumb-item" href="index.html">Starlight</a>
  <a class="breadcrumb-item" href="index.html">Pages</a> -->
  <span class="breadcrumb-item active">Dashboard</span>
</nav>
@endsection
<div class="container">
  <div class="row">
  <div class="col-8">
    <div class="card">
    <div class="card-header">Helo Coustomer</div>
        <div class="card-body">
          <table class="table table-bordered">
    <thead>
      <tr>
        <th>Client Name</th>
        <th>Client Position</th>
        <th>Client Comment</th>
        <th>Client Image</th>
      </tr>
    </thead>
    <tbody>
      @forelse($clients as $client)
      <tr>
        <td>{{$client->client_name}}</td>
        <td>{{$client->client_position}}</td>
        <td>{{Str::limit($client->client_comment,15)}}</td>
        <td>
            <img width="100" height="70" src="{{asset('uplods/customar_image')}}/{{$client->client_image}}" alt="">
        </td>
        <td>
          <div class="btn-group" role="group" aria-label="Basic example">
              <a href="{{route('client.edit',$client->id)}}" type="button" class="btn mr-2 btn-primary">Edit</a>
          </div>
          <div class="btn-group" role="group" aria-label="Basic example">
            <form action="{{route('client.destroy',$client->id)}}" method="POST">
              @csrf
              @method('DELETE')
              <button id="clickd" type="submit" class="btn btn-danger">Delete</button>
            </form>
          </div>
        </td>
      </tr>
      @empty
      <tr>
        <th>Name</th>
      </tr>
      @endforelse
    </tbody>
  </table>
        </div>
          </div>
    </div>
    <div class="col-4">
      <div class="card text-white">
        <div class="card-header bg-success">Client Comment</div>
          <div class="card-body">
            @if(session('category_status'))
            <div class="alert alert-success">
              {{session('category_status')}}
            </div>
            @endif
            <form action="{{route('client.store')}}" enctype="multipart/form-data" method="POST">
              @csrf
                <div class="form-group">
                  <label class="text-secondary" for="exampleInputEmail1">Client Name</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Please Input Client Name" name="client_name">
                  @error('categories_name')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label class="text-secondary" for="exampleInputEmail1">Client Position</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Please Input client Position Name" name="client_position">
                  @error('sub_category_name')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label class="text-secondary" for="exampleInputEmail1">Client Comment</label>
                  <input type="text" class="form-control" name="client_comment">
                </div>
                <div class="form-group">
                  <label class="text-secondary" for="exampleInputEmail1">Client Image</label>
                  <input type="file" class="form-control" name="client_image">
                </div>
                <div class="text-center mt-2">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
          </div>
        </div>
    </div>
  </div>
</div>
@endsection
