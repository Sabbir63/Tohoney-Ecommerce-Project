@extends('layouts.dashboard_sidebar')

@section('content')
@section('Subcategory')
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
                        <th>Sub Category Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <form action="{route('deletecheckbox')}}" method="POST">
                  @csrf
                <tbody>
                  @forelse($subcategories as $subcategory)
                  <!-- {{App\Models\Category::find($subcategory->category_id)->categories_name?? ''}} -->
                        <tr>
                            <td>
                            <input type="checkbox" name="checkbox_id[]" value="">
                            </td>
                            <td>{{$loop->index + 1}}</td>
                            <td>{{App\Models\Category::find($subcategory->category_id)->categories_name?? ''}}</td>
                            <td>{{$subcategory->subcategory_name}}</td>
                            <td>
                              <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{route('subcategory_edit',$subcategory->id)}}" type="button" class="btn btn-sm text-white btn-success">Edit</a>
                                <a href="{{route('subcategory_delete',$subcategory->id)}}" type="button" class="btn btn-sm text-white btn-danger">Delete</a>
                              </div>
                            </td>
                        </tr>
                  @empty
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
            <form action="{{ url('subcategories/post') }}" method="POST">
              @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">Sub Ctaegory</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Please Input SubCategories Name" name="subcategory_name">
                  @error('categories_name')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Sub Ctaegory</label>
                  <select class="form-control" name="category_id">
                    <option value="">--Select One--</option>
                    @forelse($category as $categori)
                    <option value="{{$categori->id}}">{{$categori->categories_name}}</option>
                    @empty
                    @endforelse
                  </select>
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
