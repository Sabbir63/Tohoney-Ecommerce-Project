@extends('main')
@section('home')
active
@endsection
@section('body')
<!-- slider-area start -->
<div class="slider-area">
    <div class="swiper-container">
        <div class="swiper-wrapper">
          @forelse($banners as $baner)
            <div class="swiper-slide overlay">
                <div class="single-slider slide-inner" style="  background: url( {{asset('uplods/banners')}}/{{$baner->banner_image}} )">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-lg-9 col-12">
                                <div class="slider-content">
                                    <div class="slider-shape">
                                        <h2 data-swiper-parallax="-500">{{$baner->banner_title}}</h2>
                                        <p data-swiper-parallax="-400">{{$baner->banner_description}}</p>
                                        <a href="{{$baner->banner_button_link}}" data-swiper-parallax="-300">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          @empty
          no data Available!
          @endforelse
        </div>
        <div class="swiper-pagination"></div>
    </div>
</div>
<!-- slider-area end -->
<!-- featured-area start -->
<div class="featured-area featured-area2">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="featured-active2 owl-carousel next-prev-style">
                  @forelse($categories as $category)
                    <div class="featured-wrap">
                        <div class="featured-img">
                            <img src="{{asset('uplods/category_image/'.$category->category_image)}}" alt="">
                            <div class="featured-content">
                                  <a href="{{url('category/shop')}}/{{$category->id}}">{{$category->categories_name}}</a>
                            </div>
                        </div>
                    </div>
                    @empty
                      empty
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
<!-- featured-area end -->
<!-- start count-down-section -->
<div class="count-down-area count-down-area-sub">
    <section class="count-down-section section-padding parallax" data-speed="7">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12 text-center">
                    <h2 class="big">Deal Of the Day <span>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin</span></h2>
                </div>
                <div class="col-12 col-lg-12 text-center">
                    <div class="count-down-clock text-center">
                        <div id="clock">
                          @foreach($countdown as $countdowns)
                          {{$countdowns->count_date}}
                          @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
</div>
<!-- end count-down-section -->
<!-- product-area start -->
<div class="product-area product-area-2">
    <div class="fluid-container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Best Seller</h2>
                    <img src="{{asset('tohoneyF')}}/assets/images/1.jpg" alt="">
                </div>
            </div>
        </div>
        <ul class="row">
          @forelse($best_sells as $best_sell)
            <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
                <div class="product-wrap">
                    <div class="product-img">
                        <img src="{{asset('uplods/products_image')}}/{{App\Models\Product::where('id',$best_sell->product_id)->firstorFail()->product_image}}" alt="">
                        <div class="product-icon flex-style">
                          <ul>
                    <li><a  href="{{url('product/details')}}/{{App\Models\Product::where('id',$best_sell->product_id)->firstorFail()->id}}"><i class="fa fa-eye"></i></a></li>
                    <li><a href="{{url('product/wish_list')}}/{{App\Models\Product::where('id',$best_sell->product_id)->firstorFail()->id}}"><i class="fa fa-heart"></i></a></li>
                    <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                </ul>
                        </div>
                    </div>
                    <div class="product-content">
                        <h3><a href="single-product.html">{{App\Models\Product::where('id',$best_sell->product_id)->firstorFail()->product_name}}</a></h3>
                        <p class="pull-left">${{App\Models\Product::where('id',$best_sell->product_id)->firstorFail()->product_price}}

                        </p>
                        <ul class="pull-right d-flex">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star-half-o"></i></li>
                        </ul>
                    </div>
                </div>
              </li>
                @empty
                @endforelse
        </ul>
    </div>
</div>
<!-- product-area end -->
<!-- product-area start -->
<div class="product-area">
    <div class="fluid-container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Our Latest Product</h2>
                    <img src="{{asset('tohoneyF')}}/assets/images/section-title.png" alt="">
                </div>
            </div>
        </div>
        <ul class="row">
          @forelse($products as $product)
            @include('includs_parts/includs')
            @empty
            <tr class="text-danger text-center">
                <td colspan="100"> Data Not Available</td>
            </tr>
            @endforelse

            <li class="col-12 text-center">
                <a class="loadmore-btn" href="javascript:void(0);">Load More</a>
            </li>
        </ul>
    </div>
</div>
<!-- product-area end -->
<!-- testmonial-area start -->
<div class="testmonial-area testmonial-area2 bg-img-2 black-opacity">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="test-title text-center">
                    <h2>What Our client Says</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 offset-md-1 col-12">
                <div class="testmonial-active owl-carousel">
                    <div class="test-items test-items2">
                      @forelse($clients as $client)
                        <div class="test-content">
                            <p>{{$client->client_comment}}</p>
                            <h2>{{$client->client_name}}</h2>
                            <p>{{$client->client_position}}</p>
                        </div>
                        <div class="test-img2">
                            <img style="border-radius:100%" src="{{asset('uplods/customar_image')}}/{{$client->client_image}}" alt="">
                        </div>
                        @empty
                        <div class="col-md-10 offset-md-1 col-12">
                          No Data Available!
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- testmonial-area end -->

@endsection
