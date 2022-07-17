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
              <form action="{{route('coupon.update',$coupon->id)}}" method="POST">
                @csrf
                @method('PATCH')
                  <div class="form-group">
                    <label class="text-white">Coupon Name</label>
                    <input type="text" value="{{$coupon->coupon_name}}" class="form-control"  id="exampleInputEmail1" name="coupon_name">
                  </div>
                  <div class="form-group">
                    <label class="text-white">Coupon Amount</label>
                    <input type="text" value="{{$coupon->coupon_amout}}" class="form-control"  id="exampleInputEmail1" name="coupon_amout">
                  </div>
                  <div class="form-group">
                    <label class="text-white">Coupon Date</label>
                    <input type="date" value="{{$coupon->expire_date}}" class="form-control"  id="exampleInputEmail1" name="expire_date">
                  </div>
                  <div class="form-group">
                    <label class="text-white">Coupon Limit</label>
                    <input type="text" value="{{$coupon->user_limit}}" class="form-control"  id="exampleInputEmail1" name="user_limit">
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
