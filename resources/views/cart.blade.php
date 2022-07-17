@extends('main')

@section('body')
<!-- .breadcumb-area start -->
<div class="breadcumb-area bg-img-4 ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcumb-wrap text-center">
                    <h2>Shopping Cart</h2>
                    <ul>
                        <li><a href="{{route('To_Honey')}}">Home</a></li>
                        <li><span>Shopping Cart</span></li>
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
                <form action="{{route('cart_update')}}" method="post">
                  @csrf
                    <table class="table-responsive cart-wrap">
                        <thead>
                            <tr>
                                <th class="images">Image</th>
                                <th class="product">Product</th>
                                <th class="ptice">Price</th>
                                <th class="quantity">Quantity</th>
                                <th class="total">Total</th>
                                <th class="remove">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                          @php
                            $flag = false;
                            $subtottal = 0
                          @endphp
                          @forelse($carts as $cart)
                          <tr>
                              <td class="images">
                                <img src="{{asset('uplods/products_image')}}/{{$cart->relationtoproduct->product_image}}" alt="">
                              </td>
                              <td class="product">
                                {{$cart->relationtoproduct->product_name}}
                                @if($cart->relationtoproduct->product_quantity < $cart->quantity)
                                    <div class="badge badge-danger">
                                        Your Quantity Over In Stocs
                                    </div>
                                    @php
                                      $flag = true;
                                    @endphp
                                @endif
                              </td>
                              <td class="ptice">${{$cart->relationtoproduct->product_price}}</td>
                              <td class="quantity cart-plus-minus">
                                  <input type="text" value="{{$cart->quantity}}" name="quantity[{{$cart->id}}]" />
                              </td>
                              <td class="total">
                                ${{$cart->relationtoproduct->product_price * $cart->quantity}}
                                  @php
                                    $subtottal += $cart->relationtoproduct->product_price * $cart->quantity
                                  @endphp
                              </td>
                              <td class="remove">
                                <a href="{{url('cart/delete')}}/{{$cart->id}}">
                                <i class="fa fa-times"></i>
                              </a>
                              </td>
                          </tr>
                          @empty
                          <tr>
                            <td colspan="100">
                              No Data Availavail
                            </td>
                        </tr>
                          @endforelse
                        </tbody>
                    </table>
                    <div class="row mt-60">
                        <div class="col-xl-4 col-lg-5 col-md-6 ">
                            <div class="cartcupon-wrap">
                                <ul class="d-flex">
                                    <li>
                                        <button type="submit">Update Cart</button>
                                    </li>
                                    <li><a href="{{url('product/shop')}}">Continue Shopping</a></li>
                                </ul>
                                <h3>Cupon</h3>
                                <p>Enter Your Cupon Code if You Have One</p>
                                <div class="cupon-wrap">
                                    <input type="text" value="{{$coupon_name_to_show_value}}" placeholder="Cupon Code" id="coupon_input">
                                    @if(session('Date_expired'))
                                    <span class="text-danger">{{session('Date_expired')}}</span>
                                    @endif
                                    @if(session('Limit'))
                                    <span class="text-danger">{{session('Limit')}}</span>
                                    @endif
                                    @if(session('Invalid'))
                                    <span class="text-danger">{{session('Invalid')}}</span>
                                    @endif
                                    <button type="button" id="coupon_apply">Apply Cupon</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 offset-xl-5 col-lg-4 offset-lg-3 col-md-6">
                            <div class="cart-total text-right">
                                <h3>Cart Totals</h3>
                                <ul>
                                    <li><span class="pull-left">Subtotal </span>${{$subtottal}}.00</li>
                                    <li><span class="pull-left"> Discount(%) </span> {{$discount}}%</li>
                                    <li><span class="pull-left"> Total</span> ${{$subtottal - ($discount/100)*$subtottal}}</li>
                                    @php
                                    session([
                                      'session_subtottal' => $subtottal,
                                      'session_discount' => $discount,
                                      'session_discount_name' => $coupon_name_to_show_value,
                                      'session_tottal' => $subtottal - ($discount/100)*$subtottal,
                                    ]);
                                    @endphp
                                </ul>

                                @if($flag)
                                    <a href="checkout.html">Please Check Limit In Stocs</a>
                                @else
                                <a href="{{route('checkout')}}">Proceed to Checkout</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer_scripts')
<script>
$(document).ready(function () {
  $('#coupon_apply').click(function(){
    var coupon_name = $('#coupon_input').val();
    var link = "{{url('cart')}}/" + coupon_name;
    window.location.href = link;

  })
})
</script>

@endsection
