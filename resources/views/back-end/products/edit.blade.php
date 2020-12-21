@extends('back-end.layouts.app')
@section('title')
    Sửa sản phẩm
@endsection

@section('content')
    <h1 class="h3 mb-3 text-gray-800">Sửa sản phẩm</h1>
<form action="{{route('products.update', $product->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="row mb-3">
        <div class="col-md-6">
            <div class="form-group">
                {{-- Product Name --}}
                <label for="">Tên SP <i style="color:red">*</i></label>
                @if (!$errors->has('name'))
                <input type="text" name="name" id="" class="form-control" placeholder="" value="{{$product->name}}">
                @else
                <input type="text" name="name" id="" class="form-control is-invalid" placeholder="" value="{{$product->name}}">
                <p id="" class="invalid-feedback">{{ $errors->first('name') }}</p>
                @endif
            </div>
            {{-- Category --}}
            <div class="form-group">
                <label for="">Danh mục <i style="color:red">*</i></label>
                @if (!$errors->has('category_id'))
                <select class="form-control" name="category_id" id="">
                    @foreach ($categories as $cate)
                    <option value="{{$cate->id}}">{{$cate->name}}</option>
                    @endforeach
                </select>
                @else
                <select class="form-control is-invalid" name="category_id" id="">
                    @foreach ($categories as $cate)
                    <option value="{{$cate->id}}">{{$cate->name}}</option>
                    @endforeach
                </select>
                <p id="" class="invalid-feedback">{{ $errors->first('category_id') }}</p> --}}
                @endif
            </div>
            {{-- Product Price  --}}
            <div class="form-group">
                <label for="">Giá <i style="color:red">*</i></label>
                @if (!$errors->has('price'))
                <input type="text" name="price" id="" class="form-control" placeholder="" value="{{$product->price}}">
                @else
                <input type="text" name="price" id="" class="form-control is-invalid" placeholder=""  value="{{$product->price}}">
                <p id="" class="invalid-feedback">{{ $errors->first('price') }}</p>
                @endif
            </div>
             {{-- Product Size  --}}
            <div class="form-group">
                <label for="">Size <i style="color:red">*</i></label>
                @if (!$errors->has('size_id'))
                <select class="selectpicker form-control col-3" multiple name="size_id[]">
                    @foreach ($sizes as $size)
                    @if ($product->size->firstWhere('id', $size->id))
                        <option value="{{$size->id}}" selected>{{$size->name}}</option>
                    @else
                        <option value="{{$size->id}}">{{$size->name}}</option>
                    @endif
                    @endforeach
                </select>
                @else
                <select class="selectpicker form-control col-2 is-invalid" multiple name="size_id[]">
                    @foreach ($sizes as $size)
                    <option value="{{$size->id}}">{{$size->name}}</option>
                    @endforeach
                </select>
                <p id="" class="invalid-feedback">{{ $errors->first('size_id') }}</p>
                @endif
            </div>
            {{-- Product Images  --}}
            <div class="form-group">
                <label for="">Ảnh <i style="color:red">*</i></label>
                @if (!$errors->has('images'))
                <input type="file" name="images" id="" class="form-control-file" placeholder="" value="{{$product->images}}">
                @else
                <input type="file" name="images" id="" class="form-control-file is-invalid" placeholder="">
                <p id="" class="invalid-feedback">{{ $errors->first('image') }}</p>
                @endif
            </div>
            {{-- Product Description  --}}
            <div class="form-group">
                <label for="">Mô tả <i style="color:red">*</i></label>
                @if (!$errors->has('description'))
                <textarea class="form-control" name="description" id="description" rows="5">{{$product->description}}</textarea>
                @else
                <textarea class="form-control is-invalid" name="description" id="" rows="5">{{$product->description}}</textarea>
                <p id="" class="invalid-feedback">{{ $errors->first('description') }}</p>
                @endif
            </div>
        </div>

        <div class="col-md-6">
        {{-- Product Detail  --}}
            <div class="form-group">
                @if (!$errors->has('detail'))
                <label for="">Chi tiết Sản phẩm <i style="color:red">*</i></label>
                <textarea class="form-control" name="detail" id="detail" rows="5">{{$product->detail}}</textarea>
                @else
                <label for="">Chi tiết Sản phẩm <i style="color:red">*</i></label>
                <textarea class="form-control is-invalid" name="detail" id="" rows="5">{{$product->detail}}</textarea>
                <p id="" class="invalid-feedback">{{ $errors->first('detail') }}</p>
                @endif
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <button class="btn btn-outline-success" type="submit">Tạo</button>
    </div>
    
</form>

@endsection
@section('script')
    <script>
    $(document).ready(function() {
        $('.selectpicker').selectpicker();
        $('#description').summernote({
            height: 200,
        });
        $('#detail').summernote({
            height: 590,
            
        });

        // foreach($product->size as $p_size){
        //     if($p_size->id == $size->id){
        //         $('.size').attr("selected");
        //     }
        // }
    });
</script>
@endsection
