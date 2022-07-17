@extends('main')

@section('body')
<!-- .breadcumb-area start -->
  <div class="breadcumb-area bg-img-4 ptb-100">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <div class="breadcumb-wrap text-center">
                      <h2>Checkout</h2>
                      <ul>
                          <li><a href="index.html">Home</a></li>
                          <li><span>Checkout</span></li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- .breadcumb-area end -->
  @Auth
  @if(Auth::user()->role == 2)
  <!-- checkout-area start -->
  <div class="checkout-area ptb-100">
      <div class="container">
          <div class="row">
              <div class="col-lg-8">
                  <div class="checkout-form form-style">
                      <h3>Billing Details({{Auth::user()->name}})</h3>
                      <form action="{{url('place/order')}}" method="POST">
                        @csrf
                          <div class="row">
                              <div class="col-12">
                                  <p>Name *</p>
                                  <input name="customer_name" type="text" value="{{Auth::user()->name}}">
                              </div>
                              <div class="col-sm-6 col-12">
                                  <p>Email Address *</p>
                                  <input name="customer_email" type="email" value="{{Auth::user()->email}}">
                              </div>
                              <div class="col-sm-6 col-12">
                                  <p>Phone No. *</p>
                                  <input name="customer_phone" type="text">
                              </div>
                              <div class="col-sm-6 col-12">
                                  <p>Country *</p>
                                  <select  id="search" name="customer_country_id">
                                      <option value="">Select One</option>
                                      @foreach($countries as $country)
                                    <option value="{{$country->id}}">{{$country->name}}</option>
                                      @endforeach
                                  </select>
                              </div>
                              <div class="col-sm-6 col-12">
                                  <p>City *</p>
                                  <select id="city_list" name="customer_city_id">
                                      <option value="">Select Your Country</option>
                                  </select>
                              </div>
                              <div class="col-6 pt-3">
                                  <p>Your Address *</p>
                                  <input name="customer_address" type="text">
                              </div>
                              <div class="col-sm-6 col-12 pt-3">
                                  <p>Postcode/ZIP</p>
                                  <input name="customer_postcode" type="number">
                              </div>
                              <div class="col-12">
                                  <p>Order Notes </p>
                                  <textarea name="customer_massage" placeholder="Notes about Your Order, e.g.Special Note for Delivery"></textarea>
                              </div>
                          </div>
                  </div>
              </div>
              <div class="col-lg-4">
                  <div class="order-area">
                      <h3>Your Order</h3>
                      <ul class="total-cost">
                          <li>Subtotal <span class="pull-right"><strong>${{ session('session_subtottal') }}.00</strong></span></li>
                          <li>Discount <span class="pull-right">{{ (session('session_discount_name')) ? session('session_discount_name'):"No Applicable"}}<strong>({{session('session_discount')}}%)</strong></span></li>
                          <li>Total<span class="pull-right">${{ session("session_tottal") }}.00</span></li>
                      </ul>
                      <ul class="payment-method">
                          <li>
                              <input id="card" type="radio" name="customer_payment" checked value="1">
                              <label for="card">Credit Card</label>
                          </li>
                          <li>
                              <input id="delivery" type="radio" name="customer_payment" value="2">
                              <label for="delivery">Cash on Delivery</label>
                          </li>
                      </ul>
                      <button type="submit">Place Order</button>
                    </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- checkout-area end -->
  @else
  <div class="alert alert-danger m-2 text-center p-4">
    You Are Admin, Your Note Allowed!
  </div>
  @endif
    @else
    <div class="checkout-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                   <div class="alart alert-success p-4">
                      You are not logged in
                      <br>
                        <h5>If You Have An Account:</h5><a href="{{url('customer/login')}}">Login Here</a>
                      <br>
                      <h5>To Create A New Account:</h5><a href="{{url('customer/registration')}}">Registration Here</a>

                   </div>
                </div>
            </div>
        </div>
     </div>
  @endAuth
@endsection
@section('footer_scripts')
<script>
// In your Javascript (external .js resource ortag)
$(document).ready(function() {
    $('#search').select2();
    $('#city_list').select2();
    $('#search').change(function(){
      var country_id = $(this).val();
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: 'get/city/list',
            data: {country_id:country_id},
            success: function(data){
              $('#city_list').html(data);
            }
        });
    });
});

</script>
@endsection
