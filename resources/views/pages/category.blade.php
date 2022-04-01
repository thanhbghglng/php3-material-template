@extends('layouts.app', ['activePage' => 'category', 'titlePage' => __('Danh mục')])
@section('title_page','Category Page')
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      
      <div class="col-md-12">
        <div class="card card-plain">
          <div class="card-header card-header-primary">
            <h4 class="card-title mt-0"> Danh sách danh mục</h4>
            <p class="card-category"> Hiển thị tất cả các danh mục</p>
            
          </div>
          <a class="btn" href="">Tạo danh mục</a>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table">
                <thead class="">
                  <th>
                    ID
                  </th>
                  <th>
                    Tên danh mục
                  </th>
                  <th>
                    Mô tả
                  </th>
                  <th>
                   Tên danh mục cha
                  </th>
                  <th>
                    Trạng thái
                  </th>
                  <th>Hành động</th>
                </thead>
                <tbody>
                  @foreach ($categories as $category)
                    <tr>
                      <td>{{$category->id}} </td>
                      <td>{{$category->name}}</td>
                      <td>{{$category->description}}</td>
                      <td>{{$category->parent_id}}</td>
                      <td>{{$category->status}}</td>
                      <td>
                        <form action="{{route('category.delete',$category->id)}} " method="POST" >
                          @method('DELETE')
                          @csrf
                          <button type="submit" class="btn btn-danger">Xóa</button>
                        </form>
                        <button class="btn btn-primary" >Sửa</button>
                      </td>
                    </tr>
                  @endforeach
                  
                </tbody>

              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection