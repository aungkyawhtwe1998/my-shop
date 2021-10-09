@extends('layouts.host')
@section('title')
    Alex
@endsection
@section('style')
@endsection
@section('header')
    <div class="row header mt-0">
        @include('layouts.host-header')
    </div>
@endsection
@section('content')
    {{-- home --}}
    <div class="container-fluid">
        <div class="row">
            <div class="container align-items-center justify-content-center">
                <div class="col-12">
                    <div class="text-center mt-5 pt-3">
                        <span class="h1 text-primary font-weight-bold">Alex</span><span class="h2 text-dark"> - Blog</span>
                    </div>
                    <div class="row justify-content-between">
                        <div class="">
                            {{ $posts->appends(Request::all())->links() }}
                        </div>
                        <div class="">
                                    <select name=" category" class="custom-select"
                            onchange="window.location.href=this.value;">
                            <option value="{{ route('welcome') }}">All</option>
                            @foreach ($categories as $category)
                                <option value="{{ route('welcome.showByCategory', $category->id) }}">
                                    {{ $category->title }}
                                </option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    {{-- end home --}}

    {{-- blogs --}}
    <div class="container-fluid">
        <div class="row">
            <div class="container">
                <div class="row">
                    @foreach ($posts as $post)
                        <div class="col-12 col-lg-4 col-md-6">
                            <div
                                class="blog-card shadow rounded mb-2 wow slideInLeft ani-delay-1 p-1 justify-content-center align-content-center">
                                <div class="rounded show-thumbnail"
                                    style="background-image:url('{{ asset('storage/post-cover/' . $post->getPhoto->location) }}'); width:100%; height:200px">
                                </div>
                                <div class="">
                                    <span class=" badge badge-pill
                                    badge-success">
                                    <i class="feather-user"></i>
                                    {{ $post->getUser->name }}
                                    </span>
                                    <span class="badge badge-pill badge-secondary"><i class="fas fa-clock text-light mr-2">
                                        </i>{{ $post->created_at->diffForHumans() }}
                                    </span>
                                </div>
                                <div class="my-2 text-left">
                                    <span class="h5 font-weight-bold">{!! html_entity_decode($post->name) !!}</span>
                                    <p class="text-justify" style="color: black">
                                        {!! substr(html_entity_decode($post->description), 0, 250) !!}
                                    </p>
                                    <form
                                        action="{{ route('welcome.show', ['category' => $post->getCategoryName->title, 'id' => $post->id]) }}"
                                        method="get">
                                        <button class="btn btn-secondary btn-sm" type="submit">Read More</button>
                                    </form>
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
    {{-- <div class="container-fluid mt-5" id="item">
        <div class="row min-vh-100">
            <div class="container bg-light">
                <div class="row my-3">
                    <div class="col-12">
                        <h2 class="mt-3 text-primary text-center font-weight-bolder">Explore Items</h2>
                        <h4 class="mb-3 text-primary text-center font-weight-bold"><i class="feather-arrow-down"></i></h4>
                        <div class="row">
                            @foreach ($items as $item)
                                <div class="col-12 col-md-6 col-lg-3">
                                    <div class="card m-0 p-0 rounded shadow mb-3">
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
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                <a class="carousel-control-next" href="#carouselExampleIndicators"
                                                    role="button" data-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                                </div>
                                                <p class="text-justify text-dark">
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
                                                    <span class="text-success font-weight-bold"> {{ $item->promotion_price }} KS </span>
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

        </div>
    </div> --}}
@endsection

@section('footer')
    <div class="container-fluid ">
        <div class="row">
            <div class="container rounded bg-secondary">
                <div class="row mt-5 pt-3 align-items-center justify-content-center">
                    <div class="col-12 text-center">
                        <h2 class="text-primary font-weight-bolder">Contact or suggest me</h2>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 p-3 ">
                        <div class="bg-light rounded p-3">
                            <form action="{{ route('message.store') }}" method="POST">
                                @csrf
                                <div class="form-group mb-3">
                                    <input type="text" name="name" class="form-control" placeholder="Enter your name">
                                    @error('name')
                                        <small class="font-weight-bold text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <input type="email" name="email" class="form-control" placeholder="Enter your Email">
                                    @error('email')
                                        <small class="font-weight-bold text-danger">{{ $message }}</small>

                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <textarea type="text" name="message" class="form-control" rows="5"
                                        placeholder="message"></textarea>
                                    @error('message')
                                        <small class="font-weight-bold text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <button class="btn btn-primary fw-bolder">Send
                                    Message</button>
                            </form>
                        </div>


                    </div>
                    <div class="col-12 col-md-6 col-lg-6">
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
    </div>
@endsection
@section('foot')
    <script>

    </script>
@endsection
