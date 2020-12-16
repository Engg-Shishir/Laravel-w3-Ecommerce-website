@extends('Frontend.master')
@section('title') User Profile @endsection
@section('breadcumb_title') Profile @endsection
@section('frontend_content')



@include('Frontend.include.category')
@include('Frontend.include.breadcrumb')



<div class="container mt-4 mb-3">
  <div class="row">
      <div class="col-md-4">
         @include('User.include.left')
      </div>
      <div class="col-md-8">
        <div class="card">
            <div class="card-body">
              <!--======== Include Success Message =========-->
              @include('include.success')
              @include('include.error')
                <form action="{{url('/user/update/'.Auth::user()->id)}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="old" value="{{Auth::user()->photo}}">
                  <div class="form-group px-3">
                      <div class="row">
                          <div class="col-md-3">
                              <label for="">Name</label>
                          </div>
                          <div class="col-md-1"><strong class=" text-danger">:</strong></div>
                          <div class="col-md-8">
                              <input type="text" class="form-control" placeholder="Enter Your Name" value="{{Auth::user()->name}}" name="name">
                              @error('name')
                               <strong class="text-danger">{{ $message }}</strong> 
                              @enderror
                          </div>
                      </div>
                  </div>
                  <div class="form-group px-3">
                      <div class="row">
                          <div class="col-md-3">
                              <label for="">Email</label>
                          </div>
                          <div class="col-md-1"><strong class=" text-danger">:</strong></div>
                          <div class="col-md-8">
                              <input type="text" class="form-control" placeholder="Enter Your Name" value="{{Auth::user()->email}}" name="email">
                              @error('email')
                               <strong class="text-danger">{{ $message }}</strong> 
                              @enderror
                          </div>
                      </div>
                  </div>
                  <div class="form-group px-3">
                      <div class="row">
                          <div class="col-md-3">
                              <label for="">Profile Image</label>
                          </div>
                          <div class="col-md-1"><strong class=" text-danger">:</strong></div>
                          <div class="col-md-8">
                            <input class="form-control" type="file" name="profile">
                          </div>
                      </div>
                  </div>
  
                <br>
                <button type="submit" class="btn form-control" style="background-color: #5d9605;"><strong>Update</strong></button>
                </form>
            </div>
        </div>
      </div>
      
  </div>
  </div>


@endsection