@extends('back-end.layouts.app')
@section('title')Tạo User @endsection
@section('content')
    <h1>Tạo User</h1>
    <form action="{{ route('users.store') }}" method="POST" class="col-md-4">
        @csrf
        @if (!$errors->has('name'))
        <div class="form-group">
          <label for="">Tên <i style="color:red">*</i></label>
          <input type="text" name="name" id="" class="form-control" placeholder="">
        </div>
        <div class="form-group">
            <label for="">Email <i style="color:red">*</i></label>
            <input type="email" name="email" id="" class="form-control" placeholder="">
        </div>
        <div class="form-group">
            <label for="">Mật khẩu <i style="color:red">*</i></label>
            <input type="password" name="password" id="" class="form-control" placeholder="">
        </div>
        <div class="form-group">
            <label for="">Vai trò (Role)</label>
            <select name="role_id" id="" class="form-control">
                @foreach ($roles as $role)
                <option value="{{$role->id}}">{{$role->name}}</option>
                @endforeach 
            </select>
        </div>
        @else
        {{-- return when invalid --}}
        <div class="form-group">
          <label for="">Tên danh mục <i style="color:red">*</i></label>
          <input type="text" name="name" id="" class="form-control is-invalid" placeholder="" value="{{old('name')}}">
          <p id="" class="invalid-feedback">{{ $errors->first('name') }}</p>
        </div>
        <div class="form-group">
            <label for="">Email <i style="color:red">*</i></label>
            <input type="email" name="email" id="" class="form-control" placeholder="" value="{{old('email')}}">
        </div>
        <div class="form-group">
            <label for="">Mật khẩu <i style="color:red">*</i></label>
            <input type="password" name="password" id="" class="form-control" placeholder="">
        </div>
        <div class="form-group">
            <label for="">Vai trò (Role)</label>
            <select name="role_id" id="" class="form-control">
                @foreach ($roles as $role)
                <option value="{{$role->id}}">{{$role->name}}</option>
                @endforeach 
            </select>
        </div>
        @endif
        <button class="btn btn-outline-success" type="submit">Tạo</button>
    </form>
@endsection