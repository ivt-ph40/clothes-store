@extends('back-end.layouts.app')

@section('title')Đơn hàng @endsection

@section('content')
<h1 class="h3 mb-3 text-gray-800">Quản lý Đơn hàng</h1>
@if(session()->has('error'))
    <p class="alert alert-danger">{{session('error')}}</p>
@elseif(session()->has('status'))
    <p class="alert alert-success">{{ session('status') }}</p>
@endif

<div class="row container-fluid">
    <div class="" >
        <form action="{{route('order.status.filter')}}" method="get" class="d-flex">
            @csrf
            <div class="form-group mr-1">
                <label class="mb-0" for="" class="">Lọc theo trạng thái:</label>
                <select class="form-control form-control-sm" name="status_order_id" id="">
                    @foreach ($orderStatus as $status)
                    <option value="{{$status->id}}">{{$status->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mt-4 mr-1">
                <button type="submit" class="btn btn-secondary btn-sm">Lọc</button> 
            </div>
        </form>
    </div>
    
    <div class="mt-4">
        <div class=" pr-4 mr-4 border-right">
            <a href="{{route('orders.index')}}" class="btn btn-outline-danger btn-sm "><i class="fas fa-times"></i></a>
        </div>
    </div>

    <div class="" >
        <form action="{{route('order.search')}}" method="get" class="d-flex">
            @csrf
            <div class="form-group mr-1">
                <label class="mb-0" for="" class="">Tìm kiếm đơn hàng:</label>
                <input type="text" name="order_search" id="" class="form-control form-control-sm" value="{{old('order_search')}}" placeholder="Nhập tên, SĐT, Email">
            </div>
            <div class="form-group mt-4 mr-4 pr-4 border-right">
                <button type="submit" class="btn btn-secondary btn-sm">Tìm kiếm</button> 
            </div>
        </form>
    </div>

    <div class="">
        <div class="form-group mt-4">
            <a href="{{route('show.order.cancelled')}}" class="btn btn-info btn-sm">Xem đơn hàng đã huỷ</a>
        </div>
    </div>

    
    
</div>
<table class="table table-striped shadow bg-white">
    <thead class="thead-dark">
        <tr>
            <th style="width:2%">ID</th>
            <th >Tên khách hàng</th>
            <th>Địa chỉ</th>
            <th >Số điện thoại</th>
            <th >Email</th>
            <th >Ghi chú</th>
            <th >Trạng thái đơn hàng</th>
            <th >Đổi trạng thái</th>
            <th >Chi tiết đơn hàng</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
        <tr>
            <th scope="row">{{$order->id}}</th>
            <td>{{$order->name}}</td>
            <td>{{$order->address}}</td>
            <td>{{$order->phone}}</td>
            <td>{{$order->email}}</td>
            <td>{{$order->message}}</td>
            @if ($order->orderStatus->id == 1)
                <th class="text-danger">{{$order->orderStatus->name}}</th>
            @elseif ($order->orderStatus->id == 2)
                <th class="text-warning">{{$order->orderStatus->name}}</th>
            @elseif ($order->orderStatus->id == 3)
                <th class="text-primary">{{$order->orderStatus->name}}</th>
            @elseif ($order->orderStatus->id == 4)
                <th class="text-info">{{$order->orderStatus->name}}</th>
            @elseif ($order->orderStatus->id == 5)
                <th class="text-success">{{$order->orderStatus->name}}</th>
            @elseif ($order->orderStatus->id == 6)
                <th class="text-muted">{{$order->orderStatus->name}}</th>
            @endif
            <td>
                <form action="{{ route('order.status.edit',$order->id ) }}" method="post" class="d-flex">
                    @csrf
                    @method('put')
                    <select class="form-control form-control-sm col-5 mr-2 " name="orderStatus">
                        @foreach ($orderStatus as $status)
                        @if ($order->orderStatus->id == $status->id)
                        <option value="{{$status->id}}" selected>{{$status->name}}</option>
                        @else
                        <option value="{{$status->id}}">{{$status->name}}</option>
                        @endif
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-outline-secondary btn-sm">Đổi</button>
                </form>
            </td>
            <td class="d-flex">
                <a href="{{ route('orders.show', $order->id) }}" class="btn btn-outline-info btn-sm mr-1">
                    Chi tiết
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
@section('script')
    <script>
    $('.alert').delay(2000).fadeOut(500).queue(function (next) { 
        $(this).css('display', 'none'); 
        next();
    });
    </script>
@endsection