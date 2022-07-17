@extends('main')
@section('body')
<!-- .breadcumb-area start -->
<div class="breadcumb-area bg-img-4 ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcumb-wrap text-center">
                    <h2>Wishlist</h2>
                    <ul>
                        <li><a href="{{route('To_Honey')}}">Home</a></li>
                        <li><span>Wishlist</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- .breadcumb-area end -->
<!-- cart-area start -->
<div class="cart-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                    <table class="table-responsive cart-wrap">
                        <thead>
                            <tr>
                                <th class="images">Image</th>
                                <th class="product">Product</th>
                                <th class="ptice">Price</th>
                                <th class="stock">Stock Stutus </th>
                                <th class="addcart">Add to Cart</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="images"><img src="{{asset('uplods/products_image')}}/{{$product_wish_list->product_image}}" alt=""></td>
                                <td class="product"><a href="single-product.html">{{$product_wish_list->product_name}}</a></td>
                                <td class="ptice">{{$product_wish_list->product_price}}</td>
                                <td class="stock">
                                    @if($product_wish_list->product_quantity > 0)In Stock @else Not Now @endif
                                </td>
                                <td class="addcart">
                                  <form action="{{route('addtocart',$product_wish_list->id)}}" method="POST">
                                    @csrf
                                  <ul class="input-style">
                                      <li class="quantity cart-plus-minus">
                                          <input type="text" value="1" name="quantity" />
                                      </li>
                                      <li>
                                        <button class="submit addtocart">Add to Cart</button>
                                      </li>
                                  </ul>
                                </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>

            </div>
        </div>
    </div>
</div>
<!-- cart-area end -->
@endsection
