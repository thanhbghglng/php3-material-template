@extends('layouts.app', ['activePage' => 'product', 'titlePage' => __('Product Page')])
@section('title_page','Products  Page')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-plain">
              <div class="card-header card-header-primary">
                <h4 class="card-title mt-0"> {{isset($product)?'Cập nhật sản phẩm':'Thêm mới sản phẩm'}}</h4>
              </div>
              <div class="card-body ">
                    
                        <form action= "{{isset($product)? route('product.update',$product->id): route('product.store')}}" method="POST" enctype="multipart/form-data" >
                            @csrf
                            @if (isset($product))
                                @method('PUT')
                            @endif
                            
                            <div class="form-group">
                              <label >Tên sản phẩm</label>
                              <input type="text" class="form-control" name='name' value='{{isset($product) ? $product->name  : ''}} '>
                            </div>
                            @error('name')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                            <div class="form-group">
                              <label >Mô tả</label>
                              <input type="text" class="form-control" name='description' value='{{isset($product) ? $product->description  : ''}} '>
                            </div>
                            <div class="form-group">
                              <label >Giá</label>
                              <input type="text" class="form-control" name='price' value='{{isset($product) ? $product->price  : ''}} '>
                            </div>
                            @error('price')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                            <div class="form-group">
                              <label >Ảnh</label>
                              <input type="file" class="form-control" name='image_url'  >
                            </div>
                            <div class="image-update">
                            </div>
                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                              
                              <div class="fileinput fileinput-new text-center">

                                    <img src=" {{isset($product) ? asset($product->image_url) :"" }} " alt="">
                                      <input type="file" name="image_url" value="{{isset($product)? $product->image_url:''}}" />
                                  
                                 
                              </div>
                          </div>
                            <div class="form-group " >
                              <select name="category_id"  class="form-control col-lg-5 col-md-6 col-sm-3 ">
                                  @foreach ($category as $categoryItem)
                                  <option value="{{$categoryItem->id}}"  {{ isset($product) &&  $product->category_id == $categoryItem->id ?" selected ":''}}    >{{$categoryItem->name}}</option>
                                  @endforeach

                              </select>
                            </div>
                            <div class="form-group">
                              <label >Trạng thái</label>
                          </div>
                          <div class="form-check form-check-radio">
                              <label class="form-check-label">
                                  <input class="form-check-input" type="radio" name="status"  value="1" {{isset($product)&& $product->status == 1 ? 'checked':''}} >
                                 Hiển thị
                                  <span class="circle">
                                      <span class="check"></span>
                                  </span>
                              </label>
                          </div>
                          <div class="form-check form-check-radio">
                              <label class="form-check-label">
                                  <input class="form-check-input" type="radio" name="status"  value="0" {{isset($product)&& $product->status == 0 ? 'checked':''}}>
                                  Ẩn
                                  <span class="circle">
                                      <span class="check"></span>
                                  </span>
                              </label>
                          </div>
                           
                           
                            
                            <button class="btn btn-primary">Submit</button>
                          </form>
                        
              </div>
              
          </div>
        </div>
      </div>
</div>
</div>
@endsection