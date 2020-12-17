@extends('Admin.master')
@section('title') User @endsection
@section('user') active @endsection
@section('admin_content')
<div class="sl-mainpanel">
  <!--======== Page Breadcrumb=========-->
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="{{url('/admin/home')}}">Dashboard</a>
    <span class="breadcrumb-item active">User</span>
  </nav>

<div class="sl-pagebody">
  <div class="row">
    <div class="col-md-10 m-auto">
      <div class="card">
        <!--======== Card header =========-->
        <div class="card-header text-center bg-dark">
         <strong class="text-danger h3">All User Details</strong>
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
                  <th class="text-center">Image</th>
                  <th class="text-center">Name</th>
                  <th class="text-center">Email</th>
                  <th class="text-center">Status</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                <!--======== Show All Category One by One =========-->
                @foreach ($users as $key=> $user)
                <tr class="text-center">
                  <td>{{{$key + 1}}}</td>
                  <td>
                    <img src="{{asset($user->photo)}}" alt="" height="100px" width="100px">
                  </td>
                  <td>{{$user->name}}</td>
                  <td>{{$user->email}}</td>
                  <td>
                    <!--======== Check user status =========-->
                    @if($user->status == 1)
                    <input type="checkBox" checked>
                    @else
                    <input type="checkBox">
                    @endif
                  </td>
                  <td>
                  <a href="{{url('/admin/user/delete/'.$user->id)}}" class="btn btn-danger btn-sm"><i class="fas fa-trash text-light"></i></a>
                    @if($user->status == 1)
                    <a href="{{url('/admin/user/status/'.$user->id.'/'.$user->status)}}" class="btn btn-sm"><i class="menu-item-icon icon ion-ios-gear-outline tx-24 " style="color: rgb(238, 0, 0) !important;"></i></a>
                    @else
                    <a href="{{url('/admin/user/status/'.$user->id.'/'.$user->status)}}" class="btn btn-sm"><i class="menu-item-icon icon ion-ios-gear-outline tx-24 " style="color: rgb(0, 226, 68) !important;"></i></a>
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
  </div>

</div>
</div>
@endsection
