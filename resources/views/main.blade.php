<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Tohoney - Home Page</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/favicon.png">
    <!-- Place favicon.ico in the root directory -->
    <!-- all css here -->
    <!-- bootstrap v4.0.0-beta.2 css -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('tohoneyF/assets/css/bootstrap.min.css')}}">
    <!-- owl.carousel.2.0.0-beta.2.4 css -->
    <link rel="stylesheet" href="{{asset('tohoneyF/assets/css/owl.carousel.min.css')}}">
    <!-- font-awesome v4.6.3 css -->
    <link rel="stylesheet" href="{{asset('tohoneyF/assets/css/font-awesome.min.css')}}">
    <!-- flaticon.css -->
    <link rel="stylesheet" href="{{asset('tohoneyF/assets/css/flaticon.css')}}">
    <!-- jquery-ui.css -->
    <link rel="stylesheet" href="{{asset('tohoneyF/assets/css/jquery-ui.css')}}">
    <!-- metisMenu.min.css -->
    <link rel="stylesheet" href="{{asset('tohoneyF/assets/css/metisMenu.min.css')}}">
    <!-- swiper.min.css -->
    <link rel="stylesheet" href="{{asset('tohoneyF/assets/css/swiper.min.css')}}">
    <!-- style css -->
    <link rel="stylesheet" href="{{asset('tohoneyF/assets/css/styles.css')}}">
    <!-- responsive css -->
    <link rel="stylesheet" href="{{asset('tohoneyF/assets/css/responsive.css')}}">
    <!-- Selec2 Plugin -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- modernizr css -->
    <script src="{{asset('tohoneyF/assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>
</head>

<body>
    <!--Start Preloader-->
<!--
    <div class="preloader-wrap">
        <div class="spinner"></div>
    </div>
     search-form here
    <div class="search-area flex-style">
        <span class="closebar">Close</span>
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 col-12">
                    <div class="search-form">
                        <form action="#">
                            <input type="text" placeholder="Search Here...">
                            <button><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
-->
    <!-- search-form here -->
    <!-- header-area start -->
    @if(session('Transaction'))
      <div class="alert alert-danger">
        {{session('Transaction')}}
      </div>
        @endif
    <header class="header-area">
        <div class="header-top bg-2">
            <div class="fluid-container">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <ul class="d-flex header-contact">
                          @if(isset(App\Models\setting::where('setting_name','phone')->first()->setting_value))
                            <li><i class="fa fa-phone"></i>
                              {{App\Models\setting::where('setting_name','phone')->first()->setting_value}}
                             </li>
                             @endif
                             @if(isset(App\Models\setting::where('setting_name','email')->first()->setting_value))
                            <li><i class="fa fa-envelope"></i>
                              {{App\Models\setting::where('setting_name','email')->first()->setting_value}}
                            </li>
                            @endif
                        </ul>
                    </div>
                    <div class="col-md-6 col-12">
                        <ul class="d-flex account_login-area">
                            @auth
                            <li>
                                <a href="javascript:void(0);">
                                  <i class="fa fa-user"></i> {{Auth::user()->name}}<i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown_style">
                                    <li><a href="login.html">Login</a></li>
                                    <li><a href="{{route('home')}}">Your Dashboard</a></li>
                                    <li><a href="cart.html">Cart</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                    <li><a href="wishlist.html">wishlist</a></li>
                                </ul>
                            </li>
                            @else
                            <li><a href="{{ route('customer_login') }}"> Login/Register </a></li>
                            @endauth
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom">
            <div class="fluid-container">
                <div class="row">
                    <div class="col-lg-3 col-md-7 col-sm-6 col-6">
                        <div class="logo">
                            <a href="{{route('To_Honey')}}">
                        <img src="{{asset('tohoneyF/assets/images/logo.png')}}" alt="">
                        </a>
                        </div>
                    </div>
                    <div class="col-lg-7 d-none d-lg-block">
                        <nav class="mainmenu">
                            <ul class="d-flex">
                                <li class="@yield('home')"><a href="{{route('To_Honey')}}">Home</a></li>
                                <li class="@yield('about')"><a href="{{route('about')}}">About</a></li>
                                <li class="@yield('shop')">
                                    <a href="{{route('Product_shop')}}">Shop</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">Pages <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown_style">
                                        <li><a href="about.html">About Page</a></li>
                                        <li><a href="single-product.html">Product Details</a></li>
                                        <li><a href="cart.html">Shopping cart</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                        <li><a href="wishlist.html">Wishlist</a></li>
                                        <li><a href="faq.html">FAQ</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">Blog <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown_style">
                                        <li><a href="{{route('blog')}}">blog Page</a></li>
                                        <li><a href="blog-details.html">blog Details</a></li>
                                    </ul>
                                </li>
                                <li class="@yield('contuct')"><a href="{{route('product_contact')}}">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-md-4 col-lg-2 col-sm-5 col-4">
                        <ul class="search-cart-wrapper d-flex">
                            <li class="search-tigger"><a href="javascript:void(0);"><i class="flaticon-search"></i></a></li>
                            <li>
                                <a href="javascript:void(0);"><i class="flaticon-like"></i> <span>{{App\Models\Wishlist::count()}}</span></a>
                                <ul class="cart-wrap dropdown_style">
                                  @php
                                  $wishlists = App\Models\Wishlist::where('user_ip',request()->ip())->get();
                                    $subtotal = 0;
                                  @endphp
                                  @forelse($wishlists as $wishlist)
                                    <li class="cart-items">
                                        <div class="cart-img">
                                            <img width="100" src="{{asset('uplods/products_image')}}/{{App\Models\Product::find($wishlist->product_id)->product_image}}" alt="">
                                        </div>
                                        <div class="cart-content">
                                            <a href="{{route('product_details',App\Models\Product::find($wishlist->product_id)->id)}}">{{App\Models\Product::find($wishlist->product_id)->product_name}}</a>
                                            <span>QTY : {{$wishlist->quantity}}</span>
                                            <p>${{number_format($wishlist->quantity*App\Models\Product::find($wishlist->product_id)->product_price,2)}}</p>
                                            <a href="{{route('wishlist_delete',$wishlist->id)}}">
                                            <i class="fa fa-times"></i>
                                            </a>
                                            @php
                                            $subtotal += App\Models\Product::find($wishlist->product_id)->product_price*$wishlist->quantity;
                                            @endphp
                                        </div>
                                    </li>
                                    @empty
                                    Your Wishlist Empty!
                                    @endforelse
                                    <li>Subtotol: <span class="pull-right">${{number_format($subtotal,2)}}</span></li>
                                </ul>

                            </li>
                            <li>
                                <a href="javascript:void(0);"><i class="flaticon-shop"></i> <span>{{App\Models\Addtocart::where('user_ip',request()->ip())->get()->count()}}</span></a>
                                <ul class="cart-wrap dropdown_style">
                                  @php
                                    $addtocarts = App\Models\Addtocart::where('user_ip',request()->ip())->get();
                                    $subtotal = 0;
                                  @endphp
                                  @foreach($addtocarts as $addtocart)
                                  <li class="cart-items">
                                      <div class="cart-img">
                                          <img width="100" src="{{asset('uplods/products_image')}}/{{App\Models\Product::find($addtocart->product_id)->product_image}}" alt="No Img">
                                      </div>
                                      <div class="cart-content">
                                          <a href="cart.html">{{App\Models\Product::find($addtocart->product_id)->product_name}}</a>
                                          <span>QTY : {{$addtocart->quantity}}</span>
                                          <p>${{App\Models\Product::find($addtocart->product_id)->product_price*$addtocart->quantity}}</p>
                                            @php
                                              $subtotal += App\Models\Product::find($addtocart->product_id)->product_price*$addtocart->quantity;
                                            @endphp
                                        <a href="{{url('cart/delete')}}/{{$addtocart->id}}">
                                              <i class="fa fa-times"></i>
                                        </a>
                                      </div>
                                  </li>
                                  @endforeach
                                    <li>Subtotal: <span class="pull-right">${{$subtotal}}</span></li>
                                    <li>
                                        <a href="{{url('cart')}}">
                                          <button type="button">Go To Cart</button>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-1 col-sm-1 col-2 d-block d-lg-none">
                        <div class="responsive-menu-tigger">
                            <a href="javascript:void(0);">
                        <span class="first"></span>
                        <span class="second"></span>
                        <span class="third"></span>
                        </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- responsive-menu area start -->
            <div class="responsive-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-12 d-block d-lg-none">
                            <ul class="metismenu">
                                <li><a href="index.html">Home</a></li>
                                <li><a href="about.html">About</a></li>
                                <li class="sidemenu-items">
                                    <a class="has-arrow" aria-expanded="false" href="javascript:void(0);">Shop </a>
                                    <ul aria-expanded="false">
                                        <li><a href="shop.html">Shop Page</a></li>
                                        <li><a href="single-product.html">Product Details</a></li>
                                        <li><a href="cart.html">Shopping cart</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                        <li><a href="wishlist.html">Wishlist</a></li>
                                    </ul>
                                </li>
                                <li class="sidemenu-items">
                                    <a class="has-arrow" aria-expanded="false" href="javascript:void(0);">Pages </a>
                                    <ul aria-expanded="false">
                                      <li><a href="about.html">About Page</a></li>
                                      <li><a href="single-product.html">Product Details</a></li>
                                      <li><a href="cart.html">Shopping cart</a></li>
                                      <li><a href="checkout.html">Checkout</a></li>
                                      <li><a href="wishlist.html">Wishlist</a></li>
                                      <li><a href="faq.html">FAQ</a></li>
                                    </ul>
                                </li>
                                <li class="sidemenu-items">
                                    <a class="has-arrow" aria-expanded="false" href="javascript:void(0);">Blog</a>
                                    <ul aria-expanded="false">
                                        <li><a href="blog.html">Blog</a></li>
                                        <li><a href="blog-details.html">Blog Details</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- responsive-menu area start -->
        </div>
    </header>


@yield('body')

<!-- start social-newsletter-section -->
   <section class="social-newsletter-section">
       <div class="container">
           <div class="row">
               <div class="col-lg-12">
                   <div class="newsletter text-center">
                       <h3>Subscribe  Newsletter</h3>
                       <div class="newsletter-form">
                           <form>
                               <input type="text" class="form-control" placeholder="Enter Your Email Address...">
                               <button type="submit"><i class="fa fa-send"></i></button>
                           </form>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       <!-- end container -->
   </section>
   <!-- end social-newsletter-section -->
   <!-- .footer-area start -->
   <div class="footer-area">
       <div class="footer-top">
           <div class="container">
               <div class="footer-top-item">
                   <div class="row">
                       <div class="col-lg-12 col-12">
                           <div class="footer-top-text text-center">
                               <ul>
                                   <li><a href="home.html">home</a></li>
                                   <li><a href="#">our story</a></li>
                                   <li><a href="#">feed shop</a></li>
                                   <li><a href="blog.html">how to eat blog</a></li>
                                   <li><a href="contact.html">contact</a></li>
                               </ul>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       <div class="footer-bottom">
           <div class="container">
               <div class="row">
                   <div class="col-lg-2 col-md-3 col-sm-12">
                       <div class="footer-icon">
                           <ul class="d-flex">
                               <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                               <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                               <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                               <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                           </ul>
                       </div>
                   </div>
                   <div class="col-lg-4 col-md-8 col-sm-12">
                       <div class="footer-content">
                           <p>{{App\Models\Setting::where('setting_name','setting_descript')->first()->setting_value}}</p>
                       </div>
                   </div>
                   <div class="col-lg-3 col-md-8 col-sm-12">
                       <div class="footer-adress">
                           <ul>
                               <li><a href="#"><span>Email:</span>{{App\Models\Setting::where('setting_name','email')->first()->setting_value}}</a></li>
                               <li><a href="#"><span>Tel:</span>{{App\Models\Setting::where('setting_name','phone')->first()->setting_value}}</a></li>
                               <li><a href="#"><span>Adress:</span>{{App\Models\Setting::where('setting_name','setting_address')->first()->setting_value}}</a></li>
                           </ul>
                       </div>
                   </div>
                   <div class="col-lg-3 col-md-4 col-sm-12">
                       <div class="footer-reserved">
                           <ul>
                               <li>Copyright © {{Carbon\Carbon::now()->format('Y-M-d')}} Tohoney All rights reserved.</li>
                           </ul>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
   <!-- .footer-area end -->
   <!-- Modal area start -->
   <div class="modal fade" id="exampleModalCenter" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
              <div class="modal-body d-flex">
                  <div class="product-single-img w-50">
                      <img src="assets/images/product/product-details.jpg" alt="">
                  </div>
                  <div class="product-single-content w-50">

                      <h3>Pure Nature Hohey</h3>
                      <div class="rating-wrap fix">
                          <span class="pull-left">$219.56</span>
                          <ul class="rating pull-right">
                              <li><i class="fa fa-star"></i></li>
                              <li><i class="fa fa-star"></i></li>
                              <li><i class="fa fa-star"></i></li>
                              <li><i class="fa fa-star"></i></li>
                              <li><i class="fa fa-star"></i></li>
                              <li>(05 Customar Review)</li>
                          </ul>
                      </div>
                      <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire denounce with righteous indignation</p>
                      <ul class="input-style">
                          <li class="quantity cart-plus-minus">
                              <input type="text" value="1" />
                          </li>
                          <li><a href="cart.html">Add to Cart</a></li>
                      </ul>
                      <ul class="cetagory">
                          <li>Categories:</li>
                          <li><a href="#">Honey,</a></li>
                          <li><a href="#">Olive Oil</a></li>
                      </ul>
                      <ul class="socil-icon">
                          <li>Share :</li>
                          <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                          <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                          <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                          <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                          <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
  </div>
   <!-- Modal area start -->

<!-- jquery latest version -->
 <script src="{{asset('tohoneyF/assets/js/vendor/jquery-2.2.4.min.js')}}"></script>
 <!-- bootstrap js -->
 <script src="{{asset('tohoneyF/assets/js/bootstrap.min.js')}}"></script>
 <!-- owl.carousel.2.0.0-beta.2.4 css -->
 <script src="{{asset('tohoneyF/assets/js/owl.carousel.min.js')}}"></script>
 <!-- scrollup.js -->
 <script src="{{asset('tohoneyF/assets/js/scrollup.js')}}"></script>
 <!-- isotope.pkgd.min.js -->
 <script src="{{asset('tohoneyF/assets/js/isotope.pkgd.min.js')}}"></script>
 <!-- imagesloaded.pkgd.min.js -->
 <script src="{{asset('tohoneyF/assets/js/imagesloaded.pkgd.min.js')}}"></script>
 <!-- jquery.zoom.min.js -->
 <script src="{{asset('tohoneyF/assets/js/jquery.zoom.min.js')}}"></script>
 <!-- countdown.js -->
 <script src="{{asset('tohoneyF/assets/js/countdown.js')}}"></script>
 <!-- swiper.min.js -->
 <script src="{{asset('tohoneyF/assets/js/swiper.min.js')}}"></script>
 <!-- metisMenu.min.js -->
 <script src="{{asset('tohoneyF/assets/js/metisMenu.min.js')}}"></script>
 <!-- mailchimp.js -->
 <script src="{{asset('tohoneyF/assets/js/mailchimp.js')}}"></script>
 <!-- jquery-ui.min.js -->
 <script src="{{asset('tohoneyF/assets/js/jquery-ui.min.js')}}"></script>
 <!-- main js -->
 <script src="{{asset('tohoneyF/assets/js/script.js')}}"></script>
 <!-- select2 plugin -->
 <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
 @yield('footer_scripts')
</body>


<!-- Mirrored from themepresss.com/tf/html/tohoney/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 13 Mar 2020 03:33:34 GMT -->
</html>
