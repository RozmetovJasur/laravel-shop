<!doctype html>
<html lang="en">
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <script src="{{  asset('assets/vendor/js/jquery.min.js') }}"></script>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
@include('layouts.header')

<div class="mb-5 mt-5">

    <main class="container">
        <div class="bg-light rounded">
            @yield('content')
        </div>
    </main>
</div>

@include('layouts.footer')
<script type="application/javascript">
    $(document).on('click', '.delete', function () {
        var url = $(this).attr('rel');
        if (confirm("Are you sure you want to delete this?")) {
            window.location.href = url
        } else {
            return false;
        }
    });
</script>
</body>
</html>
