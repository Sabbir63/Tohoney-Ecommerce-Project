@extends('layouts.dashboard_sidebar')

@section('content')
@section('resyclebin')
  active
@endsection
@section('breadcrumb')
<nav class="breadcrumb sl-breadcrumb">
  <!-- <a class="breadcrumb-item" href="index.html">Starlight</a> -->
  <a class="breadcrumb-item" href="{{url('Categories')}}">Categories</a>
  <span class="breadcrumb-item active">Resyclebin</span>
</nav>
@endsection
<div class="container">
  <div class="row">
    <div class="col-12">
      <div class="card text-white">
        <div class="card-header bg-success">
        <div class="row">
          <div class="col-6">
            Resycle Bin
          </div>
          <div class="col-6">
          <div class="text-right">
          </div>
          </div>
        </div>
        </div>
          <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Delete Marks</th>
                        <th>SR No</th>
                        <th>Category Name</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  <form  action="{{route('checkdbox')}}" method="POST">
                    @csrf
                  @forelse($trushed as $trush)
                        <tr>
                          <td>
                            <input type="checkbox" class="input_fild" name="checkbox_id[]" value="{{ $trush->id }}">
                          </td>
                          <td>{{$loop->index + 1}}</td>
                          <td>{{Str::title($trush->categories_name)}}</td>
                          <td>{{$trush->created_at}}</td>
                            <td>
                              <a href="{{url('Categories/restore')}}/{{$trush->categories_name}}" type="button" class="btn mr-2 btn-primary">restore</a>
                              <a href="{{url('Categories/forcedelete')}}/{{$trush->categories_name}}" type="button" class="btn mr-2 btn-danger">Permanently Delete</a>
                            </td>
                        </tr>
                        @empty
                        <tr class="text-danger text-center">
                            <td colspan="100"> Data Not Available</td>
                        </tr>
                        @endforelse

                </tbody>
            </table>
            <button type="button" id="checkBox_checked" class="btn mr-2 btn-primary">Check All</button>
            <button type="button" id="checkBox_unchecked" class="btn mr-2 btn-success">Un Check All</button>
            <button type="submit" id="checkBox_checked" class="btn mr-2 btn-primary">Restore</button>
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
    $('#checkBox_checked').click(function(){
      $('.input_fild').attr('checked','checked');
    })
    $('#checkBox_unchecked').click(function(){
      $('.input_fild').removeAttr('checked','checked');
    })
  })
</script>
@endsection
