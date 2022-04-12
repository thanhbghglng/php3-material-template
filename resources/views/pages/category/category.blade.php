@extends('layouts.app', ['activePage' => 'category', 'titlePage' => __('Danh mục')])
@section('title_page','Category Page')
@section('content')

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thong bao </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="text" name="category_delete_id" id="category_id">
        Bạn có chắc chắn muốn xóa ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>




<div class="content">
  <div class="container-fluid">
    <div class="row">
      
      <div class="col-md-12">
        <div class="card card-plain">
          <div class="card-header card-header-primary">
            <h4 class="card-title mt-0"> Danh sách danh mục</h4>
            <p class="card-category"> Hiển thị tất cả các danh mục</p>
            
          </div>
          <a class="btn"  href="{{route('category.create')}}">Tạo danh mục</a>
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
                      <td>{{$category->parent->name}}</td>
                      <td>
                        <div class="togglebutton">
                          <label>
                            <input type="checkbox" {{$category->status==1? 'checked':''}} >
                              <span class="toggle"></span>
                          </label>
                        </div>
                     </td>
                      <td>
                       
                          <button type="button" class="btn btn-danger" id="deleteCategory" value="{{$category->id}}">Xóa</button>
                      
                        <a href="{{route('category.edit',$category->id)}}" class="btn btn-primary" >Sửa</a>
                      </td>
                    </tr>
                  @endforeach
                  
                </tbody>

              </table>
              
              {{$categories }}
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
