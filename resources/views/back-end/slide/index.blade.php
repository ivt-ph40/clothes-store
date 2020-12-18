@extends('back-end.layouts.app')

@section('title')Quản lý slide @endsection

@section('content')
<h1 class="h3 mb-3 text-gray-800">Quản lý slide </h1>
<a class="btn btn-success mb-3" href="{{ route('slides.create') }}">Thêm <i class="fas fa-plus"></i></a>
@if(session()->has('error'))
    <p class="alert alert-danger">{{session()->get('error')}}</p>
@elseif(session()->has('status'))
    <p class="alert alert-success">{{ session('status') }}</p>
@endif
<table class="table shadow bg-white">
    <thead class="thead-dark">
        <tr>
            <th style="width: 15%">ID</th>
            <th style="width: 55%">Slide</th>
            <th style="width: 30%">Xoá</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($slides as $slide)
        <tr class="" data-id="" style="">
            <th scope="row">{{$slide->id}}</th>
            <th style="font-size: 20px;"><img src="{{asset($slide->photo_path)}}" alt="" style="width: 400px"></th>
            <td class="d-flex">
                <a href="" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{$slide->id}}">
                    <i class="fas fa-trash-alt"></i>
                </a><!-- Delete Button-->
                
                <!-- Delete Modal-->
                <div class="modal fade" id="deleteModal{{$slide->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Xoá</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        </div>
                        <div class="modal-body">Bạn có muốn Slide này?</div>
                        <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Trở lại</button>
                        <form action="{{ route('slides.destroy', $slide->id) }}" method="post">
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
@section('script')
    <script>
    $('.alert').delay(3500).fadeOut(500).queue(function (next) { 
        $(this).css('display', 'none'); 
        next();
    });
    </script>
@endsection