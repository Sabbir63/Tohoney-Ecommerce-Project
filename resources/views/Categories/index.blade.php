@extends('layouts.dashboard_sidebar')

@section('content')
@section('Categories')
  active
@endsection
@section('breadcrumb')
<nav class="breadcrumb sl-breadcrumb">
  <!-- <a class="breadcrumb-item" href="index.html">Starlight</a> -->
  <a class="breadcrumb-item" href="{{route('home')}}">Dashboard</a>
  <span class="breadcrumb-item active">Category</span>
</nav>
@endsection
<div class="container">
  <div class="row">
    <div class="col-8">
      <div class="card text-white">
        <div class="card-header bg-success">
        <div class="row">
          <div class="col-6">
            Category
          </div>
          <div class="col-6">
          <div class="text-right">
            <a class="btn mr-2 btn-primary" href="{{url('Categories/resyclebin')}}">resyclebin</a>
            @if($categories->count() != 0)
            <button id="clickd" class="bg-danger" type="button" name="button">Delete All</button>
            @endif
          </div>
          </div>
        </div>
        </div>
          <div class="card-body">
            <table class="table table-bordered">
              @if(session('update_status'))
                <div class="alert alert-danger">
                  {{session('update_status')}}
                </div>
                  @endif
              @if(session('Check_restor'))
                <div class="alert alert-danger">
                  {{session('Check_restor')}}
                </div>
                  @endif
              @if(session('category_delete_status'))
                <div class="alert alert-danger">
                    {{session('category_delete_status')}}
                </div>
              @endif
              @if(session('permanent_delete'))
                <div class="alert alert-danger">
                    {{session('permanent_delete')}}
                </div>
              @endif
              @if(session('restores'))
                <div class="alert alert-success">
                    {{session('restores')}}
                </div>
              @endif
              @if(session('delate_all_status'))
                <div class="alert alert-danger">
                    {{session('delate_all_status')}}
                </div>
              @endif
                <thead>
                    <tr>
                        <th>DELETE?</th>
                        <th>SR No</th>
                        <th>Category Name</th>
                        <th>Category Image</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <form action="{{route('deletecheckbox')}}" method="POST">
                  @csrf
                <tbody>
                  @forelse($categories as $category)
                        <tr>
                          <td>
                            <input type="checkbox" name="checkbox_id[]" value="{{$category->id}}">
                          </td>
                          <td>{{$loop->index + 1}}</td>
                            <td>{{Str::title($category->categories_name)}}</td>
                            <td>
                              <img src="{{asset('uplods/category_image/'.$category->category_image)}}" width="100px" alt="No Image">
                            </td>
                            <td>{{$category->created_at->format('d/m/Y h:i:s A') }}</td>
                            <td>
                              <div class="btn-group" role="group" aria-label="Basic example">
                                  <a href="{{url('categories/edit')}}/{{$category->id}}" type="button" class="btn mr-2 btn-primary">Edit</a>
                                  <a href="{{url('categories/delete')}}/{{$category->id}}" type="button" class="btn btn-danger">Delete</a>
                              </div>
                            </td>
                        </tr>
                        @empty
                        <tr class="text-danger text-center">
                            <td colspan="100"> Data Not Available</td>
                        </tr>
                  @endforelse
                </tbody>
                <button type="submit" class="btn btn-danger">Checked Delete</button>

                  </form>
              </table>
            </div>
          </div>
        </div>
    <div class="col-4">
      <div class="card text-white">
        <div class="card-header bg-success">Add Your Category</div>
          <div class="card-body">
            @if(session('category_status'))
            <div class="alert alert-success">
              {{session('category_status')}}
            </div>
            @endif
            <form enctype="multipart/form-data" action="{{ route('category_post') }}" method="POST">
              @csrf
                <div class="form-group">
                  <label class="text-secondary" for="exampleInputEmail1">Ctaegories</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Please Input Categories Name" name="categories_name">
                  @error('categories_name')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label class="text-secondary" for="exampleInputEmail1">Subctaegory</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Please Input Subategories Name" name="sub_category_name">
                  @error('sub_category_name')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label class="text-secondary" for="exampleInputEmail1">Category Image</label>
                  <input type="file" class="form-control" name="category_image">
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

@section('footer_script')
<script>
  $(document).ready(function(){
    $('#clickd').click(function(){
      Swal.fire({
            title: 'Are you sure?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
              window.location.href = 'categories/all/delete'
        }
      })
    })
  })
</script>
@endsection
