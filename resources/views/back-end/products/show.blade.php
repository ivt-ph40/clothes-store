@extends('back-end.layouts.app')
@section('tittle')
    Chi tiết sản phẩm
@endsection

@section('content')
<h2>Chi tiết sản phẩm</h2>
    <div class="container row mx-auto pt-5">
        <div class="col-md-5">

            <img src="{{asset($product->productImage->path)}}" alt="" width="100%">
        </div>
        <div class="col-md-7">
            <div><h3>{{$product->name}}</h3></div>

            <div><h5>{{'Giá: ' . $product->price}}</h5></div>

            <div>
                <span>Size: </span>
                @foreach ($product->size as $size)
                <span>{{$size->name . ','}}</span>
                @endforeach
            </div>

            <div>{!!$product->description!!}</div>
        </div>

        <div class="mt-5">
            <h4>Thông tin chi tiết</h4>
            {!!$product->detail!!}
        </div>
    </div>
@endsection