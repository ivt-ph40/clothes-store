@extends('back-end.layouts.app')

@section('title')Đơn hàng @endsection

@section('content')
<h1 class="h3 mb-3 text-gray-800">Quản lý Đơn hàng</h1>
@if(session()->has('error'))
    <p class="alert alert-danger">{{session()->get('error')}}</p>
@endif

<div class="row justify-content-start">
    <div class="col-md-2">
        <form action="{{route('order.status.filter')}}" method="get" class="d-flex">
            @csrf
            <div class="form-group">
                <label class="mb-0" for="" class="">Lọc theo trạng thái:</label>
                <select class="form-control form-control-sm col-12" name="status_order_id" id="">
                    @foreach ($orderStatus as $status)
                    <option value="{{$status->id}}">{{$status->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mt-4">
                <button type="submit" class="btn btn-secondary btn-sm">Lọc</button> 
            </div>
        </form>
    </div>
    <div class="mt-4">
        <a href="{{route('orders.index')}}" class="btn btn-outline-danger btn-sm "><i class="fas fa-times"></i></a>
    </div>
    
</div>
<table class="table table-striped">
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
            @elseif ($order->orderStatus->id == 2 || $order->orderStatus->id == 3 || $order->orderStatus->id == 4)
                <th class="text-info">{{$order->orderStatus->name}}</th>
            @else ($order->orderStatus->id == 5)
                <th class="text-success">{{$order->orderStatus->name}}</th>
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