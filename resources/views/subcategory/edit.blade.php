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
              <form action="{{route('subcategory_update',$sub_edit->id)}}" enctype="multipart/form-data" method="POST">
                @csrf
                  <div class="form-group">
                    <label class="text-white">Subcategory Name</label>
                    <input type="text" value="{{$sub_edit->subcategory_name}}" class="form-control"  id="exampleInputEmail1" name="subcategory_name">
                  </div>
                  <div class="form-group">
                    <label class="text-white">Category Name</label>
                    <input type="text" value="{{App\Models\Category::find($sub_edit->category_id)->categories_name?? ''}}" class="form-control"  id="exampleInputEmail1" disabled>
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
