@extends('layouts.app', ['activePage' => 'product', 'titlePage' => __('Product Page')])
@section('title_page','Products  Page')
@section('content')
<div class="content">
    {{-- {{dd($products)}} --}}
    <div class="content-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-plain">
                    <div class="card-header card-header-primary">
                      <h4 class="card-title mt-0"> Danh sách Sản phẩm</h4>
                      <p class="card-category"> Hiển thị tất cả sản phẩm</p>
                      
                    </div>
                    <a class="btn" href="{{route('product.create')}}">Tạo sản phẩm</a>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table">
                          <thead class="">
                            <th>
                              ID
                            </th>
                            <th>
                              Tên sản phẩm
                            </th>
                            <th>
                              Mô tả
                            </th>
                            <th>
                             Giá
                            </th>
                            <th>
                                Ảnh
                            </th>
                            <th>
                                Danh mục
                            </th>
                            <th>
                              Trạng thái
                            </th>
                            <th>Hành động</th>
                          </thead>
                          <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td> {{$product->id}} </td>
                                        <td> {{$product->name}} </td>
                                        <td> {{$product->description}} </td>
                                        <td> {{$product->price}} </td>
                                        <td> <img src="{{$product->image_url}}" alt="" width="200"> </td>
                                        <td> {{$product->categories->name}} </td>
                                        <td>  <div class="togglebutton">
                                            <label>
                                              <input type="checkbox" {{$product->status==1? 'checked':''}} >
                                                <span class="toggle"></span>
                                            </label>
                                          </div> </td>
                                        <td>
                                            <form action="{{route('product.delete',$product->id)}} " method="POST" >
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Xóa</button>
                                              </form>
                                              <a href="{{route('product.edit',$product->id)}}" class="btn btn-primary" >Sửa</a>
                                        </td>

                                    </tr>
                                @endforeach
                            
                          </tbody>
          
                        </table>
                        {{$products }}
                        
                      </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection