@extends('front-end.layouts.master')

@section('title')
    <title>Chi tiết sản phẩm</title>
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
		<div class="container">
			<div class="inner-sec-shop px-lg-4 px-3">
				<h3 class="tittle-w3layouts my-lg-4 mt-3">Checkout </h3>
				@if(session('cart-message'))
				<div class="alert alert-danger" role="alert">
					{{ session('cart-message') }}
				</div>
				@endif
				<div class="checkout-right">
					<table class="timetable_sub">
						<thead>
							<tr>
								<th>STT</th>
								<th class="th-img">Sản phẩm</th>
								<th>Số lượng</th>
								<th>Tên sản phẩm</th>
								<th>Số tiền</th>
								<th>Xóa</th>
							</tr>
						</thead>
						<tbody id="tbody-content">
							@php
								$key =1;
							@endphp

							@forelse(Cart::content() as $cart)

							<tr class="rem1" id="row-id{{$cart->rowId}}">
								<td class="invert">{{$key }}</td>
								<td class="invert-image">
									<a href="{{route('detail', $cart->id)}}">
										<img src="{{asset($cart->options->image)}}" alt=" " class="img-responsive">
									</a>
								</td>
								<td class="invert">
									<div class="quantity">
										<div class="quantity-select">
											<input type="hidden" data-rowId="{{$cart->rowId}}" value="{{$cart->rowId}}">
											<div class="entry value-minus qtybutton">&nbsp;</div>
											<div class="entry value">
												<span class="quantity">{{$cart->qty}}</span>
											</div>
											<div class="entry value-plus active qtybutton">&nbsp;</div>
										</div>
									</div>
								</td>
								<td class="invert">{{$cart->name}} ({{$cart->options->size}})</td>
								<td class="invert">{{ number_format($cart->qty * $cart->price, 0, "", ".")}} VNĐ</td>
								<td class="invert">
									<div class="rem">
										<div class="close1 sbmincart-remove" data-rowid="{{$cart->rowId}}">  </div>
									</div>

								</td>
							</tr>
							@php
								$key++;
							@endphp
							@empty
								<tr>
									<td colspan="6">Không có sản phẩm nào trong giỏ hàng</td>
								</tr>
							@endforelse
						</tbody>
					</table>
				</div>
				<div class="checkout-left row">
					<div class="col-md-4 checkout-left-basket">
						<h4>Thành tiền</h4>
						<ul>
						<?php
                     		$total = str_replace( ',' , '.', substr(Cart::subtotal(), 0, strrpos(Cart::subtotal(), '.')));
                		?>
							<li>Tổng cộng
								<i>-</i>
								<span id="total-cart">{{$total}} VND</span>
							</li>
						</ul>	
						<div class="content-box">
							<div class="content-box__row">
								<div class="radio-wrapper">
									<div class="radio__input">
										<input name="paymentMethod" id="paymentMethod-468389" type="radio" class="input-radio" data-bind="paymentMethod" value="468389" checked="">
									</div>
									<label for="paymentMethod-468389" class="radio__label">
										<span class="radio__label__primary">Thanh toán khi giao hàng (COD)</span>
										<span class="radio__label__accessory">
											<span class="radio__label__icon">
												<i class="payment-icon payment-icon--4"></i>
											</span>
										</span>
									</label>
								</div>
								<div class="content-box__row__desc" data-bind-show="paymentMethod == 468389">
									<p>Bạn chỉ phải thanh toán khi nhận được hàng</p>
								</div>	
							</div>
						</div>
					</div>
					<div class="col-md-8 address_form">
						<h4>Thông tin nhận hàng</h4>
						<form action="{{route('checkout-post')}}" method="post" class="creditly-card-form agileinfo_form">
							@csrf
							@if(\Auth::check())
							<section class="creditly-wrapper wrapper">
								<div class="information-wrapper">
									<div class="first-row form-group">
										<div class="controls">
											<label class="control-label">Họ và tên</label>
											<input class="billing-address-name form-control" type="text" name="name" placeholder="Vui lòng nhập họ và tên" value="{{\Auth::user()->name}}">
											@if ($errors->has('name'))
												<span class="red">{{$errors->first('name')}}</span>
											@endif
										</div>
										<div class="controls">
											<label class="control-label">Email</label>
											<input class="billing-address-name form-control" type="text" name="email" placeholder="Vui lòng nhập họ và tên" value="{{\Auth::user()->email}}">
											@if ($errors->has('email'))
												<span class="red">{{$errors->first('email')}}</span>
											@endif
										</div>
										<div class="card_number_grids">
											<div class="card_number_grid_left">
												<div class="controls">
													<label class="control-label">Số điện thoại</label>
													<input class="form-control" name="phone" type="text" placeholder="Vui lòng nhập số điện thoại" value="{{\Auth::user()->phone}}">
													@if ($errors->has('phone'))
														<span class="red">{{$errors->first('phone')}}</span>
													@endif
												</div>
											</div>
											<div class="card_number_grid_right">
												<div class="controls">
													<label class="control-label">Địa chỉ </label>
													<input class="form-control" type="text" name="address" placeholder="Vui lòng nhập địa chỉ" value="{{\Auth::user()->address->first()->address1}}">
													@if ($errors->has('address'))
														<span class="red">{{$errors->first('address')}}</span>
													@endif
												</div>
											</div>
											<div class="card_number_grid_right">
												<div class="controls">
													<label class="control-label">Ghi chú </label>
													<textarea class="form-control" name="message" id="" cols="20" rows="5">
														
													</textarea>
													@if ($errors->has('message'))
														<span class="red">{{$errors->first('message')}}</span>
													@endif
												</div>
											</div>
											<div class="clear"> </div>
										</div>
									</div>
									<button class="submit check_out">Giao hàng đến địa chỉ này</button>
								</div>
							</section>
							@endif
						</form>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
	</section>
@endsection