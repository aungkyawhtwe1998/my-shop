<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Portfolio</title>
    <link rel="shortcut icon" href="{{ asset('portfolio/img/programmer.svg') }}">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('portfolio/animate_it/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('portfolio/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('portfolio/slick/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('portfolio/portfolio-style.css') }}">
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
</head>

<body>
    <header class="container-fluid site-nav ">
        <div class="row">
            <div class="col-12 ">
                <div class="navbar navbar-expand-lg">
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
                                <a class="nav-link" href="{{ route('blogs.index') }}">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#contact">Contact</a>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>

        </div>
    </header>
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
                                <img src="{{ asset('portfolio/img/mobile-dev.svg') }}" class="service-img mb-2"
                                    alt="">
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
                                <img src="{{ asset('portfolio/img/photography.svg') }}" class="service-img mb-2"
                                    alt="">
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
                    <div class="col-12 col-lg-4">
                        <div class="d-flex flex-column align-items-center justify-content-center wow slideInLeft ani-delay-3"
                            style="height:350px;">
                            <div class="circle my-2">
                                <i class="fa fa-arrow-alt-circle-right fa-5x text-light"></i>
                            </div><br>
                            <a href="{{ route('blogs.index') }}" class="text">see more blog posts</a>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="container" id="contact">
        <div class="row">
            <div class="container-fluid">
                <div class="row mt-5 pt-3 align-items-center justify-content-center">
                    <div class="col-12 text-center">
                        <span class="text-title wow bounce">Contact or suggest me</span>
                    </div>
                    <div class="divider"></div>
                </div>

                <div class="row m-0 p-0">
                    <div class="col-12 col-lg-6 wow slideInLeft ani-delay-1">
                        <form action="{{ route('message.store') }}" method="POST"
                            class="my-card d-flex flex-column align-items-center">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" name="name" class="form-control my-input"
                                    placeholder="Enter your name">
                                @error('name')
                                    <small class="font-weight-bold text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <input type="email" name="email" class="form-control  my-input"
                                    placeholder="Enter your Email">
                                @error('email')
                                    <small class="font-weight-bold text-danger">{{ $message }}</small>

                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <textarea type="text" name="message" class="form-control my-input" rows="5"
                                    placeholder="Comment"></textarea>
                                @error('message')
                                    <small class="font-weight-bold text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <button class="btn-message border-3 text-light fw-bolder">Send
                                Message</button>

                            {{-- <div class="form-group justify-content-center align-items-center">
                            </div> --}}
                        </form>
                    </div>
                    <div class="col-12 col-lg-6 ">
                        <div class="my-card mt-4 wow p-3 slideInRight ani-delay-1">
                            <iframe class=""
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3701.237767292931!2d96.12430261432397!3d21.925409011940438!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30cb7273d6d0f81d%3A0x27d920dcc9b4b56d!2s52nd%20St%2C%20Mandalay%2C%20Myanmar%20(Burma)!5e0!3m2!1sen!2ssg!4v1621066874005!5m2!1sen!2ssg"
                                width="100%" height="300px" style="border:0;" allowfullscreen=""
                                loading="lazy"></iframe>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <footer class="col-12 footer">
                        <div class="container">
                            <div class="row my-3 align-items-center justify-content-center ">
                                <div class="col-12 col-lg-6 ">
                                    <div class="text-center d-flex flex-column text mb-5">
                                        <span class="fs-3 fw-bolder mb-3 fw-bolder">Contact</span>
                                        <span>Aung Kyaw Htwe</span>
                                        <span>No3,Between 51 & 52, 113 street, Mandalay</span>
                                        <span>Phone: <a href="tel:09798802184" class="text">09798802184</a></span>
                                        <span>Email: aungkyawhtwe.mdy49@gmail.com</span>
                                    </div>

                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="d-flex flex-column text-center fs-5 mytext">
                                        <span class="fs-3 fw-bolder fw-bolder">My Social Media platform</span>
                                        <div class="social-icon p-5 d-flex justify-content-center mt-3">
                                            <a href="https://www.facebook.com/alex.akh1998/">
                                                <i class="mx-3 fab fa-facebook-f mytext fa-2x "></i>
                                            </a>
                                            <a href="https://www.linkedin.com/in/aung-kyaw-htwe-851a48187/">
                                                <i class="fab mx-3 fa-linkedin mytext fa-2x"></i>
                                            </a>
                                            <a href="#">
                                                <i class="fab mx-3 fa-instagram mytext fa-2x"></i>
                                            </a>
                                            <a href="https://twitter.com/AlexAlexAKH">
                                                <i class="fab mx-3 fa-twitter mytext fa-2x"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="pb-5 fw-boler d-flex flex-column text-center fs-5">
                                        <span class="text-white"> © Copyright Myanmar. All Right Reserved</span>
                                        <span class="text-white"> Designed by<a href="#" class="text-light"> Aung Kyaw
                                                Htwe</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
        </div>
    </section>
    <script src="{{ asset('portfolio/js/jquery.js') }}"></script>
    <script src="{{ asset('portfolio/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('portfolio/slick/slick.min.js') }}"></script>
    <script src="{{ asset('portfolio/wow/wow.js') }}"></script>
    <script src="{{ asset('portfolio/way_point/jquery.waypoints.js') }}"></script>
    <script src="{{ asset('portfolio/js/app.js') }}"></script>
</body>

</html>
