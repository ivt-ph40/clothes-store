  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset('js/sb-admin-2.min.js')}}"></script>

  <!-- Page level plugins -->
  <script src="{{asset('vendor/chart.js/Chart.min.js')}}"></script>

  <!-- Page level custom scripts -->
  {{-- <script src="{{asset('js/demo/chart-area-demo.js')}}"></script> --}}
  {{-- <script src="{{asset('js/demo/chart-pie-demo.js')}}"></script> --}}

  <!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<!-- include summernote js -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<!-- include datatables js -->
<script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

<script>
$('#search').keyup(function(){
  var query =$(this).val();
  if (query != '') {
    var _token = $('input[name="_token"]').val();
    // alert(_token);
    $.ajax({
      url:"{{route('autocomplete-ajax')}}",
      method:"post",
      data: {query:query, _token:_token},
      success: function(data){
        $('#search-ajax').fadeIn();
        $('#search-ajax').html(data);
      }
    });
  }
});
$(document).on('click', '.search-product-list', function(){
  $('#search').val($(this).text());
  $('#search-ajax').fadeOut();
});
</script>
@yield('script')