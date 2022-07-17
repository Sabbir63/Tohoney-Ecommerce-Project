@extends('layouts.dashboard_sidebar')

@section('content')
@section('breadcrumb')
<nav class="breadcrumb sl-breadcrumb">
  <!-- <a class="breadcrumb-item" href="index.html">Starlight</a> -->
  <a class="breadcrumb-item" href="{{url('home')}}">Dashboard</a>
  <span class="breadcrumb-item active">edit</span>
</nav>
@endsection
  <div class="container">
    <div class="row">
      <div class="col-6 m-auto">
        <div class="card">
          <div class="card-header bg-success">Edit</div>
            <div class="card-body bg-success">
              <form enctype="multipart/form-data" action="{{route('client.update',$client->id)}}" method="POST">
                @csrf
                @method('PATCH')
                  <div class="form-group">
                    <label class="text-white">Client Name</label>
                    <input type="text" value="{{$client->client_name}}" class="form-control"  id="exampleInputEmail1" name="client_name">
                  </div>
                  <div class="form-group">
                    <label class="text-white">Client Position</label>
                    <input type="text" value="{{$client->client_position}}" class="form-control"  id="exampleInputEmail1" name="client_position">
                  </div>
                  <div class="form-group">
                    <label class="text-white">Client Comment</label>
                    <input type="text" value="{{$client->client_comment}}" class="form-control"  id="exampleInputEmail1" name="client_comment">
                  </div>
                  <div class="form-group">
                    <label class="text-white">Client Image</label>
                    <img width="100" src="{{asset('uplods/customar_image')}}/{{$client->client_image}}" alt="">
                  </div>
                  <div class="form-group">
                    <label class="text-white">Client New Image</label>
                    <input type="file" class="form-control"  id="exampleInputEmail1" name="client_image">
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
