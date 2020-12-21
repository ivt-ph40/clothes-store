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
						<li>Chi tiết sản phẩm</li>
					</ul>
				</div>
			</div>
		</div>

		<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
			<div class="container">
				<div class="inner-sec-shop pt-lg-4 pt-3">
					<div class="row">
							<div class="col-lg-4 single-right-left ">
									<div class="grid images_3_of_2">
										<div class="flexslider1">
											<ul class="slides">
												<li data-thumb="{{asset($productDetail->productImage->path)}}">
													<div class="thumb-image"> <img src="{{asset($productDetail->productImage->path)}}" data-imagezoom="true" class="img-fluid" alt=" "> </div>
												</li>
											</ul>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								<div class="col-lg-8 single-right-left simpleCart_shelfItem">
									<h3>{{$productDetail->name}}</h3>
									<p><span class="item_price">{{number_format("$productDetail->price",0,"",".")}} VNĐ</span>
									</p>
									<div class="color-quality">
										<div class="color-quality-right">
											<h5>Số lượng :</h5>
											<input type="number" value="1" name="quantity">
										</div>
									</div>
									<div class="occasional">
										<h5>Size :</h5>
										@foreach($productDetail->size as $size)
										<div class="colr ert">
											<label class="radio">
												<input type="radio" data-name="{{$size->name}}"  name=size checked=""  value="{{$size->id}}">
												 {{$size->name}}
											</label>
										</div>
										@endforeach
										<div class="clearfix"> </div>
									</div>
									<div class="occasion-cart">
											<div class="googles single-item singlepage">
										
												<input type="hidden" name="cmd" value="_cart">
												<input type="hidden" name="add" value="1">
												<input type="hidden" name="googles_item" value="{{$productDetail->name}}">
												<input type="hidden" name="amount" value="{{$productDetail->price}}">
												<button type="submit" class="googles-cart pgoogles-cart btn-add-to-cart" data-id="{{$productDetail->id}}">
													Thêm vào giỏ hàng
												</button>
											</div>
									</div>
								</div>
								<div class="clearfix"> </div>
								<!--/tabs-->
								<div class="responsive_tabs col-12">
									<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
										<ul class="resp-tabs-list">
											<li>Mô tả</li>
											<li>Chi tiết sản phẩm</li>
											<li>Review</li>
										</ul>
										<div class="resp-tabs-container">
											<!--/tab_one-->
											<div class="tab1">
					
												<div class="single_page">
													<h6>{{$productDetail->name}}</h6>
													{!!$productDetail->description!!}
													<!-- skjbkjbdsklfnksdnfsdjfnsldkfjklsdlk -->
												</div>
											</div>
											<!--//tab_one-->
											<div class="tab3">
					
												<div class="single_page">
													<h6>{{$productDetail->name}}</h6>
													{!!$productDetail->detail!!}
												</div>
											</div>
											<div class="tab2">
					
												<div class="single_page">
													<div class="bootstrap-tab-text-grids                    	 	">
														<div class="bootstrap-tab-text-grid">
															<div class="bootstrap-tab-text-grid-right">
																@foreach($productDetail->comment as $comment)
																<ul class="mb-1">
																	<li><a href="#">{{$comment->name}}</a></li>
																	<p>{{$comment->content}}</p>
																</ul>
																@endforeach
															</div>
															<div class="clearfix"> </div>
														</div>
														<div class="add-review" >
															<h4>add a review</h4>
															<form action="{{route('comment.store')}}" method="post">
																@csrf
																<input class="form-control" type="text" name="name" placeholder="Nhập tên của bạn..." required="">
																<input type="hidden" name="product_id" value="{{$productDetail->id}}">
																<textarea name="content" required=""></textarea>
																<input type="submit" value="SEND">
															</form>
														</div>
													</div>
					
												</div>
											</div>
										</div>
									</div>
								</div>
								<!--//tabs-->
					
					</div>
				</div>
			</div>
		</section>
@endsection