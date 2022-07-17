@extends('layouts.dashboard_sidebar')

@section('content')
@section('breadcrumb')
<nav class="breadcrumb sl-breadcrumb">
  <!-- <a class="breadcrumb-item" href="index.html">Starlight</a> -->
  <a class="breadcrumb-item" href="{{url('Categories')}}">Categories</a>
  <span class="breadcrumb-item active">edit</span>
</nav>
@endsection
  <div class="container">
    <div class="row">
      <div class="col-6 m-auto">
        <div class="card">
          <div class="card-header bg-success">Edit</div>
            <div class="card-body bg-success">
              <form action="{{route('banner.update',$banner->id)}}" enctype="multipart/form-data" method="POST">
                @csrf
                @method('PATCH')
                  <div class="form-group">
                    <label class="text-white">Banner Title</label>
                    <input type="text" value="{{$banner->banner_title}}" class="form-control"  id="exampleInputEmail1" name="banner_title">
                  </div>
                  <div class="form-group">
                    <label class="text-white">Banner Description</label>
                    <input type="text" value="{{$banner->banner_description}}" class="form-control"  id="exampleInputEmail1" name="banner_description">
                  </div>
                  <div class="form-group">
                    <label class="text-white">Banner Link</label>
                    <input type="text" value="{{$banner->banner_button_link}}" class="form-control"  id="exampleInputEmail1" name="banner_button_link">
                  </div>
                  <div class="form-group">
                    <label class="text-white">Banner Image</label>
                    <img width="400px" height="100px" src="{{asset('uplods/banners/'.$banner->banner_image)}}" alt="No Image">
                  </div>
                  <div class="form-group">
                    <label class="text-white">Banner Image</label>
                    <input type="file" class="form-control"  id="exampleInputEmail1" name="banner_new_image">
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
