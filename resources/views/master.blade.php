<!DOCTYPE html>
<html>
<head>
    @include('layouts.head');
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @include('layouts.header')
​
        @include('layouts.sidebar')
​
        @yield('content')
        
        
    </div>
​
@include('layouts.footer')
</body>
</html>
<!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery/jquery-ui.min.js') }}"></script>
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{asset('plugins/select2/select2.full.min.js')}}"></script>

    <script src="{{asset('/plugins/input-mask/jquery.inputmask.js')}}"></script>
    <script src="{{asset('/plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
    <script src="{{asset('/plugins/input-mask/jquery.inputmask.extensions.js')}}"></script>

    <script src="{{ asset('plugins/jquery/raphael-min.js') }}"></script>
    <script src="{{ asset('plugins/morris/morris.min.js') }}"></script>
    <script src="{{ asset('plugins/sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('plugins/knob/jquery.knob.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('plugins/jQuery/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
    <script src="{{ asset('plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('plugins/fastclick/fastclick.js') }}"></script>
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
    <script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
    <script src="{{ asset('dist/js/demo.js') }}"></script>

    <script src="{{asset('plugins/select2/dist/js/select2.full.min.js')}}"></script>
    <script src="{{ asset('plugins/input-mask/jquery.inputmask.js')}}"></script>
    <script src="{{ asset('plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
    <script src="{{ asset('plugins/input-mask/jquery.inputmask.extensions.js')}}"></script>