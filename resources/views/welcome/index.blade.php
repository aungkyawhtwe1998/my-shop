@extends('layouts.host')
@section('title')
    Alex
@endsection
@section('style')
    <style>
        body {
            /* background-color: black; */
        }

    </style>
@endsection
@section('header')
    <div class="row header mt-0">
        @include('layouts.host-header')
    </div>
@endsection
@section('content')
    {{-- home --}}
    <div class="container-fluid bg-dark" id="home">
        <div class="row py-5">
            <div class="container align-items-center justify-content-center">
                <div class="row mt-5 pt-3">

                    <div class="col-12 text-center ">
                        <div class="">
                            <span class="h1 text-primary font-weight-bold">Alex</span><span
                                class="h2 text-light">LifeStyle</span>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row justify-content-between">
                        <div class="">
                            {{ $posts->appends(Request::all())->links() }}
                        </div>
                        <div class="">
                            <select name="category" class="custom-select" onchange="window.location.href=this.value;">
                                <option value="{{ route('blogs.index') }}">All</option>
                                @foreach ($categories as $category)
                                    <option value="{{ route('blogs.showbyCategory', $category->id) }}">
                                        {{ $category->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        {{-- <label for="category_id" class="font-weight-bold text-warning">Choose
                            Categories</label> --}}

                    </div>


                </div>
            </div>
            {{-- <div class="col-12 col-md-6">
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
            </div> --}}
            {{--  --}}
        </div>

    </div>
    {{-- end home --}}

    {{-- blogs --}}
    <div class="container-fluid">
        <div class="row">
            <div class="container">
                <div class="row m-2">
                    @foreach ($posts as $post)
                        <div class="col-12 col-lg-4 col-md-6">
                            <div
                                class="card shadow rounded mb-1 wow slideInLeft ani-delay-1 p-1 justify-content-center align-content-center">
                                <div class="rounded show-thumbnail"
                                    style="background-image:url('{{ asset('storage/post-cover/' . $post->getPhoto->location) }}'); width:100%; height:200px">
                                </div>
                                <div class="">
                                    <span class="badge badge-pill badge-success">
                                        <i class="feather-user"></i>
                                        {{ $post->getUser->name }}
                                    </span>
                                    <span class="badge badge-pill badge-secondary"><i class="fas fa-clock text-light mr-2">
                                        </i>{{ $post->created_at->diffForHumans() }}
                                    </span>
                                </div>
                                <div class="my-2 text-left">

                                    <span class="h5 font-weight-bold">{{ $post->name }}</span>
                                    <p class="text-justify" style="color: black">
                                        <?php
                                        echo Str::substr(html_entity_decode($post->description, ENT_QUOTES), 0, 150);
                                        ?>
                                        <a class="text-primary"
                                            href="{{ route('blogs.show', ['category' => $post->getCategoryName->title, 'id' => $post->id]) }}">...read
                                            more</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>


    </div>
    {{-- end blogs --}}

    {{-- item --}}
    <div class="container-fluid" id="item">
        <div class="row">
            <div class="col-12">
                <h2 class="mt-3 text-primary text-center font-weight-bolder">Find Items</h2>
                <h4 class="mb-3 text-primary text-center font-weight-bold"><i class="feather-arrow-down"></i></h4>
                <div class="row">

                    @foreach ($items as $item)
                        <div class="col-12 col-md-3">
                            <div class="card my-card m-0 p-0 rounded bg-dark shadow mb-3">
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
