@extends('layouts.app', ['activePage' => 'product', 'titlePage' => __('Product Page')])
@section('title_page','Products  Page')
@section('content')

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="{{route('product.delete')}} " method="POST">
        @csrf
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Xóa sản phẩm</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <input type="hidden" name="product_delete_id" id="product_id">
            Bạn có chắc chắn muốn xóa?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>

            <button type="submit" class="btn btn-primary">Xác nhận</button>
          </div>
      </form>
    </div>
  </div>
</div>
{{-- changeStatus --}}
<div class="modal fade" id="changeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="{{route('product.changeStatus')}} " method="POST">
        @csrf
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Thay đổi trạng thái</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <input type="hidden" name="status" id="status">
            <input type="hidden" name="id" id="product_id_status">
            Bạn có chắc chắn muốn thay đổi ?
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
                                        <td> <img src="{{asset($product->image_url)}}" alt="" width="200"> </td>
                                        <td>{{isset($product->categories)?$product->categories->name:"" }}
                                           </td>
                                        <td>  
                                          <div class="togglebutton">
                                          <label>
                                            <input data-id="{{$product->id}}" class="toggle-class changeStatus"  type="checkbox" {{$product->status==true? 'checked':''}} >
                                              <span class="toggle"></span>
                                          </label>
                                        </div>
                                       </td>
                                        <td>
                                          <button type="button" class="btn btn-danger deleteProduct" value="{{$product->id}} ">Xóa</button>
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
@section('scripts')
    <script>
      $(document).ready(function(){
        $('.deleteProduct').click(function(e){
          e.preventDefault();
          var category_id = $(this).val();
          $('#product_id').val(category_id);
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
          $('#product_id_status').val(id);
          $('#changeModal').modal('show');
        });
      });
     
    //   $(function(){
    //    $('.toggle-class').on('change',  function(){
    //    var status = $(this).prop('checked')== true ? 1 : 0;
    //    var product_id = $(this).data('id');
    //     $.ajax({
    //       type:"GET",
    //       dataType: "JSON",
    //       url:'{{route("product.changeStatus")}}',
    //       data:{
    //         "status":status,
    //         "id":product_id
    //       },
    //       success:function(data){
    //         console.log(data.success);
    //       }
    //     })
      
    //   });
    // });

    </script>
@endsection
