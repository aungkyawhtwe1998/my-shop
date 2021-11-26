@extends('layouts.host')
@section('title')
    Code-Lex
@endsection
@section('style')
@endsection
@section('content')

    {{-- home --}}
    <div class="container-xl">
        <div class="row mt-5 pt-5 justify-content-between align-items-center ">
            <div class="col-12 col-lg-6">
                <div>
                    <div class="d-flex justify-content-center align-items-center ">
                        <span class="home-text animate__animated animate__heartBeat ">C</span> <img src="{{asset(\App\Base::$logo)}}" width="50px" height="50px" class="logo-size animate__animated animate__rotateIn animate__delay-1s" alt="Logo"/> <span class="home-text animate__animated animate__heartBeat">DE-LEX</span>
                    </div>
                    <div class="text-center mt-3 align-items-center  animate__animated animate__zoomIn animate__delay-1s">
                        <h4 class="fw-bold text-primary animate__animated animate__zoomIn animate__delay-2s">Code Lex is the personal Blog especially <br> for web development and IT.</h4>
                    </div>
                    <div class="mt-4 d-flex flex-column align-items-center justify-content-center">
                        <div class="">
                            <a href="{{route('welcome')}}/#contact" class="btn btn-primary  animate__animated animate__zoomIn animate__delay-2s ">Contact me
                            </a>
                            <a href="{{route('welcome')}}/#blog" class="btn btn-outline-primary  animate__animated animate__zoomIn animate__delay-2s">Read Blogs</a>
                        </div>
                        <div class="mt-2">
                            <div class="divider bg-success  animate__animated animate__zoomIn animate__delay-3s"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="text-center">
                    <img src="{{asset('/img/vector.svg')}}" class="animate__animated animate__zoomIn" width="80%">
                </div>
            </div>
        </div>
    </div>
    {{-- end home --}}

    {{--    about --}}
    <div class="container-xl rounded bg-dark min-vh-50 " id="about" >
        <div class="row align-items-center justify-content-center my-3" >
            <div class="col-12 col-lg-6 mt-5 justify-content-center align-items-center">
                <div class="">
                    <img src="{{asset('/img/vect2.svg')}}" class="rounded" width="100%" alt="Services">
                </div>
            </div>
            <div class="col-12 col-lg-6 justify-content-center align-items-center">
                <div class="">
                    <span class="h3 home-text">Objective</span>
                    <div class="divider"></div>
                    <div class="text-left">
                        <p class="fw-bold text-justify text-white">&emsp; This is my personal website for web development journey. I would like to expend my knowledge in web development through this website. I will maintain the website to keep up and running. I would like to thanks all the subscriber to my Youtube channel and Facebook. This blog is intended to upload web development tips and tricks for the beginner and intermediate.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{-- blogs --}}
    <div class="container-xl align-items-center justify-content-center " id="blog">
        <div class="row">
            <div class="col-12">
                <div class="d-flex flex-column text-center mt-5 pt-3 justify-content-center align-items-center">
                    <span class="h3 home-text">Latest Articles</span>
                    <div class="divider"></div>
                </div>

            </div>
            <div class="col-12 ">
                {{--<div class="d-flex justify-content-between align-items-center">
                    <div class="Page navigation example">
                        {{ $posts->appends(Request::all())->links() }}
                    </div>
                    <div class="btn-group p-0 mb-2">
                        <button type="button"  name="category" class="btn  btn-outline-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            Categories
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ route('welcome') }}">All</a>
                            @foreach ($categories as $category)
                                <a class="dropdown-item" href="{{ route('welcome.showByCategory', $category->id) }}">
                                    {{ $category->title }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                    --}}{{--<div class="">
                        <select name=" category" class="custom-select" onchange="window.location.href=this.value;">
                            <option value="{{ route('welcome') }}">All</option>
                            @foreach ($categories as $category)
                                <option value="{{ route('welcome.showByCategory', $category->id) }}">
                                    {{ $category->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>--}}{{--
                </div>--}}
            </div>
            <div class="col-12">
                <div class="row">
                    @foreach ($posts as $post)
                        <div class="col-12 col-lg-4 col-md-4">
                            <div class="blog-card shadow rounded mb-2 p-2 justify-content-center align-content-center">
                                <div class="rounded show-thumbnail"
                                     style="background-image:url('{{ asset('storage/post-cover/' . $post->thumbnail->location) }}'); width:100%; height:200px; background-position: center; background-size: cover">
                                </div>
                                <div class="mt-1">
                                    <span class=" badge badge-pill bg-success"><i class="feather-user"></i>
                                        @isset($post->users->name ) {{$post->users->name }} @endisset </span>
                                    <span class="badge badge-pill bg-dark"><i class="fas fa-clock text-light mr-2">
                                        </i>{{ $post->created_at->diffForHumans() }}
                                    </span>
                                </div>
                                <div class="my-2 text-left">
                                    <span class="h5 fw-bold">{!! html_entity_decode($post->name) !!}</span>
                                    <p class="text-justify" style="color: black">
                                        {!! substr(html_entity_decode($post->description), 0, 250) !!}
                                    </p>
                                    <a href="{{route('blogs.show',$post->id)}}" class="btn btn-outline-primary">Read more</a>
                                    {{--<form
                                        action="{{ route('blogs.show', ['category' => $post->categories->title, 'id' => $post->id]) }}"
                                        method="get">
                                        <button class="btn btn-primary btn-sm" type="submit">Read More</button>
                                    </form>--}}
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
                <div class="d-flex">
                    <div class="col-12 text-center">
                        <a href="{{route('blogs.index')}}" class="btn btn-primary my-3 ">Explore More >> </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end blogs --}}

    {{-- item --}}
   {{--  <div class="container-fluid  ">
         <div class="row">
             <div class="container-xl mt-5 bg-light rounded " id="item">
                 <div class="row my-3">
                     <div class="col-12">
                         <div class="d-flex flex-column text-center justify-content-center align-items-center">
                             <span class="h1 mt-3 home-text text-center ">Web Development Courses</span>
                             <div class="divider bg-primary"></div>
                         </div>

                         <div class="row">
                             @foreach ($items as $item)
                                 <div class="col-12 col-md-6 col-lg-3">
                                     <div class="card m-0 p-0 rounded shadow mb-3">
                                         <div class="card-body">
                                             <span class="text-primary fw-bold">{{ $item->title }}</span>
                                             <hr>
                                             <div class="">
                                                <span class="badge badge-pill badge-success">
                                                    <i class="feather-user"></i>
                                                    @isset($item->getUser->name ) {{$item->getUser->name }} @endisset
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
                                                     <a class="text-success fw-bold"
                                                        href="{{ route('welcome-item.show', $item->id) }}">View Detail</a>
                                                 </p>
                                             </div>
                                             <hr>
                                             <div class="d-flex justify-content-between align-items-center text-light">
                                                 <div>
                                                    <span class="text-black-50 fw-bold"><strike>{{ $item->original_price }}
                                                            KS</strike> </span>
                                                     <span class="text-success fw-bold"> {{ $item->promotion_price }} KS </span>
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
     </div>--}}
@endsection

@section('footer-layout')

@endsection
@section('foot')
    <script>

    </script>
@endsection
