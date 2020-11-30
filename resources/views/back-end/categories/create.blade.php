@extends('back-end.layouts.app')
@section('title')Tạo Danh mục sản phẩm @endsection
@section('content')
    <h1>Tạo Danh mục</h1>
    <form action="{{ route('categories.store') }}" method="POST" class="col-md-4">
        @csrf
        @if (!$errors->has('name'))
        <div class="form-group">
          <label for="">Tên danh mục</label>
          <input type="text" name="name" id="" class="form-control" placeholder="">
        </div>
        <div class="form-group">
          <select name="parent_id" id="" class="form-control">
            <option value="0">Danh mục cha</option>
            @foreach ($categories as $cate)
            <option value="{{$cate->id}}">{{$cate->name}}</option>
            @endforeach 
          </select>
        </div>
        @else

        <div class="form-group">
          <label for="">Tên danh mục</label>
          <input type="text" name="name" id="" class="form-control is-invalid" placeholder="">
          <p id="" class="invalid-feedback">{{ $errors->first('name') }}</p>
        </div>
        <div class="form-group">
          <select name="parent_id" id="" class="form-control">
            <option value="0">Danh mục cha</option>
            @foreach ($categories as $cate)
            <option value="{{$cate->id}}">{{$cate->name}}</option>
            @endforeach 
          </select>
        </div>
        @endif
        <button class="btn btn-outline-success" type="submit">Tạo</button>
    </form>
    
   	
@endsection