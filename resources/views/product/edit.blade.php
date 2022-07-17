@extends('layouts/dashboard_sidebar')

@section('breadcrumb')
<nav class="breadcrumb sl-breadcrumb">
  <!-- <a class="breadcrumb-item" href="index.html">Starlight</a> -->
  <a class="breadcrumb-item" href="{{url('product')}}">Product</a>
  <span class="breadcrumb-item active">edit</span>
</nav>
@endsection

@section('content')
<div class="card text-white m-auto">
  <div class="card-header bg-success">Edit</div>
    <div class="card-body bg-success">
      <form action="{{route('edit_post',$product->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
          <div class="form-group">
            <!-- <input type="text" name="categories_id" value="{{$product->id}}"> -->
            <input type="text" class="form-control" value="{{$product->product_name}}" id="exampleInputEmail1" name="product_name">
          </div>
          <div class="form-group">
            <label class="text-success" for="exampleInputEmail1">Category Name</label>
            <select class="form-control" name="category_id">
              @foreach($category as $categori)
              @if($product->category_id == $categori->id)
            <option value="{{$categori->id }}">{{Str::title($categori->categories_name) }}</option>
            @endif
              @endforeach

            </select>
          </div>
          <div class="form-group">
            <label class="text-white" for="exampleInputEmail1">Product Price</label>
            <input type="text" class="form-control" value="{{$product->product_price}}" name="product_price">
            @error('product_price')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            <label class="text-white" for="exampleInputEmail1">Product Quantity</label>
            <input type="text" class="form-control" value="{{$product->product_quantity}}" name="product_quantity">
            @error('product_quantity')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            <label class="text-white" for="exampleInputEmail1">Product Short Description</label>
            <input type="text" class="form-control" name="product_short_description" value="{{$product->product_short_description}}" >
            @error('product_short_description')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            <label class="text-white" for="exampleInputEmail1">Product Long Description</label>
            <input type="text" class="form-control" name="product_long_description" value="{{$product->product_long_description}}">
            @error('product_long_description')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            <label class="text-white" for="exampleInputEmail1">Product Alert Quantity</label>
            <input type="text" class="form-control" value="{{$product->product_alart_quamtity}}" name="product_alart_quamtity">
            @error('product_alart_quamtity')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            <label class="text-white" for="exampleInputEmail1">Current Photo</label>
            <img src="{{asset('uplods/products_image/'.$product->product_image)}}" alt="">
            @error('product_alart_quamtity')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            <label class="text-white" for="exampleInputEmail1">New photo</label>
            <input type="file" class="form-control" value="" name="new_photo">
            @error('product_alart_quamtity')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="text-center mt-2">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
      </form>
    </div>
  </div>
@endsection
