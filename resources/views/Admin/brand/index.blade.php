@extends('Admin.master')
@section('title') Brand @endsection
@section('brand') active @endsection
@section('admin_content')
<div class="sl-mainpanel">
  <!--======== Page Breadcrumb=========-->
  <nav class="breadcrumb sl-breadcrumb">
  <a class="breadcrumb-item" href="{{url('/admin/home')}}">Dashboard</a>
    <span class="breadcrumb-item active">Brand</span>
  </nav>

<div class="sl-pagebody">
  <div class="row row-sm">
    <div class="col-md-8">
      <div class="card">
        <!--======== Card header =========-->
        <div class="card-header text-center bg-dark">
         <strong class="text-danger h3">All Brand Details</strong>
       </div>
       <div class="card-body">
        <!--======== Include Success Message =========-->
        @include('include.success')
        @include('include.error')

          <div class="table-wrapper">
            <!--======== Brand DataTable =========-->
            <table id="datatable1" class="table display responsive nowrap table-vordered table-hover">
              <thead>
                <tr>
                  <th class="text-center">S.No</th>
                  <th class="text-center">Name</th>
                  <th class="text-center">Status</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                <!--======== Show All Brand One by One =========-->
                @foreach ($brand as $key=> $brand)
                <tr class="text-center">
                  <td>{{{$key + 1}}}</td>
                  <td>{{$brand->brand_name}}</td>
                  <td>
                    <!--======== Check brand status =========-->
                    @if($brand->status == 1)
                    <strong style="background-color: green;padding:2px;color:white;">Active</strong>
                    @else
                    <strong style="background-color: rgb(128, 0, 0);padding:2px;color:white;">InActive</strong>
                    @endif
                  </td>
                  <td>
                    <a href="{{url('/admin/brand/delete/'.$brand->id)}}" class="btn btn-danger btn-sm"><i class="fas fa-trash text-light"></i></a>
                    <a href="{{url('/admin/brand/edit/'.$brand->id)}}" class="btn btn-warning btn-sm"><i class="fas fa-edit text-light"></i></a>
                    <!--======== Check brand status =========-->
                    @if($brand->status == 1)
                    <a href="{{url('/admin/brand/status/'.$brand->id.'/'.$brand->status)}}" class="btn btn-sm"><i class="menu-item-icon icon ion-ios-gear-outline tx-24 " style="color: rgb(238, 0, 0) !important; font-weight:bold !important;"></i></a>
                    @else
                    <a href="{{url('/admin/brand/status/'.$brand->id.'/'.$brand->status)}}" class="btn btn-sm"><i class="menu-item-icon icon ion-ios-gear-outline tx-24 " style="color: rgb(0, 226, 68) !important; font-weight:bold !important;"></i></a>
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
           <strong class="text-danger h3">Add Brand</strong>
         </div>

        <div class="card-body">

          <!--======== Store Brand Form =========-->
          <form  action="{{route('store.brand')}}" method="POST">
            @csrf
            <div class="form-group">
              <input type="text" name="brand_name" class="form-control @error('brand_name') is-invalid @enderror" placeholder="Enter Category">
              @error('brand_name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-info form-control">Add</button>
            </div>
          </form>
          <!--======== Store Brand Form  End=========-->
        </div>
      </div>
    </div>
  </div>

</div>
</div>
@endsection