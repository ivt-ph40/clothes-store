@extends('back-end.layouts.app')

@section('title')Đơn hàng @endsection

@section('content')
<h1 class="h3 mb-3 text-gray-800">Quản lý Đơn hàng</h1>
@if(session()->has('error'))
    <p class="alert alert-danger">{{session()->get('error')}}</p>
@endif

<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th style="width:2%">ID</th>
            <th style="width:8%">Tên</th>
            <th style="width:70%">Nội dung bình luận</th>
            <th>Sản phẩm</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($comments as $comment)
        <tr>
            <th>{{$comment->id}}</th>
            @if ($comment->user_id)
            <td>{{$comment->user->name}}</td>
            @else
            <td>{{$comment->name}}</td>
            @endif
            <td>{{$comment->content}}</td>
            <td>{{$comment->product->name}}</td>
            
        </tr>
        @endforeach
    </tbody>
</table>

{{ $comments->links() }}
@endsection