@extends('back-end.layouts.app')

@section('title')Đơn hàng @endsection

@section('content')
<h1 class="h3 mb-3 text-gray-800">Quản lý Đơn hàng</h1>
<a class="btn btn-success mb-3" href="{{ route('orders.create') }}">Thêm <i class="fas fa-plus"></i></a>
@if(session()->has('error'))
    <p class="alert alert-danger">{{session()->get('error')}}</p>
@endif
<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Tên khách hàng</th>
            <th scope="col">Trạng thái đơn hàng</th>
            <th scope="col">Đổi trạng thái</th>
            <th scope="col">Chi tiết đơn hàng</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
        <tr>
            <th scope="row">{{$order->id}}</th>
            <td>{{$order->name}}</td>
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