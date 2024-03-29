@extends('Frontend.master')
@section('title') Product Details @endsection
@section('shop') active @endsection
@section('frontend_content')
@include('Frontend.include.category')
      

  <!-- Product Details Section Begin -->
  <section class="product-details spad">
      <div class="container">
          <div class="row">
              <div class="col-md-8 m-auto">
                    <!--======== Include Success Message =========-->
                    @include('include.error')
                    @include('include.success')
              </div>
          </div>
          <div class="row">
              <div class="col-lg-6 col-md-6">
                  <div class="product__details__pic">
                      <div class="product__details__pic__item">
                          <img class="product__details__pic__item--large"
                              src="{{asset($product->image_one)}}" alt="">
                      </div>
                      <div class="product__details__pic__slider owl-carousel">
                      <img data-imgbigurl="{{asset($product->image_one)}}"
                              src="{{asset($product->image_one)}}" alt="">
                          <img data-imgbigurl="{{asset($product->image_two)}}"
                              src="{{asset($product->image_two)}}" alt="">
                          <img data-imgbigurl="{{asset($product->image_three)}}"
                              src="{{asset($product->image_three)}}" alt="">
                      </div>
                  </div>
              </div>
              <div class="col-lg-6 col-md-6">
                  <div class="product__details__text">
                      <h3>{{$product->pro_name}}</h3>
                      <div class="product__details__rating">
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star-half-o"></i>
                          <span>(18 reviews)</span>
                      </div>
                      <div class="product__details__price">${{$product->price}}</div>
                      <p>{!!  $product->short_descrip !!}</p>
                      <div class="row">
                        
                        <div class="col-md-8">
                          <form action="{{url('/user/add/cart/'.$product->id)}}" method="POST">
                            @csrf
                            <input type="hidden" name="price" value="{{$product->price}}">
                            <div class="row">
                                <div class="col-md-6">
                                    <div>                      
                                        <div class="product__details__quantity">
                                            <div class="quantity">
                                                <div class="pro-qty">
                                                    <input type="text" name="update_qty" value="1" min="1">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                <button type="submit" class="btn btn-info"><i class="fa fa-shopping-cart "></i>&nbsp;ADD TO CARD</button>
                                </div>
                            </div>
                         </form>
                        </div>
                        <div class="col-md-2">
                            <a class="btn btn-danger" href="{{url('/user/add/wishlist/'.$product->id)}}"><i class="fa fa-heart"></i></a>
                        </div>
                      </div>


                      
                      <ul>
                          <li><b>Availability</b> <span>In Stock</span></li>
                          <li><b>Shipping</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li>
                          <li><b>Weight</b> <span>0.5 kg</span></li>
                          <li><b>Share on</b>
                              <div class="share">
                                  <a href="#"><i class="fa fa-facebook"></i></a>
                                  <a href="#"><i class="fa fa-twitter"></i></a>
                                  <a href="#"><i class="fa fa-instagram"></i></a>
                                  <a href="#"><i class="fa fa-pinterest"></i></a>
                              </div>
                          </li>
                      </ul>
                  </div>
              </div>
              <div class="col-lg-12">
                  <div class="product__details__tab">
                      <ul class="nav nav-tabs" role="tablist">
                          <li class="nav-item">
                              <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                  aria-selected="true">Description</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"
                                  aria-selected="false">Information</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"
                                  aria-selected="false">Reviews <span>(1)</span></a>
                          </li>
                      </ul>
                      <div class="tab-content">
                          <div class="tab-pane active" id="tabs-1" role="tabpanel">
                              <div class="product__details__tab__desc">
                                  <h6>Products Infomation</h6>
                                  <p>{!!  $product->long_descrip !!}</p>
                              </div>
                          </div>
                          <div class="tab-pane" id="tabs-2" role="tabpanel">
                              <div class="product__details__tab__desc">
                                  <h6>Products Infomation</h6>
                                  <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.
                                      Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus.
                                      Vivamus suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam
                                      sit amet quam vehicula elementum sed sit amet dui. Donec rutrum congue leo
                                      eget malesuada. Vivamus suscipit tortor eget felis porttitor volutpat.
                                      Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Praesent
                                      sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ac
                                      diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ante
                                      ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
                                      Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.
                                      Proin eget tortor risus.</p>
                                  <p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Lorem
                                      ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit aliquet
                                      elit, eget tincidunt nibh pulvinar a. Cras ultricies ligula sed magna dictum
                                      porta. Cras ultricies ligula sed magna dictum porta. Sed porttitor lectus
                                      nibh. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.</p>
                              </div>
                          </div>
                          <div class="tab-pane" id="tabs-3" role="tabpanel">
                              <div class="product__details__tab__desc">
                                  <h6>Products Infomation</h6>
                                  <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.
                                      Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus.
                                      Vivamus suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam
                                      sit amet quam vehicula elementum sed sit amet dui. Donec rutrum congue leo
                                      eget malesuada. Vivamus suscipit tortor eget felis porttitor volutpat.
                                      Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Praesent
                                      sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ac
                                      diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ante
                                      ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
                                      Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.
                                      Proin eget tortor risus.</p>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- Product Details Section End -->

  <!-- Related Product Section Begin -->
  <section class="related-product">
      <div class="container">
          <div class="row">
              <div class="col-lg-12">
                  <div class="section-title related__product__title">
                      <h2>Related Product</h2>
                  </div>
              </div>
          </div>
          <div class="row">
            @foreach ($related_product as $rp)
              <div class="col-lg-3 col-md-4 col-sm-6">
                  <div class="product__item">
                  <div class="product__item__pic set-bg" data-setbg="{{asset($rp->image_one)}}">
                          <ul class="product__item__pic__hover">
                              <li><a href="{{url('/user/add/wishlist/'.$rp->id)}}"><i class="fa fa-heart"></i></a></li>
                              <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                              <form action="{{url('/user/add/cart/'.$rp->id)}}" method="POST">
                                  @csrf
                                  <input type="hidden" name="price" value="{{$rp->price}}">
                                  <li><button type="submit"><i class="fa fa-shopping-cart"></i></button></li>
                              </form>
                          </ul>
                      </div>
                      <div class="product__item__text">
                      <h6><a href="{{url('/product/details/'.$rp->id)}}">{{$rp->pro_name}}</a></h6>
                          <h5>${{$rp->price}}</h5>
                      </div>
                  </div>
              </div>   
             @endforeach
        </div>
      </div>
  </section>
  <!-- Related Product Section End -->

  @endsection