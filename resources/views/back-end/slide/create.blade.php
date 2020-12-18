@extends('back-end.layouts.app')
@section('title')Slide @endsection
@section('content')
    <h1>Slide</h1>
    <form action="{{ route('slides.store') }}" method="POST" class="col-md-4" enctype="multipart/form-data">
        @csrf
        @if (!$errors->has('photo_path'))
        <div class="form-group">
          <label for="">Chọn ảnh <i style="color:red">*</i></label>
          <input type="file" name="photo_path" id="photo_path" class="form-control-file" placeholder="">
          <img id="image" src="#" alt="" srcset="" width="200">
        </div>
        @else
        {{-- return when invalid --}}
        <div class="form-group">
            <label for="">Chọn ảnh <i style="color:red">*</i></label>
            <p id="" class="invalid-feedback">{{ $errors->first('photo_path') }}</p>
            <input type="file" name="photo_path" id="photo_path" class="form-control-file is-invalid" placeholder="">
            <img id="image" src="#" alt="" srcset="" width="200">
            
        </div>
        @endif
        <button class="btn btn-outline-success" type="submit">Tạo</button>
    </form>
    
   	
@endsection
@section('script')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function(e) {
                $('#image').attr('src', e.target.result);
                }
                
                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $("#photo_path").change(function() {
            readURL(this);
        });
    </script>
@endsection