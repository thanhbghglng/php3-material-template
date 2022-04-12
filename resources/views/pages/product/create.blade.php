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
                    
                        {{-- <form action= "{{isset($product)? route('category.update',$product->id): route('category.store')}}"method="POST">
                            @csrf
                            @if (isset($category))
                                @method('PUT')
                            @endif
                            
                            
                           
                            
                            <button class="btn btn-primary">Submit</button>
                          </form> --}}
                        
              </div>
              
          </div>
        </div>
      </div>
</div>
</div>
@endsection