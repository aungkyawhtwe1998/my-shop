<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{asset('/img/trans-logo.png')}}" />
    <title>@yield('title','My Shop')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
@yield('style')

<body>
    @yield('header')

{{-- Nav bar --}}

{{-- end Nav Bar --}}

    @yield('content')

{{-- footer --}}
    @yield('footer')





    {{-- end footer --}}
    <script src="{{ asset('js/app.js') }}"></script>

    @yield('foot')
    @include('layouts.toasts')
    @include('layouts.alert')



</body>

</html>
