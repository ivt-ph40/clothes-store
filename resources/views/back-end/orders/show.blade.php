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
            <td>{{$orderDetail->product->name}}</td>
            <td>{{$orderDetail->quantities}}</td>
            <td>{{$orderDetail->size}}</td>
            <td id="price">{{ number_format($orderDetail->price ?? 0,0,',','.') }} VNĐ</td>
        </tr>
        @endforeach
    </tbody>
    <tfoot class="thead-light">
        <tr>
            <th colspan="5" class="text-center">Tổng</th>
            <th>{{ number_format($total ?? 0,0,',','.') }} VNĐ</th>
        </tr>
    </tfoot>
    
</table>
@endsection

@section('script')
    <script src="">
        $('#price').blur(function () {
            var sum = 0;
            $('.price').each(function() {
                sum += $(this).data("id");
            });
        });​​​​​​​​​
        

    </script>
@endsection