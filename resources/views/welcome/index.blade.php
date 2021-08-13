@extends('layouts.host')
@section('title')
    Alex
@endsection
@section('style')
    <style>
        body {
            background-color: black;
        }

    </style>
@endsection
@section('header')
    @include('layouts.host-header')
@endsection
@section('content')
    {{-- home --}}
    <div class="container" id="home">
        <div class="row min-vh-100 py-5">
            <div class="col-12 col-md-6">
                <div class="my-3 justify-content-center">
                    <h1 class="text-primary font-weight-bolder">Ecommerce Myanmar</h1>
                    <p class="font-weight-bold text-light">Lorem ipsum dolor sit amet consectetur adipisicing
                        elit.
                        Veritatis accusantium fuga nisi unde
                        labore! Laudantium recusandae est dolorum iure harum nam nobis magnam provident
                        aliquam, dolorem at sapiente incidunt.</p>
                </div>
                <div class="">
                    <a href="{{ route('register') }}" class="btn btn-primary">Register as Seller</a>
                    <a href="#item" class="btn btn-outline-primary">Explore Items</a>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <img src="{{ asset('dashboard/img/item/ecommerce.svg') }}" class="w-75" alt="">
            </div>
        </div>
    </div>
    {{-- end home --}}

    {{-- item --}}
    <div class="container-fluid" id="item">
        <div class="row">
            <div class="col-12">
                <h2 class="mt-3 text-primary text-center font-weight-bolder">Find Items</h2>
                <h4 class="mb-3 text-primary text-center font-weight-bold"><i class="feather-arrow-down"></i></h4>
                <div class="row">

                    @foreach ($items as $item)
                        <div class="col-12 col-md-3">
                            <div class="card rounded bg-dark shadow mb-3">
                                <div class="card-body">
                                    <span class="text-primary font-weight-bold">{{ $item->title }}</span>
                                    <hr>
                                    <div class="">
                                        <span class="badge badge-pill badge-success">
                                            <i class="feather-user"></i>
                                            {{ $item->getUser->name }}
                                        </span>
                                        <span class="badge badge-pill badge-secondary">
                                            <i class="feather-calendar"></i>
                                            {{ $item->created_at->format('d M Y') }}
                                        </span>
                                    </div>
                                    <div class="text-center">
                                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

                                            <div class="carousel-inner">
                                                @foreach ($item->getPhotos as $key => $img)
                                                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                                        <div class="show-thumbnail rounded"
                                                            style="background-image:url('{{ asset('storage/items/' . $img->location) }}');">
                                                        </div>
                                                        {{-- <img src="{{ asset('storage/items/' . $img->location) }}"
                                                        class="item-thumbnial d-block w-100"> --}}
                                                    </div>
                                                @endforeach
                                            </div>
                                            {{-- <a class="carousel-control-prev" href="#carouselExampleIndicators"
                                            role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleIndicators"
                                            role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a> --}}
                                        </div>
                                        <p class="text-justify text-light">
                                            {{ substr($item->description, 0, 50) }} ...
                                            <a class="text-success font-weight-bold"
                                                href="{{ route('welcome-item.show', $item->id) }}">View Detail</a>
                                        </p>
                                    </div>
                                    <hr>
                                    <div class="d-flex justify-content-between align-items-center text-light">
                                        <div>
                                            <span class="text-black-50 font-weight-bold"><strike>{{ $item->original_price }}
                                                    KS</strike> </span>
                                            <span class="font-weight-bold"> {{ $item->promotion_price }} KS </span>
                                            <span
                                                class="badge badge-danger badge-pill p-1 m-0">{{ number_format((($item->original_price - $item->promotion_price) / $item->original_price) * 100, 1, '.', '') }}
                                                %</span>
                                        </div>
                                        <button class="btn btn-warning rounded shadow-sm btn-sm justify-content-center"><i
                                                class="fas fa-shopping-basket"></i></button>
                                    </div>

                                </div>
                            </div>
                        </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
@section('foot')
    <script>

    </script>
@endsection
