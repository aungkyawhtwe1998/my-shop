<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','My Shop')</title>
    <link rel="shortcut icon" href="{{ asset('portfolio/img/programmer.svg') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
@yield('style')

<body>

    @yield('header')

    {{-- Nav bar --}}
    {{-- <div class="container-fluid">
        <div class="row">
            @include('layouts.host-header')
        </div>
    </div> --}}
    {{-- end Nav Bar --}}

    @yield('content')

    {{-- footer --}}
    @yield('footer')

    
    {{-- end footer --}}
    <script src="{{ asset('portfolio/js/jquery.js') }}"></script>
    <script src="{{ asset('portfolio/slick/slick.min.js') }}"></script>
    <script src="{{ asset('portfolio/wow/wow.js') }}"></script>
    <script src="{{ asset('portfolio/way_point/jquery.waypoints.js') }}"></script>
    <script src="{{ asset('portfolio/js/app.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" <script src="{{ asset('js/app.js') }}"></script>

    @yield('foot')
    @include('layouts.toasts')
    @include('layouts.alert')



</body>

</html>
