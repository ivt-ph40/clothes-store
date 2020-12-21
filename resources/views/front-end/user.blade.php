@extends('front-end.layouts.master')

@section('title')
    <title>Giới thiệu</title>
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
						<li>Trang khách hàng</li>
					</ul>
				</div>
			</div>
		</div>
	<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
		<div class="container">
			<div class="a col-xs-12 col-sm-12 col-lg-9 float-left">
				<h4 style="color: #000000;">Xin chào,</h4>
				<!-- <div> -->
					<table class="table">
						  <thead>
						    <tr>
						      <th scope="col">STT</th>
						      <th scope="col">Đơn hàng</th>
						      <th scope="col">Ngày chuyển</th>
						      <th scope="col">Handle</th>
						    </tr>
						  </thead>
						  <tbody>
						    <tr>
						      <th scope="row">1</th>
						      <td>Mark</td>
						      <td>Otto</td>
						      <td>@mdo</td>
						    </tr>
						  </tbody>
						</table>
				<!-- </div> -->
			</div>
			<div class="b col-xs-12 col-sm-12 col-lg-3 float-right">
				<h4 style="color: #000000;">Tài khoản của tôi</h4>
			</div>
		</div>
	</section>
@endsection