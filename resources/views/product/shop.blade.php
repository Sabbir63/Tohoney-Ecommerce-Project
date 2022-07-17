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
                         <li><span>Shop</span></li>
                     </ul>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- .breadcumb-area end -->
 <!-- product-area start -->
 <div class="product-area pt-100">
     <div class="container">
         <div class="row">
             <div class="col-sm-12 col-lg-12">
                 <div class="product-menu">
                     <ul class="nav justify-content-center">
                         <li>
                             <a class="active" data-toggle="tab" href="#all">All product</a>
                         </li>
                         @forelse($category as $categori)
                         <li>
                             <a data-toggle="tab" href="#products_{{$categori->id}}">{{$categori->categories_name}}</a>
                         </li>
                      @empty
                      @endforelse
                     </ul>
                 </div>
             </div>
         </div>
         <div class="tab-content">
             <div class="tab-pane active" id="all">
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
             @forelse($category as $categori)
             <div class="tab-pane" id="products_{{$categori->id}}">
               <ul class="row">
                 @forelse(App\Models\Product::where('category_id',$categori->id)->get() as $product)
                   @include('includs_parts/includs')
                   @empty
                   @endforelse

                   <li class="col-12 text-center">
                       <a class="loadmore-btn" href="javascript:void(0);">Load More</a>
                   </li>
               </ul>
             </div>
          @empty
          @endforelse
             <div class="tab-pane" id="table">
                 <ul class="row">
                     <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
                         <div class="product-wrap">
                             <div class="product-img">
                                 <span>Sale</span>
                                 <img src="assets/images/product/15.jpg" alt="">
                                 <div class="product-icon flex-style">
                                     <ul>
                                         <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                         <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                         <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                                     </ul>
                                 </div>
                             </div>
                             <div class="product-content">
                                 <h3><a href="single-product.html">Pure Nature Product</a></h3>
                                 <p class="pull-left">$125

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
                     <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
                         <div class="product-wrap">
                             <div class="product-img">
                                 <span>New</span>
                                 <img src="assets/images/product/11.jpg" alt="">
                                 <div class="product-icon flex-style">
                                     <ul>
                                         <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                         <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                         <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                                     </ul>
                                 </div>
                             </div>
                             <div class="product-content">
                                 <h3><a href="single-product.html">Pure Nature Product</a></h3>
                                 <p class="pull-left">$125

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
                     <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
                         <div class="product-wrap">
                             <div class="product-img">
                                 <span>Sale</span>
                                 <img src="assets/images/product/14.jpg" alt="">
                                 <div class="product-icon flex-style">
                                     <ul>
                                         <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                         <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                         <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                                     </ul>
                                 </div>
                             </div>
                             <div class="product-content">
                                 <h3><a href="single-product.html">Pure Nature Product</a></h3>
                                 <p class="pull-left">$125

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
                     <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
                         <div class="product-wrap">
                             <div class="product-img">
                                 <span>New</span>
                                 <img src="assets/images/product/12.jpg" alt="">
                                 <div class="product-icon flex-style">
                                     <ul>
                                         <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                         <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                         <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                                     </ul>
                                 </div>
                             </div>
                             <div class="product-content">
                                 <h3><a href="single-product.html">Pure Nature Product</a></h3>
                                 <p class="pull-left">$125

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
                     <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
                         <div class="product-wrap">
                             <div class="product-img">
                                 <span>Sale</span>
                                 <img src="assets/images/product/10.jpg" alt="">
                                 <div class="product-icon flex-style">
                                     <ul>
                                         <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                         <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                         <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                                     </ul>
                                 </div>
                             </div>
                             <div class="product-content">
                                 <h3><a href="single-product.html">Pure Nature Product</a></h3>
                                 <p class="pull-left">$125

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
                     <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
                         <div class="product-wrap">
                             <div class="product-img">
                                 <span>New</span>
                                 <img src="assets/images/product/9.jpg" alt="">
                                 <div class="product-icon flex-style">
                                     <ul>
                                         <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                         <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                         <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                                     </ul>
                                 </div>
                             </div>
                             <div class="product-content">
                                 <h3><a href="single-product.html">Pure Nature Product</a></h3>
                                 <p class="pull-left">$125

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
                     <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
                         <div class="product-wrap">
                             <div class="product-img">
                                 <span>Sale</span>
                                 <img src="assets/images/product/8.jpg" alt="">
                                 <div class="product-icon flex-style">
                                     <ul>
                                         <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                         <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                         <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                                     </ul>
                                 </div>
                             </div>
                             <div class="product-content">
                                 <h3><a href="single-product.html">Pure Nature Product</a></h3>
                                 <p class="pull-left">$125

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
                     <li class="col-xl-3 col-lg-4 col-sm-6 col-12 ">
                         <div class="product-wrap">
                             <div class="product-img">
                                 <span>New</span>
                                 <img src="assets/images/product/7.jpg" alt="">
                                 <div class="product-icon flex-style">
                                     <ul>
                                         <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                         <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                         <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                                     </ul>
                                 </div>
                             </div>
                             <div class="product-content">
                                 <h3><a href="single-product.html">Pure Nature Product</a></h3>
                                 <p class="pull-left">$125

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
                 </ul>
             </div>
             <div class="tab-pane" id="bed">
                 <ul class="row">
                     <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
                         <div class="product-wrap">
                             <div class="product-img">
                                 <span>Sale</span>
                                 <img src="assets/images/product/10.jpg" alt="">
                                 <div class="product-icon flex-style">
                                     <ul>
                                         <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                         <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                         <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                                     </ul>
                                 </div>
                             </div>
                             <div class="product-content">
                                 <h3><a href="single-product.html">Pure Nature Product</a></h3>
                                 <p class="pull-left">$125

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
                     <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
                         <div class="product-wrap">
                             <div class="product-img">
                                 <span>New</span>
                                 <img src="assets/images/product/9.jpg" alt="">
                                 <div class="product-icon flex-style">
                                     <ul>
                                         <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                         <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                         <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                                     </ul>
                                 </div>
                             </div>
                             <div class="product-content">
                                 <h3><a href="single-product.html">Pure Nature Product</a></h3>
                                 <p class="pull-left">$125

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
                     <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
                         <div class="product-wrap">
                             <div class="product-img">
                                 <span>Sale</span>
                                 <img src="assets/images/product/8.jpg" alt="">
                                 <div class="product-icon flex-style">
                                     <ul>
                                         <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                         <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                         <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                                     </ul>
                                 </div>
                             </div>
                             <div class="product-content">
                                 <h3><a href="single-product.html">Pure Nature Product</a></h3>
                                 <p class="pull-left">$125

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
                     <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
                         <div class="product-wrap">
                             <div class="product-img">
                                 <span>New</span>
                                 <img src="assets/images/product/7.jpg" alt="">
                                 <div class="product-icon flex-style">
                                     <ul>
                                         <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                         <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                         <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                                     </ul>
                                 </div>
                             </div>
                             <div class="product-content">
                                 <h3><a href="single-product.html">Pure Nature Product</a></h3>
                                 <p class="pull-left">$125

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
                     <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
                         <div class="product-wrap">
                             <div class="product-img">
                                 <span>New</span>
                                 <img src="assets/images/product/4.jpg" alt="">
                                 <div class="product-icon flex-style">
                                     <ul>
                                         <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                         <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                         <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                                     </ul>
                                 </div>
                             </div>
                             <div class="product-content">
                                 <h3><a href="single-product.html">Pure Nature Product</a></h3>
                                 <p class="pull-left">$125

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
                     <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
                         <div class="product-wrap">
                             <div class="product-img">
                                 <span>Sale</span>
                                 <img src="assets/images/product/6.jpg" alt="">
                                 <div class="product-icon flex-style">
                                     <ul>
                                         <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                         <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                         <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                                     </ul>
                                 </div>
                             </div>
                             <div class="product-content">
                                 <h3><a href="single-product.html">Pure Nature Product</a></h3>
                                 <p class="pull-left">$125

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
                     <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
                         <div class="product-wrap">
                             <div class="product-img">
                                 <span>Sale</span>
                                 <img src="assets/images/product/3.jpg" alt="">
                                 <div class="product-icon flex-style">
                                     <ul>
                                         <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                         <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                         <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                                     </ul>
                                 </div>
                             </div>
                             <div class="product-content">
                                 <h3><a href="single-product.html">Pure Nature Product</a></h3>
                                 <p class="pull-left">$125

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
                     <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
                         <div class="product-wrap">
                             <div class="product-img">
                                 <span>Sale</span>
                                 <img src="assets/images/product/5.jpg" alt="">
                                 <div class="product-icon flex-style">
                                     <ul>
                                         <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                         <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                         <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                                     </ul>
                                 </div>
                             </div>
                             <div class="product-content">
                                 <h3><a href="single-product.html">Pure Nature Product</a></h3>
                                 <p class="pull-left">$125

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
                 </ul>
             </div>
             <div class="tab-pane" id="decorative">
                 <ul class="row">
                     <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
                         <div class="product-wrap">
                             <div class="product-img">
                                 <span>Sale</span>
                                 <img src="assets/images/product/15.jpg" alt="">
                                 <div class="product-icon flex-style">
                                     <ul>
                                         <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                         <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                         <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                                     </ul>
                                 </div>
                             </div>
                             <div class="product-content">
                                 <h3><a href="single-product.html">Pure Nature Product</a></h3>
                                 <p class="pull-left">$125

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
                     <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
                         <div class="product-wrap">
                             <div class="product-img">
                                 <span>New</span>
                                 <img src="assets/images/product/11.jpg" alt="">
                                 <div class="product-icon flex-style">
                                     <ul>
                                         <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                         <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                         <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                                     </ul>
                                 </div>
                             </div>
                             <div class="product-content">
                                 <h3><a href="single-product.html">Pure Nature Product</a></h3>
                                 <p class="pull-left">$125

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
                     <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
                         <div class="product-wrap">
                             <div class="product-img">
                                 <span>Sale</span>
                                 <img src="assets/images/product/14.jpg" alt="">
                                 <div class="product-icon flex-style">
                                     <ul>
                                         <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                         <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                         <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                                     </ul>
                                 </div>
                             </div>
                             <div class="product-content">
                                 <h3><a href="single-product.html">Pure Nature Product</a></h3>
                                 <p class="pull-left">$125

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
                     <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
                         <div class="product-wrap">
                             <div class="product-img">
                                 <span>New</span>
                                 <img src="assets/images/product/12.jpg" alt="">
                                 <div class="product-icon flex-style">
                                     <ul>
                                         <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                         <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                         <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                                     </ul>
                                 </div>
                             </div>
                             <div class="product-content">
                                 <h3><a href="single-product.html">Pure Nature Product</a></h3>
                                 <p class="pull-left">$125

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
                     <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
                         <div class="product-wrap">
                             <div class="product-img">
                                 <span>Sale</span>
                                 <img src="assets/images/product/10.jpg" alt="">
                                 <div class="product-icon flex-style">
                                     <ul>
                                         <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                         <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                         <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                                     </ul>
                                 </div>
                             </div>
                             <div class="product-content">
                                 <h3><a href="single-product.html">Pure Nature Product</a></h3>
                                 <p class="pull-left">$125

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
                     <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
                         <div class="product-wrap">
                             <div class="product-img">
                                 <span>New</span>
                                 <img src="assets/images/product/9.jpg" alt="">
                                 <div class="product-icon flex-style">
                                     <ul>
                                         <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                         <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                         <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                                     </ul>
                                 </div>
                             </div>
                             <div class="product-content">
                                 <h3><a href="single-product.html">Pure Nature Product</a></h3>
                                 <p class="pull-left">$125

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
                     <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
                         <div class="product-wrap">
                             <div class="product-img">
                                 <span>Sale</span>
                                 <img src="assets/images/product/8.jpg" alt="">
                                 <div class="product-icon flex-style">
                                     <ul>
                                         <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                         <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                         <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                                     </ul>
                                 </div>
                             </div>
                             <div class="product-content">
                                 <h3><a href="single-product.html">Pure Nature Product</a></h3>
                                 <p class="pull-left">$125

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
                     <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
                         <div class="product-wrap">
                             <div class="product-img">
                                 <span>New</span>
                                 <img src="assets/images/product/7.jpg" alt="">
                                 <div class="product-icon flex-style">
                                     <ul>
                                         <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                         <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                         <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                                     </ul>
                                 </div>
                             </div>
                             <div class="product-content">
                                 <h3><a href="single-product.html">Pure Nature Product</a></h3>
                                 <p class="pull-left">$125

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
                     <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
                         <div class="product-wrap">
                             <div class="product-img">
                                 <span>New</span>
                                 <img src="assets/images/product/4.jpg" alt="">
                                 <div class="product-icon flex-style">
                                     <ul>
                                         <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                         <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                         <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                                     </ul>
                                 </div>
                             </div>
                             <div class="product-content">
                                 <h3><a href="single-product.html">Pure Nature Product</a></h3>
                                 <p class="pull-left">$125

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
                     <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
                         <div class="product-wrap">
                             <div class="product-img">
                                 <span>Sale</span>
                                 <img src="assets/images/product/6.jpg" alt="">
                                 <div class="product-icon flex-style">
                                     <ul>
                                         <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                         <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                         <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                                     </ul>
                                 </div>
                             </div>
                             <div class="product-content">
                                 <h3><a href="single-product.html">Pure Nature Product</a></h3>
                                 <p class="pull-left">$125

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
                 </ul>
             </div>
         </div>
     </div>
 </div>
 <!-- product-area end -->
@endsection
