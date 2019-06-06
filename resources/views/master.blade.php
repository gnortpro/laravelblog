<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="api_token" content="{{ (Auth::user()) ? Auth::user()->api_token : '' }}">
  <base href="{{asset('')}}">
  <input type="hidden" value="{{env('API_URL')}}" id="api_url">
  <title>Trong Blog Home</title>
  <!-- plugins:css -->

  <link rel="stylesheet" href="{{asset('/node_modules/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('/node_modules/flag-icon-css/css/flag-icon.min.css')}}">
  <link rel="stylesheet" href="{{asset('/node_modules/perfect-scrollbar/css/perfect-scrollbar.css')}}">
  <link rel="stylesheet" href="{{asset('/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')}}">
  <link rel="stylesheet" href="{{asset('/node_modules/icheck/skins/all.css')}}">
  {{-- <link rel="stylesheet" href="{{asset('/node_modules/sweetalert/dist/sweetalert2.min.css')}}"> --}}
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="{{asset('/node_modules/jvectormap/jquery-jvectormap.css')}}" />
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('/css/style.css')}}">
  <script src="{{asset('/node_modules/jquery/dist/jquery.min.js')}}"></script>

  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" />
</head>

<body>
  <div class="container-scroller">
    @include('header')
    <!-- partial -->
    <div class="main-panel">
      <div class="content-wrapper">
        @yield('content')
      </div>
      <!-- content-wrapper ends -->
      @include('footer')
    </div>
    <!-- main-panel ends -->
  </div>
  <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->

  <script src="{{asset('/node_modules/popper.js/dist/umd/popper.min.js')}}"></script>
  <script src="{{asset('/node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('/node_modules/datatables.net/js/jquery.dataTables.js')}}"></script>
  <script src="{{asset('/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js')}}"></script>
  <script src="{{asset('/node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js')}}"></script>
  <script src="{{asset('/node_modules/icheck/icheck.min.js')}}"></script>
  <script src="{{asset('/node_modules/tinymce/tinymce.min.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="{{asset('/node_modules/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{asset('/node_modules/chart.js/dist/Chart.min.js')}}"></script>
  <script src="{{asset('/node_modules/jvectormap/jquery-jvectormap.min.js')}}"></script>
  <script src="{{asset('/node_modules/jvectormap/tests/assets/jquery-jvectormap-world-mill-en.js')}}"></script>
  <script src="{{asset('/node_modules/sweetalert/dist/sweetalert.min.js')}}"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{asset('js/off-canvas.js')}}"></script>
  <script src="{{asset('js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('js/misc.js')}}"></script>
  <script src="{{asset('js/settings.js')}}"></script>
  <script src="{{asset('js/todolist.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{asset('js/dashboard.js')}}"></script>
  <script src="{{asset('js/data-table.js')}}"></script>
  <script src="{{asset('js/iCheck.js')}}"></script>
  <script src="{{asset('js/editorDemo.js')}}"></script>
  <script src="{{asset('js/jquery.cookie.js')}}"></script>

  <!-- End custom js for this page-->
</body>

</html>