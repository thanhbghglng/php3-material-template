@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])
@section('title_page','Dash Board')
@section('content')

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="{{route('users.delete')}} " method="POST">
        @csrf
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Xóa thành viên</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <input type="hidden" name="user_delete_id" id="user_id">
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
      <form action="{{route('users.changeStatus')}} " method="POST">
        @csrf
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Thay đổi trạng thái</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <input type="text" name="status" id="status">
            <input type="text" name="id" id="user_id_status">
            Bạn có chắc chắn muốn thay đổi
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
              <h4 class="card-title mt-0"> Danh sách thành viên </h4>
              <p class="card-category"> Hiển thị tất cả các thành viên</p>
              
            </div>
            <a class="btn"  href="{{route('users.create')}}">Thêm thành viên</a>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table">
                  <thead class="">
                    <th>
                      ID
                    </th>
                    <th>
                      Tên thành viên
                    </th>
                    <th>
                      Email
                    </th>
                    <th>
                      Trạng thái
                    </th>
                    <th>Hành động</th>
                  </thead>
                  <tbody>
                    @foreach ($users as $user)
                      <tr>
                          <td>{{$user->id}} </td>
                          <td>{{$user->name}} </td>
                          <td>{{$user->email}} </td>
                          <td>
                            <div class="togglebutton">
                              <label>
                                <input data-id="{{$user->id}}" class="toggle-class changeStatus " id="changeStatusUser"  type="checkbox" {{$user->status==true? 'checked':''}} >
                                  <span class="toggle"></span>
                              </label>
                            </div>
                         </td>
                          <td>
                            <button type="button" class="btn btn-danger deleteUser" value="{{$user->id}} ">Xóa</button>
                            <a href="{{route('users.edit',$user->id)}}" class="btn btn-primary" >Sửa</a>
                          </td>

                      </tr>
                      @endforeach
                    
                  </tbody>
  
                </table>
                
                {{$users}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
  </script>
@endpush

@section('scripts')
    <script>
      $(document).ready(function(){
        $('.deleteUser').click(function(e){
          e.preventDefault();
          var user_id = $(this).val();
          $('#user_id').val(user_id);
          $('#deleteModal').modal('show');
        });
      });

     
     
    </script>
    
    <script>
        $(document).ready(function(){
        $('.changeStatus').click(function(e){
          e.preventDefault();
          var user_id = $(this).data('id');
          var status = $(this).prop('checked')== true ? 1 : 0;
          $('#status').val(status);
          $('#user_id_status').val(user_id);
          $('#changeModal').modal('show');
        });
      });
     
      
    //    $('.toggle-class').on('change',  function(){
    //    var status = $(this).prop('checked')== true ? 1 : 0;
    //    console.log(status)
    //    var user_id = $(this).data('id');
    //    console.log(user_id)
    //     $.ajax({
    //       type:"GET",
    //       dataType: "JSON",
    //       url:'{{route("users.changeStatus")}}',
    //       data:{
    //         "status":status,
    //         "id":user_id
    //       },
    //       success:function(data){
    //         console.log(data.success);
    //       }
    //     })
      
    //   });
    // });

    </script>
@endsection
