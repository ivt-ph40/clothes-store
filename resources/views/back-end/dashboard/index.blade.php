@extends('back-end.layouts.app')

@section('title')Dashboard @endsection

@section('content')
<h1 class="h3 mb-2 text-gray-800">Dashboard</h1>
<div class="row">
	<!-- Category -->
    <div class="col-xl-4 col-md-8 col-xs-12 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1"><a class="text-success " href="{{route('categories.index')}}" style="text-decoration: none">Danh mục cha</a> </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{$cateCount}}</div>
              </div>
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Danh mục con</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$cateChildCount}}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-calendar fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
    </div>

    <!-- product -->
    <div class="col-xl-2 col-md-4 col-xs-12 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><a class="text-primary " href="{{route('products.index')}}" style="text-decoration: none">Sản phẩm</a></div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{$product}}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-calendar fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
    </div>

    <!-- user -->
    <div class="col-xl-2 col-md-4 col-xs-12 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1"><a class="text-warning " href="{{route('users.index')}}" style="text-decoration: none">User</a></div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{$user}}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-user-friends fa-2x text-gray-300"></i>
                {{-- <i class="fas fa-calendar fa-2x text-gray-300"></i> --}}
              </div>
            </div>
          </div>
        </div>
    </div>

    <!-- Category -->
    <div class="col-xl-4 col-md-8 col-xs-12 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1"><a class="text-danger " href="{{route('orders.index')}}" style="text-decoration: none">Tổng số đơn hàng</a></div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{$order}}</div>
              </div>
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1"><a class="text-danger " href="{{route('order.status.1')}}" style="text-decoration: none">Đơn hàng chờ xác nhận</a></div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$orderWaitConfirm}}</div>
              </div>
              <div class="col-auto">
                {{-- <i class="fas fa-calendar fa-2x text-gray-300"></i> --}}
                <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
	
@endsection
