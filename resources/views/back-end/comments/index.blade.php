@extends('back-end.layouts.app')

@section('title')Đơn hàng @endsection

@section('content')
<h1 class="h3 mb-3 text-gray-800">Quản lý Đơn hàng</h1>
@if(session()->has('error'))
    <p class="alert alert-danger">{{session()->get('error')}}</p>
@elseif(session()->has('status'))
    <p class="alert alert-success">{{ session('status') }}</p>
@endif

<table class="table table-striped shadow bg-white">
    <thead class="thead-dark">
        <tr>
            <th style="width:2%">ID</th>
            <th style="width:8%">Tên</th>
            <th style="width:60%">Nội dung bình luận</th>
            <th>Sản phẩm</th>
            <th style="width:10%">Xoá</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($comments as $comment)
        <tr>
            <th>{{$comment->id}}</th>
            @if ($comment->user_id)
            <td>
                <a href="">{{$comment->user->name}}</a>
            </td>
            @else
            <td>{{$comment->name}}</td>
            @endif
            <td>{{$comment->content}}</td>
            <td>{{$comment->product->name}}</td>
            <td class="d-flex">
                <a href="" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{$comment->id}}">
                    <i class="fas fa-trash-alt"></i>
                </a><!-- Delete Button-->
                
                <!-- Delete Modal-->
                <div class="modal fade" id="deleteModal{{$comment->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Xoá</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        </div>
                        <div class="modal-body">Bạn có muốn xoá Bình luận?</div>
                        <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Trở lại</button>
                        <form action="{{ route('comments.destroy', $comment->id) }}" method="post">
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

{{ $comments->links() }}
@endsection

@section('script')
    <script>
    $('.alert').delay(2000).fadeOut(500).queue(function (next) { 
        $(this).css('display', 'none'); 
        next();
    });
    </script>
@endsection