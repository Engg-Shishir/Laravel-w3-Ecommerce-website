@extends('Admin.master')
@section('title') Edit Product @endsection  <!--========Page Title=========-->
@section('products') active show-sub @endsection 
@section('add-products') active @endsection<!--========Add Active Status in sidebar=========-->
@section('admin_content')
<div class="sl-mainpanel">
  <!--======== page Breadcrumb =========-->
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item">Admin</a>
    <span class="breadcrumb-item active">Edit Product</span>
  </nav>

<div class="sl-pagebody">
  <div class="row row-sm">
    <div class="col-md-11 m-auto">
      <div class="card">
        <!--======== Card header =========-->
        <div class="card-header bg-dark">
          <div class="row">
          <div class="col-md-1"><a href="{{url('/admin/manage/product')}}" class="btn btn-danger btn-sm">Back</a></div>
            <div class="col-md-11 text-center">
              <strong class="text-danger h3">Edit This Products</strong>
            </div>
          </div>
        </div>

        <div class="card-body">
          <!--======== Include Error Message =========-->
          @include('include.error')
          
          <form action="{{route('update.product')}}" method="POST" enctype="multipart/form-data">
            @csrf
           <input type="hidden" name="id" value="{{$get->id}}">
            <div class="form-layout">
              <div class="row mg-b-25">
                <div class="col-lg-3"><!-- col-4 -->
                  <div class="form-group">
                    <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                  <input value="{{$get->pro_name}}" class="form-control" type="text" name="pro_name"  placeholder="Enter product name" value="{{old('pro_name')}}">
                    @error('pro_name')
                      <strong class="text-danger">{{ $message }}</strong> 
                    @enderror
                  </div>
                </div>
                <div class="col-lg-3"><!-- col-4 -->
                  <div class="form-group">
                    <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                    <input value="{{$get->pro_code}}" class="form-control" type="text" name="pro_code"  placeholder="Enter product code" value="{{old('pro_code')}}">
                    @error('pro_code')
                       <strong class="text-danger">{{ $message }}</strong> 
                    @enderror
                  </div>
                </div>
                <div class="col-lg-3"><!-- col-4 -->
                  <div class="form-group">
                    <label class="form-control-label">Price: <span class="tx-danger">*</span></label>
                    <input value="{{$get->price}}" class="form-control" type="text" name="price" placeholder="Enter product price" value="{{old('price')}}">
                    @error('price')
                      <strong class="text-danger">{{ $message }}</strong> 
                    @enderror
                  </div>
                </div>
                <div class="col-lg-3"><!-- col-4 -->
                  <div class="form-group">
                    <label class="form-control-label">Sale Of: <span class="tx-danger">*</span></label>
                    <input value="{{$get->saleof}}" class="form-control" type="text" name="saleof" placeholder="Enter product saleof" value="{{old('saleof')}}">
                    @error('saleof')
                      <strong class="text-danger">{{ $message }}</strong> 
                    @enderror
                  </div>
                </div>
                <div class="col-lg-4"><!-- col-4 -->
                  <div class="form-group">
                    <label class="form-control-label">Quantity: <span class="tx-danger">*</span></label>
                    <input value="{{$get->pro_quantity}}" class="form-control" type="number" name="quantity" placeholder="Enter quantity " value="{{old('quantity')}}">
                    @error('quantity')
                      <strong class="text-danger">{{ $message }}</strong> 
                    @enderror
                  </div>
                </div>
                <div class="col-lg-4"><!-- col-4 -->
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                    <select class="form-control select2" data-placeholder="Choose Category" name="cat_id" >
                      <option label="Choose Category"></option>
                      @foreach ($categorys as $cat)
                       <option value="{{$cat->id}}" {{$cat->id == $get->category_id ? "selected":""}}>{{$cat->cat_name}}</option>
                      @endforeach
                    </select> 
                    @error('cat_id')
                      <strong class="text-danger">{{ $message }}</strong> 
                    @enderror
                  </div>
                </div>
                <div class="col-lg-4"><!-- col-4 -->
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Brand: <span class="tx-danger">*</span></label>
                    <select class="form-control select2" name="brand_id">
                      <option label="Choose Brand"></option>
                      @foreach ($brands as $brand)
                       <option value="{{$brand->id}}" {{$brand->id == $get->brand_id ? "selected":""}}>{{$brand->brand_name}}</option>
                      @endforeach
                    </select>
                    @error('brand_id')
                  <strong class="text-danger">{{ $message }}</strong> 
                    @enderror
                  </div>
                </div>
                <div class="col-lg-12"><!-- col-12 -->
                  <div class="form-group">
                    <label class="form-control-label">Short Description: <span class="tx-danger">*</span></label>
                    <textarea name="short_descrip" id="summernote">{{$get->short_descrip}}</textarea>
                    @error('short_descrip')
                      <strong class="text-danger">{{ $message }}</strong> 
                    @enderror
                  </div>
                </div>
                <div class="col-lg-12"><!-- col-12 -->
                  <div class="form-group">
                    <label class="form-control-label">Long Description: <span class="tx-danger">*</span></label>
                    <textarea name="long_descrip" id="summernote1">{{$get->long_descrip}}</textarea>
                    @error('long_descrip')
                      <strong class="text-danger">{{ $message }}</strong> 
                    @enderror
                  </div>
                </div>
              </div><!-- row -->
              
              <div class="form-layout-footer text-right">
                <button type="submit" class="btn btn-info mg-r-5">Update details</button>
              </div>
            </div>
          </form>
        </div>
        <div style="margin-top: 150px;"></div>
        <div class="card-body">
            <form action="{{route('update.pimage')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="id" value="{{$get->id}}">
              <input type="hidden" name="old_one" value="{{$get->image_one}}">
              <input type="hidden" name="old_two" value="{{$get->image_two}}">
              <input type="hidden" name="old_three" value="{{$get->image_three}}">
              <div class="form-layout">
                <div class="row mg-b-25">
                  <div class="col-lg-4"><!-- col-4 -->
                    <div class="form-group">
                    <label class="form-control-label">Main Thumbnaile: <span class="tx-danger">*</span></label>
                    <img src="{{asset($get->image_one)}}" height="100px" width="100px" alt="">
                    <input class="form-control" type="file" name="image_one">
                    @error('image_one')
                    <strong class="text-danger">{{ $message }}</strong>
                      @enderror
                    </div>
                  </div>
                  <div class="col-lg-4"><!-- col-4 -->
                    <div class="form-group">
                      <label class="form-control-label">Image Two: <span class="tx-danger">*</span></label>
                      <img src="{{asset($get->image_two)}}" height="100px" width="100px" alt="">
                      <input value="" class="form-control" type="file" name="image_two">
                      @error('image_two')
                    <strong class="text-danger">{{ $message }}</strong> 
                      @enderror
                    </div>
                  </div>
                  <div class="col-lg-4"><!-- col-4 -->
                    <div class="form-group">
                      <label class="form-control-label">Image Three: <span class="tx-danger">*</span></label>
                      <img src="{{asset($get->image_three)}}" height="100px" width="100px" alt="">
                      <input value="" class="form-control" type="file" name="image_three">
                      @error('image_three')
                      <strong class="text-danger">{{ $message }}</strong> 
                        @enderror
                    </div>
                  </div>
                </div><!-- row -->
                
                <div class="form-layout-footer">
                  <button type="submit" class="btn btn-warning mg-r-5 form-control">Update Image</button>
                </div>
              </div>
            </form>
        </div>

      </div>
    </div>
  </div>

</div>
</div>
@endsection
