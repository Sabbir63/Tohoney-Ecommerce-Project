@extends('layouts.dashboard_sidebar')

@section('content')
@section('coupon')
  active
@endsection
@section('breadcrumb')
<nav class="breadcrumb sl-breadcrumb">
  <!-- <a class="breadcrumb-item" href="index.html">Starlight</a> -->
  <a class="breadcrumb-item" href="{{route('home')}}">Dashboard</a>
  <span class="breadcrumb-item active">Coupon</span>
</nav>
@endsection
<div class="container">
  <div class="row">
    <div class="col-8">
      <div class="card text-white">
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
                        <th>Serial No</th>
                        <th>Coupon Name</th>
                        <th>Coupon Amout(%)</th>
                        <th>Expire Date</th>
                        <th>User limit</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  @forelse($coupons as $coupon)
                        <tr>
                            <td>{{$loop->index + 1}}</td>
                            <td>{{$coupon->coupon_name}}</td>
                            <td>{{$coupon->coupon_amout}}</td>
                            <td>{{$coupon->expire_date}}</td>
                            <td>{{$coupon->user_limit}}</td>
                            <td>
                              <a href="{{route('coupon.edit',$coupon->id)}}" type="button" class="btn mr-2 btn-primary">Edit</a>
                                <form action="{{ route('coupon.destroy', $coupon->id) }}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <button class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr class="text-danger text-center">
                            <td colspan="100"> Data Not Available</td>
                        </tr>
                  @endforelse
                </tbody>
                <button type="submit" class="btn btn-danger">Checked Delete</button>
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
            <form action="{{ route('coupon.store') }}" method="POST">
              @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1" class="text-success">Coupon Name</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Please Input Categories Name" name="coupon_name">
                  @error('categories_name')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1" class="text-success">Coupon Amout</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Please Input Categories Name" name="coupon_amout">
                  @error('coupon_amout')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1" class="text-success">Expire Date</label>
                  <input type="date" class="form-control" id="exampleInputEmail1" placeholder="Please Input Categories Name" name="expire_date">
                  @error('categories_name')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1" class="text-success">User limit</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Please Input Subategories Name" name="user_limit">
                  @error('sub_category_name')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
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
