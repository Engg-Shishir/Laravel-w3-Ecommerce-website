@extends('Frontend.master')
@section('title') Shop @endsection
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
            @include('Frontend.include.shop_sidebar')

            <div class="col-lg-9 col-md-7">
                <!--========= Sale Of Section Begin =========-->
                @include('Frontend.include.saleof')
                <div class="row">
                    @foreach ($productsp as $item)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{asset($item->image_one)}}">
                                <ul class="product__item__pic__hover">
                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="#">{{$item->pro_name}}</a></h6>
                                <h5>${{$item->price}}</h5>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div>
                    {{--To Solve Pagination Problem follow : https://stackoverflow.com/questions/64186820/visual-issue-with-laravel-8-pagination-link-method--}}
                      {{$productsp->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Section End -->


@endsection