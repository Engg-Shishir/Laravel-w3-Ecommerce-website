@extends('Frontend.master')
@section('title') User Profile @endsection
@section('breadcumb_title') Profile @endsection
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
        <div class="card">
            <div class="card-body">
                <form action="">
                  <div class="form-group px-3">
                      <div class="row">
                          <div class="col-md-3">
                              <label for="">Name</label>
                          </div>
                          <div class="col-md-1"><strong class=" text-danger">:</strong></div>
                          <div class="col-md-8">
                              <input type="text" class="form-control" placeholder="Enter Your Name" value="{{Auth::user()->name}}">
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
                              <input type="text" class="form-control" placeholder="Enter Your Name" value="{{Auth::user()->email}}">
                          </div>
                      </div>
                  </div>
  
                <br>
                <button class="btn btn-warning form-control"><strong>Submit</strong></button>
                </form>
            </div>
        </div>
      </div>
      
  </div>
  </div>


@endsection