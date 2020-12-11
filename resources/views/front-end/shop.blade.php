@extends('front-end.layouts.master')

@section('title')
    <title>Clothes Store</title>
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
						<li>Shop</li>
					</ul>
				</div>
			</div>
		</div>
	<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
			<div class="container-fluid">
				@foreach($categories as $cate)
				<div class="inner-sec-shop px-lg-4 px-3">
					@foreach($cateChild as $child)
					@if($cate->id == $child->parent_id)
					<h3 class="tittle-w3layouts my-lg-4 mt-3">{{$child->id}}</h3>
					@endif
					@endforeach
				</div>
				@endforeach
			</div>
		</section>
@endsection