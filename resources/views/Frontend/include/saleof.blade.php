<!--========= Sale Of Section Begin =========-->
<section class="categories">
  <div class="container">
      <div class="row">
        <div class="col-md-12">
            <div class="product__discount">
                <div class="section-title product__discount__title">
                    <h2>Sale Off</h2>
                </div>
                @php
                  $products = App\Models\Product::where('status',1)->where('saleof', '>', 1)->latest()->get();
                @endphp
                <div class="row">
                    <div class="product__discount__slider owl-carousel">
                        @foreach ($products as $item)
                        <div class="col-lg-4">
                          @php
                           $saleofs= $item->price*($item->saleof/100);
                           $finally = $item->price - $saleofs;
                          @endphp
                            <div class="product__discount__item">
                                <div class="product__discount__item__pic set-bg"
                                    data-setbg="{{asset($item->image_one)}}">
                                    <div class="product__discount__percent">{{$item->saleof}}%</div>
                                    <ul class="product__item__pic__hover">
                                        <li><a href="{{url('/user/add/wishlist/'.$item->id)}}"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="{{url('/')}}"><i class="fa fa-retweet"></i></a></li>
                                        <form action="{{url('/user/add/cart/'.$item->id)}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="price" value="{{$item->price}}">
                                            <li><button type="submit" style="border-radius: 60%;background-color:#00a59d;border: none;"><i class="fa fa-shopping-cart"></i></button></li>
                                        </form>
                                    </ul>
                                </div>
                                <div class="product__discount__item__text">
                                    <span>{{$item->pro_code}}</span>
                                <h5><a href="{{url('/')}}">{{$item->pro_name}}</a></h5>
                                    <div class="product__item__price">${{$finally}}<span>${{$item->price}}</span></div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
      </div>
  </div>
</section>
<!--========= Sale Of Section End =========-->