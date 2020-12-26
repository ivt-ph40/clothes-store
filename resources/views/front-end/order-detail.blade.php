@extends('front-end.layouts.master')

@section('title')
    <title>Trang khách hàng</title>
@endsection

@section('content')
	<div class="banner_inner">
			<div class="services-breadcrumb">
				<div class="inner_breadcrumb">
					<ul class="short">
						<li>
							<a href="{{route('trang-chu')}}">Trang chủ</a>
							<i>|</i>
						</li>
						<li>Checkout</li>
					</ul>
				</div>
			</div>
		</div>
	<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
		<div class="container d-flex">
			<div class="inner-sec-shop px-lg-4 px-3 col-lg-8">
                <h3 class="tittle-w3layouts my-lg-4 mt-3">Trang khách hàng </h3>
				@if(session('cart-message'))
				<div class="alert alert-danger" role="alert">
					{{ session('cart-message') }}
				</div>
                @endif
                <h5 class="mb-3">Xin chào {{\Auth::user()->name}}</h5>
				<div class="checkout-right">
					<table class="timetable_sub">
						<thead>
							<tr>
								<th>Mã đơn hàng</th>
								<th>Địa chỉ</th>
								<th>Số điện thoại</th>
								<th>Trạng thái đơn hàng</th>
								<th>Số tiền</th>
							</tr>
						</thead>
						<tbody id="tbody-content">
                            @foreach ($orders as $item)
                            <tr class="rem1" id="">
								<td class="invert">{{$item->id}}</td>
								<td class="invert">{{$item->address}}</td>
								<td class="invert">{{$item->phone}}</td>
								<td class="invert">
                                    @foreach ($order_status as $os)
                                    @if ($item->order_status_id == $os->id)
                                        {{$os->name}}
                                    @endif
                                    @endforeach
                                </td>
								<td class="invert">{{number_format("$total",0,"",".")}} VNĐ</td>
							</tr>
                            @endforeach
							
						</tbody>
					</table>
				</div>
				
            </div>
            <div class="border" style="height: 200px">
                <h3>Tài khoản của tôi</h3>
                <div class="p-1">
                    <ul style="list-style-type: none" class="p-2 border mb-1">
                        <li>Tên tài khoản: {{\Auth::user()->name}}</li>
                        <li>Số điện thoại: {{\Auth::user()->phone}}</li>
                        <li>Email: {{\Auth::user()->email}}</li>
                        <li>Địa chỉ: @php
							if (\Auth::user()->address == null) {
								
							} else {
								echo \Auth::user()->address->address1;
							}
							@endphp</li>
                    </ul>
					<a href="{{route('user.edit', \Auth::user()->id)}}" class="btn btn-outline-dark btn-sm">Sửa thông tin của tôi</a>
                </div>
                
            </div>
		</div>
	</section>
@endsection