@extends('back-end.layouts.app')

@section('title')Danh sách sản phẩm @endsection

@section('content')
<h1 class="h3 mb-3 text-gray-800">Danh sách sản phẩm</h1>
<a class="btn btn-success mb-3" href="{{ route('products.create') }}">Thêm <i class="fas fa-plus"></i></a>
@if(session()->has('error'))
    <p class="alert alert-danger">{{session()->get('error')}}</p>
@endif
<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Tên</th>
            <th scope="col">Ảnh</th>
            <th scope="col">Giá</th>
            <th scope="col">Size</th>
            <th scope="col">Sửa - Xoá</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
            <th scope="row">{{$product->id}}</th>
            <td>{{$product->name}}</td>
            <td>
                @foreach ($product->images as $image)
                <img src="{{asset($image->path)}}" alt="" width="80px">
                @endforeach
            </td>
            <td>{{$product->price}}</td>
            <td>
                @foreach ($product->size as $size)
                    {{$size->name .', '}}
                @endforeach
            </td>
            
            <td class="d-flex">
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-outline-info btn-sm mr-1">
                    <i class="fas fa-pencil-alt"></i>
                </a> <!-- Edit Button-->
                <a href="" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{$product->id}}">
                    <i class="fas fa-trash-alt"></i>
                </a><!-- Delete Button-->
                
                <!-- Delete Modal-->
                <div class="modal fade" id="deleteModal{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <form action="{{ route('categories.destroy', $product->id) }}" method="post">
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

{{ $products->links() }}

@endsection