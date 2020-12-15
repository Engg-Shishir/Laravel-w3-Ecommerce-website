@extends('Frontend.master')
@section('title') Cart @endsection
@section('breadcumb_title') Shopping Cart @endsection
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

<section class="container">  
  <!--======== Category DataTable =========-->
  <table  class="table table-striped table-bordered table-dark">
    <thead>
      <tr class="text-center">
        <th colspan="2">Products</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Total</th>
        <th colspan="2">Improve</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($carts as $cart)
      <tr class="text-center" >
        <td class="shoping__cart__item">
        <img src="{{asset($cart->product->image_one)}}" style="height: 
          100px;width:100px;" alt="">
        </td>
        <td><h5>{{$cart->product->pro_name}}</h5></td>
        <td class="shoping__cart__price">
          {{$cart->product->price}}
        </td>
        <td class="shoping__cart__quantity">
          <form action="{{url('/cart/qty/update/'.$cart->id)}}" method="POST">
              @csrf
              <div class="quantity">
                  <div class="pro-qty">
                    <input type="text" name="update_qty" value="{{$cart->qty}}" min="1">
                  </div>
              </div>
              <button type="submit" class="btn bg-info">Update</button>
          </form>
        </td>
        <td class="shoping__cart__total">
          {{$cart->qty * $cart->price}}
        </td>
        <td>
          <a href="{{url('/cart/remove/'.$cart->id)}}" class="btn bg-danger"><i class="fas fa-trash"></i></a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</section>




<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="shoping__cart__table">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns">
                <a href="{{url('/')}}" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                </div>
            </div>
            <div class="col-lg-6">
                @if(Session::has('cupon'))
                @else
                <div class="shoping__continue">
                    <div class="shoping__discount">
                        <h5>Discount Codes</h5>
                          <form action="{{url('/cupon/aplay')}}" method="POST">
                            @csrf
                            <input type="text" name="cupon" placeholder="Enter your coupon code">
                            <button type="submit" class="site-btn">APPLY COUPON</button>
                          </form>
                    </div>
                </div>
                @endif
            </div>
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Cart Total</h5>
                    <ul>
                    @if(Session::has('cupon'))
                    <li>Subtotal <span>{{$total}} /=</span></li>

                    <li>Cupon <span>{{ session()->get('cupon')['cupon_name'] }} &nbsp;&nbsp;<a href="{{url('/cupon/remove')}}" class="btn btn-dark btn-sm">❌</a> </span></li>

                    <li>Discount <span>{{session()->get('cupon')['cupon_discount']}}% &nbsp; ({{session()->get('cupon')['discount_amount']}}tk)</span></li>

                      <li>Total <span>{{ $total - session()->get('cupon')['discount_amount'] }} /=</span></li>
                    @else
                      <li>Total <span>{{$total}} /=</span></li>
                    @endif
                    </ul>
                  <a href="{{url('/checkout')}}" class="primary-btn">PROCEED TO CHECKOUT</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shoping Cart Section End -->

@endsection