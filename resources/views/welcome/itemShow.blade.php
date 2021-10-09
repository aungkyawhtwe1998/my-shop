@extends('layouts.host')

@section('title')
    {{ $item->title }}
@endsection

@section('style')
@endsection

@section('header')
    <div class="row header mt-0">
        @include('layouts.host-header')
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <x-host-bread-crumb>
                    <li class="breadcrumb-item"><a href="#">Items</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $item->title }}</li>
                </x-host-bread-crumb>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card blog-card rounded shadow">
                    <div class="card-header ">Item Detail</div>
                    <div class="card-body">
                        <h4 class="text-primary font-weight-bold">{{ $item->title }}</h4>

                        <span class="badge badge-pill badge-success">
                            <i class="feather-user"></i>
                            {{ $item->getUser->name }}
                        </span>
                        <span class="badge badge-pill badge-info">
                            <i class="feather-calendar"></i>
                            {{ $item->created_at->format('d M Y') }}
                        </span>
                        <hr>
                        <p >{{ $item->description }}</p>

                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card blog-card rounded shadow-sm">
                    <div class="card-body">
                        <div class="row d-flex justify-content-center align-items-center">
                            @foreach ($item->getPhotos as $img)
                                <div class="col-6">
                                    <img src="{{ asset('storage/items/' . $img->location) }}"
                                         class="rounded d-block w-100 my-1">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <form action="#" >
                    <button class="btn btn-primary w-100 mt-3">Buy</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('footer')
<div class="container-fluid ">
    <div class="row">
        <div class="container rounded bg-secondary">
            <div class="row mt-5 pt-3 align-items-center justify-content-center">
                <div class="col-12 text-center">
                    <h2 class="text-primary font-weight-bolder">Contact or suggest me</h2>
                </div>
                <div class="col-12">
                    <iframe class="rounded"
                        src="
                                https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3701.237767292931!2d96.12430261432397!3d21.925409011940438!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30cb7273d6d0f81d%3A0x27d920dcc9b4b56d!2s52nd%20St%2C%20Mandalay%2C%20Myanmar%20(Burma)!5e0!3m2!1sen!2ssg!4v1621066874005!5m2!1sen!2ssg"
                        width="100%" height="335px" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

                </div>
                <div class="col-12 col-lg-6 my-2">
                    <div class="text-center d-flex flex-column mb-5 text-white">
                        <h3 class="text-primary fw-bolder mb-3 fw-bolder">Contact</h3>
                        <span>Aung Kyaw Htwe</span>
                        <span>No3,Between 51 & 52, 113 street, Mandalay</span>
                        <span>Phone: <a href="tel:09798802184">09798802184</a></span>
                        <span>Email: aungkyawhtwe.mdy49@gmail.com</span>
                    </div>

                </div>
                <div class="col-12 col-lg-6 my-2">
                    <div class="d-flex flex-column text-center fs-5 mytext">
                        <h3 class="text-primary fw-bolder fw-bolder">My Social Media platform</h3>
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
                <div class="col-12 bg-secondary rounded">
                    <div class="py-5 fw-boler d-flex flex-column text-center fs-5">
                        <span class="text-white"> © Copyright Myanmar. All Right Reserved</span>
                        <span class="text-white"> Designed by<a href="#" class="text-light"> Aung Kyaw
                                Htwe</a></span>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('foot')
    <script>

    </script>
@endsection

