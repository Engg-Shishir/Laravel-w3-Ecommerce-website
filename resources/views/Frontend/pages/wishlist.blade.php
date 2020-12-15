@extends('Frontend.master')
@section('title') Wishlist @endsection
@section('breadcumb_title') Wishlist @endsection
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
  <div class="row">
    <div class="col-md-8 m-auto">
      <!--======== Category DataTable =========-->
      <table  class="table table-striped table-bordered table-dark">
        <thead>
          <tr class="text-center">
            <th>Products</th>
            <th>Price</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($wishlists as $row)
          <tr class="text-center" >
            <td class="shoping__cart__item">
              <div class="row">
                <div class="col-md-6">
                  <img src="{{asset($row->product->image_one)}}" style="height: 
                    100px;width:100px;" alt="">
                </div>
                <div class="col-md-6">
                  <h5 class="text-light">{{$row->product->pro_name}}</h5>
                </div>
              </div>
            </td>
            <td class="shoping__cart__price">
              {{$row->product->price}}
            </td>
            <td>
              <div class="row">
                <div class="col-md-6">
                  <form action="{{url('/user/add/cart/'.$row->product_id)}}" method="POST">
                      @csrf
                      <input type="hidden" name="price" value="{{$row->product->price}}">
                      <button type="submit" class="btn bg-danger"><i class="fa fa-shopping-cart"></i></button>
                  </form>
                </div>
                <div class="col-md-6">
                  <a href="{{url('/user/wishlist/remove/'.$row->id)}}" class="btn bg-danger"><i class="fas fa-trash"></i></a>
                </div>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>  
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
      </div>
  </section>
  <!-- Shoping Cart Section End -->

@endsection