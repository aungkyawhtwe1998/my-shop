<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','My Shop')</title>
    <link rel="shortcut icon" href="img/my-logo.png">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('portfolio/animate_it/animate.css') }}">
    {{-- <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.css"> --}}
    <link rel="stylesheet" href="{{ asset('portfolio/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('portfolio/slick/slick-theme.css') }}">
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
    <section class="container" id="contact">
        <div class="row">
            @include('layouts.host-footer')
        </div>
    </section>
    {{-- end footer --}}

    <script src="{{ asset('js/app.js') }}" <script src="{{ asset('js/app.js') }}"></script>
    @yield('foot')
    @include('layouts.toasts')
    @include('layouts.alert')



</body>

</html>
