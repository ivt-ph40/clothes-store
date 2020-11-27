@extends('back-end.layouts.app')

@section('title')Danh mục sản phẩm @endsection

@section('content')
<h1 class="h3 mb-3 text-gray-800">Danh mục sản phẩm</h1>
<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Tên Danh mục</th>
            <th scope="col">Danh mục cha</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $cate)
        <tr>
            <th scope="row">{{$cate->id}}</th>
            <td>{{$cate->name}}</td>
            <td>{{$cate->parent_id}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $categories->links() }}
@endsection