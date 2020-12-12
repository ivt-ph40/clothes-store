@extends('back-end.layouts.app')
@section('title')
    Size
@endsection

@section('content')
<h2>Sản phẩm: {{$product->name}}</h2>
<table class="table table-striped col-4">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Size</th>
            <th scope="col">Số lượng</th>
            <th>Sửa</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($product->size as $size)
        <tr>
            <td>{{$size->name}}</td>

            <td>{{$size->pivot->quantities}}</td>

            <td>
            <a href="{{route('product.size.edit', [$product->id, $size->id])}}" class="btn btn-info btn-sm" id="formButton" data-id="{{$size->id}}" data-name="{{$size->name}}"><i class="fas fa-pencil-alt"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<a href="{{route('products.index')}}" class="btn btn-info"><i class="fas fa-long-arrow-alt-left"></i> Tất cả sản phẩm</a>

{{-- <div id="show-form">

</div> --}}
{{-- 
@section('script')
<script>
    $(document).ready(function(){
        $("#show-form").hide();
        $('a').click(function(e){
            e.preventDefault();

            var size_id = $(this).attr('data-id');
            var size_name = $(this).attr('data_name');
            
            var form =  "<form action="+'"'+"{{route("+"'sizes.store'"+", "+size_id+")}}"+'"'+ 'method="POST" class="col-4">'+
                            '@csrf'+
                            '<h3>Nhập số lượng của size {{$size->name}}</h3>'+
                            '<div class="form-group">'+
                                '<label for="">Số lượng</label>'+
                                '<input type="text" name="quantities" class="form-control">'+
                            '</div>'+
                            '<button class="btn btn-success">Sửa</button>'+
                        '</form>';
            $('#show-form').append(form);

            if($("#show-form").is(":visible")){
                $('#show-form').html('');
                $("#show-form").hide();
            } else {
                $("#show-form").show();
            }
            
            return false;
        });
    });
</script> --}}
{{-- @endsection --}}

@endsection