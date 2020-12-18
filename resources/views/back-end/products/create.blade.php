@extends('back-end.layouts.app')
@section('title')
    Thêm sản phẩm
@endsection

@section('content')
    <h1 class="h3 mb-3 text-gray-800">Thêm sản phẩm</h1>
<form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row mb-3">
        <div class="col-md-6">
            {{-- Product Name --}}
            <div class="form-group">
                @if (!$errors->has('name'))
                <label for="">Tên SP <i style="color:red">*</i></label>
                <input type="text" name="name" id="" class="form-control" placeholder="" value="{{old('name')}}">
                @else
                <label for="">Tên SP</label>
                <input type="text" name="name" id="" class="form-control is-invalid" placeholder="" value="{{old('name')}}">
                <p id="" class="invalid-feedback">{{ $errors->first('name') }}</p>
                @endif
            </div>
            {{-- Category ID --}}
            <div class="form-group">
                @if (!$errors->has('category_id'))
                <label for="">Danh mục <i style="color:red">*</i></label>
                <select class="form-control" name="category_id" id="">
                    @foreach ($categories as $cate)
                    <option value="{{$cate->id}}">{{$cate->name}}</option>
                    @endforeach
                </select>
                @else
                <label for="">Danh mục <i style="color:red">*</i></label>
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
                @if (!$errors->has('price'))
                <label for="">Giá <i style="color:red">*</i></label>
                <input type="text" name="price" id="" class="form-control" placeholder="" value="{{old('price')}}">
                @else
                <label for="">Giá <i style="color:red">*</i></label>
                <input type="text" name="price" id="" class="form-control is-invalid" placeholder="" value="{{old('price')}}">
                <p id="" class="invalid-feedback">{{ $errors->first('price') }}</p>
                @endif
            </div>
            {{-- Product Size  --}}
            <div class="form-group">
                @if (!$errors->has('size_id'))
                <label for="">Size <i style="color:red">*</i></label>
                <select class="selectpicker form-control col-3" multiple name="size_id[]">
                    @foreach ($sizes as $size)
                    <option value="{{$size->id}}">{{$size->name}}</option>
                    @endforeach
                </select>
                @else
                <label for="">Size <i style="color:red">*</i></label>
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
                @if (!$errors->has('images'))
                <label for="">Ảnh <i style="color:red">*</i></label>
                <input type="file" name="images" id="images" class="form-control-file" placeholder="">
                <img src="" alt="" id="imgImage" width="200">
                @else
                <label for="">Ảnh <i style="color:red">*</i></label>
                <input type="file" name="images" id="images" class="form-control-file is-invalid" placeholder="">
                <img src="" alt="" id="imgImage" width="200">
                <p id="" class="invalid-feedback">{{ $errors->first('images') }}</p>
                @endif
            </div>
            {{-- Product Description  --}}
            <div class="form-group">
                @if (!$errors->has('description'))
                <label for="">Mô tả <i style="color:red">*</i></label>
                <textarea class="form-control" name="description" id="description" rows="5">{{old('description')}}</textarea>
                @else
                <label for="">Mô tả <i style="color:red">*</i></label>
                <textarea class="form-control is-invalid" name="description" id="description" rows="5">{{old('description')}}</textarea>
                <p id="" class="invalid-feedback">{{ $errors->first('description') }}</p>
                @endif
            </div>
        </div>
        {{-- Product Detail  --}}
        <div class="col-md-6">
            <div class="form-group">
                @if (!$errors->has('detail'))
                <label for="">Chi tiết Sản phẩm <i style="color:red">*</i></label>
                <textarea class="form-control" name="detail" id="detail" rows="5">{{old('detail')}}</textarea>
                @else
                <label for="">Chi tiết Sản phẩm <i style="color:red">*</i></label>
                <textarea class="form-control is-invalid" name="detail" id="detail" rows="5">{{old('detail')}}</textarea>
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
    });

    function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function(e) {
                $('#imgImage').attr('src', e.target.result);
                }
                
                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }
    $("#images").change(function() {
        readURL(this);
    });
</script>
@endsection
