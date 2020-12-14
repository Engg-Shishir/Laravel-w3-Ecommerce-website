@extends('Admin.master')
@section('title') Cupon Update @endsection
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
    <div class="col-md-6 m-auto">
      <div class="card">
        <!--======== Card Header=========-->
          <div class="card-header text-center bg-dark">
            <div class="row">
              <div class="col-md-1">
              <a href="{{url('/admin/cupon')}}" class="btn btn-danger btn-sm">Back</a>
              </div>
              <div class="col-md-11">
                <strong class="text-danger h3">Edit Cupon</strong>
              </div>
            </div>
         </div>

        <div class="card-body">
          <!--======== Brand Update Form Start=========-->
        <form  action="{{route('update.cupon')}}" method="POST">
            @csrf<!--======== Laravel CSRF Token =========-->
            <!--======== hidden input field =========-->
            <input type="hidden" name="cupon_id" value="{{$get->id}}">
            <div class="form-group">
              <label for="">Name</label>
              <input type="text" name="cupon_name" class="form-control @error('cupon_name') is-invalid @enderror" value="{{$get->cupon_name}}">
                @error('cupon_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
              <label for="">Discount</label>
              <input type="text" name="discount" class="form-control @error('discount') is-invalid @enderror" value="{{$get->discount}}">
                @error('discount')
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
