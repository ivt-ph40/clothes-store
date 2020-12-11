@extends('back-end.layouts.app')

@section('title')Dashboard @endsection

@section('content')
<h1 class="h3 mb-2 text-gray-800">Dashboard</h1>
<div class="row">
	<!-- Category -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Danh mục cha</div>
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
    <div class="col-xl-2 col-md-4 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Sản phẩm</div>
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
    <div class="col-xl-2 col-md-4 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">User</div>
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
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Tổng số đơn hàng</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{$order}}</div>
              </div>
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Đơn hàng chờ xác nhận</div>
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
