@extends('Frontend.master')
@section('title') Search Shop @endsection
@section('shop') active @endsection
@section('frontend_content')



@include('Frontend.include.category')
<div class="container">
  <div class="row">
    <div class="col-md-7 m-auto">
      <!--======== Include Success Message =========-->
      @include('include.error')
      @include('include.success')
    </div>
  </div>
</div>



<!-- Product Section Begin -->
<section class="product spad">
  <div class="container">
      <div class="row">
          <div class="col-md-10 m-auto">
              <div class="row">
                  @foreach ($gets as $item)
                  <div class="col-lg-4 col-md-6 col-sm-6">
                      <div class="product__item">
                          <div class="product__item__pic set-bg" data-setbg="{{asset($item->image_one)}}">
                              <ul class="product__item__pic__hover">
                                  <li><a href="{{url('/user/add/wishlist/'.$item->id)}}"><i class="fa fa-heart"></i></a></li>
                                  <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                  <form action="{{url('/user/add/cart/'.$item->id)}}" method="POST">
                                      @csrf
                                      <input type="hidden" name="price" value="{{$item->price}}">
                                      <li><button type="submit" style="border-radius: 60%;background-color:#00a59d;border: none;"><i class="fa fa-shopping-cart"></i></button></li>
                                  </form>
                              </ul>
                          </div>
                          <div class="product__item__text">
                              <h6><a href="#">Crab Pool Security</a></h6>
                              <h5>${{$item->price}}</h5>
                          </div>
                      </div>
                  </div>
                  @endforeach
                  <div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
<!-- Product Section End -->

@endsection