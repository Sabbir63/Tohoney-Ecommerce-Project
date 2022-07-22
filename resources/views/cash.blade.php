@extends('layouts.dashboard_sidebar')

@section('content')
@section('cash_on_delevery')
  active
@endsection
@section('breadcrumb')
<nav class="breadcrumb sl-breadcrumb">
  <!-- <a class="breadcrumb-item" href="index.html">Starlight</a>
  <a class="breadcrumb-item" href="index.html">Pages</a> -->
  <span class="breadcrumb-item active">Dashboard</span>
</nav>
@endsection
<div class="order_details">
  <div class="container pt-4">
    <div class="col-lg-12">
      <div class="card-body">
        <nav class="navbar navbar-light bg-light">
      <form class="form-inline">
        <input class="form-control mr-sm-2" id="search" type="text" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </nav>
        <table class="table table-bordered" id="tableInfo">

            <thead>
              <tr class="text-danger text-left">
                  <td colspan="50">Online Order Details</td>
              </tr>
                <tr>
                    <th>SR No</th>
                    <th>Order Id</th>
                    <th>Customer Name</th>
                    <th>Country Name</th>
                    <th>City Name</th>
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
                @forelse($cash_on_deleverys as $cash_on_delevery)

                <td>{{$loop->index + 1}}</td>
                <td>{{$cash_on_delevery->order_id}}</td>
                <td>{{App\Models\Cartorder::find($cash_on_delevery->order_id)->customer_name}}</td>
                <td>{{App\Models\Cartorder::find($cash_on_delevery->order_id)->customer_country_id}}</td>
                <td>{{App\Models\Cartorder::find($cash_on_delevery->order_id)->customer_city_id}}</td>
                <td>{{App\Models\Cartorder::find($cash_on_delevery->order_id)->customer_address}}</td>
                <td>{{App\Models\Cartorder::find($cash_on_delevery->order_id)->customer_phone}}</td>
                <td>{{App\Models\Product::find($cash_on_delevery->product_id)->product_name}}</td>
                <td>{{$cash_on_delevery->quantity}}</td>
                <td>${{App\Models\Cartorder::find($cash_on_delevery->order_id)->total}}</td>
                <td>
                  <img width="50px" height="50px" src="{{asset('uplods/products_image')}}/{{App\Models\Product::find($cash_on_delevery->product_id)->product_image}}" alt="No Image">
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
        </div>
    </div>
  </div>
</div>
@endsection
@section('footer_script')
<script>
$(document).ready(function(){
  $('#search').keyup(function(){
    search_table($(this).val());
  });
  function search_table(value){
    $('#tableInfo').each(function(){
      var found = 'false';
      $(this).each(function(){
        if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0) {
          found = 'true';
        }
      });
      if (found == 'true') {
        $(this).show();
      }else{
        $(this).hide();
      }
    });
  }
});
</script>
@endsection
