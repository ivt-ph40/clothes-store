@extends('back-end.layouts.app')
@section('title')Sửa thông tin User @endsection
@section('content')
    <h1>Sửa thông tin User</h1>
    <form action="{{ route('users.update', $user->id) }}" method="POST" class="col-md-4">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="">Tên <i style="color:red">*</i></label>
            @if (!$errors->has('name'))
            <input type="text" name="name" id="" class="form-control" placeholder="" value="{{$user->name}}">
            @else
            <input type="text" name="name" id="" class="form-control is-invalid" placeholder="" value="{{$user->name}}">
            <p id="" class="invalid-feedback">{{ $errors->first('name') }}</p>
            @endif
        </div>
        
        <div class="form-group">
            <label for="">Email <i style="color:red">*</i></label>
            @if (!$errors->has('email'))
            <input type="email" name="email" id="" class="form-control" placeholder=""  value="{{$user->email}}">
            @else
            <input type="email" name="email" id="" class="form-control is-invalid" placeholder="" value="{{$user->email}}">
            <p id="" class="invalid-feedback">{{ $errors->first('email') }}</p>
            @endif
        </div>

        <div class="form-group">
            <label for="">Số điện thoại</i></label>
            @if (!$errors->has('phone'))
            <input type="text" name="phone" id="" class="form-control" placeholder="" value="{{$user->phone}}">
            @else
            <input type="text" name="phone" id="" class="form-control is-invalid" placeholder="" value="{{$user->phone}}">
            <p id="" class="invalid-feedback">{{ $errors->first('phone') }}</p>
            @endif
        </div>
        

        <div class="form-group">
            <label for="">Vai trò (Role):</label>
            @foreach ($roles as $role)
            <div class="form-check form-check-inline">
                @if (!$user->role->firstWhere('id', $role->id))
                <input class="form-check-input" type="checkbox" id="" value="{{$role->id}}" name="role_id[]">
                @else
                <input class="form-check-input" type="checkbox" id="" value="{{$role->id}}" name="role_id[]" checked>
                @endif
                <label class="form-check-label" for="">{{$role->name}}</label>
            </div>
            @endforeach
            @if (!$errors->has('role_id'))
            @else
            <p id="" class="invalid-feedback">{{ $errors->first('role_id') }}</p>
            @endif
        </div>
       
        <button class="btn btn-outline-success" type="submit">Tạo</button>
    </form>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $('#check').click(function(){
                if('password' == $('#password').attr('type')){
                    $('#password').prop('type', 'text');
                }else{
                    $('#password').prop('type', 'password');
                }
                $('#check').toggle();
            });
        });
    </script>
@endsection