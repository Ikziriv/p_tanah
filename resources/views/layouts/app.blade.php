<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>PT. Maja Raya Indah Semesta</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <link rel="stylesheet" href="{{ url('/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('/css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ url('/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ url('/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ url('/css/toastr.min.css') }}">
{{--     <link rel="stylesheet" href="{{ url('/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ url('/css/skeleton.css') }}"> --}}
    @yield('style')
</head>
<body data-spy="scroll" data-target="#sidemenu" data-offset="15">

<div id="app">
@include('layouts.partials.header')

<div class="container h-10" id="content">
    <div class="row h-100 mt-5">
        @include('layouts.partials.aside')
        <main class="col py-5">
            <div class="row">
                @yield('content')
            </div>
        </main>
    </div>
</div>
@include('layouts.partials.footer')
</div>

    <script src="{{url('js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{url('js/popper.min.js')}}"></script>
    <script src="{{url('js/bootstrap.min.js')}}"></script>
    <!-- Scripts -->
    <script src="{{url('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{url('js/jquery.fancybox.min.js')}}"></script>
    <script src="{{url('js/toastr.min.js')}}"></script>
    <script src="{{url('js/printThis.js')}}"></script>


    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    @yield('footer-script') 
</body>
</html>
