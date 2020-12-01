@extends('back-end.layouts.app')
@section('tittle')
    Chi tiết sản phẩm
@endsection

@section('content')
    <div class="">
        <div>
            <p style="font-weight: bold">
                Tên sản phẩm: <h4>{{$product->name}}</h4>
            </p>
        </div>
        <div></div>
        <ul style="list-style-type: none">
            <li ></li>
            @foreach ($product->productImage as $image)
            <li><img src="{{asset($image->path)}}" alt="" width="300"></li>
            @endforeach
            <li>{{$product->price}}</li>
            <li>
                @foreach ($product->size as $size)
                {{$size->name . ','}}
                @endforeach
            </li>
            
            <li></li>
           
            <li>{!!$product->description!!}</li>
            <li>{!!$product->detail!!}</li>
        </ul>
    </div>
@endsection