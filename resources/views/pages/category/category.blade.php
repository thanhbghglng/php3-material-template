@extends('layouts.app', ['activePage' => 'category', 'titlePage' => __('Danh mục')])
@section('title_page','Category Page')
@section('content')
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="{{route('category.delete')}} " method="POST">
        @csrf
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Xóa danh mục</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <input type="hidden" name="category_delete_id" id="category_id">
            Bạn có chắc chắn muốn xóa?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>

            <button type="submit" class="btn btn-primary" >Xác nhận</button>
          </div>
      </form>
    </div>
  </div>
</div>
{{-- changeStatus --}}
<div class="modal fade" id="changeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="{{route('category.changeStatus')}} " method="POST">
        @csrf
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Thay đổi trạng thái</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <input type="hidden" name="status" id="status">
            <input type="hidden" name="category_id" id="category_id_status">
            Bạn có chắc chắn muốn thay đổi?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>

            <button type="submit" class="btn btn-primary">Xác nhận</button>
          </div>
      </form>
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
              <table class="table table" id='category_table'>
                <thead class="">
                  <th>
                    ID
                  </th>
                  <th></th>
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
                      
                      <td>
                        @if ($category->parent != null)
                            {{$category->parent->name}}
                        @endif
                        {{-- {{isset($category->parent ? $cateogry->parent->name:'')}} --}}
                      
                      </td>
                      <td>
                        <div class="togglebutton">
                          <label>
                            <input data-id="{{$category->id}}" class="toggle-class changeStatus"  type="checkbox" {{$category->status==true? 'checked':''}} >
                              <span class="toggle"></span>
                          </label>
                        </div>
                     </td>
                      <td>
                       
                        <button type="button" class="btn btn-danger deleteCategory" value="{{$category->id}} ">Xóa</button>
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
@section('scripts')
    <script>
      $(document).ready(function(){
        $('.deleteCategory').click(function(e){
          e.preventDefault();
          var category_id = $(this).val();
          $('#category_id').val(category_id);
          $('#deleteModal').modal('show');
        });
      });

     
     
    </script>
    
    <script>

$(document).ready(function(){
        $('.changeStatus').click(function(e){
          e.preventDefault();
          var status = $(this).prop('checked')== true ? 1 : 0;
          var id = $(this).data('id');
          $('#status').val(status)
          $('#category_id_status').val(id);
          $('#changeModal').modal('show');
        });
      });
     
    //   $(function(){
    //    $('.toggle-class').on('change',  function(){
    //    var status = $(this).prop('checked')== true ? 1 : 0;
    //    var category_id = $(this).data('id');
    //     $.ajax({
    //       type:"GET",
    //       dataType: "JSON",
    //       url:'{{route("category.changeStatus")}}',
    //       data:{
    //         "status":status,
    //         "id":category_id
    //       },
    //       success:function(data){
    //         console.log(data.success);
    //       }
    //     })
      
    //   });
    // });

    </script>
@endsection
