@extends('Admin.master')
@section('title') Category @endsection
@section('category') active @endsection
@section('admin_content')
<div class="sl-mainpanel">
  <!--======== Page Breadcrumb=========-->
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="{{url('/admin/home')}}">Dashboard</a>
    <span class="breadcrumb-item active">Category</span>
  </nav>

<div class="sl-pagebody">
  <div class="row row-sm">
    <div class="col-md-8">
      <div class="card">
        <!--======== Card header =========-->
        <div class="card-header text-center bg-dark">
         <strong class="text-danger h3">All Category Details</strong>
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
                  <th class="text-center">Status</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                <!--======== Show All Category One by One =========-->
                @foreach ($categories as $key=> $category)
                <tr class="text-center">
                  <td>{{{$key + 1}}}</td>
                  <td>{{$category->cat_name}}</td>
                  <td>
                    <!--======== Check category status =========-->
                    @if($category->status == 1)
                    <input type="checkBox" checked>
                    @else
                    <input type="checkBox">
                    @endif
                  </td>
                  <td>
                  <a href="{{url('/admin/category/delete/'.$category->id)}}" class="btn btn-danger btn-sm"><i class="fas fa-trash text-light"></i></a>
                    <a href="{{url('/admin/category/edit/'.$category->id)}}" class="btn btn-warning btn-sm"><i class="fas fa-edit text-light"></i></a>
                    <!--======== Check category status =========-->
                    @if($category->status == 1)
                    <a href="{{url('/admin/category/status/'.$category->id.'/'.$category->status)}}" class="btn btn-sm"><i class="menu-item-icon icon ion-ios-gear-outline tx-24 " style="color: rgb(238, 0, 0) !important;"></i></a>
                    @else
                    <a href="{{url('/admin/category/status/'.$category->id.'/'.$category->status)}}" class="btn btn-sm"><i class="menu-item-icon icon ion-ios-gear-outline tx-24 " style="color: rgb(0, 226, 68) !important;"></i></a>
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
           <strong class="text-danger h3">Add Category</strong>
         </div>

        <div class="card-body">

          <!--======== Store category Form =========-->
          <form  action="{{route('store.category')}}" method="POST">
            @csrf
            <div class="form-group">
              <input type="text" name="cat_name" class="form-control @error('cat_name') is-invalid @enderror" placeholder="Enter Category">
              @error('cat_name')
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
