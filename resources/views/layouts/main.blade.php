<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel shop</title>
    <link rel="icon" href="{{asset("assets/images/favicon.ico")}}">
    <link rel="stylesheet" href="{{asset("assets/css/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/font-manrope.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/vendor/css/swiper-bundle.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/vendor/css/waves.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/main.min.css")}}">

</head>
<body>
@include('layouts.header')

<div class="mb-5 mt-5">
    @yield('content')
</div>

@include('layouts.footer')
<script src="{{asset("assets/vendor/js/jquery.min.js")}}"></script>
<script src="{{asset("assets/vendor/js/bootstrap.bundle.min.js")}}"></script>
<script src="{{asset("assets/vendor/js/waves.min.js")}}"></script>
<script src="{{asset("assets/vendor/js/lazyload.min.js")}}" async></script>
<script src="{{asset("assets/vendor/js/swiper-bundle.min.js")}}"></script>
<script src="{{asset("assets/js/main.min.js")}}"></script>
@stack('scripts')
</body>
</html>
