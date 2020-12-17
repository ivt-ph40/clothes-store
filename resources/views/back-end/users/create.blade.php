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
        @else
        <div class="form-group">
          <label for="">Tên <i style="color:red">*</i></label>
          <input type="text" name="name" id="" class="form-control is-invalid" placeholder="" value="{{old('name')}}">
          <p id="" class="invalid-feedback">{{ $errors->first('name') }}</p>
        </div>
        @endif

        @if (!$errors->has('email'))
        <div class="form-group">
            <label for="">Email <i style="color:red">*</i></label>
            <input type="email" name="email" id="" class="form-control" placeholder="">
        </div>
        @else
        <div class="form-group">
            <label for="">Email <i style="color:red">*</i></label>
            <input type="email" name="email" id="" class="form-control is-invalid" placeholder="" value="{{old('email')}}">
            <p id="" class="invalid-feedback">{{ $errors->first('email') }}</p>
        </div>
        @endif

        @if (!$errors->has('password'))
        <div class="form-group" style="position: relative">
            <label for="">Mật khẩu <i style="color:red">*</i></label>
            <input type="password" name="password" id="password" class="form-control" placeholder="">
            <i class="far fa-eye" id="check" style="position: absolute; top:33px; right:0px; padding:10px 35px; cursor: pointer; display:block"></i>
        </div>
        @else
        <div class="form-group" style="position: relative">
            <label for="">Mật khẩu <i style="color:red">*</i></label>
            <input type="password" name="password" id="password" class="form-control is-invalid" placeholder="">
            <i class="far fa-eye text-danger" id="check" style="position: absolute; top:33px; right:0px; padding:10px 35px; cursor: pointer; display:block"></i>
            <p id="" class="invalid-feedback">{{ $errors->first('password') }}</p>
        </div>
        @endif

        @if (!$errors->has('role_id'))
        <div class="form-group">
            <label for="">Vai trò (Role):</label>
            @foreach ($roles as $role)
            <div class="form-check form-check-inline">
                @if ($role->id != 2)
                <input class="form-check-input" type="checkbox" id="" value="{{$role->id}}" name="role_id[]">
                @else
                <input class="form-check-input" type="checkbox" id="" value="{{$role->id}}" name="role_id[]" checked>
                @endif
                <label class="form-check-label" for="">{{$role->name}}</label>
            </div>
            @endforeach
        </div>
        @else
        <div class="form-group">
            <label for="">Vai trò (Role):</label>
            @foreach ($roles as $role)
            <div class="form-check form-check-inline">
                @if ($role->id != 2)
                <input class="form-check-input" type="checkbox" id="" value="{{$role->id}}" name="role_id[]">
                @else
                <input class="form-check-input" type="checkbox" id="" value="{{$role->id}}" name="role_id[]" checked>
                @endif
                <label class="form-check-label" for="">{{$role->name}}</label>
            </div>
            @endforeach
            <p id="" class="invalid-feedback">{{ $errors->first('role_id') }}</p>
        </div>
        @endif
        
        
        
        {{-- <div class="form-group">
            <label for="">Vai trò (Role)</label>
            @foreach ($roles as $role)
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="" value="{{$role->id}}" name="role_id[]">
                <label class="form-check-label" for="">{{$role->name}}</label>
            </div>
            @endforeach --}}
            {{-- <select name="role_id" id="" class="form-control">
                @foreach ($roles as $role)
                <option value="{{$role->id}}">{{$role->name}}</option>
                @endforeach 
            </select> --}}
        {{-- </div> --}}
        {{-- @endif --}}
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
                $('.check').toggle();
            });
        });
    </script>
@endsection