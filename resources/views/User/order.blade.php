@extends('Frontend.master')
@section('title') User Order @endsection
@section('breadcumb_title') Order @endsection
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
                    <th>#</th>
                    <th>Invoice No</th>
                    <th>Sub Total</th>
                    <th>Total</th>
                    <th>Payment Type</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($orders as $key=> $item)
                  <tr>
                   <td>{{$key+1}}</td>
                   <td>{{$item->invoice_no}}</td>
                   <td>{{$item->payment_type}}</td>
                   <td>{{$item->subtotal}}</td>
                   <td>{{$item->total}}</td>
                   <td>
                      <a href="{{url('/user/order/view/'.$item->id)}}" class="btn btn-danger btn-sm"><i class="fas fa-eye"></i></a>
                   </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
        </div>
      </div>
      
  </div>
  </div>



@endsection