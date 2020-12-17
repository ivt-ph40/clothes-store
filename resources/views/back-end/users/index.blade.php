@extends('back-end.layouts.app')

@section('title')Quản lý người dùng @endsection

@section('content')
<h1 class="h3 mb-3 text-gray-800">Quản lý người dùng</h1>
<a class="btn btn-success mb-3" href="{{ route('users.create') }}">Thêm <i class="fas fa-plus"></i></a>
@if(session()->has('error'))
    <p class="alert alert-danger">{{session()->get('error')}}</p>
@elseif(session()->has('status'))
    <p class="alert alert-success">{{ session('status') }}</p>
@endif
<table class="table table-striped shadow bg-white">
    <thead class="thead-dark">
        <tr>
            <th style="width: 15%">ID</th>
            <th style="width: 25%">Tên</th>
            <th style="width: 10%">Email</th>
            <th style="width: 10%">Số điện thoại</th>
            <th style="width: 20%">Vai trò</th>
            <th style="width: 10%">Sửa - Xoá</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr class="">
            <th scope="row">{{$user->id}}</th>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->phone}}</td>
            <td class="">
                <form action="{{route('user.role.store', $user->id)}}" method="post" class="d-flex">
                @csrf
                @method('put')
                <div class="form-group">
                    <div class="form-check form-check-inline">
                        @foreach ($roles as $role)
                            @if ($user->role->firstWhere('id', $role->id))
                            <input class="form-check-input" type="checkbox" id="" value="{{$role->id}}" name="role_id[]" checked>
                            <label class="form-check-label mr-3" for="">{{$role->name}}</label>
                            @else
                            <input class="form-check-input" type="checkbox" id="" value="{{$role->id}}" name="role_id[]">
                            <label class="form-check-label mr-3" for="">{{$role->name}}</label>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-outline-primary btn-sm">Sửa</button>
                </div>
                </form>    
            </td>
            <td class="d-flex">
                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-outline-info btn-sm mr-1">
                    <i class="fas fa-pencil-alt"></i>
                </a> <!-- Edit Button-->
                <a href="" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{$user->id}}">
                    <i class="fas fa-trash-alt"></i>
                </a><!-- Delete Button-->
                
                <!-- Delete Modal-->
                <div class="modal fade" id="deleteModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Xoá</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        </div>
                        <div class="modal-body">Bạn có muốn xoá Danh mục này?</div>
                        <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Trở lại</button>
                        <form action="{{ route('users.destroy', $user->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-primary" type="submit">Xoá</button>
                        </form>
                        </div>
                    </div>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
{{-- @section('script')
    <script>
        $(document).ready(function(){
            $('.cate-parent').click(function(e){
                var cate_parent = $(this).attr('data-id');
                var cate_child_id = ".cate-child-"+cate_parent;
                $(cate_child_id).fadeToggle(100);
                var caret_id = ".caret"+cate_parent;
                $(caret_id).toggle();
            });
        });
    </script>
@endsection --}}