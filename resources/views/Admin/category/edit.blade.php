@extends('Admin.master')
@section('title') Category Update @endsection
@section('category') active @endsection
@section('admin_content')
<div class="sl-mainpanel">
  <!--======== Page Breadcrumb =========-->
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="index.html">Starlight</a>
    <span class="breadcrumb-item active">Category Edit</span>
  </nav>

<div class="sl-pagebody">
  <div class="row row-sm">
    <div class="col-md-6 m-auto">
      <div class="card">
        <!--======== Card Header=========-->
          <div class="card-header text-center bg-dark">
            <div class="row">
              <div class="col-md-1">
              <a href="{{url('/admin/categorys')}}" class="btn btn-danger btn-sm">Back</a>
              </div>
              <div class="col-md-11">
                <strong class="text-danger h3">Edit Category</strong>
              </div>
            </div>
         </div>

        <div class="card-body">
          @if(Session::has('cat_edit'))
          <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
          <strong>{{Session::get('cat_edit')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif

          <!--======== category Update Form Start=========-->
          <form  action="{{route('update.category')}}" method="POST">
            @csrf<!--======== Laravel CSRF Token =========-->
            <!--======== hidden input field =========-->
            <input type="hidden" name="cat_id" value="{{$get->id}}">
            <div class="form-group">
            <input type="text" name="cat_name" class="form-control @error('cat_name') is-invalid @enderror" value="{{$get->cat_name}}">
              @error('cat_name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-info form-control">Update</button>
            </div>
          </form>
          <!--======== Category Update Form End=========-->
        </div>
      </div>
    </div>
  </div>

</div>
</div>
@endsection

@push('scripts')
<script>

</script>
@endpush