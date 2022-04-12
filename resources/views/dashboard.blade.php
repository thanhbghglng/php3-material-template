@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])
@section('title_page','Dash Board')
@section('content')
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
                                <input type="checkbox" {{$user->status==1? 'checked':''}} >
                                  <span class="toggle"></span>
                              </label>
                            </div>
                         </td>
                          <td>
                            <form action="{{route('users.delete',$user->id)}} " method="POST" >
                              @method('DELETE')
                              @csrf
                              <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa ?')" class="btn btn-danger">Xóa</button>
                            </form>
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