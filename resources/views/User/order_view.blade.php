@extends('Frontend.master')
@section('title') User Order View @endsection
@section('breadcumb_title') Order View @endsection
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

<div class="container mt-4 mb-3">
  <div class="row">
      <div class="col-md-4">
        @include('User.include.left')
      </div>
      <div class="col-md-8">
        <div class="card  bg-dark ">
          <div class="card-header text-center">
            <span class="text-danger h3"><strong>Your Orders</strong></span>
          </div>
            <div class="card-body">
              <table class="table table-bordered table-striped table-dark">
                <thead>
                  <tr>
                    <th>Invoice No</th>
                    <th>Sub Total</th>
                    <th>Total</th>
                    <th>Payment Type</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                   <td>{{$orders->invoice_no}}</td>
                   <td>{{$orders->subtotal}}</td>
                   <td>{{$orders->total}}</td>
                   <td>{{$orders->payment_type}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
        </div>
      </div>
  </div>
  <br>

  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-8">
      <div class="card  bg-dark ">
        <div class="card-header text-center">
          <span class="text-danger h3"><strong>Shipping Address</strong></span>
        </div>
          <div class="card-body">
            <table class="table table-bordered table-striped table-dark">
              <thead>
                <tr>
                  <th>FName</th>
                  <th>LName</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Adress</th>
                  <th>State</th>
                  <th>PCode</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                 <td>{{$shipping->ship_first_name}}</td>
                 <td>{{$shipping->ship_last_name}}</td>
                 <td>{{$shipping->ship_email}}</td>
                 <td>{{$shipping->ship_phone}}</td>
                 <td>{{$shipping->address}}</td>
                 <td>{{$shipping->state}}</td>
                 <td>{{$shipping->post_code}}</td>
                </tr>
              </tbody>
            </table>
          </div>
      </div>
    </div>
  </div>
  <br>
  
  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-8">
      <div class="card  bg-dark ">
        <div class="card-header text-center">
          <span class="text-danger h3"><strong>Order Items</strong></span>
        </div>
          <div class="card-body">
            <table class="table table-bordered table-striped table-dark">
              <thead>
                <tr>
                  <th class="text-center">Image</th>
                  <th class="text-center">Name</th>
                  <th class="text-center">Price</th>
                  <th class="text-center">Code</th>
                  <th class="text-center">Quantity</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($orderitems as $key=> $row)
                <tr class="text-center">
                  <td>
                   <img src="{{asset($row->product->image_one)}}" width="100px" height="100px" alt="">
                  </td>
                  <td>{{$row->product->pro_name}}</td>
                  <td>{{$row->product->price}}</td>
                  <td>{{$row->product->pro_code}}</td>
                  <td>{{$row->pro_quatity}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
      </div>
    </div>
  </div>
  <br>
  <br>
</div>

@endsection