@extends('back-end.layouts.app')
@section('title')Tạo Danh mục sản phẩm @endsection
@section('content')
    <h1>Tạo Danh mục</h1>
    <form action="{{ route('categories.store') }}" method="POST" class="col-md-4">
        @csrf
        <div class="form-group">
          <label for="">Tên danh mục <i style="color:red">*</i></label>
          @if (!$errors->has('name'))
          <input type="text" name="name" id="" class="form-control" placeholder="" value="{{old('name')}}">
          @else
          <input type="text" name="name" id="" class="form-control is-invalid" placeholder="" value="{{old('name')}}">
          <p id="" class="invalid-feedback">{{ $errors->first('name') }}</p>
          @endif
        </div>
        <div class="form-group">
          <select name="parent_id" id="" class="form-control">
            <option value="0">Danh mục cha</option>
            @foreach ($categories as $cate)
            <option value="{{$cate->id}}">{{$cate->name}}</option>
            @endforeach 
          </select>
        </div>
        <button class="btn btn-outline-success" type="submit">Tạo</button>
    </form>
@endsection