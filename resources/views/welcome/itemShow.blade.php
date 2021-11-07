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
                    <li class="breadcrumb-item"><a href="">Web Development Courses</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $item->title }}</li>
                </x-host-bread-crumb>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card blog-card bg-secondary rounded shadow">
                    <div class="card-header ">Item Detail</div>
                    <div class="card-body">
                        <h4 class="text-primary font-weight-bold">{{ $item->title }}</h4>

                        <span class="badge badge-pill badge-success">
                            <i class="feather-user"></i>
                            @isset($category->getUser->name) {{$category->getUser->name}} @endisset
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

@section('footer-layout')
    <div class="container rounded bg-secondary">
        <div class="row mt-5 pt-3 align-items-center justify-content-center">
            <div class="col-12 text-center">
                <h2 class="text-primary font-weight-bolder">Contact or suggest me</h2>
            </div>
            <div class="col-12 col-lg-6 my-3">
                <div class="text-center d-flex flex-column mb-5 text-white">
                    <h3 class="text-success fw-bolder mb-3 fw-bolder">Contact</h3>
                    <span>Aung Kyaw Htwe</span>
                    <span>No3,Between 51 & 52, 113 street, Mandalay</span>
                    <span>Phone: <a href="tel:09798802184">09798802184</a></span>
                    <span>Email: aungkyawhtwe.mdy49@gmail.com</span>
                </div>

            </div>
            <div class="col-12 col-lg-6 my-3 ">
                <div class="d-flex flex-column text-center fs-5">
                    <h3 class="text-success fw-bolder fw-bolder">My Social Media platform</h3>
                    <div class="p-5 d-flex justify-content-center align-items-center mt-3">
                        <a href="https://www.facebook.com/codeLex.mm">
                            <i class="mx-3 fab social-icon fa-facebook-f fa-2x "></i>
                        </a>
                        <a href="https://www.youtube.com/channel/UCIwB3osrjw9mjX9Heny2V9Q">
                            <i class="fab mx-3 social-icon fa-youtube fa-2x"></i>
                        </a>
                        <a href="https://github.com/aungkyawhtwe1998">
                            <i class="fab mx-3 social-icon fa-github fa-2x"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="col-12 bg-dark rounded mb-2">
                    <div class="py-5 d-flex flex-column text-center fs-5">
                        <span class="text-white"> © Copyright Myanmar. All Right Reserved</span>
                        <span class="text-white"> Designed by<a href="#" class="text-light"> Aung Kyaw Htwe</a></span>
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

