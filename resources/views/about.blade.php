@extends('main')


@section('about')
active
@endsection

@section('body')
<!-- .breadcumb-area start -->
<div class="breadcumb-area bg-img-4 ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcumb-wrap text-center">
                    <h2>About us</h2>
                    <ul>
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li><span>About</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- .breadcumb-area end -->
<!-- about-area start -->
<div class="about-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="about-wrap text-center">
                    <h3>Welcome Our Store! </h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi hic amet repellendus assumenda voluptatem iste. In exercitationem aliquam eligendi sint quidem natus eum aliquid laboriosam id adipisci excepturi voluptas, eaque, doloribus corporis ducimus ut suscipit alias ad! Quidem vel sint quasi fugit officiis aliquam, provident suscipit veritatis sunt amet! Rem maxime amet quo laudantium deleniti quia ipsum delectus, nesciunt dignissimos debitis incidunt sed nisi earum cumque assumenda, voluptatibus, laborum harum perspiciatis ut magnam sunt. Facere, recusandae impedit. Nisi iste, officiis?</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci nesciunt alias, commodi mollitia inventore sequi ea eveniet repellat ut eius, et architecto reiciendis sapiente, quas pariatur, soluta quod fugit id quae excepturi doloribus corporis eligendi cumque ipsum! Praesentium cum maxime unde ad repudiandae sed quisquam, numquam iusto, odio voluptatem facere. Saepe, ipsam deleniti, aliquid sequi nihil nisi dolores obcaecati odit eaque repellendus voluptas, minima velit. Quibusdam eos, laboriosam doloremque ut.</p>
                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam doloremque optio accusantium, hic mollitia, quas ex molestiae, explicabo ratione est maiores dignissimos blanditiis quo aut sint id rerum ea laudantium placeat veniam maxime reiciendis. Deserunt rerum, quibusdam, repellendus mollitia deleniti itaque! Porro delectus quod, rem veniam nesciunt expedita distinctio officia optio minus officiis qui voluptatem nostrum explicabo quasi rerum quos repellat inventore quaerat fugit ad cum excepturi harum itaque. Harum, molestias odit dolores quos velit voluptatem dolor architecto corrupti vero.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- about-area end -->
<!-- product-area start -->
<div class="product-area product-area-2">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Best Seller</h2>
                    <img src="assets/images/section-title.png" alt="">
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
@endsection
