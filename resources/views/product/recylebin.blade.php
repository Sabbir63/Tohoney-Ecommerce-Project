@extends('layouts.dashboard_sidebar')

@section('content')
@section('breadcrumb')
<nav class="breadcrumb sl-breadcrumb">
  <!-- <a class="breadcrumb-item" href="index.html">Starlight</a> -->
  <a class="breadcrumb-item" href="{{url('product')}}">Product</a>
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
            @if(session('error'))
              <div class="alert alert-success">
                {{session('error')}}
              </div>
              @endif
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Delete Marks</th>
                        <th>SR No</th>
                        <th>Category Name</th>
                        <th>Product Price</th>
                        <th>Product Quantity</th>
                        <th>Product Short Description</th>
                        <th>Product Long Description</th>
                        <th>Product Alart Quamtity</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  <form  action="{{url('product/all_restore')}}" method="POST">
                    @csrf
                      @forelse($delete as $reycle)
                        <tr>
                          <td>
                            <input type="checkbox" class="input_fild" name="product_id[]" value="{{$reycle->id}}">
                          </td>
                          <td>{{$loop->index + 1}}</td>
                          <td>{{$reycle->product_name}}</td>
                          <td>{{$reycle->product_price}}</td>
                          <td>{{$reycle->product_quantity}}</td>
                          <td>{{Str::limit($reycle->product_short_description,10)}}</td>
                          <td>{{Str::limit($reycle->product_long_description,10)}}</td>
                          <td>{{$reycle->product_alart_quamtity}}</td>
                          <td>{{$reycle->created_at}}</td>
                            <td>
                              <a href="{{url('product/restore')}}/{{$reycle->id}}" type="button" class="btn mr-2 btn-sm btn-primary">restore</a>
                              <a href="{{url('product/forcedelete')}}/{{$reycle->id}}" type="button" class="btn mr-2 btn-sm btn-danger">Permanently Delete</a>
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
            <button type="submit" class="btn mr-2 btn-primary">Restore All</button>
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
