@extends('Frontend.master')
@section('title') Search Shop @endsection
@section('shop') active @endsection
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

<div class="container">
  <div class="ht-70v bg-sl-primary pb-4 d-flex align-items-center justify-content-center">
    <div class="wd-lg-70p wd-xl-50p tx-center pd-x-40">
      <h1 class="tx-100 tx-xs-140 tx-normal tx-white mg-b-0">OPS!</h1>
      <h5 class="tx-xs-24 tx-normal tx-info mg-b-30 lh-5">The product your are looking for has not been found.</h5>
      <p class="tx-16 mg-b-30 tx-white-5"> Maybe you could try a search again:</p>

      <div class="d-flex justify-content-center">
        <div class=" wd-xs-300">
          <form action="{{url('/product/search')}}" method="POST" class="d-flex">
              @csrf
              <input type="text" class="form-control form-control-inverse ht-40" placeholder="Search..."  name="search">
              <button type="submit" class="btn btn-info bd-0 mg-l-5 ht-40"><i class="fa fa-search"></i></button>
          </form>
        </div>
      </div><!-- d-flex -->

      <div class="tx-center mg-t-20">... or back to <a href="index.html">home</a></div>
    </div>
  </div><!-- ht-100v -->
</div>


@endsection