@extends('layouts.host')
@section('title')
    My Portfolio
@endsection
@section('style')
    <style>
        body {
            background-color: #000000 !important;
            height: 500vh;
        }

        body::before {
            z-index: -1;
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(#e25c14, #009176);
            clip-path: circle(40% at right 70%);
        }

        body::after {
            z-index: -2;
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(#037e67, #e25c14);
            clip-path: circle(20% at 10% 10%);
        }

    </style>
@endsection
@section('header')
    <header class="container-fluid site-nav ">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-12 ">
                        <div class="navbar navbar-expand-lg navbar-dark">
                            <a class="navbar-brand" href="#">
                                <img src="{{ asset('portfolio/img/programmer.svg') }}" class="my-logo" alt="">
                            </a>
                            <button class="navbar-toggler border-0" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <i class="fa fa-bars menu-icon"></i>
                            </button>
                            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('portfolio') }}">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#service">Sevices</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#about">About</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('blogs') }}">Blog</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#contact">Contact</a>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </header>
@endsection
@section('content')

    <section class="container-fluid portfo-body" id="home">
        <div class="row">
            <div class="container">
                <div class="row min-vh-100">
                    <div class="container-fluid">
                        <div class="row my-5 pt-5 my-lg-0 pt-lg-0 align-items-center flex-column-reverse flex-lg-row">
                            <div class="col-12 col-md-8 col-lg-8 pt-lg-5">
                                <div class="mt-sm-5 wow slideInLeft pt-3">
                                    <span class="text-title wow heartBeat animate__delay-1s">
                                        Aung Kyaw Htwe</span>
                                    <h2 class="w-bold text-light mt-2">
                                        Web Developer</h2>
                                    <div class="divider my-4"></div>
                                    <p class="text-para text-light mt-2 content-2">
                                        I am freelancer of Website and Application Devlopment.... "Creative thinking and
                                        design idea are the main
                                        important for User experience."
                                    </p>
                                </div>
                            </div>
                            <div class="col-12 p-0 col-md-4 col-lg-4 mt-lg-5 pt-lg-5 ">
                                <div class="d-flex justify-content-center align-items-center">
                                    <img src="{{ asset('portfolio/img/my-profile.png') }}"
                                        class="my-profile wow slideInRight" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="social-v wow slideInRight ani-delay-1">
                        <a href="https://www.facebook.com/alex.akh1998/">
                            <i class="fab fa-facebook-f mytext "></i>
                        </a>
                        <a href="https://www.linkedin.com/in/aung-kyaw-htwe-851a48187/">
                            <i class="fab fa-linkedin mytext "></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-instagram mytext "></i>
                        </a>
                        <a href="https://twitter.com/AlexAlexAKH">
                            <i class="fab fa-twitter mytext"></i>
                        </a>
                    </div>
                    <a class="scroll-to-next shadow animated fadeIn ani-delay-3" href="#service">
                        <img src="{{ asset('portfolio/img/mouse.svg') }}" class="w-50 animated bounce"
                            style="width: 15px ; animation-iteration-count: infinite" alt="">
                    </a>
                </div>
            </div>

    </section>
    <hr>

    <section class="container" id="service">
        <div class="row  min-vh-100 align-items-center">
            <div class="container ">
                <div class="row mt-5 pt-3 align-items-center justify-content-center">
                    <div class="col-12 text-center">
                        <span class="text-title wow bounce">What do I offer?</span>
                    </div>
                    <div class="divider"></div>
                </div>
                <div class="row item-slide">
                    <div class="col-12">
                        <div class=" my-card shadow m-3 wow fadeIn ani-delay-1">
                            <div class="">
                                <img src="{{ asset('portfolio/img/web-dev.svg') }}" class="service-img  mb-2" alt="">
                            </div>
                            <div class="">
                                <h4 class="mytext fw-bolder wow bounce">Website Development</h4>
                                <p class="d-sm-block text-light fs-4">
                                    Ecommerce, blog, portfolio,andmin dashboard website,
                                </p>
                            </div>

                        </div>
                    </div>
                    <div class="col-12">
                        <div class=" my-card shadow m-3 wow fadeIn ani-delay-2">
                            <div class="">
                                <img src="{{ asset('portfolio/img/ui-ux.svg') }}" class="service-img mb-2" alt="">
                            </div>
                            <div class="">
                                <h4 class="mytext fw-bolder wow bounce">UI/UX Wireframe</h4>
                                <p class="d-sm-block text-light fs-4">
                                    Design website with creative thinking and good idea for User Experience.
                                </p>
                            </div>

                        </div>
                    </div>
                    <div class="col-12">
                        <div class=" my-card shadow m-3 wow fadeIn ani-delay-3">
                            <div class="">
                                <img src="{{ asset('portfolio/img/mobile-dev.svg') }}" class="service-img mb-2" alt="">
                            </div>
                            <div class="">
                                <h4 class="mytext fw-bolder wow bounce">Mobile App Development</h4>
                                <p class="d-sm-block text-light fs-4">
                                    Messagin app, travel app, health care app desining and development.
                                </p>
                            </div>

                        </div>
                    </div>

                    <div class=" col-12">
                        <div class=" my-card shadow m-3 ">
                            <div class="">
                                <img src="{{ asset('portfolio/img/photography.svg') }}" class="service-img mb-2" alt="">
                            </div>
                            <div class="">
                                <h4 class="mytext fw-bolder wow bounce">Photography</h4>
                                <p class="d-sm-block text-light fs-4">
                                    Travel, restaurant receipe, cafetarian advertisement, model magazine page
                                </p>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <hr>

    <section class="container" id="about">
        <div class="row min-vh-100 align-items-center">
            <div class="container-fluid">
                <div class="row align-items-center mt-5 p-3">
                    <div class="col-12 col-lg-6">
                        <img src="{{ asset('portfolio/img/about-me.svg') }}"
                            class="w-100 rounded wow slideInLeft ani-delay-1" alt="">
                    </div>
                    <div class="col-12 col-lg-6 p-0 m-0">
                        <div class="p-3 py-3 wow slideInRight ani-delay-1">
                            <h1 class="fw-bold display-5 text-primary mt-2 text-title">
                                Why do I become a Developer?</h1>
                            <p class=" text-light fw-bold fs-5">
                                I am an Information Technology Engineering student. I had done my academic project by
                                software
                                development. I am very passionated about software designing, developing. I would
                                like to
                                build an ecosystem including mobile app and website to give useful services to my
                                customers.
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <hr>

    <section class="container" id="blog">
        <div class="row min-vh-100">
            <div class="container-fluid">
                <div class="row my-5 pt-3 align-items-center justify-content-center">
                    <div class="col-12 text-center">
                        <span class="text-title wow bounce">My Latest blog post</span>
                    </div>
                    <div class="divider"></div>
                </div>
                <div class="row item-slide m-2">
                    @foreach ($posts as $post)
                        <div class="col-12 col-lg-4 ">
                            <div
                                class="blog-card wow slideInLeft ani-delay-1 p-2 justify-content-center align-content-center">
                                <div class="rounded show-thumbnail"
                                    style="background-image:url('{{ asset('storage/post-cover/' . $post->getPhoto->location) }}'); width:100%; height:200px">
                                </div>
                                <div class="text-left">
                                    <i class="fas fa-clock text-light mr-2">
                                    </i>
                                    <span class="text-light">{{ $post->created_at->format('d M Y') }}
                                    </span>
                                </div>
                                <div class="my-2 text-left">
                                    <i class="fas fa-blog text-light text-primary "></i>
                                    <span class="mytext fw-bold">{{ Str::substr($post->name, 0, 25) }} ... </span>
                                    <p class="text-justify">
                                        <?php
                                        echo Str::substr(html_entity_decode($post->description, ENT_QUOTES), 0, 70);
                                        ?>
                                        <a href="{{ route('blogs.show', $post->id) }}">...read more</a>
                                    </p>
                                </div>
                            </div>

                        </div>
                    @endforeach

                    {{-- <div class="col-12 col-lg-4">
                    <div class="blog-card wow slideInLeft ani-delay-2">
                        <img src="{{ asset('portfolio/img/web-dev.jpg') }}" class="w-100" alt="">
                        <div class="d-flex flex-column align-items-end">
                            <div class="p-1">
                                <i class="fas fa-clock text-light mr-2">
                                </i>
                                <span class="text-light">2 day ago
                                </span>
                            </div>
                            <div class="p-2 my-2">
                                <i class="fas fa-blog text-light text-primary"></i>
                                <span class="mytext fw-bold">How to deploy a static website on AWS?</span>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="col-12 col-lg-4">
                    <div class="blog-card wow slideInLeft ani-delay-3">
                        <img src="{{ asset('portfolio/img/marketing-desing.jpg') }}" class="w-100" alt="">
                        <div class="d-flex flex-column align-items-end">
                            <div class="p-1">
                                <i class="fas fa-clock text-light mr-2">
                                </i>
                                <span class="text-light">1 day ago
                                </span>
                            </div>
                            <div class="p-2  my-2">
                                <i class="fas fa-blog text-light text-primary"></i>
                                <span class="mytext fw-bold">
                                    What are the basic web design principle?
                                </span>
                            </div>

                        </div>
                    </div>

                </div> --}}
                    <div class="col-12 col-lg-4">
                        <div class="d-flex flex-column align-items-center justify-content-center wow slideInLeft ani-delay-3"
                            style="height:350px;">
                            <div class="circle my-2">
                                <i class="fa fa-arrow-alt-circle-right fa-5x text-light"></i>
                            </div><br>
                            <a href="{{ route('blogs') }}" class="text">see more blog posts</a>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <hr>
@endsection
@section('foot')
    <script src="{{ asset('portfolio/js/jquery.js') }}"></script>
    {{-- <script src="{{ asset('portfolio/js/bootstrap.bundle.js') }}"></script> --}}
    <script src="{{ asset('portfolio/slick/slick.min.js') }}"></script>
    <script src="{{ asset('portfolio/wow/wow.js') }}"></script>
    <script src="{{ asset('portfolio/way_point/jquery.waypoints.js') }}"></script>
    <script src="{{ asset('portfolio/js/app.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
@endsection
