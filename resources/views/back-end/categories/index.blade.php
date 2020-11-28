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
            <th scope="col">Sửa - Xoá</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $cate)
        <tr>
            <th scope="row">{{$cate->id}}</th>
            <td>{{$cate->name}}</td>
            <td>{{$cate->parent_id}}</td>
            <td class="d-flex">
                <a href="{{ route('categories.edit', $cate->id) }}" class="btn btn-outline-info btn-sm">
                    <i class="fas fa-pencil-alt"></i>
                </a> <!-- Edit Button-->
                <a href="" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{$cate->id}}">
                    <i class="fas fa-trash-alt"></i>
                </a><!-- Delete Button-->
                
                <!-- Delete Modal-->
                <div class="modal fade" id="deleteModal{{$cate->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <form action="{{ route('categories.destroy', $cate->id) }}" method="post">
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
{{ $categories->links() }}
@endsection