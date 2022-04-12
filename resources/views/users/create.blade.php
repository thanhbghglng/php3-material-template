@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Thành viên')])
@section('title_page','User Page')
@section('content')
<div class="content">
  
    <div class="container-fluid">
        <div class="row">
          
          <div class="col-md-12">
            <div class="card card-plain">
              <div class="card-header card-header-primary">
                <h4 class="card-title mt-0"> {{isset($users)?'Cập nhật thông tin thành viên ':'Thêm mới thành viên'}}</h4>
              </div>
              <div class="card-body ">
                    
                        <form action= "{{isset($users)? route('users.update',$users->id): route('users.store')}}"method="POST">
                            @csrf
                            @if (isset($users))
                                @method('PUT')
                            @endif
                            <div class="form-group">
                              <label >Tên thành viên</label>
                              <input type="text" class="form-control" name="name" value="{{isset($users)? $users->name:''}}" >
                            </div>
                            <div class="form-group">
                                <label >Email</label>
                                <input type="text" class="form-control" name="description" value="{{isset($users) ? $users->email:''}}" >
                              </div>
                            <div class="form-group ">
                              <label >Ngày sinh</label>
                                <input type="date" name="date_of_birth"  class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Mật khẩu</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Nhập lại mật khẩu</label>
                                <input type="password" name="password_confirm" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <label >Trạng thái</label>
                            </div>
                            <div class="form-check form-check-radio">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="status"  value="1" {{isset($users)&& $users->status == 1 ? 'checked':''}} >
                                   Hoạt động
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <div class="form-check form-check-radio">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="status"  value="0" {{isset($users)&& $users->status == 0 ? 'checked':''}}>
                                    Không hoạt động
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