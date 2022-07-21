@extends('layouts.dashboard_sidebar')

@section('content')
@section('dashboard')
  active
@endsection
@section('breadcrumb')
<nav class="breadcrumb sl-breadcrumb">
  <!-- <a class="breadcrumb-item" href="index.html">Starlight</a>
  <a class="breadcrumb-item" href="index.html">Pages</a> -->
  <span class="breadcrumb-item active">Dashboard</span>
</nav>
@endsection
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
          @if(Auth::User()->role == 1)
          <div class="card">
                <div class="card-header">Hello Admin</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="alert text-center alert-success">
                      Tottal Users: {{ $user->count() }}
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>SR No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($user as $users)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $users->name }}</td>
                                <td>{{ $users->email }}</td>
                                <td>{{ $users->created_at->diffForHumans() }}</td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                    {{ $user->links() }}
                </div>

            </div>
          @else
              @include('customer.dashboard')
          @endif
        </div>
    </div>
</div>


<div class="order_details">
  <div class="container pt-4">
    <div class="col-lg-12">
      <div class="card-body">
        <table class="table table-bordered">

            <thead>
              <tr class="text-danger text-center">
                  <td colspan="100">Online Order Details</td>
              </tr>
                <tr>
                    <th>SR No</th>
                    <th>Order Id</th>
                    <th></th>
                    <th>Orderer Name</th>
                    <th>Orderer Address</th>
                    <th>Orderer Phone</th>
                    <th>Order Product name</th>
                    <th>Order Quantity</th>
                    <th>Order Amount</th>
                    <th>Order Product Image</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

              <tr>
                @forelse($order_details as $order_detail)

                <td>{{$loop->index + 1}}</td>
                <td>{{$order_detail->order_id}}</td>
                <td>Khali</td>
                <td>{{App\Models\Order::find($order_detail->order_id)->name}}</td>
                <td>{{App\Models\Order::find($order_detail->order_id)->address}}</td>
                <td>{{App\Models\Order::find($order_detail->order_id)->phone}}</td>
                <td>{{App\Models\Product::find($order_detail->product_id)->product_name}}</td>
                <td>{{$order_detail->quantity}}</td>
                <td>{{App\Models\Order::find($order_detail->order_id)->amount}}</td>
                <td>
                  <img width="50px" height="50px" src="{{asset('uplods/products_image')}}/{{App\Models\Product::find($order_detail->product_id)->product_image}}" alt="No Image">
                </td>
                <td>
                  <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="" type="button" class="btn btn-sm text-white btn-success">Edit</a>
                    <a href="" type="button" class="btn btn-sm text-white btn-danger">Delete</a>
                  </div>
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
</div>
@endsection
