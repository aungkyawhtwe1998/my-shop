@extends('layouts.host')
@section('title')
    Blog
@endsection
@section('style')
    <style>
        body {
            background-color: #1e242b;
        }

    </style>
@endsection
@section('header')
    <div class="container-fluid site-nav ">
        <div class="row  mt-0 ">
            @include('layouts.host-header')
        </div>
    </div>

@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <x-host-bread-crumb>
                    <li class="breadcrumb-item active" aria-current="page">Blogs</li>
                </x-host-bread-crumb>
            </div>
        </div>
        <div class="row mx-3 justify-content-between">
            <div class="">
                {{ $posts->appends(Request::all())->links() }}
            </div>
            <div class="">
                {{-- <label for="category_id" class="font-weight-bold text-warning">Choose
                    Categories</label> --}}
                <select name="category" class="custom-select" onchange="window.location.href=this.value;">
                    @foreach ($categories as $category)
                        <option value="{{ route('blogs.showbyCategory', $category->id) }}">{{ $category->title }}
                        </option>
                    @endforeach
                </select>

            </div>
        </div>
        <div class="row m-2">

            @foreach ($posts as $post)
                <div class="col-12 col-lg-4 col-md-4">
                    <div class="blog-card wow slideInLeft ani-delay-1 p-1 justify-content-center align-content-center">
                        <div class="rounded show-thumbnail"
                            style="background-image:url('{{ asset('storage/post-cover/' . $post->getPhoto->location) }}'); width:100%; height:200px">
                        </div>
                        <div class="">
                            <span class="badge badge-pill badge-success">
                                <i class="feather-user"></i>
                                {{ $post->getUser->name }}
                            </span>
                            <span class="badge badge-pill badge-secondary"><i class="fas fa-clock text-light mr-2">
                                </i>{{ $post->created_at->format('d M Y') }}
                            </span>
                        </div>
                        <div class="my-2 text-left">
                            <i class="fas fa-blog text-dark text-primary "></i>
                            <span class="mytext fw-bold">{{ Str::substr($post->name, 0, 45) }} ... </span>
                            <p class="text-justify" style="color: black">
                                <?php
                                echo Str::substr(html_entity_decode($post->description, ENT_QUOTES), 0, 150);
                                ?>
                                <a class="text-warning"
                                    href="{{ route('blogs.show', ['category' => $post->category_id, 'id' => $post->id]) }}">...read
                                    more</a>

                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    @endsection
    @section('footer')
        <section class="container" id="contact">
            <div class="row">
                @include('layouts.host-footer')
            </div>
        </section>
    @endsection
    @section('foot')
    @endsection
