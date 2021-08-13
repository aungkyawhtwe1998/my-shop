<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Admin Dashboard')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    @yield('mystyle')

    @yield('head')

</head>

<body>
    @guest
        @yield('content')
    @else
        <section class="main container-fluid">

            <div class="row">
                <!-- side bar start -->

                @include('layouts.sidebar')

                <!-- sidebar end -->

                <div class="col-12 col-lg-9 col-xl-10 py-3 vh-100 content" style="box-shadow:0 0 5px #00000020 inset;">
                    @include('layouts.header')

                    <!-- content area start -->
                    @yield('content')

                </div>
            </div>
        </section>
    @endguest

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    @yield('foot')

    @auth
        @empty(Auth::user()->phone) //if the use do not uplad phone number
            @include('user-profile.update-info')
        @endempty

    @endauth
    @include('layouts.toasts')
    @include('layouts.alert')

</body>

</html>
