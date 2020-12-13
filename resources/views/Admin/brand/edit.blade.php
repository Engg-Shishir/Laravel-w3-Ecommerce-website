@extends('Admin.master')
@section('title') Brand Update @endsection
@section('brand') active @endsection
@section('admin_content')
<div class="sl-mainpanel">
  <!--======== Page Breadcrumb =========-->
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item">Admin</a>
    <span class="breadcrumb-item active">Brand Update</span>
  </nav>

<div class="sl-pagebody">
  <div class="row row-sm">
    <div class="col-md-6 m-auto">
      <div class="card">
        <!--======== Card Header=========-->
          <div class="card-header text-center bg-dark">
            <div class="row">
              <div class="col-md-1">
              <a href="{{url('/admin/brand')}}" class="btn btn-danger btn-sm">Back</a>
              </div>
              <div class="col-md-11">
                <strong class="text-danger h3">Edit Brand</strong>
              </div>
            </div>
         </div>

        <div class="card-body">
          <!--======== Brand Update Form Start=========-->
          <form  action="{{route('update.brand')}}" method="POST">
            @csrf<!--======== Laravel CSRF Token =========-->
            <!--======== hidden input field =========-->
            <input type="hidden" name="brand_id" value="{{$get->id}}">
            <div class="form-group">
              <input type="text" name="brand_name" class="form-control @error('brand_name') is-invalid @enderror" value="{{$get->brand_name}}">
                @error('brand_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-info form-control">Update</button>
            </div>
          </form>
          <!--======== Brand Update Form End=========-->
        </div>
      </div>
    </div>
  </div>

</div>
</div>
@endsection
