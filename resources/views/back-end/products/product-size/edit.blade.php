@extends('back-end.layouts.app')
@section('tittle')
    Đổi số lượng size
@endsection

@section('content')
<div id="">
    @foreach ($product as $product)
    <form action="{{route('product.size.store', [$product->product_id, $product->size_id])}}" method="POST" class="col-4">'
        @csrf
        @method('put')
        
        <h3>Nhập số lượng của size</h3>
        <div class="form-group">
            <label for="">Số lượng</label>
            <input type="number" name="quantities" class="form-control" value="{{$product->quantities}}">
        </div>
        <button class="btn btn-success">Sửa</button>
    </form>
    @endforeach
</div>
@endsection