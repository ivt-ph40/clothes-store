@extends('back-end.layouts.app')

@section('title')Chi tiết đơn hàng @endsection

@section('content')
<h1 class="h3 mb-3 text-gray-800">Chi tiết đơn hàng</h1>
@if(session()->has('error'))
    <p class="alert alert-danger">{{session()->get('error')}}</p>
@endif
<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Tên khách hàng</th>
            <th scope="col">Địa chỉ</th>
            <th scope="col">Số điện thoại</th>
            <th scope="col">Email</th>
            <th scope="col">Ghi chú</th>
            <th scope="col">Tên sản phẩm</th>
            <th scope="col">Số lượng</th>
            <th scope="col">Size</th>
            <th scope="col">Giá tiền</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orderDetails as $orderDetail)
        <tr>
            <th scope="row">{{$orderDetail->id}}</th>
            <td>{{$orderDetail->order->name}}</td>
            <td>{{$orderDetail->order->address}}</td>
            <td>{{$orderDetail->order->phone}}</td>
            <td>{{$orderDetail->order->email}}</td>
            <td>{{$orderDetail->order->message}}</td>
            <td>{{$orderDetail->product->name}}</td>
            <td>{{$orderDetail->quantities}}</td>
            <td>{{$orderDetail->size}}</td>
            <td>{{$orderDetail->price}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection