@extends('layouts.host')
@section('content')
    <div class="container my-5 py-5">
        <div class="row align-items-center flex-column-reverse flex-lg-row">
            <div class="col-12 col-md-8 col-lg-8 pt-lg-5">
                <div class="mt-sm-5 wow slideInLeft pt-3">
                    <h1 class="fw-bold display-5 text-primary mt-2">
                        Aung Kyaw Htwe</h1>
                    <h2 class="w-bold  mt-2">
                        Web Developer</h2>
                    <div class="divider my-4"></div>
                    <p class="text-para  mt-2 content-2">
                        I am freelancer of Website and Application Devlopment.... "Creative thinking and
                        design idea are the main
                        important for User experience."
                    </p>
                </div>
            </div>
            <div class="col-12 p-0 col-md-4 col-lg-4 mt-lg-5 pt-lg-5 ">
                <div class="d-flex justify-content-center align-items-center">
                    <img src="{{asset('img/my-profile.png')}}" class="my-profile border border-primary" alt="">
                </div>
            </div>
        </div>

    </div>
    <div class="container bg-light rounded my-4">
        <div class="row align-items-center mt-5 p-3">
            <div class="col-12 col-lg-6">
                <img src="{{asset('img/about-me.svg')}}" class="w-100 rounded" alt="">
            </div>
            <div class="col-12 col-lg-6 p-0 m-0">
                <div class="p-3 py-3 wow slideInRight ani-delay-1">
                    <h1 class="fw-bold display-5 text-primary mt-2">
                        Why do I become a Developer?</h1>
                    <div class="divider my-4"></div>
                    <p class="">
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
    <div class="container bg-secondary rounded my-4">
        <div class="row align-items-center justify-content-center py-4">
            <div class="col-12 text-center">
                <h3 class="fw-bold display-5 text-primary mt-2">What do I offer?</h3>
            </div>
            <div class="divider"></div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-6 col-md-6">
                <div class=" my-card shadow m-3 wow fadeIn ani-delay-1">
                    <div class="">
                        <img src="{{asset('img/web-dev.svg')}}" class="service-img  mb-2" alt="">
                    </div>
                    <div class="">
                        <h4 class="text-primary fw-bolder wow bounce">Website Development</h4>
                        <p class="d-sm-block text-dark fs-4">
                            Ecommerce, blog, portfolio,andmin dashboard website,
                        </p>
                    </div>

                </div>
            </div>
            <div class="col-12 col-lg-6 col-md-6">
                <div class=" my-card shadow m-3 wow fadeIn ani-delay-2">
                    <div class="">
                        <img src="{{asset('img/ui-ux.svg')}}" class="service-img mb-2" alt="">
                    </div>
                    <div class="">
                        <h4 class="text-primary fw-bolder wow bounce">UI/UX Wireframe</h4>
                        <p class="d-sm-block text-dark fs-4">
                            Design website with creative thinking and good idea for User Experience.
                        </p>
                    </div>

                </div>
            </div>
            <div class="col-12 col-lg-6 col-md-6">
                <div class=" my-card shadow m-3 wow fadeIn ani-delay-3">
                    <div class="">
                        <img src="{{asset('img/mobile-dev.svg')}}" class="service-img mb-2" alt="">
                    </div>
                    <div class="">
                        <h4 class="text-primary fw-bolder wow bounce">Mobile App Development</h4>
                        <p class="d-sm-block text-dark fs-4">
                            Messagin app, travel app, health care app desining and development.
                        </p>
                    </div>

                </div>
            </div>

            <div class=" col-12 col-lg-6 col-md-6">
                <div class=" my-card shadow m-3">
                    <div class="">
                        <img src="{{asset('img/photography.sv')}}g" class="service-img mb-2" alt="">
                    </div>
                    <div class="">
                        <h4 class="text-primary fw-bolder wow bounce">Photography</h4>
                        <p class="d-sm-block text-dark fs-4">
                            Travel, restaurant receipe, cafetarian advertisement, model magazine page
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
