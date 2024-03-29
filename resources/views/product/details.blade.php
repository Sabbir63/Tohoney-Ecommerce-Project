@extends('main')

@section('body')
<!-- .breadcumb-area start -->
  <div class="breadcumb-area bg-img-4 ptb-100">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <div class="breadcumb-wrap text-center">
                      <h2>Shop Page</h2>
                      <ul>
                          <li><a href="{{route('To_Honey')}}">Home</a></li>
                          <li><span>{{App\Models\Category::find($product_info->category_id)->categories_name}}</span></li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- .breadcumb-area end -->
  <!-- single-product-area start-->
  <div class="single-product-area ptb-100">
      <div class="container">
          <div class="row">
              <div class="col-lg-6">
                  <div class="product-single-img">
                      <div class="product-active owl-carousel">
                          <div class="item">
                              <img src="{{asset('uplods/products_image')}}/{{$product_info->product_image}}" alt="">
                          </div>
                          @forelse(App\Models\Multiple_photo::where('product_id',$product_info->id)->get() as $thumble_images)
                          <div class="item">
                              <img src="{{asset('uplods/thumble_photo')}}/{{$thumble_images->thumble_image}}" alt="no immage">
                          </div>
                          @empty
                          @endforelse
                      </div>
                      <div class="product-thumbnil-active  owl-carousel">
                        @forelse(App\Models\Multiple_photo::where('product_id',$product_info->id)->get() as $thumble_images)
                        <div class="item">
                            <img src="{{asset('uplods/thumble_photo')}}/{{$thumble_images->thumble_image}}" alt="no immage">
                        </div>
                        @empty
                        @endforelse
                      </div>
                  </div>
              </div>
              <div class="col-lg-6">
                  <div class="product-single-content">
                      <h3>{{$product_info->product_name}}</h3>
                      @if($product_info->product_quantity > 0)
                      <h5 class="badge badge-success">Available Stock : {{$product_info->product_quantity}}</h5>
                      @else
                      <h5 class="badge badge-danger">Available Stock : {{$product_info->product_quantity}}</h5>
                      @endif
                      <div class="rating-wrap fix">
                          <span class="pull-left">${{$product_info->product_price}}</span>
                            @if($data)
                            <ul class="rating pull-right">
                              @for($i=1; $i<=$data; $i++ )
                                  <li><i class="fa fa-star"></i></li>
                              @endfor
                              <li>(0{{App\Models\Clientreview::where('cl_id',$product_info->id)->firstorfail()->cl_rating}} Customar Review)</li>
                            @else
                              <li style="display: flex; color:green; text-align: left; margin-left: 44%;">(Your review count First Customar Review)</li>
                            @endif
                          </ul>

                      </div>
                      <p>{{$product_info->product_short_description}}</p>
                      <form action="{{route('addtocart',$product_info->id)}}" method="post">
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
                    @if(session('quantity_error'))
                      <div class="alert alert-danger">
                            {{session('quantity_error')}}
                      </div>
                  @endif
                      <ul class="cetagory">
                          <li>Categories:</li>
                          <li><a href="#">{{App\Models\Category::find($product_info->category_id)->categories_name}}</a></li>
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
          <div class="row mt-60">
              <div class="col-12">
                  <div class="single-product-menu">
                      <ul class="nav">
                          <li><a class="active" data-toggle="tab" href="#description">Description</a> </li>
                          <li><a data-toggle="tab" href="#tag">Faq</a></li>
                          <li><a data-toggle="tab" href="#review">Review</a></li>
                      </ul>
                  </div>
              </div>
              <div class="col-12">
                  <div class="tab-content">
                      <div class="tab-pane active" id="description">
                          <div class="description-wrap">
                              <p>{{$product_info->product_long_description}}</p>
                          </div>
                      </div>
                      <div class="tab-pane" id="tag">
                          <div class="faq-wrap" id="accordion">
                              <div class="card">
                                  <div class="card-header" id="headingOne">
                                      <h5><button data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">General Inquiries ?</button> </h5>
                                  </div>
                                  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                      <div class="card-body">
                                          Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                      </div>
                                  </div>
                              </div>
                              <div class="card">
                                  <div class="card-header" id="headingTwo">
                                      <h5><button class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">How To Use ?</button></h5>
                                  </div>
                                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                      <div class="card-body">
                                          Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                      </div>
                                  </div>
                              </div>
                              <div class="card">
                                  <div class="card-header" id="headingThree">
                                      <h5><button class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Shipping & Delivery ?</button></h5>
                                  </div>
                                  <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                      <div class="card-body">
                                          Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                      </div>
                                  </div>
                              </div>
                              <div class="card">
                                  <div class="card-header" id="headingfour">
                                      <h5><button class="collapsed" data-toggle="collapse" data-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour">Additional Information ?</button></h5>
                                  </div>
                                  <div id="collapsefour" class="collapse" aria-labelledby="headingfour" data-parent="#accordion">
                                      <div class="card-body">
                                          Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                      </div>
                                  </div>
                              </div>
                              <div class="card">
                                  <div class="card-header" id="headingfive">
                                      <h5><button class="collapsed" data-toggle="collapse" data-target="#collapsefive" aria-expanded="false" aria-controls="collapsefive">Return Policy ?</button></h5>
                                  </div>
                                  <div id="collapsefive" class="collapse" aria-labelledby="headingfive" data-parent="#accordion">
                                      <div class="card-body">
                                          Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="tab-pane" id="review">
                          <div class="review-wrap">
                              <ul>
                                @forelse($clientReviews as $clientReview)

                                  <li class="review-items">
                                      <div class="review-img"  style="width:40%">
                                          <img width="100%" src="{{asset('uplods/products_image')}}/{{App\Models\Product::find($clientReview->cl_id)->product_image}}" alt="">
                                      </div>
                                      <div class="review-content">
                                          <h3><a href="#">{{$clientReview->cl_f_name}} {{$clientReview->cl_l_name}} </a></h3>
                                          <span>{{$clientReview->created_at}} </span>
                                          <p>{{$clientReview->cl_text}} </p>
                                          <ul class="rating">
                                            @for($i = 1; $i<=$clientReview->cl_rating; $i++)
                                            <li><i class="fa fa-star"></i></li>
                                            @endfor
                                          </ul>
                                      </div>
                                  </li>
                                  @empty
                                  Your review count First Customar Review
                                  @endforelse
                              </ul>
                          </div>
                          <div class="add-review">
                              <h4>Add A Review</h4>
                              <div class="ratting-wrap">
                                  <table>
                                      <thead>
                                          <tr>
                                              <th>task</th>
                                              <th>1 Star</th>
                                              <th>2 Star</th>
                                              <th>3 Star</th>
                                              <th>4 Star</th>
                                              <th>5 Star</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          <tr>
                                              <td>How Many Stars?</td>
                                              <td>
                                                  <input type="radio" name="a" />
                                              </td>
                                              <td>
                                                  <input type="radio" name="a" />
                                              </td>
                                              <td>
                                                  <input type="radio" name="a" />
                                              </td>
                                              <td>
                                                  <input type="radio" name="a" />
                                              </td>
                                              <td>
                                                  <input type="radio" name="a" />
                                              </td>
                                          </tr>
                                      </tbody>
                                  </table>
                              </div>
                              <div class="row">
                                  <div class="col-md-6 col-12">
                                      <h4>Name:</h4>
                                      <input type="text" placeholder="Your name here..." />
                                  </div>
                                  <div class="col-md-6 col-12">
                                      <h4>Email:</h4>
                                      <input type="email" placeholder="Your Email here..." />
                                  </div>
                                  <div class="col-12">
                                      <h4>Your Review:</h4>
                                      <textarea name="massage" id="massage" cols="30" rows="10" placeholder="Your review here..."></textarea>
                                  </div>
                                  <div class="col-12">
                                      <button class="btn-style">Submit</button>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- single-product-area end-->
  <!-- featured-product-area start -->
  <div class="featured-product-area">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <div class="section-title text-left">
                      <h2>Related Product</h2>
                  </div>
              </div>
          </div>
          <div class="row">
            @forelse($related_product as $rel_product)
            <div class="col-lg-3 col-sm-6 col-12">
                  <div class="featured-product-wrap">
                      <div class="featured-product-img">
                          <img src="{{asset('uplods/products_image')}}/{{$rel_product->product_image}}" alt="">
                      </div>
                      <div class="featured-product-content">
                          <div class="row">
                              <div class="col-7">
                                  <h3><a href="{{url('product/details')}}/{{$rel_product->id}}">{{$rel_product->product_name}}</a></h3>
                                  <p>${{$rel_product->product_price}}</p>
                              </div>
                              <div class="col-5 text-right">
                                  <ul>
                                      <li><a href="cart.html"><i class="fa fa-shopping-cart"></i></a></li>
                                      <li><a href="cart.html"><i class="fa fa-heart"></i></a></li>
                                  </ul>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
         @empty
         @endforelse
          </div>
      </div>
  </div>
  <!-- featured-product-area end -->

@endsection
