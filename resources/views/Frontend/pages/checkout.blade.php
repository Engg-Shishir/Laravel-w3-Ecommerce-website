@extends('Frontend.master')
@section('title') Checkout @endsection
@section('breadcumb_title') Checkout @endsection
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
@include('Frontend.include.breadcrumb')


  <!-- Checkout Section Begin -->
  <section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <h4 class="text-danger">Shipping Details</h4>
                            
            @if(Session::has('order_error'))
            <div class="alert bg-danger alert-dismissible fade show text-center" role="alert">
              <strong>{{Session::get('order_error')}}</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @endif
            
        <form action="{{route('place_order')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Fist Name<span>*</span></p>
                                <input type="text" placeholder="Enter your first name" name="ship_first_name" value="{{Auth()->user()->name}}" class="@error('ship_first_name') is-invalid @enderror">
                                @error('ship_first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Last Name<span>*</span></p>
                                    <input type="text" placeholder="Enter your last name" name="ship_last_name" class="@error('ship_last_name') is-invalid @enderror">
                                    @error('ship_last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Phone<span>*</span></p>
                                    <input type="text"  placeholder="Enter your phone" name="shipping_phone"class="@error('shipping_phone') is-invalid @enderror">
                                    @error('shipping_phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Email<span>*</span></p>
                                    <input type="text"  placeholder="Enter your email" name="shipping_email"value="{{Auth()->user()->email}}"class="@error('shipping_email') is-invalid @enderror">
                                    @error('shipping_email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>Address<span>*</span></p>
                            <input type="text" placeholder="Enter your right address" name="address"class="@error('address') is-invalid @enderror">
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="checkout__input">
                            <p>Country/State<span>*</span></p>
                            <input type="text"placeholder="Enter your state" name="state"class="@error('state') is-invalid @enderror">
                            @error('state')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="checkout__input">
                            <p>Postcode / ZIP<span>*</span></p>
                            <input type="text"placeholder="Enter post code" name="post_code"class="@error('post_code') is-invalid @enderror">
                            @error('post_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4>Your Order</h4>


                            <div class="checkout__order__products">Products <span>Total</span></div>
                            <ul>
                                <li>Vegetable’s Package <span>$75.99</span></li>
                                <li>Fresh Vegetable <span>$151.99</span></li>
                                <li>Organic Bananas <span>$53.99</span></li>
                            </ul>
                          @if(Session::has('cupon'))
                              <div class="checkout__order__subtotal">Subtotal <span>${{$total}}</span></div>
                              
                              <div class="checkout__order__total">Total <span>${{($total)-(session()->get('cupon')
                              ['discount_amount'])}}</span></div>

                              <input type="hidden" name="cupon_discount" value="{{session()->get('cupon')['cupon_discount']}}">
                              <input type="hidden" name="subtotal" value="{{$total}}">
                              <input type="hidden" name="total" value="{{($total)-(session()->get('cupon')
                              ['discount_amount'])}}">
                          @else
                          <div class="checkout__order__total">Total <span>${{$total}}</span></div>

                          <input type="hidden" name="subtotal" value="{{$total}}">
                          <input type="hidden" name="total" value="{{$total}}">
                          @endif
                           <strong class="text-success">Select Payment Meathod</strong>
                           <div class="checkout__input__checkbox">
                               <label for="payment">
                                   Hand Cash
                                   <input type="checkbox" id="payment" name="payment_type" value="handcash"class="@error('payment_type') is-invalid @enderror">
                                   <span class="checkmark"></span>
                               </label>
                           </div>
                           <div class="checkout__input__checkbox">
                               <label for="paypal">
                                   Paypal
                                   <input type="checkbox" id="paypal" name="payment_type" value="paypal"class="@error('payment_type') is-invalid @enderror">
                                   @error('payment_type')
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                   @enderror
                                   <span class="checkmark"></span>
                               </label>
                           </div>
                            <button type="submit" class="site-btn">PLACE ORDER</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- Checkout Section End -->

@endsection