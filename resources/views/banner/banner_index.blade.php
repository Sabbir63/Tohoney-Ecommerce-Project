@extends('layouts.dashboard_sidebar')

@section('content')
@section('Banners')
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
    <div class="col-8">
      <div class="card text-white">
        <div class="card-header bg-success">
        <div class="row">
          <div class="col-6">
            Banner
          </div>
          <div class="col-6">
          <div class="text-right">
            <a class="btn mr-2 btn-primary" href="">resyclebin</a>

          </div>
          </div>
        </div>
        </div>
          <div class="card-body">
            @if(session('Product_post_status'))
            <div class="alert alert-success">
              {{session('Product_post_status')}}
            </div>
            @endif
            @if(session('all_restore'))
            <div class="alert alert-success">
              {{session('all_restore')}}
            </div>
            @endif
            @if(session('restore'))
            <div class="alert alert-success">
              {{session('restore')}}
            </div>
            @endif
            @if(session('edit_post_status'))
              <div class="alert alert-danger">
                {{session('edit_post_status')}}
              </div>
                @endif
            @if(session('product_delete'))
              <div class="alert alert-danger">
                {{session('product_delete')}}
              </div>
                @endif
            @if(session('permanent_delete'))
              <div class="alert alert-danger">
                {{session('permanent_delete')}}
              </div>
                @endif
            <table class="table table-bordered">

                <thead>
                    <tr>
                        <th>Banner Title</th>
                        <th>Banner Description</th>
                        <th>Button Link</th>
                        <th>Banner Image</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                  @forelse($banners as $baner)
                  <tr>
                    <td>

                      {{Str::limit($baner->banner_title,10)}}
                    </td>
                    <td>
                      {{Str::limit($baner->banner_description,15)}}
                    </td>
                    <td>
                    {{$baner->banner_button_link}}
                    </td>
                    <td>
                      <img width="50px" height="50px" src="{{asset('uplods/banners')}}/{{$baner->banner_image}}" alt="No Image">
                    </td>
                    <td>
                      <a href="{{route('banner.edit', $baner->id)}}" class="btn btn-sm text-white btn-success">Edit</a>
                      <form action="{{route('banner.destroy', $baner->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm text-white btn-danger">Delete</button>
                      </form>
                     </td>
                  </tr>
                  @empty
                  <tr class="text-danger text-center">
                      <td colspan="100"> Data Not Available</td>
                  </tr>
                  @endforelse
                </tbody>
              </table>
              <button type="submit" class="btn btn-danger">Checked Delete</button>
            </div>
          </div>
        </div>
    <div class="col-4">
      <div class="card text-white">
        <div class="card-header bg-success">Settings</div>
          <div class="card-body bg-success">
            <form action="{{route('banner.store')}}" method="POST" enctype="multipart/form-data">
              @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">Banner Title</label>
                  <input type="text" class="form-control" value="" id="exampleInputEmail1" name="banner_title">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Banner Description</label>
                  <input type="text" class="form-control" value="" id="exampleInputEmail1" name="banner_description">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Banner Button Link</label>
                  <input type="text" class="form-control" value="" id="exampleInputEmail1" name="banner_button_link">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Banner Image</label>
                  <input type="file" class="form-control" value="" id="exampleInputEmail1" name="banner_image">
                </div>
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
