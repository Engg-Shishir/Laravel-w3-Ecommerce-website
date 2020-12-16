@extends('Admin.master')
@section('title') Add Product @endsection  <!--========Page Title=========-->
@section('products') active show-sub @endsection 
@section('add-products') active @endsection<!--========Add Active Status in sidebar=========-->
@section('admin_content')
<div class="sl-mainpanel">
  <!--======== page Breadcrumb =========-->
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item">Admin</a>
    <span class="breadcrumb-item active">Add Product</span>
  </nav>

<div class="sl-pagebody">
  <div class="row row-sm">
    <div class="col-md-11 m-auto">
      <div class="card">
        <!--======== Card header =========-->
        <div class="card-header text-center bg-dark">
          <strong class="text-danger h3">Add New Products</strong>
        </div>

        <div class="card-body">
         <!--======== Include Success Message =========-->
         @include('include.success')

        <form action="{{route('store.product')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-layout">
              <div class="row mg-b-25">
                <div class="col-lg-3"><!-- col-4 -->
                  <div class="form-group">
                    <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="pro_name"  placeholder="Enter product name" value="{{old('pro_name')}}">
                    @error('pro_name')
                  <strong class="text-danger">{{ $message }}</strong> 
                    @enderror
                  </div>
                </div>
                <div class="col-lg-3"><!-- col-4 -->
                  <div class="form-group">
                    <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="pro_code"  placeholder="Enter product code" value="{{old('pro_code')}}">
                    @error('pro_code')
                  <strong class="text-danger">{{ $message }}</strong> 
                    @enderror
                  </div>
                </div>
                <div class="col-lg-3"><!-- col-4 -->
                  <div class="form-group">
                    <label class="form-control-label">Price: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="price" placeholder="Enter product price" value="{{old('price')}}">
                    @error('price')
                  <strong class="text-danger">{{ $message }}</strong> 
                    @enderror
                  </div>
                </div>
                <div class="col-lg-3"><!-- col-4 -->
                  <div class="form-group">
                    <label class="form-control-label">Sale Of: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="saleof" placeholder="Enter product Saleof" value="{{old('saleof')}}">
                    @error('saleof')
                      <strong class="text-danger">{{ $message }}</strong> 
                    @enderror
                  </div>
                </div>
                <div class="col-lg-4"><!-- col-4 -->
                  <div class="form-group">
                    <label class="form-control-label">Quantity: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="number" name="quantity" placeholder="Enter quantity " value="{{old('quantity')}}">
                    @error('quantity')
                  <strong class="text-danger">{{ $message }}</strong> 
                    @enderror
                  </div>
                </div>
                <div class="col-lg-4"><!-- col-4 -->
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                    <select class="form-control select2" data-placeholder="Choose Category" name="cat_id">
                      <option label="Choose Category"></option>
                      @foreach ($categorys as $cat)
                       <option value="{{$cat->id}}">{{$cat->cat_name}}</option>
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
                       <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
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
                    <textarea name="short_descrip" id="summernote"></textarea>
                    @error('short_descrip')
                  <strong class="text-danger">{{ $message }}</strong> 
                    @enderror
                  </div>
                </div>
                <div class="col-lg-12"><!-- col-12 -->
                  <div class="form-group">
                    <label class="form-control-label">Long Description: <span class="tx-danger">*</span></label>
                    <textarea name="long_descrip" id="summernote1"></textarea>
                    @error('long_descrip')
                  <strong class="text-danger">{{ $message }}</strong> 
                    @enderror
                  </div>
                </div>
                <div class="col-lg-4"><!-- col-4 -->
                  <div class="form-group">
                    <label class="form-control-label">Main Thmbnaile: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="file" name="image_one">
                  @error('image_one')
                  <strong class="text-danger">{{ $message }}</strong> 
                    @enderror
                  </div>
                </div>
                <div class="col-lg-4"><!-- col-4 -->
                  <div class="form-group">
                    <label class="form-control-label">Image Two: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="file" name="image_two">
                    @error('image_two')
                  <strong class="text-danger">{{ $message }}</strong> 
                    @enderror
                  </div>
                </div>
                <div class="col-lg-4"><!-- col-4 -->
                  <div class="form-group">
                    <label class="form-control-label">Image Three: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="file" name="image_three">
                    @error('image_three')
                    <strong class="text-danger">{{ $message }}</strong> 
                      @enderror
                  </div>
                </div>
              </div><!-- row -->
              
              <div class="form-layout-footer">
                <button type="submit" class="btn btn-primary mg-r-5 form-control">Add Products</button>
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
