@extends('layouts.app', ['activePage' => 'category', 'titlePage' => __('Danh mục')])
@section('title_page','Category Page')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-plain">
              <div class="card-header card-header-primary">
                <h4 class="card-title mt-0"> {{isset($category)?'Cập nhật danh mục':'Thêm mới danh mục'}}</h4>
              </div>
              <div class="card-body ">
                    
                        <form action= "{{isset($category)? route('category.update',$category->id): route('category.store')}}"method="POST">
                            @csrf
                            @if (isset($category))
                                @method('PUT')
                            @endif
                            <div class="form-group">
                              <label >Tên danh mục</label>
                              <input type="text" class="form-control" name="name" value="{{isset($category)? $category->name:''}}" >
                            </div>
                            <div class="form-group">
                                <label >Mô tả</label>
                                <input type="text" class="form-control" name="description" value="{{isset($category) ? $category->description:''}}" >
                              </div>
                            <div class="form-group ">
                              <label >Danh mục cha</label>
                              <select class="form-control col-lg-5 col-md-6 col-sm-3 " name="parent_id"   >
                                <option value="0">--None--</option>
                               
                                @foreach ($category_parent as $item)
                                
                                <option value="{{$item->id}}"  {{ isset($category) && $category->parent_id ==  $item->id ? 'selected   ':" "   }} >{{$item->name}}</option>
                                @endforeach
                                
                              </select>
                            </div>
                            
                            <div class="form-group">
                                <label >Trạng thái</label>
                            </div>
                            <div class="form-check form-check-radio">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="status"  value="1" {{isset($category)&& $category->status == 1 ? 'checked':''}} >
                                   Hiển thị
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <div class="form-check form-check-radio">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="status"  value="0" {{isset($category)&& $category->status == 0 ? 'checked':''}}>
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
@endsection