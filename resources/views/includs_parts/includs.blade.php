<li class="col-xl-3 col-lg-4 col-sm-6 col-12">
    <div class="product-wrap">
        <div class="product-img">
            <span>Sale</span>
            <img src="{{asset('uplods/products_image')}}/{{$product->product_image}}" alt="">
            <div class="product-icon flex-style">
                <ul>
                    <li><a  href="{{url('product/details')}}/{{$product->id}}"><i class="fa fa-eye"></i></a></li>
                    <li>
                      <a href="{{route('wishlist',$product->id)}}"><i class="fa fa-heart"></i></a>
                    </li>
                    <!-- <li id="wish"><a href="#"><i class="fa fa-heart"></i></a></li> -->
                    <!-- <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li> -->
                </ul>
            </div>
        </div>
        <div class="product-content">
            <h3><a href="{{url('product/details')}}/{{$product->id}}">{{$product->product_name}}</a></h3>
            <p class="pull-left">${{$product->product_price}}</p>
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

@section('footer_scripts')
<script>
// $(document).ready(function () {
//   $('#wish').click(function(){
//     var product_id = $(this).val();
//
//     alert(product_id);
//
//   })
// })
</script>

@endsection
