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
        <div class="card text-white">
          <div class="card-header bg-success">Edit</div>
            <div class="card-body bg-success">
              <form action="{{url('categories/posts/edit')}}" enctype="multipart/form-data" method="POST">
                @csrf
                  <div class="form-group">
                    <input type="hidden" name="categories_id" value="{{$category_info->id}}">
                    <label class="text-white" for="exampleInputEmail1">Category Name</label>
                    <input type="text" class="form-control" value="{{$category_info->categories_name}}" id="exampleInputEmail1" name="categories_name">
                    @if(session('same_name_error'))
                    <span class="text-danger">{{session('same_name_error')}}</span>
                    @endif
                    @error('categories_name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label class="text-white" for="exampleInputEmail1">Category Image</label>
                    <img src="{{asset('uplods/category_image/'.$category_info->category_image)}}" width="200px" alt="No Image">
                  </div>
                  <div class="form-group">
                    <label class="text-white" for="exampleInputEmail1">Category new Image</label>
                    <input type="file" class="form-control" name="category_new_image">
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
