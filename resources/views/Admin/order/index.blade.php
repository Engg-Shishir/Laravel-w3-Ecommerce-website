@extends('Admin.master')
@section('title') Order @endsection
@section('order') active @endsection
@section('admin_content')
<div class="sl-mainpanel">
  <!--======== Page Breadcrumb=========-->
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item">Admin</a>
    <span class="breadcrumb-item active">Order</span>
  </nav>
  <div class="sl-pagebody">
    <div class="row">
      <div class="col-md-10 m-auto">
        <div class="card">
          <!--======== Card header =========-->
          <div class="card-header text-center bg-dark">
           <strong class="text-danger h3">All Orders</strong>
         </div>
         <div class="card-body">
          <!--======== Include Success Message =========-->
          @include('include.success')
          @include('include.error')
            <div class="table-wrapper">
              <!--======== Category DataTable =========-->
              <table id="datatable1" class="table display responsive nowrap table-vordered table-hover">
                <thead>
                  <tr>
                    <th class="text-center">S.No</th>
                    <th class="text-center">Invoice No</th>
                    <th class="text-center">Payment Type</th>
                    <th class="text-center">Subtotal</th>
                    <th class="text-center">Total</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <!--======== Show All Category One by One =========-->
                  @foreach ($orders as $key=> $order)
                  <tr class="text-center">
                    <td>{{$key + 1}}</td>
                    <td>#{{$order->invoice_no}}</td>
                    <td>{{$order->payment_type}}</td>
                    <td>{{$order->subtotal}}</td>
                    <td>{{$order->total}}</td>
                    <td>
                    <a href="{{url('/admin/order/view/'.$order->id)}}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i>&nbsp;&nbsp;view</a>
                    </td>
                  </tr>
                  @endforeach
  
                </tbody>
              </table>
            </div><!-- table-wrapper -->
         </div>
        </div><!-- card -->
      </div>
    </div>
  
  </div>
</div>
@endsection