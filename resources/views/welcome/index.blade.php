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
                                class="h2 text-light"> - Blog</span>
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
                                    <span class="h5 font-weight-bold">{!!html_entity_decode($post->name)!!}</span>
                                    <p class="text-justify" style="color: black">
                                        {!!substr(html_entity_decode($post->description), 0, 300)!!}
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
    <div class="container-fluid bg-dark" id="item">
        <div class="row">
            <div class="col-12">
                <h2 class="mt-3 text-primary text-center font-weight-bolder">Find Items</h2>
                <h4 class="mb-3 text-primary text-center font-weight-bold"><i class="feather-arrow-down"></i></h4>
                <div class="row">

                    @foreach ($items as $item)
                        <div class="col-12 col-md-3">
                            <div class="card my-card m-0 p-0 rounded bg-secondary shadow mb-3">
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
@section('footer')
<div class="container-fluid bg-secondary">
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
                        <button class="btn btn-primary fw-bolder">Send
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
</div>
@endsection
@section('foot')
    <script>

    </script>
@endsection
