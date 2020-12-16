@extends('Frontend.master')
@section('title') Home @endsection
@section('home') active @endsection
@section('frontend_content')
  @include('Frontend.include.hero')
      
<!--========= Categories Section Begin =========-->
<section class="categories">
  <div class="container">
      <div class="row">

        <div class="col-md-12">
            <div class="product__discount">
                <div class="section-title product__discount__title">
                    <h2>Sale Off</h2>
                </div>
                <div class="row">
                    <div class="product__discount__slider owl-carousel">
                        @foreach ($products as $item)
                        <div class="col-lg-4">
                            <div class="product__discount__item">
                                <div class="product__discount__item__pic set-bg"
                                    data-setbg="{{asset($item->image_one)}}">
                                    <div class="product__discount__percent">-20%</div>
                                    <ul class="product__item__pic__hover">
                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                        <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__discount__item__text">
                                    <span>{{$item->pro_code}}</span>
                                <h5><a href="#">{{$item->pro_name}}</a></h5>
                                    <div class="product__item__price">${{$item->price}} <span>$36.00</span></div>
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
<!--========= Categories Section End =========-->

<!--========= Featured Section Begin =========-->
<section class="featured spad">
  <div class="container">
      <div class="row">
          <div class="col-lg-12">
              <div class="section-title">
                  <h2>Featured Product</h2>
              </div>
              <div class="featured__controls">
                  <ul>
                      <li class="active" data-filter="*">All</li>
                      @foreach ($categoris as $categori)
                       <li data-filter=".filter{{$categori->id}}">{{$categori->cat_name}}</li>
                      @endforeach
                  </ul>
              </div>
          </div>
      </div>
      <div class="row featured__filter">
          @foreach ($categoris as $cat)
          @php
           $productss = App\Models\Product::where('category_id',$cat->id)->latest()->get();
          @endphp
          @foreach ($productss as $item)
          <div class="col-lg-3 col-md-4 col-sm-6 mix oranges filter{{$cat->id}}">
              <div class="featured__item">
                 <div class="featured__item__pic set-bg" data-setbg="{{asset($item->image_one)}}">
                      <ul class="featured__item__pic__hover">
                          <li><a href="{{url('/user/add/wishlist/'.$item->id)}}"><i class="fa fa-heart"></i></a></li>
                          <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                          <form action="{{url('/user/add/cart/'.$item->id)}}" method="POST">
                              @csrf
                              <input type="hidden" name="price" value="{{$item->price}}">
                              <li><button type="submit" style="border-radius: 60%;background-color:#00a59d;border: none;"><i class="fa fa-shopping-cart"></i></button></li>
                          </form>
                      
                      </ul>
                  </div>
                  <div class="featured__item__text">
                  <h6><a href="{{url('/product/details/'.$item->id)}}">{{$item->pro_name}}</a></h6>
                      <h5>{{$item->price}}</h5>
                  </div>
              </div>
          </div>
          @endforeach
          @endforeach
      </div>
  </div>
</section>
<!--========= Featured Section End =========-->

<!--========= Blog Section Begin =========-->
<section class="from-blog spad">
  <div class="container">
      <div class="row">
          <div class="col-lg-12">
              <div class="section-title from-blog__title">
                  <h2>From The Blog</h2>
              </div>
          </div>
      </div>
      <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-6">
              <div class="blog__item">
                  <div class="blog__item__pic">
                      <img src="{{asset('frontend')}}/img/blog/blog-1.jpg" alt="">
                  </div>
                  <div class="blog__item__text">
                      <ul>
                          <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                          <li><i class="fa fa-comment-o"></i> 5</li>
                      </ul>
                      <h5><a href="#">Cooking tips make cooking simple</a></h5>
                      <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                  </div>
              </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-6">
              <div class="blog__item">
                  <div class="blog__item__pic">
                      <img src="{{asset('frontend')}}/img/blog/blog-2.jpg" alt="">
                  </div>
                  <div class="blog__item__text">
                      <ul>
                          <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                          <li><i class="fa fa-comment-o"></i> 5</li>
                      </ul>
                      <h5><a href="#">6 ways to prepare breakfast for 30</a></h5>
                      <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                  </div>
              </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-6">
              <div class="blog__item">
                  <div class="blog__item__pic">
                      <img src="{{asset('frontend')}}/img/blog/blog-3.jpg" alt="">
                  </div>
                  <div class="blog__item__text">
                      <ul>
                          <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                          <li><i class="fa fa-comment-o"></i> 5</li>
                      </ul>
                      <h5><a href="#">Visit the clean farm in the US</a></h5>
                      <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
<!--========= Blog Section End =========-->
@endsection
