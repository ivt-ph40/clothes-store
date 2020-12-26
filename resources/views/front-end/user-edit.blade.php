@extends('front-end.layouts.master')

@section('title')
    <title>Thanh Toán</title>
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
						<li>Sửa thông tin</li>
					</ul>
				</div>
			</div>
		</div>
	<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
		<div class="container">
			<div class="inner-sec-shop px-lg-4 px-3">
				<h3 class="tittle-w3layouts my-lg-4 mt-3">Sửa thông tin </h3>
				<div class="checkout-left row">
					<div class="col-md-8 address_form">
						<form action="{{route('user.update', $user->id)}}" method="post" class="creditly-card-form agileinfo_form">
                            @csrf
                            @method('put')
							<section class="creditly-wrapper wrapper">
								<div class="information-wrapper">
									<div class="first-row form-group">
										<div class="controls">
											<label class="control-label">Họ và tên<i style="color:red">*</i></label>
											<input class="billing-address-name form-control" type="text" name="name" placeholder="Vui lòng nhập họ và tên" value="{{$user->name}}">
										</div>
                                    </div>
                                    <div class="first-row form-group">
										<div class="controls">
											<label class="control-label">Email<i style="color:red">*</i></label>
											<input class="billing-address-name form-control" type="text" name="email" placeholder="Vui lòng email" value="{{$user->email}}">
										</div>
                                    </div>
                                    <div class="first-row form-group">
										<div class="controls">
											<label class="control-label">Số điện thoại<i style="color:red">*</i></label>
											<input class="billing-address-name form-control" type="text" name="phone" placeholder="Vui lòng số điện thoại" value="{{$user->phone}}">
										</div>
                                    </div>
                                    <div class="first-row form-group">
										<div class="controls">
											<label class="control-label">Địa chỉ<i style="color:red">*</i></label>
											<input class="billing-address-name form-control" type="text" name="address1" placeholder="Vui lòng nhập địa chỉ"
											value="@php
											if (\Auth::user()->address == null) {
												# code...
											} else {
												echo \Auth::user()->address->address1;
											}
											@endphp">
										</div>
									</div>
                                    <button class="submit check_out">Sửa thông tin</button>
								</div>
							</section>
						</form>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
	</section>
@endsection