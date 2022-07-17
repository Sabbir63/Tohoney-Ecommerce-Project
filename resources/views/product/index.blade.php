@extends('layouts.dashboard_sidebar')

@section('content')
@section('product')
  active
@endsection
@section('breadcrumb')
<nav class="breadcrumb sl-breadcrumb">
  <!-- <a class="breadcrumb-item" href="index.html">Starlight</a> -->
  <a class="breadcrumb-item" href="{{route('home')}}">Dashboard</a>
  <span class="breadcrumb-item active">Category</span>
</nav>
@endsection
  <div class="row">
    <div class="col-9">
      <div class="card text-white">
        <div class="card-header bg-success">
        <div class="row">
          <div class="col-6">
            Product
          </div>
          <div class="col-6">
          <div class="text-right">
            <a class="btn mr-2 btn-primary" href="{{url('product/resyclebin')}}">resyclebin</a>

          </div>
          </div>
        </div>
        </div>
          <div class="card-body">
            @if(session('Product_post_status'))
            <div class="alert alert-success">
              {{session('Product_post_status')}}
            </div>
            @endif
            @if(session('all_restore'))
            <div class="alert alert-success">
              {{session('all_restore')}}
            </div>
            @endif
            @if(session('restore'))
            <div class="alert alert-success">
              {{session('restore')}}
            </div>
            @endif
            @if(session('edit_post_status'))
              <div class="alert alert-danger">
                {{session('edit_post_status')}}
              </div>
                @endif
            @if(session('product_delete'))
              <div class="alert alert-danger">
                {{session('product_delete')}}
              </div>
                @endif
            @if(session('permanent_delete'))
              <div class="alert alert-danger">
                {{session('permanent_delete')}}
              </div>
                @endif
            <table class="table table-bordered">

                <thead>
                    <tr>
                        <th>Mark?</th>
                        <th>SR No</th>
                        <th>Category Name</th>
                        <th>AddedBy</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Product Quantity</th>
                        <th>Product Short Description</th>
                        <th>Product Long Description</th>
                        <th>Product Image</th>
                        <th>Product Alart Quantity</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                  @forelse($product as $products)
                  <tr>

                    <td>
                      <input type="checkbox" name="" value="">
                    </td>
                    <td>
                      {{$loop->index + 1}}
                    </td>
                    <td>
                    {{App\Models\Category::find($products->category_id)->categories_name}}
                    </td>
                    <td>
                      {{App\Models\User::find($products->user_id)->name}}
                    </td>
                    <td>
                      {{$products->product_name}}
                    </td>
                    <td>
                      {{$products->product_price}}
                    </td>
                    <td>
                      {{$products->product_quantity}}
                    </td>
                    <td>
                      {{Str::limit($products->product_short_description,15)}}
                    </td>
                    <td>
                      {{Str::limit($products->product_long_description,20)}}
                    </td>
                    <td>
                      <img width="50px" height="50px" src="{{asset('uplods/products_image')}}/{{$products->product_image}}" alt="No Image">
                    </td>
                    <td>
                      {{$products->product_alart_quamtity}}
                    </td>
                    <td>
                      <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{url('product/edit')}}/{{$products->id}}" type="button" class="btn btn-sm text-white btn-success">Edit</a>
                        <a href="{{url('product/delete')}}/{{$products->id}}" type="button" class="btn btn-sm text-white btn-danger">Delete</a>
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
    <div class="col-3">
      <div class="card text-white">
        <div class="card-header bg-success">Add Your Product</div>
          <div class="card-body">
            @if(session('category_status'))
            <div class="alert alert-success">
              {{session('category_status')}}
            </div>
            @endif
            <form action="{{ route('Product_post') }}" method="POST" enctype="multipart/form-data">
              @csrf
                <div class="form-group">
                  <label class="text-success" for="exampleInputEmail1">Category Name</label>
                  <select class="form-control" name="category_id">
                    <option value="">Choce Category</option>
                      @foreach($category as $categori)
                    <option value="{{$categori->id }}">{{$categori->categories_name }}</option>
                      @endforeach
                  </select>
                  @error('product_name')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label class="text-success" for="exampleInputEmail1">Subcategory Name</label>
                  <select class="form-control" name="subcategory_id">
                    <option value="">Choce subcategory</option>
                      @foreach($subcategory as $subcategores)
                      <option value="{{$subcategores->id}}">  {{$subcategores->subcategory_name}}</option>

                      @endforeach
                  </select>
                  @error('product_name')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label class="text-success" for="exampleInputEmail1">Product Name</label>
                  <input type="text" class="form-control" placeholder="Please Input Product Name" name="product_name" value="{{ old('product_name') }}">
                  @error('product_name')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label class="text-success" for="exampleInputEmail1">Product Price</label>
                  <input type="text" class="form-control" placeholder="Please Input Product Price" name="product_price" value="{{ old('product_price') }}">
                  @error('product_price')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label class="text-success" for="exampleInputEmail1">Product Quantity</label>
                  <input type="text" class="form-control" placeholder="Please Input Product Quantity" name="product_quantity">
                  @error('product_quantity')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label class="text-success" for="exampleInputEmail1">Product Short Description</label>
                  <textarea name="product_short_description" rows="2" cols="32" ></textarea>
                  @error('product_short_description')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label class="text-success" for="exampleInputEmail1">Product Long Description</label>
                  <textarea name="product_long_description" rows="2" cols="32" ></textarea>
                  @error('product_long_description')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label class="text-success" for="exampleInputEmail1">Product Alert Quantity</label>
                  <input type="text" class="form-control" placeholder="Please Input Product Alert Quantity" name="product_alart_quamtity">
                  @error('product_alart_quamtity')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label class="text-success" for="exampleInputEmail1">Product Image</label>
                  <input type="file" class="form-control" placeholder="Please Input Product Alert Quantity" name="product_image">
                  @error('product_alart_quamtity')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label class="text-success" for="exampleInputEmail1">Product Multiple Image</label>
                  <input type="file" class="form-control" name="thumble_image[]" multiple>
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
    </div>
  </div>
@endsection
