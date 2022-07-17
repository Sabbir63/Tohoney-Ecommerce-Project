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
 <div class="container">
<div class="mt-5">
  <ul class="row">
    @forelse($product_shop_list as $product)
      @include('includs_parts/includs')
      @empty
      @endforelse

      <li class="col-12 text-center">
          <a class="loadmore-btn mb-2" href="javascript:void(0);">Load More</a>
      </li>
  </ul>
</div>
 </div>
 @endsection
