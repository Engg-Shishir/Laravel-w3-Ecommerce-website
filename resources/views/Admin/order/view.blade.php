@extends('Admin.master')
@section('title') Order View @endsection
@section('order') active @endsection
@section('admin_content')
<div class="sl-mainpanel">
  <!--======== Page Breadcrumb=========-->
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item">Admin</a>
    <span class="breadcrumb-item active">Order View</span>
  </nav>
  <div class="sl-pagebody">
    <div class="row">
      <div class="col-md-10 m-auto">
        <div class="card">
          <div class="card-header text-center bg-dark">
            <strong class="text-danger h3">Shipping Address</strong>
          </div>
          <div class="card-body">
            <div class="form-layout">
              <div class="row mg-b-25">
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Firstname: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="firstname" value="{{ $shipping->ship_first_name }}" readonly placeholder="Enter firstname">
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Lastname: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="lastname" value="{{ $shipping->ship_last_name }}"readonly placeholder="Enter lastname">
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Email address: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="email" value="{{ $shipping->ship_email }}"readonly placeholder="Enter email address">
                  </div>
                </div><!-- col-4 -->
              </div><!-- row -->
              <div class="row">
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Phone: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="phone" value="{{ $shipping->ship_phone }}"readonly placeholder="Enter email address">
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Shipping Address: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="address" value="{{ $shipping->address }}"readonly placeholder="Enter email address">
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">State: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="state" value="{{ $shipping->state }}"readonly placeholder="Enter email address">
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Post Code: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="post_code" value="{{ $shipping->post_code }}"readonly placeholder="Enter email address">
                  </div>
                </div><!-- col-4 -->

              </div>
            </div><!-- form-layout -->
          </div>
        </div>
        <br><br>
        <hr>
        
        <div class="card">
          <div class="card-header text-center bg-dark">
            <strong class="text-danger h3">Order Details</strong>
          </div>
          <div class="card-body">
            <div class="form-layout">
              <div class="row mg-b-25">
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Invoice No: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="Invoice No" value="{{ $orders->invoice_no }}" readonly placeholder="Enter Invoice No">
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Payment Type: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="lastname" value="{{ $orders->payment_type }}"readonly placeholder="Enter lastname">
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Total: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="total" value="{{ $orders->total }}"readonly placeholder="Enter email address">
                  </div>
                </div><!-- col-4 -->
              </div><!-- row -->
              <div class="row">
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Sub Total: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="phone" value="{{ $orders->subtotal }}"readonly placeholder="Enter email address">
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Cuppon Discount: <span class="tx-danger">*</span></label>
                    @if ($orders->cupon_discount == NULL)
                    <span class="badge badge-pill badge-danger">No</span>
                    @else
                    <span class="badge badge-pill badge-success">{{$orders->cupon_discount}}%</span>
                    @endif
                  </div>
                </div><!-- col-4 -->

              </div>
            </div><!-- form-layout -->
          </div>
        </div>
        <br><br>
        <hr>
        

        <div class="card">
          <!--======== Card header =========-->
          <div class="card-header text-center bg-dark">
           <strong class="text-danger h3">Order Items</strong>
         </div>
         <div class="card-body">
            <div class="table
            -wrapper">
              <!--======== Category DataTable =========-->
              <table id="datatable1" class="table display responsive nowrap table-vordered table-hover">
                <thead>
                  <tr>
                    <th class="text-center">Image</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Price</th>
                    <th class="text-center">Quantity</th>
                    <th class="text-center">C.Id</th>
                    <th class="text-center">B.Id</th>
                  </tr>
                </thead>
                <tbody>
                  <!--======== Show All Category One by One =========-->
                  @foreach ($orderitems as $key=> $row)
                  <tr class="text-center">
                    <td>
                     <img src="{{asset($row->product->image_one)}}" width="100px" height="100px" alt="">
                    </td>
                    <td>{{$row->product->pro_name}}</td>
                    <td>{{$row->product->price}}</td>
                    <td>{{$row->pro_quatity}}</td>
                    <td>{{$row->product->category->cat_name}}</td>
                    <td>{{$row->product->brand_id}}</td>
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