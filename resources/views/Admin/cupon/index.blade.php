@extends('Admin.master')
@section('title') Cupon @endsection
@section('cupon') active @endsection
@section('admin_content')
<div class="sl-mainpanel">
  <!--======== Page Breadcrumb=========-->
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item">Admin</a>
    <span class="breadcrumb-item active">Cupon</span>
  </nav>

<div class="sl-pagebody">
  <div class="row row-sm">
    <div class="col-md-8">
      <div class="card">
        <!--======== Card header =========-->
        <div class="card-header text-center bg-dark">
         <strong class="text-danger h3">All Cupon Details</strong>
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
                  <th class="text-center">Name</th>
                  <th class="text-center">Discount</th>
                  <th class="text-center">Status</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                <!--======== Show All Category One by One =========-->
                @foreach ($cupons as $key=> $cupon)
                <tr class="text-center">
                  <td>{{{$key + 1}}}</td>
                  <td>{{$cupon->cupon_name}}</td>
                  <td>{{$cupon->discount}}%</td>
                  <td>
                    <!--======== Check cupon status =========-->
                    @if($cupon->status == 1)
                    <input type="checkBox" checked>
                    @else
                    <input type="checkBox">
                    @endif
                  </td>
                  <td>
                  <a href="{{url('/admin/cupon/delete/'.$cupon->id)}}" class="btn btn-danger btn-sm"><i class="fas fa-trash text-light"></i></a>
                    <a href="{{url('/admin/cupon/edit/'.$cupon->id)}}" class="btn btn-warning btn-sm"><i class="fas fa-edit text-light"></i></a>
                    <!--======== Check cupon status =========-->
                    @if($cupon->status == 1)
                    <a href="{{url('/admin/cupon/status/'.$cupon->id.'/'.$cupon->status)}}" class="btn btn-sm"><i class="menu-item-icon icon ion-ios-gear-outline tx-24 " style="color: rgb(238, 0, 0) !important;"></i></a>
                    @else
                    <a href="{{url('/admin/cupon/status/'.$cupon->id.'/'.$cupon->status)}}" class="btn btn-sm"><i class="menu-item-icon icon ion-ios-gear-outline tx-24 " style="color: rgb(0, 226, 68) !important;"></i></a>
                    @endif
                  </td>
                </tr>
                @endforeach

              </tbody>
            </table>
          </div><!-- table-wrapper -->
       </div>
      </div><!-- card -->
    </div>
    <div class="col-md-4">
      <div class="card">
        <!--======== Card header =========-->
          <div class="card-header text-center bg-dark">
           <strong class="text-danger h3">Add Cupon</strong>
         </div>

        <div class="card-body">

          <!--======== Store category Form =========-->
          <form  action="{{route('store.cupon')}}" method="POST">
            @csrf
            <div class="form-group">
              <input type="text" name="cupon_name" class="form-control @error('cupon_name') is-invalid @enderror" placeholder="Enter Cupon name">
              @error('cupon_name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
              <div class="form-group">              
                <input type="text" name="discount" class="form-control @error('discount') is-invalid @enderror" placeholder="Enter Cupon price">
                @error('discount')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
             </div>

            <div class="form-group">
              <button type="submit" class="btn btn-info form-control">Add</button>
            </div>
          </form>
          <!--======== Store category Form End=========-->
        </div>
      </div>
    </div>
  </div>

</div>
</div>
@endsection
