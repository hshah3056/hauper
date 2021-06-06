<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Welcome') }}</title>

    <!-- Styles -->
    {{--<link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="/admin/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="/admin/plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="/admin/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="/admin/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="/admin/plugins/summernote/summernote-bs4.min.css">

</head>
<body>
<div class="preloader flex-column justify-content-center align-items-center">
    {{--<img class="animation__shake" src="/admin/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">--}}
</div>
<div class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('layouts.header')
        @include('layouts.left-side')
        @yield('content')
        @include('layouts.footer')
    </div>
</div>


<!-- Scripts -->
{{--<script src="{{ asset('js/app.js') }}"></script>--}}
<script src="/admin/plugins/jquery/jquery.min.js"></script>
<script src="/admin/plugins/jquery-ui/jquery-ui.min.js"></script>
<script>$.widget.bridge('uibutton', $.ui.button)</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script src="/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/admin/plugins/chart.js/Chart.min.js"></script>
<script src="/admin/plugins/sparklines/sparkline.js"></script>
<script src="/admin/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="/admin/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<script src="/admin/plugins/jquery-knob/jquery.knob.min.js"></script>
<script src="/admin/plugins/sweetalert/sweetalert.min.js"></script>
<script src="/admin/plugins/moment/moment.min.js"></script>
<script src="/admin/plugins/daterangepicker/daterangepicker.js"></script>
<script src="/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="/admin/plugins/summernote/summernote-bs4.min.js"></script>
<script src="/admin/plugins/toastr/toastr.min.js" type="text/javascript"></script>
<script src="/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="/admin/dist/js/adminlte.js"></script>
<script src="/admin/dist/js/demo.js"></script>
<script src="/admin/dist/js/pages/dashboard.js"></script>
@yield('page-javascript')

<script>
    @if(session('errors'))
    toastr.error('{{ session('errors')->first() }}', "Error");
    @elseif(session('error'))
    toastr.error('{{ session('error') }}', "Oops..!!");
    @elseif(session('success'))
    toastr.success('{{ session('success') }}', "Hurray..!!");
    @endif
</script>

</body>
</html>
