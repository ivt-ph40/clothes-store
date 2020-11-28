@extends('back-end.layouts.app')
@section('title')Chỉnh sửa Danh mục sản phẩm @endsection
@section('content')
    <h1>Chỉnh sửa Danh mục</h1>
    <form action="{{ route('categories.update', $category->id) }}" method="POST" class="col-md-4">
        @csrf
        @method('put')
        <div class="form-group">
          <label for="">Tên danh mục</label>
        <input type="text" name="name" id="" class="form-control" placeholder="" value="{{$category->name}}">
        </div>
        <div class="form-group">
          <select name="parent_id" id="" class="form-control">
            <option value="0">Danh mục cha</option>
            @foreach ($categories as $cate)
                @if ($category->parent_id == $cate->id) //nếu cate có danh mục cha thì selected danh mục cha
                <option value="{{$cate->id}}" selected>{{$cate->name}}</option>
                @else
                <option value="{{$cate->id}}">{{$cate->name}}</option>
                @endif
            @endforeach
          </select>
        </div>
        <button class="btn btn-outline-success" type="submit">Sửa danh mục</button>
    </form>
@endsection